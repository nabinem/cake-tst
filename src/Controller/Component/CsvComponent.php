<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Csv component
 */
class CsvComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     * @access protected
     */
    protected $_defaultConfig = [
        'length' => 0,
        'delimiter' => ',',
        'enclosure' => '"',
        'escape' => '\\',
        'headers' => true,
        'text' => false,
        'excel_bom' => false,
    ];

     /**
     * Parse a file containing CSV formatted data.
     *
     * @access    public
     * @param    string
     * @param    boolean
     * @return    array
     */
    function parse_csv($p_Filepath, $options = []) {

        ini_set('auto_detect_line_endings',TRUE);
        $config = $this->config();
        $options = array_merge($config, $options);
        $content = false;
        $file = fopen($p_Filepath, 'r');
        if($file){
        	$fields = fgetcsv($file, $options['length'], $options['delimiter'], $options['enclosure']);
        	 foreach ( $fields as $key => $field ) {
                    $field = trim($field);
                    if ( empty($field) ) {
                        continue;
                    }
                    $fields[$key] = strtolower(str_replace(' ','_',$field));
             }
             while( ($row = fgetcsv($file, $options['length'], $options['delimiter'],$options['enclosure'])) != false ) {            
               if( $row[0] != null ) { // skip empty lines
	                if( !$content ) {
	                    $content = array();
	                }
              
                    $items = array();
                    
                    
                    foreach( $fields as $id => $field ) {
                        if( isset($row[$id]) ) {
                            $items[$field] = trim($row[$id]);    
                        }
                    }
                    $content[] = $items;
               
               }
           }
          fclose($file);
          //pr( $content); die;
          return $content;
        }

        return false;
        
        
    }

    
}
