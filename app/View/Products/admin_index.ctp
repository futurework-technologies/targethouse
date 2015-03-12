<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __("Products Management")?></h1>
        <ul class="breadcrumb">
            <li class="active"><?php echo __("Products")?></li>
        </ul

    </div>
    
    <div class="main-content">
        <p>
            <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong></strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
        </p>
        <div class="btn-toolbar list-toolbar">
            <a href="<?php echo $this->Html->url('/admin/Products/add/');?>"><span class="btn btn-primary"><i class="fa fa-plus"></i><?php echo __("New Product")?></span></a>
          <?php echo $this->Form->create("Product",array("action"=>"admin_index"));?>
            <div class="search_username">
            <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-search"></i></button>
            <input type="text" name="keyword" value="<?php if(@$keyword){echo $keyword;}?>" placeholder="Search Your Product title" class="form-control" style="width: 17%;float: right;"/>
            </div>
          </form>
            <div class="btn-group">
            </div>
        </div>
         <?php  echo $this->Form->create('Product',array("action" => "deleteall",'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectall" onClick="selectallCHBox();" /></th>
                    <th><?php echo $this->Paginator->sort('ProductName'); ?></th>
                    <th><?php echo $this->Paginator->sort('ProductImage'); ?></th>
                     <th><?php echo $this->Paginator->sort('description'); ?></th>
                    <th><?php echo $this->Paginator->sort('Categories'); ?></th>
                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
               
                foreach ($products as $product){ ?>
               
                    <tr>
                        <td><?php echo $this->Form->checkbox("use"+$product['Product']['id'],array('value' => $product['Product']['id'],'class'=>'chechid')); ?></td>
                        <td><?php echo h($product['Product']['product_name']); ?>&nbsp;</td>
                        <td><img src="<?php echo $this->Html->url('/files/logos/'.$product['Product']['product_image'] ,array('alt'=>'Image','height'=>'70px','width'=>'100px')); ?>">&nbsp;</td>                                                                     
                         <td><?php echo h($product['Product']['product_description']); ?>&nbsp;</td>
                         <td><?php echo h($product['Product']['categorie_name']); ?>&nbsp;</td>
                        
                        
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array(), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
                        </td>
                    </tr>
               
<!--            <p class="not_found">NOT FOUND</p>-->
                <?php }  ?>
            </tbody>
        </table>
      <?php echo $this->Form->end();?>   
        <ul class="pagination">
            <li><?php
                echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                ?>
            </li>
        </ul>
    <button onclick="$('#mbc').submit();" value="Delete" class="btn btn-primary" style="margin-right: 101px;float: right;margin-top: 23px;">DeleteAll")?></button>
    </div>
   
</div>
<style type="text/css">
    
    .search_username{
        margin-top: -32px;
    }
</style>
