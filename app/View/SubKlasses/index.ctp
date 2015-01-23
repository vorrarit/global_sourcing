<div class="row">
    <h1 class="page-header"><?php echo __('Search Sub Classes'); ?></h1>
</div>
&nbsp;
<?php echo $this->Form->create('SubKlass',array('action'=>'index')); ?>
<div class="products form row">
    <div class="col-lg-8">
		<?php echo $this->Form->input('text_search', array('label'=>false)); ?>
    </div>
    <div class="col-lg-2">
        <div class="btn-group">
            <button type="submit" class="btn btn-primary col-lg-9"><span class="glyphicon glyphicon-search"></span>&nbsp;Search</button>
            <button type="button" class="btn btn-primary dropdown-toggle col-lg-3" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="javascript:void(null)" onclick="$('#embed_div').toggle()">Advance Search</a></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-2">   
            <?php echo $this->Form->button(__('Clear'),array('onclick'=>"window.location.href='../SubKlasses/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>    
    </div>
</div>

<div id="embed_div" class="row" style="display: none">
                <?php echo $this->Form->input('division_id',array(
                    'onchange'=>'division_Changed()',
                    'empty'=>'All', 'div'=>array('class'=>'col-lg-6 form-group')));
                echo $this->Form->input('department_id',array(
                    'onchange'=>'division_Changed()',                    
                    'empty'=>'All', 'div'=>array('class'=>'col-lg-6 form-group'))); 
                echo $this->Form->input('klass_id',array(
                    'empty'=>'All', 'div'=>array('class'=>'col-lg-6 form-group'))); ?>
</div>
<?php echo $this->Form->end();?>
&nbsp;
<div class="subKlasses index row">

         <?php echo $this->Form->create('subKlasses',array('action'=>'multiSelect'))?>

    <div class="btn-group pull-right" role="group" aria-label="...">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-plus"></span>', array('onclick'=>"window.location.href='../SubKlasses/add'",'type'=>'button','escape'=>false, 'title'=>__('Add'),'class'=>'btn btn-default')); ?>
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit','escape'=>false, 'class'=>'btn btn-default')); ?>   
    </div>

    <h2><?php echo __('Sub Classes'); ?></h2>


    <table class="table table-hover">
        <thead>
            <tr>
                <th width="70><?php echo $this->Form->checkbox('check_all',array('id'=> 'chkCheckAll')); ?></th>
                    <th><?php echo $this->Paginator->sort('id','Sub Class ID'); ?></th>
                    <th><?php echo $this->Paginator->sort('division_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('department_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('klass_id','Class'); ?></th>
                    <th><?php echo $this->Paginator->sort('sub_klass_name','Sub Class Name'); ?></th>
                    <th class="actions" width="70"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($subKlasses as $subKlass): ?>
            <tr>
                <td><?php echo $this->Form->checkbox('SubKlass.id.'. $subKlass['SubKlass']['id'],array('value'=> $subKlass['SubKlass']['id'])); ?></td>
                <td><?php echo h($subKlass['SubKlass']['id']); ?>&nbsp;</td>
                <td><?php echo h($subKlass['Division']['division_name']); ?>&nbsp;</td>
                <td><?php echo h($subKlass['Department']['department_name']); ?>&nbsp;</td>
                <td><?php echo h($subKlass['Klass']['klass_name']); ?>&nbsp;</td>
                <td><?php echo h($subKlass['SubKlass']['sub_klass_name']); ?>&nbsp;</td>
                <td class="actions">			
	                <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $subKlass['SubKlass']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $subKlass['SubKlass']['id']), array('inline'=>false,'escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $subKlass['SubKlass']['id'])); ?>
                </td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->Form->end(); ?>
    <?php echo $this->fetch('postLink'); ?>
    <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
    <div class="pagination">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('tag'=>'li', 'separator' => '', 'currentTag'=>'a', 'currentClass'=>'active'));
		echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'next disabled'));
	?>
    </div>

</div>

<script type="text/javascript">
    function division_Changed() {
        var dvID = $('#SubKlassDivisionId').val();
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
    $("#chkCheckAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<script language="JavaScript">
    function fncShow(ctrl) {
        document.getElementById(ctrl).style.display = '';
        document.getElementById('embed_button').innerHTML = '<input type="submit" name="Submit" value="Advance Search" class="btn btn-default btn-form" onClick="JavaScript:fncHide(\'embed_div\');">';
        $('#subKlassesTextSearch').val('');
    }

    function fncHide(ctrl) {
        document.getElementById(ctrl).style.display = 'none';
        document.getElementById('embed_button').innerHTML = '<input type="submit" name="Submit" value="Advance Search" class="btn btn-default btn-form" onClick="JavaScript:fncShow(\'embed_div\');">';
        var ddlDepartments = document.forms[0].elements['data[subKlasses][department_id]'];
        var ddlDivisions = document.forms[0].elements['data[subKlasses][division_id]'];
        var ddlKlasses = document.forms[0].elements['data[subKlasses][klass_id]'];

        ddlDepartments.options.length = 1;
        ddlDivisions.options.length = 1;
        ddlKlasses.options.length = 1;
    }
</script>