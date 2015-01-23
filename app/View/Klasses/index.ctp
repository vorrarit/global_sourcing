<div class="row">
    <h1 class="page-header"><?php echo __('Search Classes'); ?></h1>
</div>
&nbsp;
<?php echo $this->Form->create('Klass',array('action'=>'index')); ?>
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
            <?php echo $this->Form->button(__('Clear'),array('onclick'=>"window.location.href='../Klasses/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>    
    </div>
</div>

<div id="embed_div" class="row" style="display: none">
<?php
	echo $this->Form->input('division_id',array(
                    'onchange'=>'division_Changed()',
                    'empty'=>'All', 'div'=>array('class'=>'col-lg-6 form-group')));
	echo $this->Form->input('department_id',array(
                    'empty'=>'All', 'div'=>array('class'=>'col-lg-6 form-group')));
?>
</div>
<?php echo $this->Form->end();?>
&nbsp;
<div class="klasses index row">

         <?php echo $this->Form->create('Klass',array('action'=>'multiSelect'))?>

    <div class="btn-group pull-right" role="group" aria-label="...">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-plus"></span>', array('onclick'=>"window.location.href='../Klasses/add'",'type'=>'button','escape'=>false, 'title'=>__('Add'),'class'=>'btn btn-default')); ?>
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit','escape'=>false, 'class'=>'btn btn-default')); ?>   
    </div>
    <h2><?php echo __('Classes'); ?></h2>


    <table class="table table-hover">
        <thead>
            <tr>
                <th width="70"><?php echo $this->Form->checkbox('check_all',array('id'=> 'chkCheckAll')); ?></th>
                <th width="150"><?php echo $this->Paginator->sort('id','Class ID'); ?></th>
                <th><?php echo $this->Paginator->sort('division_id'); ?></th>
                <th><?php echo $this->Paginator->sort('department_id'); ?></th>
                <th><?php echo $this->Paginator->sort('klass_name','Class Name'); ?></th>
                <th class="actions" width="100"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($klasses as $klass): ?>
            <tr>
                <td><?php echo $this->Form->checkbox('Klass.id.'. $klass['Klass']['id'],array('value'=> $klass['Klass']['id'])); ?></td>
                <td width="70"><?php echo h($klass['Klass']['id']); ?>&nbsp;</td>
                <td width="100"><?php echo h($klass['Division']['division_name']); ?>&nbsp;</td>
                <td><?php echo h($klass['Department']['department_name']); ?>&nbsp;</td>
                <td><?php echo h($klass['Klass']['klass_name']); ?>&nbsp;</td>
                <td class="actions" width="100">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $klass['Klass']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $klass['Klass']['id']), array('inline'=>false,'escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $klass['Klass']['id'])); ?>

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
    $("#chkCheckAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<script language="JavaScript">
    function fncShow(ctrl) {
        document.getElementById(ctrl).style.display = '';
        document.getElementById('embed_button').innerHTML = '<input type="submit" name="Submit" value="Advance Search" class="btn btn-default btn-form" onClick="JavaScript:fncHide(\'embed_div\');">';
        $('#DepartmentTextSearch').val('');
    }

    function fncHide(ctrl) {
        document.getElementById(ctrl).style.display = 'none';
        document.getElementById('embed_button').innerHTML = '<input type="submit" name="Submit" value="Advance Search" class="btn btn-default btn-form" onClick="JavaScript:fncShow(\'embed_div\');">';
        var ddlDepartments = document.forms[0].elements['data[Klass][department_id]'];
        var ddlDivisions = document.forms[0].elements['data[Klass][division_id]'];

        ddlDepartments.options.length = 1;
        ddlDivisions.options.length = 1;
    }
</script>
