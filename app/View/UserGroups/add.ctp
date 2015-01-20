<div class="userGroups form">
<?php echo $this->Form->create('UserGroup', array('type'=>'post')); ?>
	<fieldset>
		<legend><?php echo __('Add User Group'); ?></legend>
	<?php
        echo $this->Form->input('id',array('type'=>'text','readonly'=>true));
		echo $this->Form->input('user_group_name',array('required'=>true));
                echo $this->Form->input('m001', array('type'=>'checkbox', 'value' => 'Y', 'label'=>false, 'checkboxLabel'=>'Search Product'));
                echo $this->Form->input('m002', array('type'=>'checkbox', 'value' => 'Y','label'=>false,'checkboxLabel'=>'Product Register'));
                echo $this->Form->input('m003', array('type'=>'checkbox', 'value' => 'Y', 'label'=>false,'checkboxLabel'=>'Data Management'));
	?>
	</fieldset> 
<?php echo $this->Form->button(__('Save'), array('class'=>'btn btn-primary btn-form')); ?>&nbsp;
<?php echo $this->Form->button(__('Reset'), array('type'=>'reset', 'class'=>'btn btn-default btn-form')); ?>
<?php echo $this->Form->button(__('Cancel'),array('onclick'=>"window.location.href='../UserGroups/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>
<?php echo $this->Form->end(); ?>
</div>
