<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title"> <?php echo __("Users")?></h1>
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
            <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'admin_add'));?>"><span class="btn btn-primary"><i class="fa fa-plus"></i>New Admin</span></a>
          <?php echo $this->Form->create("User",array("action"=>"admin_index"));?>
            <div class="search_username">
            <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-search"></i></button>
            <input type="text" name="keyword" value="<?php if(@$keyword){echo $keyword;}?>" placeholder="Search Your Username" class="form-control" style="width: 17%;float: right;"/>
            </div>
          </form>
             <div class="btn-group">
             </div>
        </div>
         <?php  echo $this->Form->create('User',array("action" => "deleteall",'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectall" onClick="selectallCHBox();" /></th>
                    <th><?php echo $this->Paginator->sort('Username'); ?></th>
                    <th><?php echo $this->Paginator->sort('Password'); ?></th>
                    <th><?php echo $this->Paginator->sort('Email'); ?></th>
                    <th><?php echo $this->Paginator->sort('Time'); ?></th>
                    <th><?php echo $this->Paginator->sort('Type'); ?></th>
                    <th><?php echo $this->Paginator->sort('Status'); ?></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($users){
                if(isset($users)){
                foreach ($users as $user){ ?>
                    <tr>
                        <td><?php echo $this->Form->checkbox("use"+$user['User']['id'],array('value' => $user['User']['id'],'class'=>'chechid')); ?></td>
                        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['password']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['timestamp']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['type']); ?>&nbsp;</td>
                        <td><?php if ($user['User']['status']=='0'){?>
                            <?php echo $this->Form->postLink('Deactive', array('action' => 'activate', $user['User']['id']),
                               array('escape'=>false));?></span><?php }else { ?>
                            <?php echo $this->Form->postLink('Active', array('action' => 'block', $user['User']['id']),
                               array('escape'=>false)); ?></span> <?php }?>&nbsp;</td>
                        
                           <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                        </td>
                        
                       
                    </tr>
                <?php } } } else { {?> 
            <p class="not_found"> <?php echo __("NOT FOUND")?></p>
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



