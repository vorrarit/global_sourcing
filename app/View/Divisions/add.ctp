<div class="divisions form">
<?php echo $this->Form->create('Division',array('type'=>'post')); ?>
    <fieldset>
        <legend><?php echo __('Add Division'); ?></legend>
	<?php
                echo $this->Form->input('id',array('type'=>'text','readonly'=>true));
		echo $this->Form->input('division_name');       
           	?>
    </fieldset>
    <?php //echo $this->Form->button(__('Cancel'),array('type'=>'button','onclick'=>"window.location.href='../Divisions/index'")); ?>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-primary btn-form')); ?>
     <?php echo $this->Form->button(__('Cancel'),array('onclick'=>"window.location.href='../Divisions/index'",'type'=>'button','class'=>'btn btn-primary btn-form')); ?>
   <?php echo $this->Form->end(); ?>
</div>

