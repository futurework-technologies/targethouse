


<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __("Pdetails Management")?></h1>
        <ul class="breadcrumb">
            <li class="active"><?php echo __("Pdetails")?></li>
        </ul

    </div>

    <div class="main-content">
        <p>
            <?php $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        </p>
        <div class="btn-toolbar list-toolbar">
            <a href="<?php echo $this->Html->url('/admin/Pdetails/add/'); ?>"><span class="btn btn-primary"><i class="fa fa-plus"></i><?php echo __("New Pdetail")?></span></a>
            <?php echo $this->Form->create("Pdetail", array("action" => "admin_index")); ?>
            <div class="search_username">
                <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-search"></i></button>
                <input type="text" name="keyword" value="<?php if (@$keyword) {
                echo $keyword;
            } ?>" placeholder="Search Your Pdetail title" class="form-control" style="width: 17%;float: right;"/>
            </div>
            </form>
            <div class="btn-group">
            </div>
        </div>
<?php echo $this->Form->create('Pdetail', array("action" => "deleteall", 'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('Id'); ?></th>
                    <th><?php echo $this->Paginator->sort('Category ID/Type Id'); ?></th>
                    <th><?php echo $this->Paginator->sort('Article'); ?></th>
                    <th><?php echo $this->Paginator->sort('Material'); ?></th>
                    <th><?php echo $this->Paginator->sort('Size'); ?></th>
                    <th><?php echo $this->Paginator->sort('Quantity'); ?></th>
                    <th><?php echo $this->Paginator->sort('Color'); ?></th>
                    <th><?php echo $this->Paginator->sort('Production Price'); ?></th>
                    <th><?php echo $this->Paginator->sort('Partner Price'); ?></th>
                    <th><?php echo $this->Paginator->sort('Consumer Price'); ?></th>
                    <th><?php echo $this->Paginator->sort('Remark'); ?></th>
                    <th><?php echo $this->Paginator->sort('Height'); ?></th>
                    <th><?php echo $this->Paginator->sort('Width'); ?></th>
                    <th><?php echo $this->Paginator->sort('Ratio'); ?></th>
                    <th><?php echo $this->Paginator->sort('Article image'); ?></th>
                    <th><?php echo $this->Paginator->sort('Created'); ?></th>


                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details as $product) { ?>

                    <tr>
                        <td><?php echo h($product['Pdetail']['id']); ?>&nbsp;</td>
                        <td><?php echo h($product['Pdetail']['Category']); ?>&nbsp;</td>
                        <td><?php echo h($product['Pdetail']['Article']); ?>&nbsp;</td>
                        <td><?php echo h($product['Pdetail']['Material']); ?>&nbsp;</td>
                        <td><?php echo h($product['Pdetail']['Size']); ?>&nbsp;</td>
                        <td><?php echo h($product['Pdetail']['Quantity']); ?>&nbsp;</td>
                        <td><?php echo h($product['Pdetail']['Color']); ?>&nbsp;</td>
                          <td><?php echo h($product['Pdetail']['Production_price']); ?>&nbsp;</td>
                        <td><?php echo h($product['Pdetail']['Partner_price']); ?>&nbsp;</td>      
                        <td><?php echo h($product['Pdetail']['Consumer_price']); ?>&nbsp;</td>
                         <td><?php echo h($product['Pdetail']['Remark']); ?>&nbsp;</td>
                          <td><?php echo h($product['Pdetail']['Height']); ?>&nbsp;</td>
                          <td><?php echo h($product['Pdetail']['Width']); ?>&nbsp;</td>
                           <td><?php echo h($product['Pdetail']['Ratio']); ?>&nbsp;</td>
                        <td><img src="<?php echo $this->Html->url('/files/logos/' . $product['Pdetail']['image'], array('alt' => 'Image', 'height' => '70px', 'width' => '100px')); ?>">&nbsp;</td>                                                                     
                      <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Pdetail']['id'])); ?>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Pdetail']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Pdetail']['id']), array(), __('Are you sure you want to delete # %s?', $product['Pdetail']['id'])); ?>
                        </td>
                    </tr>

    <!--            <p class="not_found">NOT FOUND</p>-->
                <?php } ?>
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
