<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * Common component
 */
class PdfFormComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    
    /*
    * Path to filled PDF form
    * @var string
    */
    private $output;
    
    private $tmpfile;

    /*
    * Flag for flattening the file
    * @var string
    */
    private $flatten;
    
    private function tmpfile(){
        return tempnam(sys_get_temp_dir(), uniqid());
    }
    
    public function fields($pretty = false){
        $tmp = $this->tmpfile();

        exec("pdftk {$this->pdfurl} dump_data_fields > {$tmp}");
        $con = file_get_contents($tmp);

        unlink($tmp);
        return $pretty == true ? nl2br($con) : $con;
    }
    
    public function makeFdf($data){
        $fdf = '%FDF-1.2
        1 0 obj<</FDF<< /Fields[';

        foreach ($data as $key => $value) {
            $fdf .= '<</T(' . $key . ')/V(' . $value . ')>>';
        }

        $fdf .= "] >> >>
        endobj
        trailer
        <</Root 1 0 R>>
        %%EOF";

        $fdf_file = $this->tmpfile();
        file_put_contents($fdf_file, $fdf);

        return $fdf_file;
    }
    
    public function flatten() {
        $this->flatten = ' flatten';
        return $this;
    }
    
    /**
     * 
     * @param string $pdf original pdf location
     * @param array $data , form field => value array
     * 
     * @return pdf file with filled forms 
     */
    public function fillFormFields($pdf, $data) {
        $fdf = $this->makeFdf($data);
        $output = $this->tmpfile();
        
        exec(PDFTK_SHELLPATH." {$pdf} fill_form {$fdf} output $output flatten 2>&1", $out, $return);
        
        if (!$return){ //error
            return $output;
        } else {
            return false;
        }
        
        
    }
    
    
    
}
