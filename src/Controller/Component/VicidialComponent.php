<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Event\Event;
use Cake\Http\Client;
use Cake\Routing\Router;

/**
 * Vicidial component
 */
class VicidialComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    
    protected $serverIp = '209.126.64.8/';
    
    protected $apiUser = 'admin';
    
    protected $apiPass = '100billioN';
    
    protected $source =  'Ourpatientportal.com';
    
    protected $pendingLeadListId = 919191;
    
    protected $callbackLeadListId = 919188;
    
    
    public function startup(Event $event)
    {
        //create non agent api base url
        $this->nonAgentBaseUrl = "http://" . $this->serverIp . "vicidial/non_agent_api.php?";
        $urlParams['source'] = $this->source;
        $urlParams['user'] = $this->apiUser;
        $urlParams['pass'] = $this->apiPass;

        $urlQuery = http_build_query($urlParams);
        $this->nonAgentBaseUrl .= $urlQuery;
        
    }
    
    
    public function callApi($url){
        //Skip localhost
        $request = Router::getRequest();
        if ($request->clientIp() == '127.0.0.1' || $request->host() == 'dev.ourpatientportal.com'
                || $request->host() == 'ourpatientportal.dev'){
            return false;
        }
        
        $http = new Client();
        
        try{
            $response = $http->get($url);  
        } catch (\Exception $ex) {
            $response = false;
        }
        
        return $response;
    }
    
    
    public function addLead($urlParams = []){
        $urlParams['function'] = "add_lead";
        if (empty($urlParams['status'])){
            return false;
        }
        if ($urlParams['status'] == 'pending'){
            $urlParams['list_id'] = $this->pendingLeadListId;
        } elseif ($urlParams['status'] == 'callback'){
            $urlParams['list_id'] = $this->callbackLeadListId;
        }
        unset($urlParams['status']);
        
        $urlQuery = http_build_query($urlParams);
        $url = $this->nonAgentBaseUrl ."&". $urlQuery;
        $response = $this->callApi($url);
        return $response;
       
    }
    
    
    
    
}
