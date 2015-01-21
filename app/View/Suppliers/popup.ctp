
<div class="suppliers form">
    <?php echo $this->Form->create('Supplier'); ?>
    <fieldset>
        <legend><?php echo __('suppliers'); ?></legend>
        <?php
        echo $this->Form->input('supplier_name_eng');
        ?>
    </fieldset>

    <?php echo $this->Form->end('Search'); ?>
</div>

<div class="suppliers index">
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>

            <tr>
                <th><?php echo $this->Paginator->sort('Supplier_id'); ?></th>
                <th><?php echo $this->Paginator->sort('supplier_name_eng'); ?></th>

            </tr>
        </thead>
        <tbody>



            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?php echo h($supplier['Supplier']['id']); ?>&nbsp;</td>
                    <td><a href="javascript:void(null)" onclick="supplierName_Clicked('<?php echo h($supplier['Supplier']['id']); ?>', '<?php echo h($supplier['Supplier']['supplier_name_eng']); ?>')"><?php echo h($supplier['Supplier']['supplier_name_eng']); ?></a>&nbsp;</td>

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
function supplierName_Clicked(supplierId, supplierName) {
	var form = window.opener.document.forms[0];
	form.elements['data[SupplierProduct][supplier_id]'].value = supplierId;
	form.elements['data[SupplierProduct][supplier_name]'].value = supplierName;
	window.close();
}
</script>