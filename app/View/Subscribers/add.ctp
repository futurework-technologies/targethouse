<div class="subscribers form">
<?php echo $this->Form->create('Subscriber'); ?>
	<fieldset>
		<legend><?php echo __('Add Subscriber'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Subscribers'), array('action' => 'index')); ?></li>
	</ul>
</div>
