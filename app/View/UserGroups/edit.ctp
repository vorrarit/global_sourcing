<div class="userGroups form">
<?php echo $this->Form->create('UserGroup'); ?>
	<fieldset>
		<legend><?php echo __('Edit User Group'); ?></legend>
	<?php
		echo $this->Form->input('id',array('type'=>'text','readonly'=>true));
		echo $this->Form->input('user_group_name');
	?>
	</fieldset>
<?php echo $this->Form->button(__('Save'), array('class'=>'btn btn-primary btn-form')); ?>&nbsp;
<?php echo $this->Form->button(__('Reset'), array('type'=>'reset', 'class'=>'btn btn-default btn-form')); ?>
<?php echo $this->Form->end(); ?>
</div>
