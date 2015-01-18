<div class="videos index">
	<h2><?php echo __('Videos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('video_name'); ?></th>
			<th><?php echo $this->Paginator->sort('video_path'); ?></th>
			<th><?php echo $this->Paginator->sort('video_file_type'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modifiled_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modifiled'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($videos as $video): ?>
	<tr>
		<td><?php echo h($video['Video']['id']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['video_name']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['video_path']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['video_file_type']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['created']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['modifiled_by']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['modifiled']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($video['Product']['id'], array('controller' => 'products', 'action' => 'view', $video['Product']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $video['Video']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $video['Video']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $video['Video']['id']), array(), __('Are you sure you want to delete # %s?', $video['Video']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Video'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
