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
    <?php echo $this->Form->button(__('Save'),array('type'=>'submit','class'=>'btn btn-primary btn-form')); ?>
     <?php echo $this->Form->button(__('Cancel'),array('onclick'=>"window.location.href='../Klasses/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>
   <?php echo $this->Form->end(); ?>
</div>
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