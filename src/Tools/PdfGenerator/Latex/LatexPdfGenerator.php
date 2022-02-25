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

    private $useradmin = 'marcin';

    /** @var array */
    private $variables;

    /** @var Filesystem */
    private $filesystem;


    private $output_name;

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
        $tmpPath = $this->filesystem->tempnam(self::LATEX_GENERATED, date(self::TMP_SUFFIX_DATE_FORMAT));
        unlink($tmpPath);
        $this->filesystem->mirror(self::LATEX_SRC, $tmpPath);
        $varsContent = file_get_contents($tmpPath . DIRECTORY_SEPARATOR . self::VAR_FILE_NAME);
        foreach ($this->variables as $placeholder => $variable) {
            if(is_array($variable)) {
                $variable = implode("\n", $variable);
            }
            $varsContent = str_replace($placeholder, $variable, $varsContent);
        }
        file_put_contents($tmpPath . DIRECTORY_SEPARATOR . self::VAR_FILE_NAME, $varsContent);
        $texSourcePath = $tmpPath . DIRECTORY_SEPARATOR . "source.tex";
        #print_r("sudo -u marcin latexmk -f -pdf -jobname=$outputName -cd $texSourcePath 2>&1");
        #shell_exec("sudo -u marcin latexmk -f -pdf -jobname=$outputName -cd $texSourcePath 2>&1");
        shell_exec("sudo -u $this->useradmin latexmk -f -pdf -jobname=$outputName -cd $texSourcePath 2>&1 &");
        $this->output_name = $outputName.".pdf";
        return $tmpPath . DIRECTORY_SEPARATOR . "$outputName.pdf";
    }

    public function getOutputName(){
        return $this->output_name;
    }
}