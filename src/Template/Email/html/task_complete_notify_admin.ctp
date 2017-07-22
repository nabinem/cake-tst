
<tr>
    <td>
        <table width="100%">
            <tr>
                <td valign="middle">
                    <table width="580" style="margin:0 auto;color:#73879C;">
                        <tr>
                            <td>
                                <p style="font-size: 18px;line-height: 21px;">Following Task has been completed by 
                                    <b><?php echo $completedBy->full_name; ?></b>.<br></p>
                                <h2>
                                    <?php echo h($task->title); ?>
                                </h2>
                                <div style="background: #f2f2f2;border-width: 1px 1px 2px 5px;border-style: solid;border-color: #E6E9ED;border-radius: 3px;background-color: #FFF;padding: 10px !important;border-left-color: #1ABC9C;">
                                    Priority: <b><?php echo isset($priorities[$task->priority]) ? $priorities[$task->priority] : ''; ?></b>
                                    &nbsp; &nbsp;  &nbsp; &nbsp; Due on: <b><?= h($task->due_date_formatted) ?></b>
                                    <br/><br/>
                                    <?php if(!empty($task->users)): ?>
                                                Assigned Staffs: 
                                                <b><?php echo implode(', ', array_map(function ($u){ return $u->full_name; }, $task->users)); ?></b>
                                            <br/><br/>
                                        <?php endif; ?>
                                    <?= 
                                        'To view this task, please follow this link : '.
                                        $this->Html->link(
                                            'here',
                                            [
                                                'controller' => 'Tasks',
                                                'action' => 'view',
                                                $task->id,
                                                '_full' => true
                                            ],
                                            [
                                                'style' => 'color:#1ABC9C;text-decoration:none;'
                                            ]
                                        )
                                     ?>
                                    <br />
                                    <br />
                                     <?php if (!empty($task->description)): ?>
                                            <strong><u>Description:</u></strong><br>
                                                <?php echo $task->description; ?> 
                                            <br>
                                     <?php endif; ?>
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