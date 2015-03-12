<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __("Users")?></h1>
    </div>

    <div class="main-content">
        <p>
            <?php $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong><?php echo __("Success!")?></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        </p>
        <div class="btn-toolbar list-toolbar">

            <?php echo $this->Form->create("Order", array("action" => "payment")); ?>
            <div class="search_username">
                <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-search"></i></button>
                <input type="text" name="keyword" value="<?php
                if (@$keyword) {
                    echo $keyword;
                }
                ?>" placeholder="Search Your order" class="form-control" style="width: 17%;float: right;"/>
            </div>
            </form>
            <div class="btn-group">
            </div>
        </div>
<?php echo $this->Form->create('Order', array("action" => "deleteall", 'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>

                    <th><?php echo $this->Paginator->sort('Order id'); ?></th>
                    <th><?php echo $this->Paginator->sort('Order Time'); ?></th>
                    <th><?php echo $this->Paginator->sort('Item Count'); ?></th>
                    <th><?php echo $this->Paginator->sort('Name'); ?></th>
                    <th><?php echo $this->Paginator->sort('Email'); ?></th>
                    <th><?php echo $this->Paginator->sort('Conatact no'); ?></th>

                    <th><?php echo $this->Paginator->sort('Country'); ?></th>
                    <th><?php echo $this->Paginator->sort('Billing Address'); ?></th>
<!--                     <th><?php //echo $this->Paginator->sort('Operation');   ?></th>
             <th><?php //echo $this->Paginator->sort('Receipt');   ?></th>
             <th><?php //echo $this->Paginator->sort('Label Print');   ?></th>-->
                    <th><?php echo $this->Paginator->sort('Status'); ?></th>
                    <th><?php echo __("Action")?></th>
                    <th><?php echo __("Change Status")?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($products) {
                    if (isset($products)) {
                        foreach ($products as $user) {
                            ?>
                            <tr>

                                <td><?php echo h($user['Order']['id']); ?>&nbsp;</td>
                                <td><?php echo h($user['Order']['created_on']); ?>&nbsp;</td>
                                <td><?php echo count($user['Inlineitem']); ?>&nbsp;</td>
                                <td><?php echo h($user['Order']['name']); ?>&nbsp;</td>
                                <td><?php echo h($user['Order']['email']); ?>&nbsp;</td>
                                <td><?php echo h($user['Order']['contact_number']); ?>&nbsp;</td>

                                <td><?php echo h($user['Order']['country']); ?>&nbsp;</td>
                                <td><?php echo h($user['Order']['billing_add']); ?>&nbsp;</td>
                                <td><?php if ($user['Order']['status'] == '0') { ?>
                                        <?php echo $this->Form->postLink('Deactive', array('action' => 'activate', $user['Order']['id']), array('escape' => false));
                                        ?></span><?php } else { ?>
                <?php echo $this->Form->postLink('Active', array('action' => 'block', $user['Order']['id']), array('escape' => false));
                ?></span> <?php } ?>&nbsp;</td>

                                <td class="actions">
            <?php echo $this->Html->link(__('Invoice View'), array('action' => 'view', $user['Order']['id']), array('class' => 'btn btn-warning btn-square')); ?>
                                </td>

                                <td class="actions">
                                    <?php
                                    if ($user['Order']['status'] == 0) {
                                        echo $this->Form->postLink(('Activate'), array('Controller' => 'Orders', 'action' => 'activate', $user['Order']['id']), array('escape' => false, 'class' => 'btn btn-info btn-sm btn-square', 'title' => 'Active'));
                                    } else {
                                        echo $this->Form->postLink(('Block'), array('controller' => 'Orders', 'action' => 'deactivate', $user['Order']['id']), array('escape' => false, 'class' => 'btn btn-info btn-sm btn-square', 'title' => 'Block'));
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                    }
                } else { {
                        ?> 
                    <p class="not_found"><?php echo __("NOT FOUND")?></p>
            <?php }
        }
        ?>
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
        <button onclick="$('#mbc').submit();" value="Delete" class="btn btn-primary" style="margin-right: 101px;float: right;margin-top: 23px;"><?php echo __("DeleteAll")?></button>
    </div>

</div>
<style type="text/css">

    .search_username{
        margin-top: -32px;
    }
</style>



