<div class="newsletters index">
	<h2><?php echo __('Newsletters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($newsletters as $newsletter): ?>
	<tr>
		<td><?php echo h($newsletter['Newsletter']['id']); ?>&nbsp;</td>
		<td><?php echo h($newsletter['Newsletter']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($newsletter['Newsletter']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($newsletter['Newsletter']['email']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($newsletter['User']['username'], array('controller' => 'users', 'action' => 'view', $newsletter['User']['id'])); ?>
		</td>
		<td><?php echo h($newsletter['Newsletter']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $newsletter['Newsletter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $newsletter['Newsletter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $newsletter['Newsletter']['id']), array(), __('Are you sure you want to delete # %s?', $newsletter['Newsletter']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Newsletter'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
