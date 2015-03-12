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
            <li class="active">Newsletter</li>
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
          <?php echo $this->Form->create("Newsletter",array("action"=>"admin_index"));?>
            <div class="search_username">
            <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-search"></i></button>
            <input type="text" name="keyword" value="<?php if(@$keyword){echo $keyword;}?>" placeholder="Search Your Newslettername" class="form-control" style="width: 17%;float: right;"/>
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
                    <th><?php echo $this->Paginator->sort('User Name'); ?></th>
                    <th><?php echo $this->Paginator->sort('Contact No'); ?></th>
                    <th><?php echo $this->Paginator->sort('Email'); ?></th>
                      <th><?php echo $this->Paginator->sort('Company Name'); ?></th>
                        <th><?php echo $this->Paginator->sort('Gender'); ?></th>
                    <th><?php echo $this->Paginator->sort('Time'); ?></th>
                    <th><?php //echo $this->Paginator->sort('Status'); ?></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($newsletter){
                if(isset($newsletter)){
                foreach ($newsletter as $newsletters){ ?>
                    <tr>
                        <td><?php echo $this->Form->checkbox("use"+$newsletters['User']['id'],array('value' => $newsletters['User']['id'],'class'=>'chechid')); ?></td>
                        <td><?php echo h($newsletters['User']['username']); ?>&nbsp;</td>
                        <td><?php echo h($newsletters['User']['contact_no']); ?>&nbsp;</td>
                         <td><?php echo h($newsletters['User']['company_name']); ?>&nbsp;</td>
                            <td><?php echo h($newsletters['User']['gender']); ?>&nbsp;</td>
                        <td><?php echo h($newsletters['User']['timestamp']); ?>&nbsp;</td>
                        <td><?php if ($newsletters['User']['status']=='0'){?>
                            <?php echo $this->Form->postLink('Deactive', array('action' => 'activate', $newsletters['User']['id']),
                               array('escape'=>false));?></span><?php }else { ?>
                            <?php echo $this->Form->postLink('Active', array('action' => 'block', $newsletters['User']['id']),
                               array('escape'=>false)); ?></span> <?php }?>&nbsp;
                        </td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $newsletters['User']['id'])); ?>
                          <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $newsletters['User']['id']), array(), __('Are you sure you want to delete # %s?', $newsletters['User']['id'])); ?>
                        </td>
                    </tr>
                <?php } } } else { {?> 
            <p class="not_found">NOT FOUND</p>
                <?php } } ?>
            </tbody>
        </table>
      <?php echo $this->Form->end();?>   
<!--        <ul class="pagination">
            <li><?php
               // echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
               // echo $this->Paginator->numbers(array('separator' => ''));
               // echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                ?>
            </li>
        </ul>-->
    <button onclick="$('#mbc').submit();" value="Delete" class="btn btn-primary" style="margin-right: 101px;float: right;margin-top: 23px;">DeleteAll</button>
    </div>
   
</div>
<style type="text/css">
    
    .search_username{
        margin-top: -32px;
    }
</style>



