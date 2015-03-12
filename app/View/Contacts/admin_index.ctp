<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title"><?php echo __("Contact Management")?></h1>
       
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
         <?php echo $this->Form->create("Contact",array("action"=>"admin_index"));?>
            <div class="search_username">
            <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-search"></i></button>
            <input type="text" name="keyword" value="<?php if(@$keyword){echo $keyword;}?>" placeholder="Search Your Contact title" class="form-control" style="width: 17%;float: right;"/>
            </div>
          </form>
            <div class="btn-group">
            </div>
        </div>
         <?php  echo $this->Form->create('Contact',array("action" => "deleteall",'id' => 'mbc')); ?>
        <table class="table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectall" onClick="selectallCHBox();" /></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Name'); ?></th>
			<th><?php echo $this->Paginator->sort('Subject'); ?></th>
			<th><?php echo $this->Paginator->sort('Email'); ?></th>
			<th><?php echo $this->Paginator->sort('Contact no'); ?></th>
			<th><?php echo $this->Paginator->sort('Message'); ?></th>
			<th><?php echo $this->Paginator->sort('timestamp'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if($contacts){
                if(isset($contacts)){
                foreach ($contacts as $contact){ ?>
                    <tr>
                        <td><?php echo $this->Form->checkbox("use"+$contact['Contact']['id'],array('value' => $contact['Contact']['id'],'class'=>'chechid')); ?></td>
                        <td><?php echo h($contact['Contact']['name']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['subject']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['email']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['contact_no']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['message']); ?>&nbsp;</td>
                        <td><?php echo h($contact['Contact']['timestamp']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id'])); ?>
                           <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contact['Contact']['id']), array(), __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?>
                        </td>
                    </tr>
                <?php } } } else { {?> 
            <p class="not_found"><?php echo __("NOT FOUND")?></p>
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
