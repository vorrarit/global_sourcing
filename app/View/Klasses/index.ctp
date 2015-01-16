<div class="klasses form">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo __('Search Classes'); ?></h1>
        </div>
    </div>
<?php echo $this->Form->create('Klass',array('action'=>'index')); ?>
    <fieldset>  
        <?php
//        	echo $this->Form->input('division_id',array(
//                    'onchange'=>'division_Changed()',
//                    'empty'=>'All'));
                echo $this->Form->input('department_id',array(
                    'empty'=>'All'));
                echo $this->Form->input('text_search'); 
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Search'),array('type'=>'submit')); ?>
    <?php echo $this->Form->button(__('Clear'),array('type'=>'reset')); ?>
    <?php echo $this->Form->end(); ?>
</div>

<div class="klasses index">

         <?php echo $this->Form->create('Klass',array('action'=>'multiSelect'))?>

    <h2><?php echo __('Klasses'); ?></h2>

    <div class="btn-group pull-right" role="group" aria-label="...">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-pencil"></span>', array('escape'=>false, 'title'=>__('Add'),'onclick'=>'doSomething()','class'=>'btn btn-default')); ?>
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit','escape'=>false, 'class'=>'btn btn-default')); ?>   
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th width="70"><?php echo $this->Form->checkbox('check_all',array('id'=> 'chkCheckAll')); ?></th>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('division_id'); ?></th>
                <th><?php echo $this->Paginator->sort('department_id'); ?></th>
                <th><?php echo $this->Paginator->sort('klass_name'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($klasses as $klass): ?>
            <tr>
                <td><?php echo $this->Form->checkbox('Klass.id.'. $klass['Klass']['id'],array('value'=> $klass['Klass']['id'])); ?></td>
                <td width="70"><?php echo h($klass['Klass']['id']); ?>&nbsp;</td>
                <td width="100"><?php echo h($klass['Klass']['division_id']); ?>&nbsp;</td>
                <td><?php echo h($klass['Klass']['department_id']); ?>&nbsp;</td>
                <td><?php echo h($klass['Klass']['klass_name']); ?>&nbsp;</td>
                <td class="actions" width="100">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $klass['Klass']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $klass['Klass']['id']), array('escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $klass['Klass']['id'])); ?>

                </td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>
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
    <script type="text/javascript">
        function doSomething() {
            window.open("/Klasses/add");
        }
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