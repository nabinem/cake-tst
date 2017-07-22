<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;
use Cake\Core\Configure;

class AppointmentMailer extends Mailer{
    
     /**
     * Send Appointment set notification email to doctor
     *
     * @param $appointment The Appointment information
     *
     * @return void
     */
    public function appointmentSetNotify($appointment)
    {
        $siteName = Configure::read('Site.name');
        $siteNoRepEmail = Configure::read('Site.noReplyEmail');
        $this
            ->emailFormat('html')
            ->from([$siteNoRepEmail => $siteName])
            ->to($appointment->doctor->email, $appointment->doctor->full_name)
            ->subject('New Appointment has been requested,')
            ->viewVars(['appointment' => $appointment]);
    }
    
    /**
     * Send Appointment confirmation email email to patient
     *
     * @param $appointment The Appointment information
     *
     * @return void
     */
    public function appointmentConfirmNotify($appointment)
    {
        $siteName = Configure::read('Site.name');
        $siteNoRepEmail = Configure::read('Site.noReplyEmail');
        $this
            ->emailFormat('html')
            ->from([$siteNoRepEmail => $siteName])
            ->to($appointment->patient->email, $appointment->patient->full_name)
            ->subject('Your Appointment has been confirmed by Doctor,')
            ->viewVars(['appointment' => $appointment]);
    }
    
}