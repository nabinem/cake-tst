<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Database\Type;
use Cake\I18n\FrozenTime;
use Cake\Utility\Hash;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'finder' => 'auth'
                ],
            ],
            'loginRedirect' => [
                'controller' => 'Dashboards',
                'action' => 'index'
            ],
            'authorize' => ['TinyAuth.Tiny' => ['autoClearCache' => true]]
        ]);
        $this->loadComponent('TinyAuth.AuthUser');
        
        Time::$defaultLocale = 'en-US';
        FrozenTime::setToStringFormat('MM/dd/yyyy h:mm a');
        // Configure a custom datetime format parser format.
        Type::build('datetime')->useLocaleParser()->setLocaleFormat('MM/dd/yyyy');
        
        
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    /**
     * Model Validation errors array to Text
     * @param array $valErrors Model validation errors
     */
    protected function valErrorsToText($valErrors, $separator = '<br/>'){
        $errors = Hash::flatten($valErrors);
        return implode($separator, $errors);
    } 
    
}
