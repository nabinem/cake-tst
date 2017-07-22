<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Core\Configure; 
class CommonHelper extends Helper {

    public $helpers = ['Html'];
    
    /**
     * @param $status int integer
     * Get the css for lead status texts
     * @return string css class
     */
    public function getLeadStatusTextClass($status){
        return 'status_text status_text_'.$status;
    }
    
    /**
     * @param $status int integer
     * Get the css for lead status btn
     * @return string css class
     */
    public function getLeadStatusBtnFaClass($status){
        $class = ['btnClass' => '', 'faClass' => ''];
        if (in_array((int)$status, [1, 8, 13])){
            $class = ['btnClass' => 'btn-success', 'faClass' => 'fa-check'];
        } elseif(in_array((int)$status, [2, 14])){
            $class = ['btnClass' => 'btn-danger', 'faClass' => 'fa-times'];
        }  elseif(in_array((int)$status, [3, 7, 9, 11, 15, 17])){
            $class = ['btnClass' => 'btn-warning', 'faClass' => ''];
        }
        return $class;
    }
    
    /**
     * Get key value pair of lead statuses to be used in select html
     * @return array
     */
    public function orderedLeadKeyStatus($roleId = null){
        $oStatusTexts = [];
        $statuses = Configure::read('allLeadStatus');
        if (empty($roleId) || $roleId === ROLE_ADMIN){
            $oStatuses = Configure::read('allLeadOrderedStatus');
        } elseif ($roleId === ROLE_STAFF){
           $oStatuses = Configure::read('leadStaffAllowedStatus');
        }
        elseif ($roleId === ROLE_TELEMEDCINE){
           $oStatuses = Configure::read('leadTelemedAllowedStatus');
        } elseif ($roleId === ROLE_PHARMACY){
           $oStatuses = Configure::read('leadPharmacyAllowedStatus');
        } elseif ($roleId === ROLE_DOCTOR){
           $oStatuses = Configure::read('leadDocChangeableStatus');
        }
        
        foreach ($oStatuses as $val){
            $oStatusTexts[$val] = $statuses[$val];
        }
        return $oStatusTexts;
        
    }
    
    public function getLinkActiveClass($controller, $action = null, $options = []){
        $class = '';
        $curController = $this->request->param('controller');
        $curAction = $this->request->param('action');
        
        if (empty($options) && empty($action)){
            $class = ( $curController == $controller) ? 'active' : '';
        } else if(empty($options) && !empty($action)){
            if (is_array($action)){
                $class = ($curController == $controller && in_array($curAction, $action)) ? 'active' : ''; 
            } else {
                $class = ($curController == $controller && $curAction == $action) ? 'active' : ''; 
            }
            
        }
        
        return $class;
        
    }
    
    public function getStatusText($status){
        $text = '';
        $statuses = Configure::read('allLeadStatus');
        $trashStatus =  Configure::read('trashLeadStatus'); 
        if (isset($statuses[$status])){
            $text = $statuses[$status];
        } elseif (isset($trashStatus[$status])){
            $text = $trashStatus[$status];
        }
        return $text;
    }
    
    function timeElapsedString($datetime, $full = false) {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
}

public function arrayToOptionsHtml($data = array()){
    $optionsHtml = '';
    if (!empty($data)){
        foreach ($data as $key => $value){
            $optionsHtml .= '<option value="'.$key.'">'.addslashes($value).'</option>';
        }
    }
    return $optionsHtml;
}
    
	
	
}
