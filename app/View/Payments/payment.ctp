<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title">Users</h1>
    </div>

    <div class="main-content">
        <p>
            <?php $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong>Success!</strong><?php echo $x; ?>
            </div>
        <?php } ?>
        </p>
        <div class="btn-toolbar list-toolbar">

            <?php echo $this->Form->create("Payment", array("action" => "payment")); ?>
            <div class="search_username">
                <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-search"></i></button>
                <input type="text" name="keyword" value="<?php if (@$keyword) {
                echo $keyword;
            } ?>" placeholder="Search Your order" class="form-control" style="width: 17%;float: right;"/>
            </div>
            </form>
            <div class="btn-group">
            </div>
        </div>
<?php echo $this->Form->create('Payment', array("action" => "deleteall", 'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectall" onClick="selectallCHBox();" /></th>
                    <th><?php echo $this->Paginator->sort('Order id'); ?></th>
                    <th><?php echo $this->Paginator->sort('Image'); ?></th>
                    <th><?php echo $this->Paginator->sort('Order Time'); ?></th>
                    <th><?php echo $this->Paginator->sort('First Name'); ?></th>
                    <th><?php echo $this->Paginator->sort('Last Name'); ?></th>
                    <th><?php echo $this->Paginator->sort('Company'); ?></th>
<!--                     <th><?php //echo $this->Paginator->sort('Operation');  ?></th>
                    <th><?php //echo $this->Paginator->sort('Receipt');  ?></th>
                    <th><?php //echo $this->Paginator->sort('Label Print');  ?></th>-->
                    <th><?php echo $this->Paginator->sort('Status'); ?></th>
                    <th>Action</th>
                    <th>Change Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($payments) {
                    if (isset($payments)) {
                        foreach ($payments as $user) {
                            ?>
                            <tr>
                                <td><?php echo $this->Form->checkbox("use" + $user['Payment']['id'], array('value' => $user['Payment']['id'], 'class' => 'chechid')); ?></td>
                                <td><?php
                                    $ram = unserialize($user['Payment']['order_id']);
                                    foreach ($ram as $r) {
                                        echo $r . ",";
                                    }
                                    ?>&nbsp;</td>

                                <td><?php
                        $shayam = unserialize($user['Payment']['image']);
                        foreach ($shayam as $img) {
                            ?> 

                                        <img src="<?php echo $this->Html->url('/' . $img, array('alt' => 'Image')); ?>" width="70" height="100">
            <?php } ?>


                                    &nbsp;</td>






                                <td><?php echo h($user['Payment']['created']); ?>&nbsp;</td>
                                <td><?php echo h($user['Payment']['first_name']); ?>&nbsp;</td>
                                <td><?php echo h($user['Payment']['last_name']); ?>&nbsp;</td>
                                <td><?php echo h($user['Payment']['company']); ?>&nbsp;</td>
                                <td><?php if ($user['Payment']['status'] == '0') { ?>
                                        <?php echo $this->Form->postLink('Deactive', array('action' => 'activate', $user['Payment']['id']), array('escape' => false));
                                        ?></span><?php } else { ?>
                                        <?php echo $this->Form->postLink('Active', array('action' => 'block', $user['Payment']['id']), array('escape' => false));
                                        ?></span> <?php } ?>&nbsp;</td>

                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['Payment']['id']), array('class' => 'btn btn-warning btn-square')); ?>
                                </td>

                                <td class="actions">
                                    <?php
                                    if ($user['Payment']['status'] == 0) {
                                        echo $this->Form->postLink(('Activate'), array('Controller' => 'Payments', 'action' => 'activate', $user['Payment']['id']), array('escape' => false, 'class' => 'btn btn-info btn-sm btn-square', 'title' => 'Active'));
                                    } else {
                                        echo $this->Form->postLink(('Block'), array('controller' => 'Payments', 'action' => 'deactivate', $user['Payment']['id']), array('escape' => false, 'class' => 'btn btn-info btn-sm btn-square', 'title' => 'Block'));
                                    }
                                    ?>
                                </td>
                            </tr>
        <?php }
    }
} else { { ?> 
                    <p class="not_found">NOT FOUND</p>
                    <?php }
                } ?>
            </tbody>
        </table>
                <?php echo $this->Form->end(); ?>   
        <ul class="pagination">
            <li><?php
                echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                ?>
            </li>
        </ul>
        <button onclick="$('#mbc').submit();" value="Delete" class="btn btn-primary" style="margin-right: 101px;float: right;margin-top: 23px;">DeleteAll</button>
    </div>

</div>
<style type="text/css">

    .search_username{
        margin-top: -32px;
    }
</style>



