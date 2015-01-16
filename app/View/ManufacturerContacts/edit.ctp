<div class="manufacturerContacts form">
<?php echo $this->Form->create('ManufacturerContact'); ?>
	<fieldset>
		<legend><?php echo __('Edit Manufacturer Contact'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('manufacturer_id');
		echo $this->Form->input('manufac_contact_name');
		echo $this->Form->input('manufac_contact_position');
		echo $this->Form->input('manufac_contact_email');
		echo $this->Form->input('manufac_contact_number');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ManufacturerContact.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ManufacturerContact.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Manufacturer Contacts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Manufacturers'), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer'), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
	</ul>
</div>
