<div class="units form">
<?php echo $this->Form->create('Unit'); ?>
    <fieldset>
        <legend><?php echo __('Edit Unit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('unit_name');
?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-primary btn-form')); ?>
  <?php echo $this->Form->end(); ?>
</div>

