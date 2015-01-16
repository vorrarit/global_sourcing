<div class="users form">

	<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo __('Edit User'); ?></h1>
	</div>
	</div>
	
<?php echo $this->Form->create('User'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_group_id');
		echo $this->Form->input('user_name');
		echo $this->Form->input('email');
		echo $this->Form->input('username', array('readonly'=>true));
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-primary btn-form')); ?>&nbsp;
<?php echo $this->Form->button(__('Reset'), array('type'=>'reset', 'class'=>'btn btn-default btn-form')); ?>
<?php echo $this->Form->end(); ?>
</div>
