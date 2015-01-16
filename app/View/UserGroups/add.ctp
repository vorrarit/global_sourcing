<div class="userGroups form">
<?php echo $this->Form->create('UserGroup', array('type'=>'post')); ?>
	<fieldset>
		<legend><?php echo __('Add User Group'); ?></legend>
	<?php
        echo $this->Form->input('id',array('type'=>'text','readonly'=>true));
		echo $this->Form->input('user_group_name');
                echo $this->Form->input('m001', array('type'=>'checkbox', 'value' => 'Y', 'label'=>'Search Product'));
                echo $this->Form->input('m002', array('type'=>'checkbox', 'value' => 'Y','label'=>'Product Register'));
                echo $this->Form->input('m003', array('type'=>'checkbox', 'value' => 'Y', 'label'=>'Data Management'));
	?>
	</fieldset> 
<?php echo $this->Form->submit(__('Save')); ?>
<?php echo $this->Form->button('Reset the Form', array('type' => 'reset'));?>
<?php echo $this->Form->end(); ?>
</div>
