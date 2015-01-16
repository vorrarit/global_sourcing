<div class="klasses form">
<?php echo $this->Form->create('Klass',array('type'=>'post')); ?>
    <fieldset>
        <legend><?php echo __('Add Klass'); ?></legend>
	<?php
                echo $this->Form->input('id',array('type'=>'text','readonly'=>true));	
		echo $this->Form->input('division_id',array(
                    'onchange'=>'division_Changed()',
                    'empty'=>'Please Select'));
		echo $this->Form->input('department_id',array(
//                    'onchange'=>'department_Changed()',
                    'empty'=>'Please Select'));
		echo $this->Form->input('klass_name');
	?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit')); ?>
    <?php echo $this->Form->button(__('Cancle'),array('type'=>'reset')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<!--<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Klasses'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
    </ul>
</div>-->
<script type="text/javascript">
    function division_Changed() {
        var dvID = document.getElementById('KlassDivisionId').value;

        $.post('../Klasses/loadDepartments/' + dvID + '.json', function (data) {
            var ddlDepartments = document.forms[0].elements['data[Klass][department_id]'];
            var ddlKlasses = document.forms[0].elements['data[Klass][department_id]'];

            ddlDepartments.selectedIndex = 0;
            ddlDepartments.options.length = 1;
            ddlKlasses.options.length = 1;
            ddlDepartments.options.length = data.result.Departments.length + 1;
            for (i = 0; i < data.result.Departments.length; i++) {
                ddlDepartments.options[i + 1].text = data.result.Departments[i].Department.department_name;
                ddlDepartments.options[i + 1].value = data.result.Departments[i].Department.id;
            }
        });
    }
//    function department_Changed() {
//        var deptID = document.getElementById('KlassDepartmentId').value;
//
//        $.post('../Klasses/loadKlasses/' + deptID + '.json', function (data) {
//            var ddlDepartments = document.forms[0].elements['data[Klass][division_id]'];
//            var ddlKlasses = document.forms[0].elements['data[Klass][department_id]'];
//
//            ddlKlasses.selectedIndex = 0;
//            ddlKlasses.options.length = 1;
//            ddlKlasses.options.length = data.result.Klasses.length + 1;
//            for (i = 0; i < data.result.Klasses.length; i++) {
//                ddlKlasses.options[i + 1].text = data.result.Klasses[i].Klass.department_name;
//                ddlKlasses.options[i + 1].value = data.result.Klasses[i].Klass.id;
//            }
//        });
//    }
//    $('#KlassDepartmentId').change(function () {
//        var getID = $('#KlassDepartmentId').val();
//        var getOldID = $('#KlassId').val();
//        var res = getOldID.substring(4, 8);
//
//        $('#KlassId').val(getID + res);
//    });
    $('#KlassDivisionId').change(function () {
        var getID = $('#KlassDivisionId').val();
        $('#KlassId').val(getID);
    });

    $('#KlassDepartmentId').change(function () {
        var deptID = $('#KlassDepartmentId').val();
        if(!$("select[name='data[Klass][department_id]'] option:selected").index() == 0){
        $.post('../Klasses/setNewID/' + deptID, function (data) {
            $('#KlassId').val(data);
        });
    } else {
        var getID = $('#KlassDivisionId').val();
        $('#KlassId').val(getID);
    }
    });
</script>