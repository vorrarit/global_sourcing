<div class="currencies form">
<?php echo $this->Form->create('Currency',array('type'=>'post')); ?>
    <fieldset>
        <legend><?php echo __('Add Currency'); ?></legend>
	<?php
                echo $this->Form->input('id',array('type'=>'text','readonly'=>true));
				echo $this->Form->input('currency_name',array('required'=>true));
	?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-primary btn-form')); ?>&nbsp;
    <?php echo $this->Form->button(__('Reset'),array('type'=>'reset','class'=>'btn btn-default btn-form')); ?>
	<?php echo $this->Form->button(__('Cancel'),array('onclick'=>"window.location.href='../Currencies/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>
    <?php echo $this->Form->end(); ?>
</div>

