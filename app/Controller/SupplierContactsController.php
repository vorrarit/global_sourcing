<?php

App::uses('AppController', 'Controller');

/**
 * SupplierContacts Controller
 *
 * @property SupplierContact $SupplierContact
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SupplierContactsController extends AppController {

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
        $this->SupplierContact->recursive = 0;
        $this->set('supplierContacts', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->SupplierContact->exists($id)) {
            throw new NotFoundException(__('Invalid supplier contact'));
        }
        $options = array('conditions' => array('SupplierContact.' . $this->SupplierContact->primaryKey => $id));
        $this->set('supplierContact', $this->SupplierContact->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {

            if (empty($this->request->data['SupplierContact']['id'])) {
                $this->SupplierContact->create();


                $supplierContact = $this->SupplierContact->find('first', array('order' => array('SupplierContact.id' => 'desc')));
//                pr($supplierContact); die();
                if (empty($supplierContact)) {
                    $supplierContactId = '0001';
                } else {
                    $supplierContactId = ($supplierContact['SupplierContact']['id'] * 1) + 1;
                    $supplierContactId = substr('0000' . $supplierContactId, -4, 4);
                }

                $this->request->data['SupplierContact']['id'] = $supplierContactId;
                
                if ($this->SupplierContact->save($this->request->data)) {
                    $this->Session->setFlash(__('The supplier contact has been saved.'));
                    
                    return $this->redirect(array('controller' => 'Suppliers', 'action' => 'edit', $this->request->data['SupplierContact']['supplier_id']));
                } else {
                    $this->Session->setFlash(__('The supplier contact could not be saved. Please, try again.'));
                }
            } else {

                if ($this->SupplierContact->save($this->request->data)) {
                    $this->Session->setFlash(__('The supplier contact has been saved.'));
                    return $this->redirect(array('controller' => 'Suppliers', 'action' => 'edit', $this->request->data['SupplierContact']['supplier_id']));
                } else {
                    $this->Session->setFlash(__('The supplier contact could not be saved. Please, try again.'));
                }
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
    public function edit($id = null) {
        if (!$this->SupplierContact->exists($id)) {
            throw new NotFoundException(__('Invalid supplier contact'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->SupplierContact->save($this->request->data)) {
                $this->Session->setFlash(__('The supplier contact has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The supplier contact could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('SupplierContact.' . $this->SupplierContact->primaryKey => $id));
            $this->request->data = $this->SupplierContact->find('first', $options);
        }
        $suppliers = $this->SupplierContact->Supplier->find('list');
        $this->set(compact('suppliers'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->SupplierContact->id = $id;
        if (!$this->SupplierContact->exists()) {
            throw new NotFoundException(__('Invalid supplier contact'));
        }

        $supplierContact = $this->SupplierContact->find('first', array('conditions' => array('SupplierContact.id' => $id)));

        $this->request->allowMethod('post', 'delete');
        if ($this->SupplierContact->delete()) {
            $this->Session->setFlash(__('The supplier contact has been deleted.'));
            return $this->redirect(array('controller' => 'Suppliers', 'action' => 'edit', $supplierContact['SupplierContact']['supplier_id']));
        } else {
            $this->Session->setFlash(__('The supplier contact could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
