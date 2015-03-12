<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title">Contents Management</h1>
        <ul class="breadcrumb">
            <li class="active">Contents</li>
        </ul>

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
            <a href="<?php echo $this->Html->url('/admin/Contents/add/');?>"><span class="btn btn-primary"><i class="fa fa-plus"></i>New Content</span></a>
          <?php echo $this->Form->create("Content",array("action"=>"admin_index"));?>
            <div class="search_username">
            <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-search"></i></button>
            <input type="text" name="keyword" value="<?php if(@$keyword){echo $keyword;}?>" placeholder="Search Your Content title" class="form-control" style="width: 17%;float: right;"/>
            </div>
          </form>
            <div class="btn-group">
            </div>
        </div>
         <?php  echo $this->Form->create('Content',array("action" => "deleteall",'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('Footer Content'); ?></th>
                      <th><?php echo $this->Paginator->sort('Header logo'); ?></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
               
                foreach ($products as $product){ ?>
               
                    <tr>
                       
                        <td><?php echo h($product['Content']['footer_content']); ?>&nbsp;</td>
                        <td><img src="<?php echo $this->Html->url('/files/logos/'.$product['Content']['header_logo'] ,array('alt'=>'Image','height'=>'70px','width'=>'100px')); ?>">&nbsp;</td>                                                                     
                       
                        
                        
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Content']['id'])); ?>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Content']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Content']['id']), array(), __('Are you sure you want to delete # %s?', $product['Content']['id'])); ?>
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
    <button onclick="$('#mbc').submit();" value="Delete" class="btn btn-primary" style="margin-right: 101px;float: right;margin-top: 23px;">DeleteAll</button>
    </div>
   
</div>
<style type="text/css">
    
    .search_username{
        margin-top: -32px;
    }
</style>
