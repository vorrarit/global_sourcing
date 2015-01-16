

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Supplier'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Supplier Contacts'), array('controller' => 'supplier_contacts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Supplier Contact'), array('controller' => 'supplier_contacts', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Supplier Products'), array('controller' => 'supplier_products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Supplier Product'), array('controller' => 'supplier_products', 'action' => 'add')); ?> </li>
    </ul>
</div>


<div class="suppliers form">
    <?php echo $this->Form->create('Supplier'); ?>
    <fieldset>
        <legend><?php echo __('suppliers'); ?></legend>
        <?php
        echo $this->Form->input('supplier_name_eng');
        echo $this->Form->end('Search');
        ?>
    </fieldset>
</div>

<div class="suppliers index">

    <?php echo $this->Form->create('Supplier', array('action' => 'multiSelect')); ?>





    <h2><?php echo __('Suppliers'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>

            <tr>
                <th><?php echo $this->Form->checkbox('check_all', array('id' => 'chkCheckAll')); ?></th>
                <th><?php echo $this->Paginator->sort('Supplier_id'); ?></th>
                <th><?php echo $this->Paginator->sort('supplier_name'); ?></th>

                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>




            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?php
                        echo $this->Form->checkbox('Supplier.id.' . $supplier['Supplier']['id'], array('class' => 'check', 'value' => $supplier['Supplier']['id']));
                        ?></td>
                    <td><?php echo h($supplier['Supplier']['id']); ?>&nbsp;</td>
                    <td><?php echo h($supplier['Supplier']['supplier_name_th']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $supplier['Supplier']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $supplier['Supplier']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <div><?php echo $this->Form->button('Delete', array('type' => 'submit')); ?></div>
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
