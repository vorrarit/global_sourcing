<?php

App::uses('AppController', 'Controller');

/**
 * Suppliers Controller
 *
 * @property Supplier $Supplier
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SuppliersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array('Supplier', 'SupplierContact');
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Supplier->recursive = 0;
        if ($this->request->is('post')) {

            $supplierName = $this->request->data['Supplier']['supplier_name_eng'];
        } else {
            $supplierName = '';
            $settings = array(
                'Supplier' => array(
                    'order' => array(
                        'id' => 'asc'
                    )
                )
            );
            $this->Paginator->settings = $settings;
            return $this->set('suppliers', $this->Paginator->paginate());
        }
        $settings = array(
            'Supplier' => array(
                'conditions' => array(
                    'supplier_name_eng like' => '%' . $supplierName . '%',
                )
            )
        );

        $this->Paginator->settings = $settings;
        $this->set('suppliers', $this->Paginator->paginate());
    }

    public function popup() {
		$this->layout = 'popup_layout';

		$this->Supplier->recursive = 0;
        if ($this->request->is('post')) {

            $supplierName = $this->request->data['Supplier']['supplier_name_eng'];
        } else {
            $supplierName = '';
            $settings = array(
                'Supplier' => array(
                    'order' => array(
                        'id' => 'asc'
                    )
                )
            );
            $this->Paginator->settings = $settings;
            return $this->set('suppliers', $this->Paginator->paginate());
        }
        $settings = array(
            'Supplier' => array(
                'conditions' => array(
                    'supplier_name_eng like' => '%' . $supplierName . '%',
                )
            )
        );

        $this->Paginator->settings = $settings;
        $this->set('suppliers', $this->Paginator->paginate());
    }

    public function isUploadedFile($field) {
        $map = array(
            'image/gif' => '.gif',
            'image/jpeg' => '.jpg',
            'image/png' => '.png'
        );
        if ((isset($field['error']) && $field['error'] == 0) ||
                (!empty($field['tmp_name']) && $field['tmp_name'] != 'none')
        ) {
            if (array_key_exists($field['type'], $map)) {
                return is_uploaded_file($field['tmp_name']);
            }
        }
        return false;
    }

    public function saveUploadFile($field, $path, $fileName) {
        if (isset($field['error']) && $field['error'] == 0) {
            move_uploaded_file($field['tmp_name'], WWW_ROOT . $path . '/' . $fileName);
            return $path . '/' . $fileName;
        }

        return '';
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Supplier->exists($id)) {
            throw new NotFoundException(__('Invalid supplier'));
        }
        $options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
        $this->set('supplier', $this->Supplier->find('first', $options));
        
        
        
        $supplierContacts = $this->SupplierContact->find('all', array('conditions' => array('SupplierContact.supplier_id' => $id)));
        $this->set('supplierContacts', $supplierContacts);

        if (!empty($supplierContactId)) {
            $supplierContact = $this->SupplierContact->findById($supplierContactId);
            $this->request->data['SupplierContact'] = $supplierContact['SupplierContact'];
        }
        
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $find_id = $this->Supplier->find('first', array('order' => array('Supplier.id' => 'desc')));

        $supplier_id = $find_id['Supplier']['id'];
        $supplier_id +=1;
        $supplier_id = substr('0000' . $supplier_id, -4, 4);

        $this->request->data['Supplier']['id'] = $supplier_id;




        $this->request->data['Supplier']['supplier_map_name'] = 'supplier_map_' . $supplier_id;
        $this->request->data['Supplier']['supplier_map_path'] = '/img/suppliers';

        if ($this->request->is('post')) {
            $this->request->data['Supplier']['supplier_map_flie_type'] = $this->request->data['Supplier']['map']['type'];
            if ($this->isUploadedFile()) {
                $ext = pathinfo($map['name'], PATHINFO_EXTENSION);
                $this->saveUploadFile($map, '/img/suppliers', 'supplier_map_' . $supplier_id . '.' . $ext);
            }

            $this->Supplier->create();

            if ($this->Supplier->save($this->request->data)) {
                $this->Session->setFlash(__('The supplier has been saved.'), 'default', array('class' => 'alert alert-danger'));
                return $this->redirect(array('action' => 'edit', $supplier_id));
            } else {
                $this->Session->setFlash(__('The supplier could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null, $supplierContactId = null) {
        if (!$this->Supplier->exists($id)) {
            throw new NotFoundException(__('Invalid supplier'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Supplier->save($this->request->data)) {
                $this->Session->setFlash(__('The supplier has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The supplier could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
            $this->request->data = $this->Supplier->find('first', $options);
        }


        $supplierContacts = $this->SupplierContact->find('all', array('conditions' => array('SupplierContact.supplier_id' => $id)));
        $this->set('supplierContacts', $supplierContacts);

        if (!empty($supplierContactId)) {
            $supplierContact = $this->SupplierContact->findById($supplierContactId);
            $this->request->data['SupplierContact'] = $supplierContact['SupplierContact'];
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Supplier->id = $id;
        if (!$this->Supplier->exists()) {
            throw new NotFoundException(__('Invalid supplier'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Supplier->delete()) {
            $this->Session->setFlash(__('The supplier has been deleted.'));
        } else {
            $this->Session->setFlash(__('The supplier could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $SupplierIds = array();
//            pr($this->request->data['Supplier']['id']); die();
            foreach ($this->request->data['Supplier']['id'] as $id) {
                $SupplierIds[] = $id;
            }
            $this->Supplier->deleteAll(array('id' => $SupplierIds), false);
            $this->Session->setFlash(__('The supplier has been deleted.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

}
