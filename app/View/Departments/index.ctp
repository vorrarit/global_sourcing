<div class="divisions form">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo __('Search Departments'); ?></h1>
        </div>
    </div>
<?php echo $this->Form->create('Department',array('action'=>'index')); ?>
    <fieldset>  
        <?php
        	echo $this->Form->input('division_id',array(
                    'empty'=>'All'));
                echo $this->Form->input('text_search'); ?>

    </fieldset>
    <?php echo $this->Form->button(__('Search'),array('type'=>'submit')); ?>
    <?php echo $this->Form->button(__('Clear'),array('type'=>'reset')); ?>
    <?php echo $this->Form->end(); ?>
</div>

<div class="departments index">
    <h2><?php echo __('Departments'); ?></h2>

       <?php echo $this->Form->create('Department',array('action'=>'multiSelect'))?>

    <div class="btn-group pull-right" role="group" aria-label="...">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-pencil"></span>', array('escape'=>false, 'title'=>__('Add'),'onclick'=>'doSomething()','class'=>'btn btn-default')); ?>
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit','escape'=>false, 'class'=>'btn btn-default')); ?>   
    </div>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th width="70"><?php echo $this->Form->checkbox('check_all',array('id'=> 'chkCheckAll')); ?></th>
                <th width="70"><?php echo $this->Paginator->sort('id'); ?></th>
                <th width="100"><?php echo $this->Paginator->sort('division_id'); ?></th>
                <th><?php echo $this->Paginator->sort('department_name'); ?></th>
                <th class="actions" width="100"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($departments as $department): ?>
            <tr>
                <td><?php echo $this->Form->checkbox('Department.id.'. $department['Department']['id'],array('value'=> $department['Department']['id'])); ?></td>
                <td><?php echo h($department['Department']['id']); ?>&nbsp;</td>
                <td><?php echo h($department['Department']['division_id']); ?>&nbsp;</td>
                <td><?php echo h($department['Department']['department_name']); ?>&nbsp;</td>
<!--                <td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $department['Department']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $department['Department']['id']), array(), __('Are you sure you want to delete # %s?', $department['Department']['id'])); ?>
                </td>-->
                <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $department['Department']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $department['Department']['id']), array('escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?',$department['Department']['id'])); ?>

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
            window.open("/Departments/add");
        }
        $("#chkCheckAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
