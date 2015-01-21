<div class="klasses form">
<?php echo $this->Form->create('Klass'); ?>
	<fieldset>
		<legend><?php echo __('Edit Klass'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('division_id', array('disabled'=>true));
		echo $this->Form->input('department_id', array('disabled'=>true));
		echo $this->Form->input('klass_name');
?>
	</fieldset>
    <?php echo $this->Form->button(__('Save'),array('type'=>'submit','class'=>'btn btn-primary btn-form')); ?>
     <?php echo $this->Form->button(__('Cancel'),array('onclick'=>"window.location.href='../Klasses/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>
   <?php echo $this->Form->end(); ?>
</div>

