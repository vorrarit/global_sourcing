<div class="subKlasses form">
<?php echo $this->Form->create('SubKlass',array('type'=>'post')); ?>
    <fieldset>
        <legend><?php echo __('Add Sub Klass'); ?></legend>
	<?php
        echo $this->Form->input('id',array('type'=>'text','readonly'=>true));	
		echo $this->Form->input('division_id',array(
                    'onchange'=>'division_Changed()',
                    'empty'=>'Please Select'));
		echo $this->Form->input('department_id',array(
                    'onchange'=>'department_Changed()',
                    'empty'=>'Please Select'));
		echo $this->Form->input('klass_id',array(
//                    'onchange'=>'division_Changed()',
                    'empty'=>'Please Select'));
		echo $this->Form->input('sub_klass_name');
	?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit')); ?>
    <?php echo $this->Form->button(__('Cancle'),array('type'=>'reset')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Sub Klasses'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Klasses'), array('controller' => 'klasses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Klass'), array('controller' => 'klasses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
    </ul>
</div>-->
<script type="text/javascript">
    function division_Changed() {
        var dvID = document.getElementById('SubKlassDivisionId').value;
        //console.log(dvID);

        $.post('../SubKlasses/loadDepartments/' + dvID + '.json', function (data) {
            var ddlDepartments = document.forms[0].elements['data[SubKlass][department_id]'];
            var ddlKlasses = document.forms[0].elements['data[SubKlass][klass_id]'];
            
            ddlDepartments.selectedIndex = 0;
            ddlDepartments.options.length = 1;
            ddlDepartments.options.length = data.result.Departments.length + 1;
            for (i = 0; i < data.result.Departments.length; i++) {
                ddlDepartments.options[i + 1].text = data.result.Departments[i].Department.department_name;
                ddlDepartments.options[i + 1].value = data.result.Departments[i].Department.id;
            }
        });
    }
    function department_Changed() {
        var deptID = document.getElementById('SubKlassDepartmentId').value;

        $.post('../SubKlasses/loadKlasses/' + deptID + '.json', function (data) {
            var ddlDepartments = document.forms[0].elements['data[SubKlass][department_id]'];
            var ddlKlasses = document.forms[0].elements['data[SubKlass][klass_id]'];

            ddlKlasses.selectedIndex = 0;
            ddlKlasses.options.length = 1;
            ddlKlasses.options.length = data.result.Klasses.length + 1;
            for (i = 0; i < data.result.Klasses.length; i++) {
                ddlKlasses.options[i + 1].text = data.result.Klasses[i].Klass.klass_name;
                ddlKlasses.options[i + 1].value = data.result.Klasses[i].Klass.id;
            }
        });
    }
//    $('#SubKlassKlassId').change(function () {
//        var getID = $('#SubKlassKlassId').val();
//        var getOldID = $('#SubKlassId').val();
//        var res = getOldID.substring(8, 10);
//
//        $('#SubKlassId').val(getID + res);
//    });
    $('#SubKlassDivisionId').change(function () {
        var getID = $('#SubKlassDivisionId').val();
        $('#SubKlassId').val(getID);
    });
    $('#SubKlassDepartmentId').change(function () {
        var getID = $('#SubKlassDepartmentId').val();
        $('#SubKlassId').val(getID);
    });
    $('#SubKlassKlassId').change(function () {
        var klsID = $('#SubKlassKlassId').val();
        if (!$("select[name='data[SubKlass][klass_id]'] option:selected").index() == 0) {
            $.post('../SubKlasses/setNewID/' + klsID, function (data) {
                $('#SubKlassId').val(data);
            });
        } else {
            var getID = $('#SubKlassDepartmentId').val();
            $('#SubKlassId').val(getID);
        }
    });
</script>