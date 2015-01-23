<div class="row">
    <h1 class="page-header"><?php echo __('Search Departments'); ?></h1>
</div>
&nbsp;
<?php echo $this->Form->create('Department',array('action'=>'index')); ?>
<div class="departments form row">
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
            <?php echo $this->Form->button(__('Clear'),array('onclick'=>"window.location.href='../Departments/index'",'type'=>'button','class'=>'btn btn-default btn-form')); ?>    
    </div>
</div>

<div id="embed_div" class="row" style="display: none">
		<?php echo $this->Form->input('division_id',array('empty'=>'All', 'div'=>array('class'=>'col-lg-6 form-group'))); ?> 
</div>
<?php echo $this->Form->end(); ?>
&nbsp;
<div class="departments index row">
<?php echo $this->Form->create('Department',array('action'=>'multiSelect'))?>
    <div class="btn-group pull-right" role="group" aria-label="...">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-plus"></span>', array('onclick'=>"window.location.href='../Departments/add'",'type'=>'button','escape'=>false, 'title'=>__('Add'),'class'=>'btn btn-default')); ?>
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit','escape'=>false, 'class'=>'btn btn-default')); ?>   
    </div>
    <h2><?php echo __('Departments'); ?></h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th width="70"><?php echo $this->Form->checkbox('check_all',array('id'=> 'chkCheckAll')); ?></th>
                <th><?php echo $this->Paginator->sort('id','Department ID'); ?></th>
                <th><?php echo $this->Paginator->sort('division_id'); ?></th>
                <th><?php echo $this->Paginator->sort('department_name'); ?></th>
                <th class="actions" width="100"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($departments as $department): ?>
            <tr>
                <td><?php echo $this->Form->checkbox('Department.id.'. $department['Department']['id'],array('value'=> $department['Department']['id'])); ?></td>
                <td><?php echo h($department['Department']['id']); ?>&nbsp;</td>
                <td><?php echo h($department['Division']['division_name']); ?>&nbsp;</td>
                <td><?php echo h($department['Department']['department_name']); ?>&nbsp;</td>
                <td class="actions">
					<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $department['Department']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
					<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $department['Department']['id']), array('inline'=>false,'escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?',$department['Department']['id'])); ?>

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
    var ddlDepartments = document.forms[0].elements['data[Department][division_id]'];
        ddlDepartments.options.length = 1;
    }
</script>
