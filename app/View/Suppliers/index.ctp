
<div class="suppliers form">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo __('Supplier'); ?></h1>
        </div>
    </div>
    &nbsp;
    <?php echo $this->Form->create('Supplier'); ?>
    <div class="col-lg-12">
        <div class="col-lg-8">
            <fieldset>
                <?php echo $this->Form->input('supplier_name_eng', array('label' => false)); ?>
            </fieldset>
        </div>
        <div class="col-lg-2">
            <button type="submit" class="btn btn-primary col-lg-12"><span class="glyphicon glyphicon-search"></span>&nbsp;Search</button>
        </div>
        <div class="col-lg-2">   
            <?php echo $this->Form->button(__('Clear'), array('onclick' => "window.location.href='../Suppliers/index'", 'type' => 'button', 'class' => 'btn btn-default btn-form')); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<div class="suppliers index">

    <?php echo $this->Form->create('Supplier', array('action' => 'multiSelect')); ?>
    &nbsp;
    <table class="table table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Form->checkbox('check_all', array('id' => 'chkCheckAll')); ?></th>
                <th><?php echo $this->Paginator->sort('Supplier_id'); ?></th>
                <th><?php echo $this->Paginator->sort('supplier_name'); ?></th>

                <th>
                    <a href="../suppliers/add" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></a>
                    <?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>', array('type' => 'submit', 'class' => 'btn btn-default')); ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?php
                        echo $this->Form->checkbox('Supplier.id.' . $supplier['Supplier']['id'], array('class' => 'check', 'value' => $supplier['Supplier']['id']));
                        ?>
                    </td>
                    <td><?php echo h($supplier['Supplier']['id']); ?>&nbsp;</td>
                    <td><?php echo h($supplier['Supplier']['supplier_name_eng']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php // echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>', array('action' => 'view', $supplier['Supplier']['id']), array('escape' => false, 'title' => __('view'))); ?>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $supplier['Supplier']['id']), array('escape' => false, 'title' => __('Edit'))); ?>
                        <?php
                        echo $this->Form->postlink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $supplier['Supplier']['id']), array('inline' => false, 'escape' => false, 'title' => __('Delete')), __('Are you sure you want to delete # %s?', $supplier['Supplier']['supplier_name_eng']));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    echo $this->Form->end();
    echo $this->fetch('postLink');
    ?>

    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="pagination">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '', 'currentTag' => 'a', 'currentClass' => 'active'));
        echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'next disabled'));
        ?>
    </div>
</div>


<script type="text/javascript">
    $("#chkCheckAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
