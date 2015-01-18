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
		echo $this->Form->input('created_by',array('type' => 'hidden'));
		echo $this->Form->input('modified_by',array('type' => 'hidden'));
	?>
	</fieldset>
    <?php echo $this->Form->button('Submit', array ('class' => 'btn btn-primary btn-form')); ?>
    <?php echo $this->Form->end (); ?>
</div>
