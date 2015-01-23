<div class="subKlasses form">
<?php echo $this->Form->create('SubKlass',array('type'=>'post')); ?>
    <fieldset>
        <legend><?php echo __('Add Sub Class'); ?></legend>
	<?php
        echo $this->Form->input('id',array('type'=>'text','readonly'=>true));	
		echo $this->Form->input('division_id',array(
                    'onchange'=>'division_Changed()',
                    'empty'=>'Please Select','required'=>true));
		echo $this->Form->input('department_id',array(
                    'onchange'=>'department_Changed()',
                    'empty'=>'Please Select','required'=>true));
		echo $this->Form->input('klass_id',array(
                    'empty'=>'Please Select',
                    'label' => 'Class','required'=>true));
		echo $this->Form->input('sub_klass_name',array('label'=>'Sub Class Name','required'=>true));
	?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-primary btn-form')); ?>
    <?php echo $this->Form->button(__('Reset'),array('type'=>'reset','class'=>'btn btn-default btn-form'));?>
	<?php echo $this->Form->button(__('Cancel'),array('onclick'=>"window.location.href='../SubKlasses/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>
   <?php echo $this->Form->end(); ?>
</div>
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
