<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use ArrayObject;
use Cake\Event\Event;

/**
 * Common behavior
 */
class CommonBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    
    
    /**
     * 
     * 
     * @param string $check
     * @param array $context
     * @return bool
     */
    public function alphaNumericDashUnderscore($check,  $context = array()) {
        return (bool) preg_match('/^[0-9a-zA-Z_\-\.]+$/', $check);
    }
    
    // beforeMarshal
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        $config = $this->config();
        //trim fields
        if (isset($config['trimFieldsBeforeSave'])){
            $trimFields = is_array($config['trimFieldsBeforeSave']) ? $config['trimFieldsBeforeSave'] : array_keys((array)$data);
            foreach ($trimFields as $field){
                if (isset($data[$field]) && is_string($data[$field])){
                    $data[$field] =  trim($data[$field]);
                }
            }
        }
        //--trim fields--//
        
    }
    
    //Us phone
    public function usPhone($check,  $context = array()) {
        $check = preg_replace( '/\s+/', '', $check);
        $pattern = '/^(\+?1-?)?(\([2-9]([02-9]\d|1[02-9])\)|[2-9]([02-9]\d|1[02-9]))-?[2-9]([02-9]\d|1[02-9])-?\d{4}$/';
        return strlen($check) > 9 && (bool) preg_match($pattern, $check);
    }
    
    
}
