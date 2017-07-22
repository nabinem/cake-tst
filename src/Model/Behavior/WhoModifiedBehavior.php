<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;

/**
 * WhoModified behavior
 */
class WhoModifiedBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'modified_by_field' => 'modified_user_id'
    ];
    
    //beforesave add modified user id
    public function beforeSave(Event $event, EntityInterface $entity, ArrayObject $options)
    {
      //set who modified id
      $entity->set($this->config('modified_by_field'), $this->_table->user('id'));
              
      return true;   
    }
    
    
    
    
}
