<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * SupplierProducts Controller
 *
 * @property SupplierProduct $SupplierProduct
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SupplierProductsController extends AppController {

    public $uses = array('SupplierProduct', 'Product','Supplier', 'SupplierType', 'Unit', 'Currency', 'SupplierContact');

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->SupplierProduct->recursive = 0;
        $this->set('supplierProducts', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->SupplierProduct->exists($id)) {
            throw new NotFoundException(__('Invalid supplier product'));
        }
        $options = array('conditions' => array('SupplierProduct.' . $this->SupplierProduct->primaryKey => $id));
        $this->set('supplierProduct', $this->SupplierProduct->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($productId = null, $supplierProductId = null) {

        if ($this->request->is('post')) {
			
            if(!empty($this->request->data['SupplierProduct']['supplier_id']) && 
					!empty($this->request->data['SupplierProduct']['supplier_type_id']) && 
					!empty($this->request->data['SupplierProduct']['supplier_product_purchase_price']) && 
					!empty($this->request->data['SupplierProduct']['unit_id']) && 
					!empty($this->request->data['SupplierProduct']['currency_id']) ) {

				if (empty($this->request->data['SupplierProduct']['id'])) {
					$this->SupplierProduct->create();
					
					$find = $this->SupplierProduct->find('first', array('fields' => array('SupplierProduct.id'), 'order' => array('SupplierProduct.id' => 'DESC')));
					$supPID = $find['SupplierProduct']['id'];
					if (empty($find)) {
						$supPID = '000001';
						$this->request->data['SupplierProduct']['id'] = $supPID;
					} else {
						$supPID = ((int) $supPID += 1);
						$supPID = substr('000000' . $supPID, -6, 6);
						$this->request->data['SupplierProduct']['id'] = $supPID;
					}

				}
            
                if ($this->SupplierProduct->save($this->request->data)) {
                    $this->Session->setFlash(__('The supplier product has been saved.'), 'default', array('class'=> 'alert alert-success'));
                    return $this->redirect(array('action' => 'add', $this->request->data['SupplierProduct']['product_id']));
                } else {
                    return $this->Session->setFlash(__('The supplier product could not be saved. Please, try again.'), 'default', array('class'=> 'alert alert-danger'));
                }
            }
			
        }
		
		if (empty($supplierProductId)) {
			$this->request->data['SupplierProduct']['product_id'] = $productId;
		} else {
			$supplierProduct = $this->SupplierProduct->find('first', array('conditions' => array('SupplierProduct.id' => $supplierProductId)));
			$this->request->data['SupplierProduct'] = $supplierProduct['SupplierProduct'];
			$this->request->data['SupplierProduct']['supplier_name'] = $supplierProduct['Supplier']['supplier_name_th'];
		}
		

		$this->SupplierProduct->recursive = 0;
        $this->set('supplierProducts', $this->SupplierProduct->find('all', array('conditions'=>array('product_id'=>$productId))));

		$products = $this->SupplierProduct->Product->find('list');
        $suppliers = $this->SupplierProduct->Supplier->find('list');
        $supplierTypes = $this->SupplierProduct->SupplierType->find('list', array('fields' => array('SupplierType.id', 'supplier_type_name')));
        $units = $this->SupplierProduct->Unit->find('list', array('fields' => array('Unit.id', 'unit_name')));
        $currencies = $this->SupplierProduct->Currency->find('list', array('fields' => array('Currency.id', 'currency_name')));
		
        $this->set(compact('products', 'suppliers', 'supplierTypes', 'units', 'currencies'));
    }
    

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function popup($product_id = null) {
        //$this->SupplierProduct->recursive = 3;
        $this->set('product_id',$product_id);
        $supplierProducts = $this->SupplierProduct->find('all', array('conditions' => array('SupplierProduct.product_id' => $product_id)));

        $supplierIds = array();
        foreach ($supplierProducts as $supplierProduct) {
            $supplierIds[] = $supplierProduct['SupplierProduct']['supplier_id'];
        }
        $suppliers = $this->Supplier->find('all', array('conditions' => array('id' => $supplierIds)));

        $this->set(compact('supplierProducts', 'suppliers'));
		
		$this->layout = 'popup_layout';

//      pr($supplierContacts);die();
        // $this->set('supplierProducts', $this->Paginator->paginate());
//        $suppliers = $this->SupplierProduct->Supplier->find('list', array('fields' => array('Supplier.id', 'supplier_name_eng')));
////        pr($suppliers);die();
//        $supplierContacts = $this->SupplierContact->find('all', array('fields' => array('SupplierContact.id', 'supplier_contact_email')));
////       pr($supplierContacts);die();
//        $this->set(compact('supplierContacts', 'suppliers'));
    }
    
    
    public function edit($id = null) {
        if (!$this->SupplierProduct->exists($id)) {
            throw new NotFoundException(__('Invalid supplier product'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->SupplierProduct->save($this->request->data)) {
                $this->Session->setFlash(__('The supplier product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The supplier product could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('SupplierProduct.' . $this->SupplierProduct->primaryKey => $id));
            $this->request->data = $this->SupplierProduct->find('first', $options);
        }
        $products = $this->SupplierProduct->Product->find('list');
        $suppliers = $this->SupplierProduct->Supplier->find('list');
        $supplierTypes = $this->SupplierProduct->SupplierType->find('list');
        $units = $this->SupplierProduct->Unit->find('list');
        $currencies = $this->SupplierProduct->Currency->find('list');
        $this->set(compact('products', 'suppliers', 'supplierTypes', 'units', 'currencies'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->SupplierProduct->id = $id;
        if (!$this->SupplierProduct->exists()) {
            throw new NotFoundException(__('Invalid supplier product'));
        }
		
		$supplierProduct = $this->SupplierProduct->find('first', array('conditions'=>array('SupplierProduct.id'=>$id)));
        $this->request->allowMethod('post', 'delete');
        if ($this->SupplierProduct->delete()) {
            $this->Session->setFlash(__('The supplier product has been deleted.', 'default', array('class'=> 'alert alert-success')));
        } else {
            $this->Session->setFlash(__('The supplier product could not be deleted. Please, try again.', 'default', array('class'=> 'alert alert-danger')));
        }
        return $this->redirect(array('action' => 'add', $supplierProduct['SupplierProduct']['product_id']));
    }

    public function sendMail() {
//pr($this->request->data);die();
		
		$this->layout = 'popup_layout';
		
        $productID = $this->request->data['SupplierProducts']['product_id'];
        $product = $this->Product->find('all',array('conditions'=>array('Product.id'=>$productID)));
        $supplierIds = array();
        foreach ($this->request->data['supplier_id'] as $supplierId){
            $supplierContacts = $this->SupplierContact->find('all',array('conditions'=>array('supplier_id'=>$supplierId)));
            
            $emails = array();
            foreach ($supplierContacts as $supplierContact){
                $emails[] = $supplierContact['SupplierContact']['supplier_contact_email']; 
            }
            $Email = new CakeEmail();
            $Email->from(array('me@example.com' => 'My Site'));
            $Email->to($emails);
            $Email->subject('Product has been registered.');
            $Email->send(
                        'Notification of Product Registration
                        Your product information has been registered on the system:
                        Product ID: ' . $productID .
                    '
                        Product Description TH:'.$product[0]['Product']['product_description_th'].
                    '
                        Product Description ENG:'.$product[0]['Product']['product_description_eng'].
                    '
                        Barcode No.: ' .$product[0]['Product']['product_barcode_no'].'
                        
                        Login to the Global Sourcing System to view full detail : {URL}
                        Please DO NOT reply to this system-generated email.');
        }
        $this->Session->setFlash(__('Email has benn send'),'default', array('class' => 'alert alert-success'));
       
       
    }
}
