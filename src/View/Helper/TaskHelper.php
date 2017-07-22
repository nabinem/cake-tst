<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Task helper
 */
class TaskHelper extends Helper
{
    /**
     * Get class to beused on table row tr
     * @param entirty $task
     */
    public function getRowClass($task){
        $class = '';
        if ($task->status === 2){//completed
            $class = 'task_completed';
        } else{
            //check overdue
            if (!empty($task->due_date)){
                $dueDate = new Time($task->due_date);
                if (Time::now() >= $dueDate->modify('+1 day')){
                    $class = 'task_overdue';
                }
            }
        }
        return $class;
    }
    
}
