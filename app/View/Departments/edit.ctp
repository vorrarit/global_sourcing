<div class="departments form">
	<?php echo $this->Form->create('Department'); ?>
	<fieldset>
		<legend><?php echo __('Edit Department'); ?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('division_id', array('disabled' => true));
		echo $this->Form->input('department_name');
		?>
	</fieldset>
	<?php echo $this->Form->button(__('Submit'), array('type' => 'submit', 'class' => 'btn btn-primary btn-form')); ?>
	<?php echo $this->Form->button(__('Reset'), array('type' => 'reset', 'class' => 'btn btn-default btn-form')); ?>
	<?php echo $this->Form->button(__('Cancel'), array('onclick' => "window.location.href='/Departments/index'", 'type' => 'button', 'class' => 'btn btn-default btn-form')); ?>
	<?php echo $this->Form->end(); ?>
</div>

