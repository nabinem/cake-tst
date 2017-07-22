
<tr>
    <td>
        <table width="100%">
            <tr>
                <td valign="middle">
                    <table width="580" style="margin:0 auto;color:#73879C;">
                        <tr>
                            <td>
                                <p style="font-size: 18px;line-height: 21px;">Your Requested Appointment has been  approved by Doctor: 
                                    <b><?php echo $appointment->doctor->full_name; ?></b>.<br></p>
                                <div style="background: #f2f2f2;border-width: 1px 1px 2px 5px;border-style: solid;border-color: #E6E9ED;border-radius: 3px;background-color: #FFF;padding: 10px !important;border-left-color: #1ABC9C;">
                                    Requested Appointment Date: 
                                    &nbsp; &nbsp;  &nbsp; &nbsp; <b><?= h($appointment->appt_date) ?></b>
                                    <br/><br/>
                                    <?= 
                                        'To view this appointment, please follow this link : '.
                                        $this->Html->link(
                                            'here',
                                            [
                                                'controller' => 'Appointments',
                                                'action' => 'index',
                                                '_full' => true
                                            ],
                                            [
                                                'style' => 'color:#1ABC9C;text-decoration:none;'
                                            ]
                                        )
                                     ?>
                                    <br />
                                    <br />
                                </div>
                            </td>
                            <td class="expander"></td>
                        </tr>
                    </table>

                    <table width="580" style="margin:0 auto;color:#73879C;">
                        <tr>
                            <td>
                                <p>
                                    <?= __d('mail', 'Regards,') ?><br />
                                    <?= __d('mail', "{0}'s Team.", \Cake\Core\Configure::read('Site.name')) ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>