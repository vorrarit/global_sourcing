<div class="departments form">
<?php echo $this->Form->create('Department',array('type'=>'post')); ?>
    <fieldset>
        <legend><?php echo __('Add Department'); ?></legend>
        <?php
                echo $this->Form->input('id',array('type'=>'text','readonly'=>true));		
		echo $this->Form->input('division_id',array(
                  'empty'=>'Please Select'));
                echo $this->Form->input('department_name');
	?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-primary btn-form')); ?>
     <?php echo $this->Form->button(__('Cancel'),array('onclick'=>"window.location.href='../Departments/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>
   <?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">
    $('#DepartmentDivisionId').change(function () {
        var dvID = $('#DepartmentDivisionId').val();
        if (!$("select[name='data[Department][division_id]'] option:selected").index() == 0) {
            $.post('../Departments/setNewID/' + dvID, function (data) {
                $('#DepartmentId').val(data);
            });
        } else {
            $('#DepartmentId').val(null);
        }
    });
</script>


