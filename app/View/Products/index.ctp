<div class="row">
	<h1 class="page-header"><?php echo __('Search Products'); ?></h1>
</div>

<?php echo $this->Form->create('Product',array('action'=>'index')); ?>
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
		
<div id="embed_div" class="row" style="display:none;">

<?php 
	echo $this->Form->input('division_id',array(
			'empty'=>'Please Select',
			'onchange' => 'division_Changed()',
			'required' => false,
			'div'=>array('class'=>'col-lg-6 form-group')
        ));   
				
	echo $this->Form->input('department_id', array(
			'empty'=>'Please Select',
			'onchange'=>'deparment_Changed()',
			'required' => false,
			'div'=>array('class'=>'col-lg-6 form-group')));

	echo $this->Form->input('klass_id',array(
			'label'=>'Class',
			'empty'=>'Please Select',
			'onchange'=>'klass_Changed()',
			'required' => false,
			'div'=>array('class'=>'col-lg-6 form-group')));
	
	echo $this->Form->input('sub_klass_id',array(
			'label'=>'Sub Class',
			'empty'=>'Please Select',
			'required' => false,		
			'div'=>array('class'=>'col-lg-6 form-group')));

	echo $this->Form->input('product_barcode_no', array(
			'div'=>array('class'=>'col-lg-6 form-group')));
	echo $this->Form->input('product_sku_no', array(
			'required' => false,	
			'div'=>array('class'=>'col-lg-6 form-group')));
	echo $this->Form->input('product_description', array(
			'div'=>array('class'=>'col-lg-12 form-group')));
	echo $this->Form->input('product_specification', array(
			'div'=>array('class'=>'col-lg-12 form-group')));
	echo $this->Form->input('min_price', array(
			'div'=>array('class'=>'col-lg-6 form-group')));
	echo $this->Form->input('max_price', array(
			'div'=>array('class'=>'col-lg-6 form-group')));
	echo $this->Form->input('manufac_name_eng', array(
			'div'=>array('class'=>'col-lg-6 form-group')));
	echo $this->Form->input('supplier_name_eng', array(
			'div'=>array('class'=>'col-lg-6 form-group')));
	echo $this->Form->input('supplier_type_id', array(
			'empty'=>'Please Select',
			'onchange'=>'deparment_Changed()',
		'div'=>array('class'=>'col-lg-6 form-group')));
?>
		<div class="col-lg-12 form-group">
		<?php echo $this->Form->button('<span class="glyphicon glyphicon-search"></span>&nbsp;' . __('Search'),array('type'=>'submit' , 'class'=>'btn btn-primary btn-form')); ?>
		<?php echo $this->Form->button(__('Reset'), array('type'=>'reset', 'class'=>'btn btn-default btn-form')); ?>
		</div>

</div>
<?php echo $this->Form->end(); ?>


</div>

<div class="products index">
    <h2><?php echo __('Products'); ?></h2>
    <table class="table table-hover" cellpadding="0" cellspacing="0" width ="100% ">

        <tbody>
        <?php echo $this->Form->create('Product',array('action'=>'multiExport')); ?>
        <?php 
            $columnIndex = 0;
            foreach ($products as $product) {
                $columnIndex += 1;
                if ($columnIndex == 1) {
                    echo "<tr>";
                }
                echo "<td width=\"33%\">";
                if (!empty($product['Photo'])) {
                    echo "<img width=\"180\" src=\"" . $product['Photo'][0]['photo_path'] . '/' . $product['Photo'][0]['photo_name'] . "\"><br>";
                }
                echo h($product['Product']['id']) . "<br>";
                echo h($product['Product']['product_name']) . "<br>";
                echo h($product['Product']['retail_price'].'  ');
						if(!empty( $product['Currency']['currency_name'] && $product['Unit']['unit_name'])){
							echo $product['Currency']['currency_name'].' / '.$product['Unit']['unit_name']; 
							
						}
						else if(!empty( $product['Currency']['currency_name'])){
							echo $product['Currency']['currency_name'] ;
						}
				echo "<br>" ;
				echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id']))."<br>"."<br>";
                echo $this->Form->checkbox('Product.id'.$product['Product']['id'],array('value' => $product['Product']['id']));
                echo "</td>";
                if ($columnIndex == 3) {
                    echo "</tr>";
                }
            }
            if ($columnIndex < 3) {
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    <?php echo $this->Form->submit(__('Export'), array('class'=>'btn btn-primary btn-form')); ?>&nbsp;
    <?php echo $this->Form->end(); ?>
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
<script language="JavaScript">
	function fncShow(ctrl) {
		document.getElementById(ctrl).style.display = '';
		document.getElementById('embed_button').innerHTML = '<input class="btn btn-default btn-form" type="submit" name="Advance Search" value="Advance Search" onClick="JavaScript:fncHide(\'embed_div\');">';
	}
	function fncHide(ctrl) {
		document.getElementById(ctrl).style.display = 'none';
		document.getElementById('embed_button').innerHTML = '<input class="btn btn-default btn-form" type="submit" name="Advance Search" value="Advance Search " onClick="JavaScript:fncShow(\'embed_div\');">';
	}
	document.forms[0].elements['data[Product][department_id]'].options.length = 1;
    document.forms[0].elements['data[Product][klass_id]'].options.length = 1;
	document.forms[0].elements['data[Product][sub_klass_id]'].options.length = 1;
	function division_Changed() {
		var dvID = document.getElementById('ProductDivisionId').value;

		$.post('/Products/loadDepartments/' + dvID + '.json', function (data) {
			var ddlDepartments = document.forms[0].elements['data[Product][department_id]'];
			var ddlKlasses = document.forms[0].elements['data[Product][klass_id]'];
			var ddlSubKlasses = document.forms[0].elements['data[Product][sub_klass_id]'];

			ddlDepartments.selectedIndex = 0;
			ddlDepartments.options.length = 1;
			ddlKlasses.options.length = 1;
			ddlSubKlasses.options.length = 1;

			ddlDepartments.options.length = data.result.Departments.length + 1;
			for (i = 0; i < data.result.Departments.length; i++) {
				ddlDepartments.options[i + 1].text = data.result.Departments[i].Department.department_name;
				ddlDepartments.options[i + 1].value = data.result.Departments[i].Department.id;
			}
		});
	}

	function deparment_Changed() {
		var deptID = document.getElementById('ProductDepartmentId').value;

		$.post('/Products/loadKlasses/' + deptID + '.json', function (data) {
			var ddlKlasses = document.forms[0].elements['data[Product][klass_id]'];
			ddlKlasses.options.length = data.result.Klasses.length + 1;

			for (i = 0; i < data.result.Klasses.length; i++) {
				ddlKlasses.options[i + 1].text = data.result.Klasses[i].Klass.klass_name;
				ddlKlasses.options[i + 1].value = data.result.Klasses[i].Klass.id;
			}
		});
	}
	function klass_Changed() {
		var klsID = document.getElementById('ProductKlassId').value;

		$.post('/Products/loadSubKlass/' + klsID + '.json', function (data) {
			var ddlSubKlasses = document.forms[0].elements['data[Product][sub_klass_id]'];
			ddlSubKlasses.options.length = data.result.SubKlasses.length + 1;
			for (i = 0; i < data.result.SubKlasses.length; i++) {
				ddlSubKlasses.options[i + 1].text = data.result.SubKlasses[i].SubKlass.sub_klass_name;
				ddlSubKlasses.options[i + 1].value = data.result.SubKlasses[i].SubKlass.id;
			}
		});
	}


</script>

