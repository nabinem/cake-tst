<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

/**
 * Appointments Controller
 *
 * @property \App\Model\Table\AppointmentsTable $Appointments
 */
class AppointmentsController extends AppController
{
    
    use MailerAwareTrait;
    
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $query = $this->Appointments->find()->contain(['Patients', 'Doctors']);
        //For patient only allow to view his appointments
        if ($this->AuthUser->hasRole(ROLE_PATIENT)){
           $query->where(['Appointments.patient_id' => $this->Auth->user('id')]);
        }
        //For Dcotor only allow to view his appointments
        if ($this->AuthUser->hasRole(ROLE_DOCTOR)){
           $query->where(['Appointments.doctor_id' => $this->Auth->user('id')]);
        }
        $appointments = $this->paginate($query);

        $this->set(compact('appointments'));
        $this->set('_serialize', ['appointments']);
    }

    /**
     * View method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => ['Patients', 'Doctors']
        ]);

        $this->set('appointment', $appointment);
        $this->set('_serialize', ['appointment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appointment = $this->Appointments->newEntity();
        if ($this->request->is('post')) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->data);
            if ($this->AuthUser->hasRole(ROLE_PATIENT)){
                $appointment->patient_id = $this->Auth->user('id');
            }
            if ($this->Appointments->save($appointment)) {
                //Send Appointment request email to doctor
                $appointment->doctor = $this->Appointments->Doctors->get($appointment->doctor_id);
                $appointment->patient = $this->Appointments->Patients->get($appointment->patient_id);
                $this->getMailer('Appointment')->send('appointmentSetNotify', [$appointment]);
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
            }
        }
        $patients = $this->_userLists(ROLE_PATIENT);
        $doctors = $this->_userLists(ROLE_DOCTOR);
        $this->set(compact('appointment', 'doctors', 'patients'));
        $this->set('_serialize', ['appointment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $query = $this->Appointments->findById($id);
        //For patient only allow to view his appointments
        if ($this->AuthUser->hasRole(ROLE_PATIENT)){
           $query->where(['Appointments.patient_id' => $this->Auth->user('id')]);
        }
        //For Dcotor only allow to view his appointments
        if ($this->AuthUser->hasRole(ROLE_DOCTOR)){
           $query->where(['Appointments.doctor_id' => $this->Auth->user('id')]);
        }
        $appointment = $query->firstOrFail();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->data);
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been postponed.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The appointment could not be modified. Please, try again.'));
            }
        }
        $patients = $this->_userLists(ROLE_PATIENT);
        $doctors =  $this->_userLists(ROLE_DOCTOR);
        $this->set(compact('appointment', 'patients', 'doctors'));
        $this->set('_serialize', ['appointment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appointment = $this->Appointments->get($id);
        if ($this->Appointments->delete($appointment)) {
            $this->Flash->success(__('The appointment has been deleted.'));
        } else {
            $this->Flash->error(__('The appointment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * 
     * @param int $id appointment id
     * @param int $status 0 => false,  1 => true
     */
    public function toggleConfirmed($id, $status){
        $appointment = $this->Appointments->findById($id)->contain(['Patients', 'Doctors'])->firstOrFail();
        $appointment->is_confirmed = (int) $status == 1 ? true : false;
        if ($this->Appointments->save($appointment)){
            $this->Flash->success(__('The appointment confirm status has been modified.'));
        } else {
            $this->Flash->error(__('Something went wrong. Please, try again.'));
        }
        //Send Confirmed notification email to Patient
        $this->getMailer('Appointment')->send('appointmentConfirmNotify', [$appointment]);
        
        return $this->redirect(['action' => 'index']);
    }
    
    
}
