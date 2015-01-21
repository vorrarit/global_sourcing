<div class="row">
	<h1 class="page-header"><?php echo __('Search Products'); ?></h1>
</div>

<?php echo $this->Form->create('Product',array('action'=>'xedni')); ?>
<div class="products form row">
	<div class="col-lg-10">
		<?php echo $this->Form->input('text_search', array('label'=>false)); ?>
	</div>
	<div class="col-lg-2">
		<div class="btn-group">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>&nbsp;Search</button>
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><a href="javascript:void(null)" onclick="$('#embed_div').toggle()">Advance Search</a></li>
			</ul>
		</div>
	</div>
</div>

<div id="embed_div" class="row" style="display: none">
		<?php echo $this->Form->input('product_name', array('div'=>array('class'=>'col-lg-6 form-group'), 'required'=>false)); ?>
		<?php echo $this->Form->input('product_description_eng', array('div'=>array('class'=>'col-lg-12 form-group'), 'required'=>false)); ?>
		<?php echo $this->Form->input('product_specification', array('div'=>array('class'=>'col-lg-12 form-group'), 'required'=>false)); ?>
		<?php echo $this->Form->input('product_short_description_th', array('div'=>array('class'=>'col-lg-12 form-group'), 'required'=>false)); ?>
		<?php echo $this->Form->input('product_short_description_eng', array('div'=>array('class'=>'col-lg-12 form-group'), 'required'=>false)); ?>
		<div class="col-lg-12 form-group">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-search"></span>&nbsp;' . __('Search'),array('type'=>'submit' , 'class'=>'btn btn-primary btn-form')); ?>
		</div>
</div>
<?php echo $this->Form->end();?>


<div class="products index row">
    <?php echo $this->Form->create('Product',array('action'=>'multiSelect'))?>
	<div class="btn-group pull-right" role="group" aria-label="...">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-pencil"></span>',array('onclick'=>"window.location.href='../Products/add'",'type'=>'button' , 'escape'=>false, 'title'=>__('Add') , 'class'=>'btn btn-default')); ?>
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span>',array('type'=>'submit', 'escape'=>false, 'class'=>'btn btn-default')); ?>   
	</div>
	
	<h2><?php echo __('Products'); ?></h2>
	<table class="table table-hover">
	<thead>
	<tr>		
                <th><?php echo $this->Form->checkbox('check_all',array('id'=> 'chkCheckAll')); ?></th>
                <th><?php echo $this->Paginator->sort('id','Product ID'); ?></th>
                <th><?php echo $this->Paginator->sort('Photo'); ?></th>
                <th><?php echo $this->Paginator->sort('Description_th'); ?></th>
                <th><?php echo $this->Paginator->sort('Description_eng'); ?></th>
                <th><?php echo $this->Paginator->sort('Specification'); ?></th>
                <th><?php echo $this->Paginator->sort('Retail Price'); ?></th>
                <th><?php echo $this->Paginator->sort('Manufacturer'); ?></th>
                <th><?php echo $this->Paginator->sort('Supplier'); ?></th>
                <th><?php echo $this->Paginator->sort('Status'); ?></th>
                <th><?php echo $this->Paginator->sort('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>         

	<?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $this->Form->checkbox('Product.id.'. $product['Product']['id'],array('value'=> $product['Product']['id'])); ?></td>
                <td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
                <td><?php echo (empty($product['Photo'])? '&nbsp;': '<img src="' . $product['Photo'][0]['photo_path'] . '/' . $product['Photo'][0]['photo_name'] . '" width=120 height=120>'); ?></td>
                <td><?php echo h($product['Product']['product_description_th']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['product_description_eng']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['product_specification']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['retail_price']); ?>&nbsp;</td>
                <td><?php echo h($product['Manufacturer']['manufac_name_eng']); ?>&nbsp;</td>
                <td><?php echo h(@$Spp[$SppProduct[$product['Product']['id']]]); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['product_status']); ?>&nbsp;</td>
                <td class="actions">
					<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $product['Product']['id']), array('escape'=>false, 'title'=>__('Edit'))); ?>
                    <a href="/Products/eteled/<?php echo $product['Product']['id']; ?>" class="glyphicon glyphicon-trash"></a>
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