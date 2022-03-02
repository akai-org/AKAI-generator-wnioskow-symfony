<?php

namespace App\Tools\PdfGenerator\Latex;

use App\Tools\PdfGenerator\PdfGenerator;
use Symfony\Component\Filesystem\Filesystem;
use Webmozart\Assert\Assert;

class LatexPdfGenerator implements PdfGenerator
{
    private const TMP_SUFFIX_DATE_FORMAT = 'YmdHis';
    private const LATEX_SRC = '../latex/src';
    private const LATEX_GENERATED = '../latex/generated';
    private const VARIABLE_PREFIX = 'VAR-';
    private const VAR_FILE_NAME = 'vars.tex';

    private $user = 'marcin';


    /** @var array */
    private $variables;

    /** @var Filesystem */
    private $filesystem;

    public function __construct(
        Filesystem $filesystem
    )
    {
        $this->variables = [];
        $this->filesystem = $filesystem;
    }

    public function setVariable(string $key, string $value): PdfGenerator
    {
        $this->variables[self::VARIABLE_PREFIX . $key] = $value;
        return $this;
    }

    public function setListVariable(string $key, array $values): PdfGenerator
    {
        Assert::allString($values);

        $this->variables[self::VARIABLE_PREFIX . $key] = $values;
        return $this;
    }

    public function generate(string $outputName): string
    {
        #create directory
        $tmpPath = $this->filesystem->tempnam(self::LATEX_GENERATED, date(self::TMP_SUFFIX_DATE_FORMAT));
        unlink($tmpPath);

        #copy source to it
        $this->filesystem->mirror(self::LATEX_SRC, $tmpPath);

        #change variables
        $varsContent = file_get_contents($tmpPath . DIRECTORY_SEPARATOR . self::VAR_FILE_NAME);
        foreach ($this->variables as $placeholder => $variable) {
            if(is_array($variable)) {
                $variable = implode("\n", $variable);
            }
            $varsContent = str_replace($placeholder, $variable, $varsContent);
        }
        file_put_contents($tmpPath . DIRECTORY_SEPARATOR . self::VAR_FILE_NAME, $varsContent);

        #compile latex
        $texSourcePath = $tmpPath . DIRECTORY_SEPARATOR . "source.tex";
        shell_exec("sudo -u $this->user latexmk -pdf -jobname=$outputName -cd $texSourcePath");

        #wait for compile to end
        $path = $tmpPath . DIRECTORY_SEPARATOR . "$outputName.pdf";
        do {
            $response = file_get_contents($path);
            usleep(100);
        } while ($response === false);

        #remve directory
        $this->filesystem->remove($tmpPath);
        return $response;
    }
}