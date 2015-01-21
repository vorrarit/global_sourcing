<div class="divisions form">
<?php echo $this->Form->create('Division'); ?>
	<fieldset>
		<legend><?php echo __('Edit Division'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('division_name');
?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-primary btn-form')); ?>
    <?php echo $this->Form->end(); ?>
</div>

