<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Mailer\MailerAwareTrait;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    use MailerAwareTrait;
    
    //Beforefilter
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        $this->Auth->allow(['register', 'logout', 'forgotPassword', 'resetPassword']);
    }
    
    //Login
    public function login()
    {
        //If already logged in
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->_updateLastLogin($user);
                
                return $this->redirect($this->Auth->redirectUrl());
                //return $this->redirect(['controller' => 'Leads']);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        
        $this->viewBuilder()->layout('login');
    }
    
    //Logout
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $query = $this->Users->find();
        if (empty($this->request->query['sort'])) {
            $query->order(['Users.firstname' => 'asc', 'Users.lastname' => 'asc']);
        }
                
        $users = $this->paginate($query);
        
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
    
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data,  ['accessibleFields' => ['role_id' => true]]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->_rolesList();
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //allow empty password for no update
            if (empty($this->request->data['password']) && empty($this->request->data['confirm_password'])) {
                unset($this->request->data['password']);
                unset($this->request->data['confirm_password']);
            }
            $user = $this->Users->patchEntity($user, $this->request->data, ['accessibleFields' => ['role_id' => true]]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->_rolesList();
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->request->referer());
    }
    
    /**
     * Register method
     *
     * @return \Cake\Network\Response|void Redirects on successful register, renders view otherwise.
     */
    public function register()
    {
        //If already logged in
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $roleId = ROLE_PATIENT;
            
            $user->role_id = $roleId;
            $user->active = 1;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('You have successfully registered. Please login to continue.'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('Registration failed. Please, try again.'));
            }
        }
        
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->viewBuilder()->layout('login'); 
    }
    
    /**
     * Toggle user active/inactive status
     * @param int $id User id
     * @param string $status Status
     */
    public function toggleStatus($id, $status){
        $user = $this->Users->get($id);
        $user->active = $status == 'active' ? 1 : 0;
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been modified.'));
        } else {
            $this->Flash->error(__('The user could not be modified. Please, try again.'));
        }

        return $this->redirect($this->request->referer()); 
    }
    
    /**
     * Edit own profile
     */
    public function editProfile(){
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => ['UserProfiles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data, ['validate' => 'editProfile']);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your profile has been modified.'));

                return $this->redirect(['action' => 'editProfile']);
            } else {
                $this->Flash->error(__('Your profile could not be modified.. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        
    }
    
    /**
     * Change password
     */
    public function changePassword(){
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data, ['validate' => 'changePassword', 'accessibleFields' => ['*' => false, 'password' => true]]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your Password has been modified.'));

                return $this->redirect(['action' => 'changePassword']);
            } else {
                $this->Flash->error(__('Your Password could not be modified.. Please, try again.'));
            }
        } 
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    /**
     * Forgot pass
     */
    public function forgotPassword() {
        //If already logged in
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
         if ($this->request->is(['post', 'put'])) {
             $user = $this->Users
                ->find()
                ->where([
                    'Users.username' => $this->request->data['username'],
                    'Users.active' => 1
                ])
                ->first();
             
            if (is_null($user)) {
                $this->Flash->error(__("This Username doesn't exist or the account has been deleted/deactivated."));
            } else {
                 //Generate the unique code
                $code = md5(rand() . uniqid() . time());
                //Update the user's information
                $user->forgot_pass_token = $code;
                $user->forgot_pass_expire = new Time();
                $this->Users->save($user);
                $this->getMailer('User')->send('forgotPassword', [$user]);
                $this->Flash->success(__("An E-mail has been send to <strong>{0}</strong>. Please follow the instructions in the E-mail.", h($user->email)));
            }
            
         }
        
        $this->viewBuilder()->layout('login');
    }
    
    /**
     * Display the form to reset his password.
     *
     * @return \Cake\Network\Response|void
     */
    public function resetPassword($id = null, $token = null)
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        if (is_null($id) || is_null($token)){
           $this->Flash->error(__("You arenot allowed to access that location."));

           return $this->redirect(['controller' => 'Users', 'action' => 'login']); 
        }

        $user = $this->Users
            ->find()
            ->where([
                'Users.forgot_pass_token' => $token,
                'Users.id' => $id,
                'Users.active' => 1
            ])
            ->first();

        if (is_null($user)) {
            $this->Flash->error(__("That token is not associated with any user."));

            return $this->redirect(['controller' => 'Users', 'action' => 'login']); 
        }
        
        $expireTime = $user->forgot_pass_expire->timestamp + (60 * 60);

        if ($expireTime < time()) {
            $this->Flash->error(__("That token is expired, please ask another E-mail token."));

            return $this->redirect(['action' => 'forgotPassword']);
        }

        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data, [
                'accessibleFields' =>  ['*' => false, 'password' => true, 'confirm_password' => true]]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__("Your password has been changed !, Please login to continue."));

                //Reset the token and the time.
                $user->forgot_pass_token = '';
                $user->forgot_pass_expire = null;
                $this->Users->save($user);

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        }

        $this->set(compact('user'));
        $this->viewBuilder()->layout('login');
    }
    
    /**
     * Roles list
     */
    protected function _rolesList() {
        return [
          ROLE_ADMIN => 'Admin',
          ROLE_DOCTOR => 'Doctor',
          ROLE_PATIENT => 'Patient'
        ];
    }
    
    protected function _updateLastLogin($user) {
        //update last login
        $userEntity = $this->Users->findById($user['id'])->first();
        if (!empty($userEntity)){
            $userEntity->last_login = new Time();
            $userEntity->last_login_ip = $this->request->clientIp();
            return $this->Users->save($userEntity);
        }
        return false;
    }
    
    
    
}
