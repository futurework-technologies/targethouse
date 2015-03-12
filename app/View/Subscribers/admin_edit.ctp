<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

<div class="content">
<div class="subscribers form">
<?php echo $this->Form->create('Subscriber'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Subscriber'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
		echo $this->Form->input('status');
		echo $this->Form->input('timestamp');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Subscriber.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Subscriber.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Subscribers'), array('action' => 'index')); ?></li>
	</ul>
</div>
</div>
