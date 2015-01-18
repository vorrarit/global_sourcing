<div class="manufacturerContacts index">
	<h2><?php echo __('Manufacturer Contacts'); ?></h2>
	<table class ="table table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacturer_id'); ?></th>
			<th><?php echo $this->Paginator->sort('manufac_contact_name'); ?></th>
			<th><?php echo $this->Paginator->sort('manufac_contact_position'); ?></th>
			<th><?php echo $this->Paginator->sort('manufac_contact_email'); ?></th>
			<th><?php echo $this->Paginator->sort('manufac_contact_number'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($manufacturerContacts as $manufacturerContact): ?>
	<tr>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($manufacturerContact['Manufacturer']['id'], array('controller' => 'manufacturers', 'action' => 'view', $manufacturerContact['Manufacturer']['id'])); ?></td>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_name']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_position']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_email']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['manufac_contact_number']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['created']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerContact['ManufacturerContact']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $manufacturerContact['ManufacturerContact']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $manufacturerContact['ManufacturerContact']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $manufacturerContact['ManufacturerContact']['id']), array(), __('Are you sure you want to delete # %s?', $manufacturerContact['ManufacturerContact']['id'])); ?>
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

