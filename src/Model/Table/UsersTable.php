<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->addBehavior('Timestamp');
        $this->addBehavior('AuthUser');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');
        
        $validator
                ->requirePresence('firstname', 'create')
                ->notEmpty('firstname');
        $validator
                ->requirePresence('lastname', 'create')
                ->notEmpty('lastname');
        $validator
                ->requirePresence('username', 'create')
                ->notEmpty('username');
        $validator->add('username', [
            'unique' => [
                        'rule' => 'validateUnique',
                        'provider' => 'table',
                        'message' => __("This Username is not available.")
                    ],
             ]);
        
        $validator
                ->add('email', 'valid', ['rule' => 'email'])
                ->requirePresence('email', 'create')
                ->notEmpty('email');
         $validator->add('email', [
            'unique' => [
                        'rule' => 'validateUnique',
                        'provider' => 'table',
                        'message' => __("This E-mail is already used.")
                    ],
             ]);
         
         $validator
                ->requirePresence('role_id', 'create')
                ->notEmpty('role_id');
         
         $validator
                ->requirePresence('password', 'create')
                ->notEmpty('password');
        $validator
                ->add('password', 'custom', ['rule' => function($value, $context) {
                if (isset($context['data']['confirm_password']) && $value != $context['data']['confirm_password']) {
                    return false;
                }
                return true;
            }, 'message' => "Your password does not match your repeat password.",
                    'on' => ['create', 'update']]);
         
         
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
    
    //findAuth
    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->where(['Users.active' => 1]);

        return $query;
    }
    
    /**
     * 
     * Validation Change Password
     * @param type $validator
     * @return type
     */
    
    public function validationChangePassword($validator)
    {
        $validator
                ->requirePresence('current_password')
                ->notEmpty('current_password');
        $validator
            ->add('current_password', 'matchOldPassword', [
                'rule' => 'matchOldPassword',
                'message' => __('Your Current password do not match!'),
                'provider' => 'table',
            ]);
        $validator
                ->requirePresence('password')
                ->notEmpty('password');
        $validator
                ->add('password', 'custom', ['rule' => function($value, $context) {
                if (isset($context['data']['confirm_password']) && $value != $context['data']['confirm_password']) {
                    return false;
                }
                return true;
            }, 'message' => "Your password does not match your repeat password.",
               'on' => ['create', 'update']
        ]);
        
        return $validator;
    }
    
    /**
     * Check current password match againist database password
     */
    public function matchOldPassword($value, array $context){
        $user = $this->get($this->user('id'));
        $hasher = new DefaultPasswordHasher();
        return $hasher->check($value, $user->password);
    }
    
    /**
     * Edit validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationEditProfile(Validator $validator)
    {
        
        $validator
                ->requirePresence('firstname', 'create')
                ->notEmpty('firstname');
        $validator
                ->requirePresence('lastname', 'create')
                ->notEmpty('lastname');
        
        $validator
                ->notEmpty('username');
        $validator->add('username', [
            'unique' => [
                        'rule' => 'validateUnique',
                        'provider' => 'table',
                        'message' => __("This Username is not available.")
                    ],
             ]);
        
        $validator
                ->add('email', 'valid', ['rule' => 'email'])
                ->notEmpty('email');
         $validator->add('email', [
            'unique' => [
                        'rule' => 'validateUnique',
                        'provider' => 'table',
                        'message' => __("This E-mail is already used.")
                    ],
             ]);
         
        return $validator;
    }
    
    /**
     * Get key value pair, id and user, Use caseto be used in select element
     * @param int $roleId
     * @return array 
     */
    public function usersList($options = array()){
        $users = [];
        $query = $this->find()->select(['id', 'firstname', 'lastname', 'role_id'])
                ->order(['firstname' => 'asc', 'lastname' => 'asc']);
        if (!empty($options['role_id'])){
            if (is_array($options['role_id'])){
                $query->where(['role_id IN' => $options['role_id']]);
            } else {
                $query->where(['role_id' => $options['role_id']]);
            }
            
        }
        $result = $query->all();
        if (!$result->isEmpty()){
            $roles = Configure::read('Roles');
            foreach ($result as $u){
                $users[$u->id] = !empty($options['withRoleName']) ? $u->full_name.'-('.array_search($u->role_id, $roles).')' : $u->full_name; 
            }
        }
        return $users;
    }
    
}
