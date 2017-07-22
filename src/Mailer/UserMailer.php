<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;
use Cake\Core\Configure;

class UserMailer extends Mailer{
     /**
     * ForgotPassword Email.
     *
     * @param User $user The user information
     *
     * @return void
     */
    public function forgotPassword($user)
    {
        $siteName = Configure::read('Site.name');
        $siteNoRepEmail = Configure::read('Site.noReplyEmail');
        $name = !empty($user->firstname) ? $user->firstname : $user->company;
        $this
            ->emailFormat('html')
            ->from([$siteNoRepEmail => $siteName])
            ->to($user->email, $name)
            ->subject('Reset your '.$siteName.' Account password.')
            ->viewVars(['user' => $user]);
    }
    
}