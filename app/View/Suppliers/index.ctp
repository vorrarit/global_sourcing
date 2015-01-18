
<div class="suppliers form">
    <?php echo $this->Form->create('Supplier'); ?>
    <fieldset>
        <legend><?php echo __('suppliers'); ?></legend>
        <?php
        echo $this->Form->input('supplier_name_eng');
        ?>
        <?php echo $this->Form->submit(__('Search'), array('class' => 'btn btn-primary')); ?>
    </fieldset>
</div>

<div class="suppliers index">

    <?php echo $this->Form->create('Supplier', array('action' => 'multiSelect')); ?>





    <h2><?php echo __('Suppliers'); ?></h2>
    <table class="table table-hover" cellpadding="0" cellspacing="0">
        <thead>

            <tr>
                <th><?php echo $this->Form->checkbox('check_all', array('id' => 'chkCheckAll')); ?></th>
                <th><?php echo $this->Paginator->sort('Supplier_id'); ?></th>
                <th><?php echo $this->Paginator->sort('supplier_name'); ?></th>

                <th>

                    <a href="../suppliers/add" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                    <?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>', array('type' => 'submit', 'class' => 'btn btn-default')); ?>
                </th>
            </tr>
        </thead>
        <tbody>




            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?php
                        echo $this->Form->checkbox('Supplier.id.' . $supplier['Supplier']['id'], array('class' => 'check', 'value' => $supplier['Supplier']['id']));
                        ?></td>
                    <td><?php echo h($supplier['Supplier']['id']); ?>&nbsp;</td>
                    <td><?php echo h($supplier['Supplier']['supplier_name_eng']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>', array('action' => 'view', $supplier['Supplier']['id']), array('escape' => false, 'title' => __('view'))); ?>
                      <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $supplier['Supplier']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'Suppliers', 'action' => 'delete', $supplier['Supplier']['id']), array('escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $supplier['Supplier']['id'])); ?>
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
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>


<script type="text/javascript">
    $("#chkCheckAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
