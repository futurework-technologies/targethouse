<div class="area vc_area clearfix  vc_custom_1407843918532   ">
    <div class="masking">
        <div class="container-fluid">
            <div class="row vc_row wpb_row vc_row-fluid">
                <div class="vc_col-sm-12 wpb_column vc_column_container">
                    <div class="wpb_wrapper">



                        <div class="users index">
                            <h2><?php echo __('Users'); ?></h2>
                            <table cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                                        <th><?php echo $this->Paginator->sort('username'); ?></th>
                                        <th><?php echo $this->Paginator->sort('password'); ?></th>
                                        <th><?php echo $this->Paginator->sort('type'); ?></th>
                                        <th><?php echo $this->Paginator->sort('timestamp'); ?></th>
                                        <th><?php echo $this->Paginator->sort('email'); ?></th>
                                        <th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                                            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                            <td><?php echo h($user['User']['password']); ?>&nbsp;</td>
                                            <td><?php echo h($user['User']['type']); ?>&nbsp;</td>
                                            <td><?php echo h($user['User']['timestamp']); ?>&nbsp;</td>
                                            <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <p>
                                <?php
                                echo $this->Paginator->counter(array(
                                    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                                ));
                                ?>	</p>
                            <div class="paging">
                                <?php
                                echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                                echo $this->Paginator->numbers(array('separator' => ''));
                                echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                                ?>
                            </div>
                        </div>
                        <div class="actions">
                            <h3><?php echo __('Actions'); ?></h3>
                            <ul>
                                <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
