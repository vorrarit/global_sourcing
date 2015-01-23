<div class="subKlasses form">
<?php echo $this->Form->create('SubKlass'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sub Class'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('division_id', array('disabled'=>true));
		echo $this->Form->input('department_id', array('disabled'=>true));
		echo $this->Form->input('klass_id', array('disabled'=>true,'label'=>'Class'));
		echo $this->Form->input('sub_klass_name',array('label'=>'Sub Class Name'));
?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

