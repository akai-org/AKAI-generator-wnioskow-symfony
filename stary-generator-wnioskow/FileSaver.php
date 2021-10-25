<?php

require_once 'vendor/tecnickcom/tcpdf/tcpdf.php';

class FileSaver
{
    private $name;
    private $index;
    private $semesters;
    private $achievements;
    private $club_name;
    private $department;
    private $patron;

    private $timezone;
    private $date;
    private $function;
    private $leader;
    private $semestersPluralSingular;
    private $filename;

    public function __construct()
    {
        $this->timezone = date_default_timezone_get();
        $this->date = date("d/m/Y", time());
    }

    public function acceptData(array $array):void {
        if (isset($array["name"])) $this->name = $array["name"];
        if (isset($array["index"])) $this->index = $array["index"];
        if (isset($array["semesters"])) $this->semesters = $array["semesters"];
        (!empty($array["semesters"][0]) && !empty($array["semesters"][1]))?
            $this->semestersPluralSingular = "semestrach":
            $this->semestersPluralSingular = "semestrze";
        if (isset($array["achievements"])) $this->achievements = $array["achievements"];
        if (isset($array["function"])) $this->function = $array["function"];
        if (isset($array["leader"])) $this->leader = $array["leader"];
        if (isset($array["club_name"])) $this->club_name = $array["club_name"];
        if (isset($array["department"])) $this->department = $array["department"];
        if (isset($array["patron"])) $this->patron = $array["patron"];
        $this->filename = strtolower(str_replace(' ', '_', $this->name)) . '_zaswiadczenie_' . date('Y');
    }

    public function saveFiles(): void {
        $this->savePdf();
    }

    private function savePdf()
    {
        $pageOrientation = 'P';
        $measureUnit = "mm";
        $format = "A4";
        $marginY = 7;
        $marginX = 12;
        $isUnicode = true;
        $encoding = 'UTF-8';
        $diskCache = false;
        $creator = "AKAI";
        $author = $this->name;
        $title = "Zaświadczenie";
        $subject = "Zaświadczenie o przynależności do koła naukowego";

        $pdf = new TCPDF($pageOrientation, $measureUnit, $format, $isUnicode, $encoding, $diskCache);
        $pdf->SetCreator($creator);
        $pdf->SetAuthor($author);
        $pdf->SetTitle($title);
        $pdf->SetSubject($subject);
        $pdf->SetFont('dejavusans', '', 14, '', true);


        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->SetMargins($marginX, $marginY, $marginX);
        $pdf->SetAutoPageBreak(TRUE, $marginY);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);

        $pdf->SetFont('dejavusans', '', 10, '', true);
        $pdf->AddPage();
        $img_file = 'assets/polibuda.jpg';
        $pdf->setAlpha(0.1);
        $pdf->Image($img_file, 15, 80, 180, 180, '', '', '', false, 300, '', false, false, 0);
        $pdf->setAlpha(1);
        $html = $this->composeHtml();
        $pdf->writeHTML($html);

        $pdf->Output($this->filename.'.pdf', 'I');
    }

    public function getPdfFile()
    {
        return $this->filename . ".pdf";
    }

    private function composeHtml()
    {
        $html = $this->crerateHeader();
        $html .= $this->createTitle();
        $html .= $this->createContent();
        $html .= $this->createFooter();
        return $html;
    }

    private function crerateHeader()
    {
        $html = '<table>
                     <tr>
                         <td>
                             <img src="assets/polibuda.jpg" width="100" height="100"/>
                         </td>
                         <td colspan="4" style="text-align: center;">
                              <div style="font-size: 24px; font-weight: bold">Politechnika Poznańska</div>
                              <div style="">' . $this->department .  '</div>                         
                         </td>
                         <td></td>
                     </tr>
                 </table>';
        $html .= "<hr>";
        return $html;
    }

    private function createTitle()
    {
        $html = '<table>
                    <tr>
                        <td> </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; font-size: 12px;">
                            Poznań, dnia ' . $this->date . '
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <h4>Zaświadczenie o przynależności do</h4>
                            <span style="font-size: 18px; font-weight: bold;">' .$this->club_name . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>';
        return $html;
    }

    private function createContent()
    {
        $html = '<table>
                    <tr>
                        <td>
                            Zaświadcza się, że student/ka ' . $this->name . ' (nr albumu: ' . $this->index . ') 
                            był/a członkiem ' . $this->club_name . ' w ' . $this->semestersPluralSingular . ': ';
                            foreach ($this->semesters as $key => $semester) {
                                $html .= $semester;
                                if(!empty($this->semesters[$key+1])) {
                                    $html .= ", ";
                                }
                            }
                            $html .= '
                         </td>
                     </tr>';
        
                     $html .= '
                     <tr>
                        <td></td>
                     </tr>
                     <tr>
                        <td><b>Funkcja</b>: ' . $this->function . '</td>
                     </tr>
                     <tr>
                        <td></td>
                     </tr>
                     <tr>
                        <td style="font-weight: bold;">Działania:</td>
                     </tr>';
         $printedNumber = 1;
         foreach($this->achievements as $achievement) {
             if(!empty($achievement["name"])) {
                 $html .= "<tr><td></td></tr>";
                 $html .= '<tr><td>' . $printedNumber . '. ' . $achievement["name"];
                 if(!empty($achievement["startDate"] || !empty($achievement["endDate"]))) {
                     $html .= " (";
                     if(!empty($achievement["startDate"])) {
                         $html .= "od " . $achievement["startDate"] . " ";
                     }
                     if(!empty($achievement["endDate"])) {
                         $html .= "do " . $achievement["endDate"];
                     }
                     $html .= ")";
                 }
                 $html .= '</td></tr>';
                 $printedNumber++;
             }
         }
         $html .= '</table>';
        return $html;
    }

    private function createFooter()
    {
        $html = '<table><tr><td></td><td></td><td></td></tr>';
        $html .= '<tr><td></td><td></td><td></td></tr>';
        $html .= '<tr style="text-align: center">
                    <td>Przewodniczący</td>
                    <td></td>
                    <td>Opiekun</td>
                  </tr>';
        $html .= '<tr><td></td><td></td><td></td></tr>';
        $html .= '<tr style="text-align: center">
                    <td>' . $this->leader . '</td>
                    <td></td>
                    <td>' . $this->patron . '</td>
                  </tr>';
        $html .= '<tr><td></td><td></td><td></td></tr>';
        $html .= '<tr><td style="text-align: center;">....................................</td><td></td><td style="text-align: center;">....................................</td></tr>';
        $html .= '</table>';
        return $html;
    }
}