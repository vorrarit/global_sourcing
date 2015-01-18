<div class="row">
	<h1 class="page-header"><?php echo __('Edit Product'); ?></h1>
</div>

<div class="attachments index row">

	<ul class="nav nav-tabs">
		<li role="presentation"><a href="/Products/edit/<?php echo $this->data['Product']['id']; ?>">Product Info.</a></li>
		<li role="presentation"><a href="/SupplierProducts/add/<?php echo $this->data['Product']['id']; ?>">Suppliers</a></li>
		<li role="presentation" class="active"><a href="/Attachments/index/<?php echo $this->data['Product']['id']; ?>">Attachments</a></li>
	</ul>
	
	<p></p>
	
    <?php echo $this->Form->create('Photo',array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->Form->input('Product.id', array('type'=>'hidden')); ?>
	<div class="row">
		<div class="col-lg-12">
            <div id="photos">
                <?php echo $this->Form->input('Photo : ',array('name'=>'data[Product][photo][]','type'=>'file'));?>
            </div>
		</div>
		<div class="col-lg-12">
			<button type="button" onclick="btnPhotos_click()" class="btn btn-default btn-sm">Add More</button>&nbsp;&nbsp;
			Remake : File type(JPG, PNG, GIF), Size(200px x 180px),File size less than 10 MB
		</div>
	</div>

	<p></p></br>
	<p></p>

	<div class="row">
		<div class="col-lg-12">
            <div id="file_doc">
                <?php echo $this->Form->input('FileDocument : ',array('name'=>'data[Product][file_doc][]','type'=>'file'));?>
            </div>
		</div>
		<div class="col-lg-12">
			<button type="button" onclick="btnFile_Doc_click()" class="btn btn-default btn-sm">Add More</button>&nbsp;&nbsp;
			Remake : File type(JPG, PDF), File size less than 10 MB
		</div>
	</div>
	
	<p></p></br>
	<p></p>
	
	<div class="row">
		<div class="col-lg-12">
            <div id="videos">
                <?php echo $this->Form->input('Video : ',array('name'=>'data[Product][video][]','type'=>'file'));?>
            </div>
		</div>
		<div class="col-lg-12">
			<button type="button" onclick="btnVideos_click()" class="btn btn-default btn-sm">Add More</button>&nbsp;&nbsp;
			Remake : File type(MP4, AVI, FLV),Size(200px X 180px), File size less than 50 MB
		</div>
	</div>
	
	<p></p></br>
	<p></p>

    <?php echo '<div class="row"><div class="col-lg-12">' . $this->Form->submit(__('Save'), array('class'=>'btn btn-primary btn-form')) . '</div></div>';?>
	<?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">
    function btnPhotos_click() {
        $('#photos').append('<?php echo $this->Form->input('Photo : ',array('name'=>'data[Product][photo][]','type'=>'file'));?>');

    }
    function btnVideos_click() {
        $('#videos').append('<?php echo $this->Form->input('Video : ',array('name'=>'data[Product][video][]','type'=>'file'));?>');
    }
   
    function btnFile_Doc_click(){
        $('#file_doc').append('<?php echo $this->Form->input('FileDocument : ',array('name'=>'data[Product][file_doc][]','type'=>'file'));?>');
    }
</script>