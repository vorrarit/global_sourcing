<div class="row">
	<h1 class="page-header"><?php echo __('Edit Product'); ?></h1>
</div>

<div class="products form row">

	<ul class="nav nav-tabs">
		<li role="presentation" class="active"><a href="#">Product Info.</a></li>
		<li role="presentation"><a href="/SupplierProducts/add/<?php echo $this->data['Product']['id']; ?>">Suppliers</a></li>
		<li role="presentation"><a href="/Attachments/index/<?php echo $this->data['Product']['id']; ?>">Attachments</a></li>
	</ul>
	
	<p></p>
	
<?php echo $this->Form->create('Product'); ?>
	<fieldset>

	<?php
        echo $this->Form->input('id',array(
            'type'=>'text',
            'readonly'=> true,
            'label'=> 'Product ID',
			'div'=> array('class'=>'col-lg-2 form-group')));
		echo $this->Form->input('product_name', array('div'=>array('class'=>'col-lg-10 form-group')));

		echo $this->Form->input('Division.division_name',array(
            'type' => 'text','readonly'=>true, 'div'=>array('class'=>'col-lg-6 form-group')
            ));
		echo $this->Form->input('Department.department_name', array(
			'type' => 'text','readonly'=>true, 'div'=>array('class'=>'col-lg-6 form-group')
			));

		echo $this->Form->input('Klass.klass_name', array(
            'type' => 'text','readonly'=>true,
			'label' => 'Class Name', 'div'=>array('class'=>'col-lg-6 form-group')
		));
		echo $this->Form->input('SubKlass.sub_klass_name',array(
            'type' => 'text','readonly'=>true,
            'label' => 'Sub Class Name', 'div'=>array('class'=>'col-lg-6 form-group')
        ));
		
		echo $this->Form->input('product_barcode_no', array(
			'div'=>array('class'=>'col-lg-6 form-group'), 
			'inputGroup'=>array('append'=>'<input type="checkbox" id="copyBarcode" onchange="tickCopyBarcode()"> Copy &gt;')));
		
		echo $this->Form->input('product_sku_no', array(
			'div'=>array('class'=>'col-lg-6 form-group')));
		
		
		echo $this->Form->input('product_description_th', array(
			'inputGroup'=>array('append'=>'<input type="checkbox" id="copyShortTh" onchange="tickCopyShortTh()"> Copy to Short Description TH'),
			'div'=>array('class'=>'col-lg-12 form-group')
		));

		echo $this->Form->input('product_description_eng', array(
			'inputGroup'=>array('append'=>'<input type="checkbox" id="copyShortEng" onchange="tickCopyShortEng()"> Copy to Short Description EN'),
			'div'=>array('class'=>'col-lg-12 form-group')
		));
		
		echo $this->Form->input('product_short_description_th', array(
			'div'=>array('class'=>'col-lg-12 form-group')));
		echo $this->Form->input('product_short_description_eng', array(
			'div'=>array('class'=>'col-lg-12 form-group')));

		echo $this->Form->input('product_specification', array('type'=>'textarea', 'div'=>array('class'=>'col-lg-12 form-group')));
		
		echo $this->Form->input('retail_price', array('div'=>array('class'=>'col-lg-6 form-group')));
		echo $this->Form->input('currency_id', array('div'=>array('class'=>'col-lg-6 form-group'),'empty'=>false , 'default'=> 1));
		
		echo $this->Form->input('unit_id', array('div'=>array('class'=>'col-lg-6 form-group')));
		echo $this->Form->input('manufacturer_id', array('div'=>array('class'=>'col-lg-6 form-group')));
		
		echo $this->Form->input('created_by',array('type'=>'hidden'));
		echo $this->Form->input('modified_by',array('type'=>'hidden'));
		echo $this->Form->input('product_status',array('type'=>'hidden','id'=>'prst'));
		
		echo '<div class="col-lg-12">';
                
                echo $this->Form->input(__('checkNext'),array('type'=>'hidden','id'=>'checkNext','value'=>''));
                
		echo $this->Form->button(__('Save Draft'),array('id'=>'btnSaveDraft','class'=>'btn btn-default btn-form')) . '&nbsp;';
		echo $this->Form->button(__('Next'), array('type'=>'button','class'=>'btn btn-primary btn-form','name'=>'btnNext','id'=>'btnNext')) . '&nbsp;';
		echo $this->Form->button(__('Cancel'), array('onclick'=>"window.location.href='/Products/xedni'",'type'=>'button','class'=>'btn btn-default btn-form'));
		echo '</div>';
        ?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>

<script type ="text/javascript">
     
    function tickCopyBarcode()
    {
        var copy = ($('#copyBarcode').prop("checked")) ? $('#ProductProductBarcodeNo').val() : '';
        $('#ProductProductSkuNo').val(copy);
    }
    
    function tickCopyShortTh()
    {
        var copy = ($('#copyShortTh').prop("checked")) ? $('#ProductProductDescriptionTh').val() : '';
        $('#ProductProductShortDescriptionTh').val(copy);
    }
    
    function tickCopyShortEng()
    {
        var copy = ($('#copyShortEng').prop("checked")) ? $('#ProductProductDescriptionEng').val() : '';
        $('#ProductProductShortDescriptionEng').val(copy);
    }
    function saveDraftClick()
    {
        $('#prst').val('DRAFT');
        $('#ProductEditForm').submit();
    }
	
    function saveCompleteClick() {
        $('#prst').val('SAVE');
        $('#ProductEditForm').submit();		
    }
    
    $('#btnSaveDraft, #btnNext').click(function () {
        if (this.id == 'btnSaveDraft') {
            $('#checkNext').val("Draft");
        }
        else if (this.id == 'btnNext') {
            $('#checkNext').val("Next");
        }
        saveDraftClick();
        }
    );
</script>