<div class="row">
	<h1 class="page-header"><?php echo __('Add Product'); ?></h1>
</div>

<div class="products form">

	<ul class="nav nav-tabs">
		<li role="presentation" class="active"><a href="#">Product Info.</a></li>
		<li role="presentation" class="disabled"><a href="#">Suppliers</a></li>
		<li role="presentation" class="disabled"><a href="#">Attachments</a></li>
	</ul>
	
	<p></p>
	
<?php echo $this->Form->create('Product',array('type'=>'post')); ?>
    <fieldset>
	<?php
		echo $this->Form->input('id',array(
			'type'=>'text',
			'readonly'=> true,
			'label'=>'Product ID',
			'div'=> array('class'=>'col-lg-2 form-group')));
		echo $this->Form->input('product_name', array('div'=>array('class'=>'col-lg-10 form-group')));
		
		echo $this->Form->input('division_id',array(
                    'empty'=>'Please Select',
                    'onchange' => 'division_Changed()', 
					'div'=>array('class'=>'col-lg-6 form-group')
                ));
		echo $this->Form->input('department_id', array(
                    'empty'=>'Please Select',
                    'onchange'=>'deparment_Changed()',
					'div'=>array('class'=>'col-lg-6 form-group')
			));
		
		
        echo $this->Form->input('klass_id', array(
                    'empty'=>'Please Select',
                    'onchange'=>'klass_Changed()',
                    'label'=> 'Class Name', 'div'=>array('class'=>'col-lg-6 form-group')));
		echo $this->Form->input('sub_klass_id',array(
                    'empty'=>'Please Select',
                    'label'=> 'Sub Class Name', 'div'=>array('class'=>'col-lg-6 form-group')
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
		echo $this->Form->input('currency_id', array('div'=>array('class'=>'col-lg-6 form-group')));
		echo $this->Form->input('unit_id', array('div'=>array('class'=>'col-lg-6 form-group')));
		echo $this->Form->input('manufacturer_id', array('div'=>array('class'=>'col-lg-6 form-group')));
		echo $this->Form->input('created_by',array('type'=>'hidden'));
		echo $this->Form->input('modified_by',array('type'=>'hidden'));
		echo $this->Form->input('product_status',array('type'=>'hidden','id'=>'prst'));
		
		echo '<div class="col-lg-12">';
        echo $this->Form->button(__('Save Draft'),array('onclick'=>'saveDraftClick()','class'=>'btn btn-default btn-form')) . '&nbsp;';
        echo $this->Form->button(__('Next'), array('type'=>'button','class'=>'btn btn-primary btn-form disabled')) . '&nbsp;';
        echo $this->Form->button(__('Cancel'), array('onclick'=>"window.location.href='../Products/index'",'type'=>'button','class'=>'btn btn-default btn-form')) . '&nbsp;';
		echo '</div>';

                ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">

    function division_Changed() { 
        var dvID = document.getElementById('ProductDivisionId').value;
        
        $.post('../Products/loadDepartments/'+dvID+'.json',function(data){
            var ddlDepartments = document.forms[0].elements['data[Product][department_id]'];
            var ddlKlasses = document.forms[0].elements['data[Product][klass_id]'];
            var ddlSubKlasses = document.forms[0].elements['data[Product][sub_klass_id]'];
            
            ddlDepartments.selectedIndex = 0;
            ddlDepartments.options.length = 1;
            ddlKlasses.options.length = 1;
            ddlSubKlasses.options.length =1;
            
            ddlDepartments.options.length = data.result.Departments.length + 1;
            for (i=0; i<data.result.Departments.length; i++) {
                ddlDepartments.options[i+1].text = data.result.Departments[i].Department.department_name;
                ddlDepartments.options[i+1].value = data.result.Departments[i].Department.id;
            }
        });
    }
    
    function deparment_Changed() {
        var deptID = document.getElementById('ProductDepartmentId').value;
        
        $.post('../Products/loadKlasses/'+deptID+'.json',function(data){
            var ddlKlasses = document.forms[0].elements['data[Product][klass_id]'];
            ddlKlasses.options.length = data.result.Klasses.length + 1;
            
            for (i=0; i<data.result.Klasses.length; i++) {
                ddlKlasses.options[i+1].text = data.result.Klasses[i].Klass.klass_name;
                ddlKlasses.options[i+1].value = data.result.Klasses[i].Klass.id;
            }
        });
    }
    function klass_Changed(){
        var klsID = document.getElementById('ProductKlassId').value;
        
        $.post('../Products/loadSubKlass/'+klsID+'.json',function(data){
            var ddlSubKlasses = document.forms[0].elements['data[Product][sub_klass_id]'];
            ddlSubKlasses.options.length = data.result.SubKlasses.length + 1;
            for (i=0; i<data.result.SubKlasses.length; i++) {
                ddlSubKlasses.options[i+1].text = data.result.SubKlasses[i].SubKlass.sub_klass_name;
                ddlSubKlasses.options[i+1].value = data.result.SubKlasses[i].SubKlass.id;
            }
        });
    }
    
  
    $('#ProductDivisionId').change(function(){ 
        var getID = $('#ProductDivisionId').val();
        $('#ProductId').val(getID);
    });
    
    $('#ProductDepartmentId').change(function(){ 
        var getID = $('#ProductDepartmentId').val();
        $('#ProductId').val(getID);
    });
    
    $('#ProductKlassId').change(function(){ 
        var getID = $('#ProductKlassId').val();
        $('#ProductId').val(getID);
    });
    
    $('#ProductSubKlassId').change(function(){
        var subKlassID = $('#ProductSubKlassId').val();
        
        if(!$("select[name='data[Product][sub_klass_id]'] option:selected").index()== 0){
            $.post('../Products/setNewID/'+subKlassID,function(data){
            $('#ProductId').val(data);
            });
        }
        else{
            var getID = $('#ProductKlassId').val();
            $('#ProductId').val(getID);
        }
    });
    
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
        $('.ProductAddForm').submit();
    }
    
</script>