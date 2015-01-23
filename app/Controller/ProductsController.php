<?php

App::uses('AppController', 'Controller');

/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProductsController extends AppController {

    /**
     * Components
     *
     * @var array
     * 
     */
    public $uses = array('Product', 'Department', 'Division', 'Klass', 'SubKlass', 'Currency', 'Unit', 'Manufacturer', 'Supplier', 'SupplierProduct', 'SupplierType');
    public $components = array('RequestHandler', 'Paginator', 'Session');

    public function index() {
        $divisions = $this->Product->Division->find('list', array('fields' => array('id', 'division_name')));
        $departments = $this->Product->Department->find('list', array('fields' => array('id', 'department_name')));
        $klasses = $this->Product->Klass->find('list', array('fields' => array('id', 'klass_name')));
        $subKlasses = $this->Product->SubKlass->find('list', array('fields' => array('id', 'sub_klass_name')));
        $supplierTypes = $this->SupplierType->find('list', array('fields' => array('id', 'supplier_type_name')));
        $this->set(compact('divisions', 'departments', 'klasses', 'subKlasses', 'supplierTypes'));
        $this->Product->find('all');
        $this->Product->recursive = 1;

        if (!empty($this->request->data)) {
            $data = $this->request->data;

            $settings = array('Product' => array(
                    'conditions' => array(),
                    'order' => array('Product.id' => 'asc')
            ));
            if (!empty($data['Product']['text_search'])) {
                $settings['Product']['conditions'][] = array('or' => array());
                $settings['Product']['conditions']['or']['lower(Product.product_barcode_no) like'] = '%' . strtolower($data['Product']['text_search']) . '%';
                $settings['Product']['conditions']['or']['lower(Product.product_description_eng) like'] = '%' . strtolower($data['Product']['text_search']) . '%';
                $settings['Product']['conditions']['or']['lower(Product.product_sku_no) like'] = '%' . strtolower($data['Product']['text_search']) . '%';
                $settings['Product']['conditions']['or']['lower(Product.product_specification) like'] = '%' . strtolower($data['Product']['text_search']) . '%';
                $settings['Product']['conditions']['or']['lower(Manufacturer.manufac_name_eng) like'] = '%' . strtolower($data['Product']['text_search']) . '%';
            }
            if (!empty($data['Product']['division_id'])) {
                $settings['Product']['conditions']['Division.id'] = $data['Product']['division_id'];
            }
            if (!empty($data['Product']['department_id'])) {
                $settings['Product']['conditions']['Department.id'] = $data['Product']['department_id'];
            }
            if (!empty($data['Product']['klass_id'])) {
                $settings['Product']['conditions']['Klass.id'] = $data['Product']['klass_id'];
            }
            if (!empty($data['Product']['sub_klass_id'])) {
                $settings['Product']['conditions']['SubKlass.id'] = $data['Product']['sub_klass_id'];
            }
            if (!empty($data['Product']['product_barcode_no'])) {
                $settings['Product']['conditions']['lower(Product.product_barcode_no) like'] = '%' . strtolower($data['Product']['product_barcode_no']) . '%';
            }
            if (!empty($data['Product']['product_description_eng'])) {
                $settings['Product']['conditions']['lower(Product.product_description_eng) like'] = '%' . strtolower($data['Product']['product_description_eng']) . '%';
            }
            if (!empty($data['Product']['product_sku_no'])) {
                $settings['Product']['conditions']['lower(Supplier.product_sku_no) like'] = '%' . strtolower($data['Product']['product_sku_no']) . '%';
            }
            if (!empty($data['Product']['product_specification'])) {
                $settings['Product']['conditions']['lower(Product.product_specification) like'] = '%' . strtolower($data['Product']['product_specification']) . '%';
            }
            if (!empty($data['Product']['manufac_name_eng'])) {
                $settings['Product']['conditions']['lower(Manufacturer.manufac_name_eng) like'] = '%' . strtolower($data['Product']['manufac_name_eng']) . '%';
            }
            if (!empty($data['Product']['supplier_name_eng'])) {
                $settings['SupplierProduct']['conditions']['lower(SupplierProduct.supplier_name_eng) like'] = '%' . strtolower($data['Product']['supplier_name_eng']) . '%';
            }
            if (!empty($data['Product']['supplier_type_id'])) {
                $settings['SupplierProduct']['conditions']['SupplierProduct.supplier_type_id'] = $data['Product']['supplier_type_id'];
            }

            if (!empty($data['Product']['min_price']) && !empty($data['Product']['max_price'])) {
                $settings['Product']['conditions'][] = array('and' => array());
                $settings['Product']['conditions']['and']['Product.retail_price >='] = $data['Product']['min_price'];
                $settings['Product']['conditions']['and']['Product.retail_price <='] = $data['Product']['max_price'];
            } elseif (!empty($data['Product']['min_price'])) {
                $settings['Product']['conditions']['Product.retail_price >='] = $data['Product']['min_price'];
            } elseif (!empty($data['Product']['max_price'])) {
                $settings['Product']['conditions']['Product.retail_price <='] = $data['Product']['max_price'];
            }


            $this->Paginator->settings = $settings;
            $this->set('products', $this->Paginator->paginate());
        } else {
            $this->set('products', $this->Paginator->paginate());
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function xedni() {
        $divisions = $this->Product->Division->find('list', array('fields' => array('id', 'division_name')));
        $departments = $this->Product->Department->find('list', array('fields' => array('id', 'department_name')));
        $klasses = $this->Product->Klass->find('list', array('fields' => array('id', 'klass_name')));
        $subKlasses = $this->Product->SubKlass->find('list', array('fields' => array('id', 'sub_klass_name')));
        $supplierTypes = $this->SupplierType->find('list', array('fields' => array('id', 'supplier_type_name')));
        $this->set(compact('divisions', 'departments', 'klasses', 'subKlasses', 'supplierTypes'));
        
        $condition = array();
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            $settings = array('Product' => array(
                    'conditions' => array(),
                    'order' => array('Product.id' => 'asc')));
            
            if (!empty($data['Product']['text_search'])&& empty($data['Product']['division_id']) && empty($data['Product']['department_id']) &&
                 empty($data['Product']['klass_id'])&& empty($data['Product']['sub_klass_id']) && empty($data['Product']['department_id']) &&
                 empty($data['Product']['product_description_eng'])&& empty($data['Product']['product_sku_no']) && empty($data['Product']['product_specification']) &&
                 empty($data['Product']['manufac_name_eng'])&& empty($data['Product']['supplier_name_eng']) && empty($data['Product']['supplier_type_id']) &&
                 empty($data['Product']['min_price'])&& empty($data['Product']['max_price']) && empty($data['Product']['department_id']) )
                {
                $settings['Product']['conditions'][] = array('or' => array());
                $settings['Product']['conditions']['or']['lower(Product.product_name) like'] = '%' . strtolower($data['Product']['text_search']) . '%';
                $settings['Product']['conditions']['or']['lower(Product.product_description_eng) like'] = '%' . strtolower($data['Product']['text_search']) . '%';
                $settings['Product']['conditions']['or']['lower(Product.product_short_description_th) like'] = '%' . strtolower($data['Product']['text_search']) . '%';
                $settings['Product']['conditions']['or']['lower(Product.product_short_description_eng) like'] = '%' . strtolower($data['Product']['text_search']) . '%';
                $settings['Product']['conditions']['or']['lower(Product.product_specification) like'] = '%' . strtolower($data['Product']['text_search']) . '%';
                }

            if (!empty($data['Product']['product_name'])) {
                $settings['Product']['conditions']['lower(Product.product_name) like'] = '%' . strtolower($data['Product']['product_name']) . '%';
            }
            if (!empty($data['Product']['product_description_eng'])) {
                $settings['Product']['conditions']['lower(Product.product_description_eng) like'] = '%' . strtolower($data['Product']['product_description_eng']) . '%';
            }
            if (!empty($data['Product']['product_short_description_th'])) {
                $settings['Product']['conditions']['lower(Product.product_short_description_th) like'] = '%' . strtolower($data['Product']['product_short_description_th']) . '%';
            }
            if (!empty($data['Product']['product_short_description_eng'])) {
                $settings['Product']['conditions']['lower(Product.product_short_description_eng) like'] = '%' . strtolower($data['Product']['product_short_description_eng']) . '%';
            }
            if (!empty($data['Product']['product_specification'])) {
                $settings['Product']['conditions']['lower(Product.product_specification) like'] = '%' . strtolower($data['Product']['product_specification']) . '%';
            }
            $this->Paginator->settings = $settings;
            $this->set('products', $this->Paginator->paginate('Product'));
        } else {
            $this->set('products', $this->Paginator->paginate('Product'));
            $sppProduc = $this->SupplierProduct->find('list', array('fields' => array('product_id', 'supplier_id')));
            $this->set('SppProduct', $sppProduc);
            $spp = $this->Supplier->find('list', array('fields' => array('supplier_name_eng')));
            $this->set('Spp', $spp);
        }
    }

    public function view($id = null) {


        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $product = $this->Product->find('first', $options);
        $this->set('product', $product);
        $this->set('count_img', count($product['Photo']));
        $this->set('count_video', count($product['Video']));
        $this->set('count_docs', count($product['FileDocument']));
        $option = array('conditions' => array('SupplierProduct.product_id' => $id));
        $this->set('supplierProduct', $this->SupplierProduct->find('first', $option));


//        pr($this->SupplierProduct->find('first', $option));
//        pr($product);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function weiv($id = null) {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $this->set('product', $this->Product->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            
                
            if (empty($this->request->data['Product']['product_sku_no'])) {
                if (!empty($this->request->data['Product']['product_barcode_no'])) {
                    $this->request->data['Product']['product_sku_no'] = $this->request->data['Product']['product_barcode_no'];
                }
                if (empty($this->request->data['Product']['product_sku_no'])) {
                    $this->request->data['Product']['product_sku_no'] = $this->request->data['Product']['id'];
                }
            }
            
            $this->Product->create();
            if ($this->Product->save($this->request->data)) {
                
                $this->Session->setFlash(__('Save Draft Finished.'),'default',array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'edit', $this->Product->id));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'),'default',array('class'=>'alert alert-danger'));
            }
        }

        $divisions = $this->Division->find('list', array(
            'fields' => array
                (
                'Division.id',
                'Division.division_name',
            )
        ));

        $currencies = $this->Currency->find('list', array(
            'fields' => array
                (
                'Currency.id',
                'Currency.currency_name',
            )
        ));

        $units = $this->Unit->find('list', array(
            'fields' => array(
                'Unit.id',
                'Unit.unit_name',
            )
        ));

        $manufacturers = $this->Manufacturer->find('list', array(
            'fields' => array(
                'Manufacturer.id',
                'Manufacturer.manufac_name_eng',
            )
        ));

        $this->set(compact('divisions', 'currencies', 'units', 'manufacturers'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    function setNewID($subKlassID) {
        $this->autoRender = false;

        $getOldID = $this->Product->find('first', array('conditions' => array(
                "Product.sub_klass_id" => $subKlassID), 'fields' => array('id'), 'order' => array('Product.id' => 'desc')
                )
        );
        $newID = empty($getOldID['Product']['id']) ? $subKlassID . '001' : (int) $getOldID['Product']['id'] + 1;
        $newID = substr('0000000000000' . $newID, -13, 13);

        return $newID;
    }

    public function edit($id = null) {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }

        if ($this->request->is(array('post', 'put'))) {
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved.'),'default',array('class'=>'alert alert-success'));
                
                if(($this->request->data['Product']['checkNext']) == "Draft"){
                    return $this->redirect(array('action' => 'xedni'));
                }
                else if(($this->request->data['Product']['checkNext']) == "Next"){
                    return $this->redirect(array('action' => '../SupplierProducts/add'));
                }
                
                
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'),'default',array('class'=>'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
            $this->request->data = $this->Product->find('first', $options);
        }


        $divisions = $this->Product->Division->find('list', array(
            'fields' => array
                ('Division.id', 'Division.division_name',)));

        $departments = $this->Product->Department->find('list', array(
            'fields' => array
                ('Department.id', 'Department.department_name',)));

        $currencies = $this->Product->Currency->find('list', array(
            'fields' => array
                ('Currency.id', 'Currency.currency_name',)));

        $units = $this->Product->Unit->find('list', array(
            'fields' => array
                ('Unit.id', 'Unit.unit_name',)));

        $manufacturers = $this->Product->Manufacturer->find('list', array(
            'fields' => array
                ('Manufacturer.id', 'Manufacturer.manufac_name_eng',)));

        $klasses = $this->Product->Klass->find('list', array(
            'fields' => array
                ('Klass.id', 'Klass.klass_name',)));

        $subKlasses = $this->Product->SubKlass->find('list', array(
            'fields' => array
                ('SubKlass.id', 'SubKlass.sub_klass_name',)));

        $this->set(compact('divisions', 'departments', 'currencies', 'units', 'manufacturers', 'klasses', 'subKlasses'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function eteled($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->Product->delete($id);
        $this->SupplierProduct->deleteAll(array('SupplierProduct.product_id'=>$id), false);
        $this->Video->deleteAll(array('Video.product_id'=>$id), false);
        $this->Photo->deleteAll(array('Photo.product_id'=>$id), false);
        $this->FileDocument->deleteAll(array('FileDocument.product_id'=>$id), false);
        
        $this->Session->setFlash(__('The product has been deleted.'), 'default', array('class' => 'alert alert-success'));

        return $this->redirect(array('action' => 'xedni'));
    }

     public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $productIds = array();

            foreach ($this->request->data['Product']['id'] as $id) {
                $productIds[] = $id;
            }
            if($this->Product->deleteAll(array('id' => $productIds), false)){
                
               $this->Product->deleteAll(array('id' => $productIds), false);
               $this->Session->setFlash(__('The product(s) has been deleted.'), 'default',array('class'=>'alert alert-success'));
            }
            else{
                return $this->Session->setFlash(__('The product(s) can not be deleted'),'default',array('class'=>'alert alert-danger'));
            }
            return $this->redirect(array('action' => 'xedni'));
        }
    }

    public function mswordExport($id = null) {
         if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $product = $this->Product->find('first', $options);
        $this->set('product', $product);
        $this->set('count_img', count($product['Photo']));
        $this->set('count_video', count($product['Video']));
        $this->set('count_docs', count($product['FileDocument']));
        $option = array('conditions' => array('SupplierProduct.product_id' => $id));
        $this->set('supplierProduct', $this->SupplierProduct->find('first', $option));
        $this->layout = 'msword';
    }

    public function multiExport() {
            $productIds = array();
            $this->Paginator->settings = $productIds;
            $this->set('products', $this->Paginator->paginate());
            $this->layout = 'csv';
    }
	
    function loadDepartments($dvID) {
        $departments = $this->Department->find('all', array('conditions' => array('division_id' => $dvID), 'fields' => array('id', 'department_name')));

        $result['Departments'] = $departments;
        $this->set('result', $result);
        $this->set('_serialize', array('result'));
    }

    function loadKlasses($deptID) {
        $klasses = $this->Klass->find('all', array('conditions' => array('department_id' => $deptID), 'fields' => array('id', 'klass_name')));

        $result['Klasses'] = $klasses;
        $this->set('result', $result);
        $this->set('_serialize', array('result'));
    }

    function loadSubKlass($klsID) {
        $subklass = $this->SubKlass->find('all', array('conditions' => array('klass_id' => $klsID), 'fields' => array('id', 'sub_klass_name')));

        $result['SubKlasses'] = $subklass;
        $this->set('result', $result);
        $this->set('_serialize', array('result'));
    }

}
