


<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __("All Category")?></h1>
        

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
                    <th><?php echo $this->Paginator->sort('Image'); ?></th>
                    <th><?php echo $this->Paginator->sort('Category Name'); ?></th>
                    <th><?php echo $this->Paginator->sort('Created Time'); ?></th>
                   <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $product) { ?>

                    <tr>
                        <td><?php echo h($product['Category']['id']); ?>&nbsp;</td>
                        <td><?php echo h($product['Category']['image']); ?>&nbsp;</td>
                        <td><?php echo h($product['Category']['categorie_name']); ?>&nbsp;</td>
                        <td><?php echo h($product['Category']['timestamp']); ?>&nbsp;</td>
                        
                                                                                         
                      <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Category']['id'])); ?>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Category']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Category']['id']), array(), __('Are you sure you want to delete # %s?', $product['Category']['id'])); ?>
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
        <button onclick="$('#mbc').submit();" value="Delete" class="btn btn-primary" style="margin-right: 101px;float: right;margin-top: 23px;">DeleteAll</button>
    </div>

</div>
<style type="text/css">

    .search_username{
        margin-top: -32px;
    }
</style>
