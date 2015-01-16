     
<?php echo $this->Form->postbutton('Export', array('action' => 'mswordExport', $product['Product']['id'])); ?>

<div class="photos">
    <?php  if(!empty($product['Photo'])){
        
        echo  '<a href= "'.$product['Photo'][0]['photo_path'].$product['Photo'][0]['photo_name'].'"><img width="400" heigth="533" src=' . $product['Photo'][0]['photo_path'].
              $product['Photo'][0]['photo_name'] . '></a>';
        echo  '<br>' ; 

        if($count_img>=1)
        {
            echo '<tbody> <tr>' ;
            for($i = 0 ; $i < $count_img-1 ; $i++)
            {
                if($i%3==0)
                    {echo '<br>' ;}
                if(!empty($product['Photo'][$i+1]['photo_path'])&&
                   !empty($product['Photo'][$i+1]['photo_name'])){
                    echo '<td width=\"33%\">' ;
                    echo '<a href= "'.$product['Photo'][$i+1]['photo_path'].$product['Photo'][$i+1]['photo_name'].'"><img width="133" heigth="177" src=' . $product['Photo'][$i+1]['photo_path'].
                    $product['Photo'][$i+1]['photo_name'] . '></a></td>';
                }
            }
            echo '</tr> </tbody>' ;
        }
    } ?>   
</div>
<p></p>

<div class="videos">
    <?php 
        if(!empty($product['Video'])){
        
            echo '<video width="400" height="300" controls> 
                  <source src="'. $product['Video'][0]['video_path'].
                    $product['Video'][0]['video_name'] .'" type="'.
                    $product['Video'][0]['video_file_type'].'">' ;
            echo 'Your browser does not support the video tag.' ;
            echo '</video>' ;
            
            if($count_video>=1)
            {
                echo '<tbody> <tr>' ;
                for($i = 0 ; $i < $count_video-1 ; $i++)
                {
                    if($i%3==0){echo '<br>' ;}
                    if(!empty($product['Video'][$i+1]['video_path'])&&
                       !empty($product['Video'][$i+1]['video_name'])&&
                       !empty($product['Video'][$i+1]['video_file_type']))
                    {
                            echo '<video width="133" height="105" controls> 
                                <source src="'. $product['Video'][$i+1]['video_path'].
                                $product['Video'][$i+1]['video_name'] .'" type="'.
                                $product['Video'][$i+1]['video_file_type'].'">' ;
                            echo 'Your browser does not support the video tag.' ;
                            echo '</video>' ;
                    }
                echo '</tr> </tbody>' ;
                }
            }
        }
    ?>
</div>

<div class="docs">
    <?php 
        if(!empty($product['FileDocument']))
        {  
            for($i = 0 ; $i <  $count_docs ; $i++){
                echo '<a href= "'.$product['FileDocument'][$i]['file_doc_path'].
                    $product['FileDocument'][$i]['file_doc_name'].'">'.
                    $product['FileDocument'][$i]['file_doc_name']. '</a><br>';
            }
        }
    ?>
     
</div>


<div class="products view">
    <h2><?php echo __('Product'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
			<?php echo h($product['Product']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Product Name'); ?></dt>
        <dd>
			<?php echo h($product['Product']['product_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Division'); ?></dt>
        <dd>
			<?php echo $this->Html->link($product['Division']['division_name'], array('controller' => 'divisions', 'action' => 'view', $product['Division']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Department'); ?></dt>
        <dd>
			<?php echo $this->Html->link($product['Department']['department_name'], array('controller' => 'departments', 'action' => 'view', $product['Department']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Class'); ?></dt>
        <dd>
			<?php echo $this->Html->link($product['Klass']['klass_name'], array('controller' => 'klasses', 'action' => 'view', $product['Klass']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Sub Class'); ?></dt>
        <dd>
			<?php echo $this->Html->link($product['SubKlass']['sub_klass_name'], array('controller' => 'sub_klasses', 'action' => 'view', $product['SubKlass']['id'])); ?>
            &nbsp;
        </dd>

        <dt><?php echo __('Sku No'); ?></dt>
        <dd>
			<?php echo h($product['Product']['product_sku_no']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('UPC No'); ?></dt>
        <dd>
			<?php echo h($product['Product']['product_barcode_no']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Product Description TH'); ?></dt>
        <dd>
			<?php echo h($product['Product']['product_description_th']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Product Description ENG'); ?></dt>
        <dd>
			<?php echo h($product['Product']['product_description_eng']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Short Description TH'); ?></dt>
        <dd>
			<?php echo h($product['Product']['product_short_description_th']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Short Description ENG'); ?></dt>
        <dd>
			<?php echo h($product['Product']['product_short_description_eng']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Product Specification'); ?></dt>
        <dd>
			<?php echo h($product['Product']['product_specification']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Retail Price'); ?></dt>
        <dd>
			<?php echo h($product['Product']['retail_price'].'  '.
                              $product['Currency']['currency_name'].' / '.
                              $product['Unit']['unit_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Currency'); ?></dt>
        <dd>
			<?php echo $this->Html->link($product['Currency']['currency_name'], array('controller' => 'currencies', 'action' => 'view', $product['Currency']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Unit'); ?></dt>
        <dd>
			<?php echo $this->Html->link($product['Unit']['unit_name'], array('controller' => 'units', 'action' => 'view', $product['Unit']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Manufacturer'); ?></dt>
        <dd>
			<?php echo $this->Html->link($product['Manufacturer']['manufac_name_eng'], array('controller' => 'manufacturers', 'action' => 'view', $product['Manufacturer']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created By'); ?></dt>
        <dd>
			<?php echo h($product['Product']['created_by']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
			<?php echo h($product['Product']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified By'); ?></dt>
        <dd>
			<?php echo h($product['Product']['modified_by']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
			<?php echo h($product['Product']['modified']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Supplier'); ?></dt>
        <dd>
		<?php if(!empty($supplierProduct['Supplier']['supplier_name_th'])
                      || (!empty($supplierProduct['Supplier']['supplier_name_eng'])))
                {echo h($supplierProduct['Supplier']['supplier_name_th'].'/');
                echo h($supplierProduct['Supplier']['supplier_name_eng']);}
                ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Supplier Type'); ?></dt>
        <dd>
            <?php if(!empty($supplierProduct['SupplierType']['supplier_type_name']))
                {echo h($supplierProduct['SupplierType']['supplier_type_name']);}
                ?>
            &nbsp;
        </dd>
    </dl>
</div>






