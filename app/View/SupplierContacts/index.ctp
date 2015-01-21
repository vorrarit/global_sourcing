<div class="supplierContacts index">
    <h2><?php echo __('Supplier Contacts'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('supplier_id'); ?></th>
                <th><?php echo $this->Paginator->sort('supplier_contact_name'); ?></th>
                <th><?php echo $this->Paginator->sort('supplier_contact_position'); ?></th>
                <th><?php echo $this->Paginator->sort('supplier_contact_email'); ?></th>
                <th><?php echo $this->Paginator->sort('supplier_contact_number'); ?></th>
                <th><?php echo $this->Paginator->sort('created_by'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified_by'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($supplierContacts as $supplierContact): ?>
                <tr>
                    <td><?php echo h($supplierContact['SupplierContact']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($supplierContact['Supplier']['id'], array('controller' => 'suppliers', 'action' => 'view', $supplierContact['Supplier']['id'])); ?>
                    </td>
                    <td><?php echo h($supplierContact['SupplierContact']['supplier_contact_name']); ?>&nbsp;</td>
                    <td><?php echo h($supplierContact['SupplierContact']['supplier_contact_position']); ?>&nbsp;</td>
                    <td><?php echo h($supplierContact['SupplierContact']['supplier_contact_email']); ?>&nbsp;</td>
                    <td><?php echo h($supplierContact['SupplierContact']['supplier_contact_number']); ?>&nbsp;</td>
                    <td><?php echo h($supplierContact['SupplierContact']['created_by']); ?>&nbsp;</td>
                    <td><?php echo h($supplierContact['SupplierContact']['created']); ?>&nbsp;</td>
                    <td><?php echo h($supplierContact['SupplierContact']['modified_by']); ?>&nbsp;</td>
                    <td><?php echo h($supplierContact['SupplierContact']['modified']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $supplierContact['SupplierContact']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $supplierContact['SupplierContact']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $supplierContact['SupplierContact']['id']), array(), __('Are you sure you want to delete # %s?', $supplierContact['SupplierContact']['id'])); ?>
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
    <br>
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Supplier Contact'), array('controller' => 'suppliers', 'action' => 'edit', $supplierContact['SupplierContact']['supplier_id'])); ?></li>
        </ul>
    </div>

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Supplier'), array('action' => 'add')); ?></li>
    </ul>
</div>
