

<p></p>
<table width="100%">
    <tr>
        <td width="50%" valign="top">

            <div class="photos">
				<h2>Photos</h2>
				<?php echo  '<a href= "'.Configure::read("ServerName").$product['Photo'][0]['photo_path'].'/'.$product['Photo'][0]['photo_name'].'"><img width="360" src='.Configure::read("ServerName") . $product['Photo'][0]['photo_path'].'/'.
							$product['Photo'][0]['photo_name'] . '></a><br>';
				?>
                <?php 
					for ($i=1; $i<count($product['Photo']); $i++) {
						echo  '<a href= "'.Configure::read("ServerName").$product['Photo'][$i]['photo_path'].'/'.$product['Photo'][$i]['photo_name'].'"><img width="120" src='.Configure::read("ServerName") . $product['Photo'][$i]['photo_path'].'/'.
							$product['Photo'][$i]['photo_name'] . '></a>';
						if($i%-3==0){
							echo  '<br>' ;
						}
					}
				?>
            </div>
            <p></p>
            <div class="videos">
            <h2>Videos</h2>
				<?php 
					for ($i=0; $i<count($product['Video']); $i++) {
						echo  '<a href= "'.Configure::read("ServerName").$product['Video'][$i]['video_path'].'/'.
							$product['Video'][$i]['video_name'].'">'. $product['Video'][$i]['video_name'].'</a><br>';
						
					}
				?>
            </div>
            <p></p>
            <div class="docs">
				<h2>Documents</h2>
                <?php	
					for ($i=0; $i<count($product['FileDocument']); $i++) {
						echo  '<a href= "'.Configure::read("ServerName").$product['FileDocument'][$i]['file_doc_path'].'/'.$product['FileDocument'][$i]['file_doc_name'].'">' . $product['FileDocument'][$i]['file_doc_name'] . '</a>';
						echo  '<br>' ; 
					}
				?>
            </div>
    
		</td>
		<td>
            <div class="products view">
                <h2><?php echo __('Product'); ?></h2>
                <dl>
                    <dt><?php echo __('Id'); ?>    </dt>
						<?php echo h(' : '.$product['Product']['id']); ?>
                    <dt><?php echo __('Product Name'); ?></dt>
                        <?php echo h(' : '.$product['Product']['product_name']); ?>
                    <dt><?php echo __('Division'); ?></dt>
                        <?php echo h(' : '.$product['Division']['division_name']); ?>
                    <dt><?php echo __('Department'); ?></dt>
                        <?php echo h(' : '.$product['Department']['department_name']); ?>
                    <dt><?php echo __('Class'); ?></dt>
						<?php echo h(' : '.$product['Klass']['klass_name']); ?>
                    <dt><?php echo __('Sub Class'); ?></dt>
						<?php echo h(' : '.$product['SubKlass']['sub_klass_name']); ?>
                    <dt><?php echo __('Sku No'); ?></dt>
						<?php echo h(' : '.$product['Product']['product_sku_no']); ?>
                    <dt><?php echo __('UPC No'); ?></dt>
						<?php echo h(' : '.$product['Product']['product_barcode_no']); ?>
                    <dt><?php echo __('Product Description TH'.' : '); ?></dt>
						<?php echo h($product['Product']['product_description_th']); ?>
                    <dt><?php echo __('Product Description ENG'.' : '); ?></dt>
						<?php echo h($product['Product']['product_description_eng']); ?>
                    <dt><?php echo __('Short Description TH'.' : '); ?></dt>
						<?php echo h($product['Product']['product_short_description_th']); ?>
					<dt><?php echo __('Short Description ENG'.' : '); ?></dt>
						<?php echo h($product['Product']['product_short_description_eng']); ?>
                    <dt><?php echo __('Product Specification'.' : '); ?></dt>
						<?php echo h($product['Product']['product_specification']); ?>
                    <dt><?php echo __('Retail Price'); ?></dt>
						<?php echo h($product['Product']['retail_price'].'  ');
						if(!empty( $product['Currency']['currency_name'] && $product['Unit']['unit_name'])){
							echo h($product['Currency']['currency_name'].' / '.$product['Unit']['unit_name']); 
						}
						else if(!empty( $product['Currency']['currency_name'])){
							echo h($product['Currency']['currency_name']) ;
						} ?>
                    <dt><?php echo __('Manufacturer'); ?></dt>
						<?php echo h(' : '.$product['Manufacturer']['manufac_name_eng']); ?>
					<dt><?php echo __('Supplier'); ?></dt>
						<?php if(!empty($supplierProduct['Supplier']['supplier_name_th']) && (!empty($supplierProduct['Supplier']['supplier_name_eng']))){
							  echo h(' : '.$supplierProduct['Supplier']['supplier_name_th'].' / '.$supplierProduct['Supplier']['supplier_name_eng']);
							  }
							  else if (!empty($supplierProduct['Supplier']['supplier_name_th'])){
								echo h(' : '.$supplierProduct['Supplier']['supplier_name_th']) ;
							  }
							  else if (!empty($supplierProduct['Supplier']['supplier_name_eng'])){
								echo h(' : '.$supplierProduct['Supplier']['supplier_name_eng']) ;
							  }
						?>
					<dt><?php echo __('Supplier Type'); ?></dt>
						<?php if(!empty($supplierProduct['SupplierType']['supplier_type_name'])){
							echo h(' : '.$supplierProduct['SupplierType']['supplier_type_name']);}
						?>
				</dl>
            </div>

        </td>
    </tr>
</table>











