<div class="manufacturerContacts form">
<?php echo $this->Form->create('ManufacturerContact'); ?>
	<fieldset>
		<legend><?php echo __('Add Manufacturer Contact'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Manufacturer Contacts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Manufacturers'), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer'), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
	</ul>
</div>
