<div class="products form">
    <div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo __('Search Users'); ?></h1>
	</div>
    </div>
    
<?php echo $this->Form->create('Product',array('action'=>'index')); ?>
    <fieldset>
	<?php echo $this->Form->input('text_search'); ?>
        <table width="100%">
            <tbody>
            <td width="7%" id="embed_button">
                <input type="submit" name="Submit" value="Advance Search" onclick="JavaScript:fncShow('embed_div');">
            </td>
            <tr id="embed_div" style="display:none; ">
                <td width="50%"> 

                <?php echo $this->Form->input('product_name'); ?>
                <?php echo $this->Form->input('product_description_eng'); ?>
                <?php echo $this->Form->input('product_specification'); ?>
                </td>
                <td width="50%">
                <?php echo $this->Form->input('product_short_description_th'); ?>
                <?php echo $this->Form->input('product_short_description_eng'); ?></td>
            </tr>
            </tbody>
        </table>
    </fieldset>
<?php echo $this->Form->end(__('Search')); ?>
</div>
<div class="products index">
    <?php echo $this->Form->create('Product',array('action'=>'multiSelect'))?>
	<h2><?php echo __('Products'); ?></h2>
	<table class="table table-hover">
	<thead>
	<tr>		
                <th><?php echo $this->Form->checkbox('check_all',array('id'=> 'chkCheckAll')); ?></th>
                <th><?php echo $this->Paginator->sort('Product ID'); ?></th>
                <th><?php echo $this->Paginator->sort('Photo'); ?></th>
                <th><?php echo $this->Paginator->sort('Product Description_th'); ?></th>
                <th><?php echo $this->Paginator->sort('Product Description_eng'); ?></th>
                <th><?php echo $this->Paginator->sort('Product Specification'); ?></th>
                <th><?php echo $this->Paginator->sort('Retail Price'); ?></th>
                <th><?php echo $this->Paginator->sort('Manufacturer'); ?></th>
                <th><?php echo $this->Paginator->sort('Supplier'); ?></th>
                <th><?php echo $this->Paginator->sort('Status'); ?></th>
                <th><?php echo $this->Paginator->sort('Actions'); ?></th>
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <?php echo $this->Form->button('<span class="glyphicon glyphicon-pencil"></span>', array('escape'=>false, 'title'=>__('Add'), 'class'=>'btn btn-default')); ?>
                    <?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit', 'escape'=>false, 'class'=>'btn btn-default')); ?>   
                </div>
	</tr>
	</thead>
	<tbody>
	
<?php echo $this->Form->button('Delete Selected',array('type'=>'submit')); ?>            

	<?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $this->Form->checkbox('Product.id.'. $product['Product']['id'],array('value'=> $product['Product']['id'])); ?></td>
                <td><?php echo h($product['Product']['id']); ?>&nbsp;</td>

                <td><?php echo $this->Html->image('image1.jpg', array('width'=>'120px','height'=>'120px'));?>&nbsp;</td>

                <td><?php echo h($product['Product']['product_description_th']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['product_description_eng']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['product_specification']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['retail_price']); ?>&nbsp;</td>
                <td><?php echo h($product['Manufacturer']['manufac_name_eng']); ?>&nbsp;</td>


                <td><?php echo h(@$Spp[$SppProduct[$product['Product']['id']]]); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['product_status']); ?>&nbsp;</td>
                <td class="actions">

			<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $product['Product']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $product['Product']['id']), array('escape'=>false, 'title'=>__('Delete')), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
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
</div>
<!--<div class="actions">
	<h3><?php // echo __('Actions'); ?></h3>
	<ul>
		<li><?php // echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
		<li><?php // echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php // echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php // echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php // echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php // echo $this->Html->link(__('List Currencies'), array('controller' => 'currencies', 'action' => 'index')); ?> </li>
		<li><?php // echo $this->Html->link(__('New Currency'), array('controller' => 'currencies', 'action' => 'add')); ?> </li>
		<li><?php // echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php // echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
		<li><?php // echo $this->Html->link(__('List Manufacturers'), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
		<li><?php // echo $this->Html->link(__('New Manufacturer'), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
		<li><?php // echo $this->Html->link(__('List Klasses'), array('controller' => 'klasses', 'action' => 'index')); ?> </li>
		<li><?php // echo $this->Html->link(__('New Klass'), array('controller' => 'klasses', 'action' => 'add')); ?> </li>
		<li><?php // echo $this->Html->link(__('List Sub Klasses'), array('controller' => 'sub_klasses', 'action' => 'index')); ?> </li>
		<li><?php // echo $this->Html->link(__('New Sub Klass'), array('controller' => 'sub_klasses', 'action' => 'add')); ?> </li>
		<li><?php // echo $this->Html->link(__('List File Documents'), array('controller' => 'file_documents', 'action' => 'index')); ?> </li>
		<li><?php // echo $this->Html->link(__('New File Document'), array('controller' => 'file_documents', 'action' => 'add')); ?> </li>
		<li><?php // echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php // echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php // echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php // echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
	</ul>
</div>-->

<script type="text/javascript">
    $("#chkCheckAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

</script>    

<script language="JavaScript">

    function fncShow(ctrl) {
        document.getElementById(ctrl).style.display = '';
        document.getElementById('embed_button').innerHTML = '<input type="submit" name="Submit" value="Advance Search" onClick="JavaScript:fncHide(\'embed_div\');">';
        $('#ProductTextSearch').val('');
    }

    function fncHide(ctrl) {
        document.getElementById(ctrl).style.display = 'none';
        document.getElementById('embed_button').innerHTML = '<input type="submit" name="Submit" value="Advance Search " onClick="JavaScript:fncShow(\'embed_div\');">';
        $('#ProductProductName').val('');
        $('#ProductProductDescriptionEng').val('');
        $('#ProductProductSpecification').val('');
        $('#ProductProductShortDescriptionTh').val('');
        $('#ProductProductShortDescriptionEng').val('');
    }
</script>