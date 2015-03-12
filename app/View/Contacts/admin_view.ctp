<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
    <div class="header">

        <h1 class="page-title">Contact Management</h1>
       
</div>
    
    <div class="main-content">
<div class="contacts view">
<h2><?php echo __('Contact'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['subject']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact no'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['contact_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timestamp'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['timestamp']); ?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<!--<div class="actions">
	<h3><?php //echo __('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('Edit Contact'), array('action' => 'edit', $contact['Contact']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Delete Contact'), array('action' => 'delete', $contact['Contact']['id']), array(), __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?> </li>
		<li><?php //echo $this->Html->link(__('List Contacts'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Contact'), array('action' => 'add')); ?> </li>
	</ul>
</div>-->
    </div>
    </div>