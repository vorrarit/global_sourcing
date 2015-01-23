<div class="currencies form">
<?php echo $this->Form->create('Currency'); ?>
	<fieldset>
		<legend><?php echo __('Edit Currency'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('currency_name',array('required'=>true));
	?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-primary btn-form')); ?>
	<?php echo $this->Form->button(__('Reset'),array('type'=>'reset','class'=>'btn btn-default btn-form')); ?>
	<?php echo $this->Form->button(__('Cancel'),array('onclick'=>"window.location.href='../Currencies/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>
  
		<?php echo $this->Form->end(); ?>
</div>

