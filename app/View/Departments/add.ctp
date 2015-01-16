<div class="departments form">
<?php echo $this->Form->create('Department',array('type'=>'post')); ?>
    <fieldset>
        <legend><?php echo __('Add Department'); ?></legend>
        <?php
                echo $this->Form->input('id',array('type'=>'text','readonly'=>true));		
		echo $this->Form->input('division_id',array(
//                    'onchange'=>'division_Changed()',
                    'empty'=>'Please Select'));
                echo $this->Form->input('department_name');
	?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit')); ?>
    <?php echo $this->Form->button(__('Cancle'),array('type'=>'reset')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Klasses'), array('controller' => 'klasses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Klass'), array('controller' => 'klasses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Sub Klasses'), array('controller' => 'sub_klasses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Sub Klass'), array('controller' => 'sub_klasses', 'action' => 'add')); ?> </li>
    </ul>
</div>-->
<script type="text/javascript">
//        $('#DepartmentDivisionId').change(function () {
//        var getID = $('#DepartmentDivisionId').val();
//        var getOldID = $('#DepartmentId').val();
//        var res = getOldID.substring(2, 4);
//
//        $('#DepartmentId').val(getID + res);
//    });
        $('#DepartmentDivisionId').change(function(){
        var dvID = $('#DepartmentDivisionId').val();
        if(!$("select[name='data[Department][division_id]'] option:selected").index() == 0){
        $.post('../Departments/setNewID/'+dvID,function(data){
            $('#DepartmentId').val(data);
        });
    } else {
        $('#DepartmentId').val(null);
    }
    });
</script>


