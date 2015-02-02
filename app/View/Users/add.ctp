<div class="users form">

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo __('Add User'); ?></h1>
		</div>
	</div>
<?php echo $this->Form->create('User', array('type'=>'post')); ?>
	<fieldset>
	<?php
		
        echo $this->Form->input('id',array('type'=>'text','readonly'=>true,'empty'=>'Please Select'));
        echo $this->Form->input('user_group_id',array('required'=>true));
		echo $this->Form->input('user_name',array('required'=>true));
		echo $this->Form->input('email',array('required'=>true));
		echo $this->Form->input('username',array('required'=>true));
		echo $this->Form->input('password',array('required'=>true));
	?>
<?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-primary btn-form')); ?>&nbsp;
<?php echo $this->Form->button(__('Reset'), array('type'=>'reset', 'class'=>'btn btn-default btn-form')); ?>&nbsp;
<?php echo $this->Form->button(__('Cancel'),array('onclick'=>"window.location.href='../Users/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>

	</fieldset>
<?php echo $this->Form->end(); ?>
</div>

