<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title">Admins</h1>
        <ul class="breadcrumb">
            <li class="active"><h2>List of subscriber</h2></li>
        </ul>

    </div>
    
    <div class="main-content">
        <p>
            <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong>Success!</strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
        </p>
        <div class="btn-toolbar list-toolbar">
          <?php echo $this->Form->create("subscriber",array("action"=>"admin_index"));?>
            <div class="search_username">
            <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-search"></i></button>
            <input type="text" name="keyword" value="<?php if(@$keyword){echo $keyword;}?>" placeholder="Search Your subscribe rname" class="form-control" style="width: 17%;float: right;"/>
            </div>
          </form>
            <div class="btn-group">
            </div>
        </div>
         <?php  echo $this->Form->create('Subscriber',array("action" => "deleteall",'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectall" onClick="selectallCHBox();" /></th>
                    <th><?php echo $this->Paginator->sort('Email'); ?></th>
                    <th><?php echo $this->Paginator->sort('Time'); ?></th>
                   <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($subs){
                if(isset($subs)){
                foreach ($subs as $subscriber){ ?>
                    <tr>
                        <td><?php echo $this->Form->checkbox("use"+$subscriber['Subscriber']['id'],array('value' => $subscriber['Subscriber']['id'],'class'=>'chechid')); ?></td>
                        <td><?php echo h($subscriber['Subscriber']['email']); ?>&nbsp;</td>
                        <td><?php echo h($subscriber['Subscriber']['timestamp']); ?>&nbsp;</td>
                       <td class="actions">
                            <?php echo $this->Form->postLink(__('Send Newsletter'), array('action' => 'send', $subscriber['Subscriber']['id']), array('class'=>'btn btn-danger btn-square')); ?>
                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $subscriber['Subscriber']['id']),array('class'=>'btn btn-warning btn-square')); ?>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subscriber['Subscriber']['id']),array('class'=>'btn btn-success btn-square')); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subscriber['Subscriber']['id']), array('class'=>'btn btn-danger btn-square'), __('Are you sure you want to delete # %s?', $subscriber['Subscriber']['id'])); ?>
                        </td>
                    </tr>
                <?php } } } else { {?> 
<!--            <p class="not_found">NOT FOUND</p>-->
                <?php } } ?>
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



