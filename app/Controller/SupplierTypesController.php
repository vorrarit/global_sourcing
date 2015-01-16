<?php

App::uses('AppController', 'Controller');

/**
 * SupplierTypes Controller
 *
 * @property SupplierType $SupplierType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SupplierTypesController extends AppController {

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
        $this->SupplierType->recursive = 0;
        $condition = array();
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            $settings = array('SupplierTypes' => array(
                    'conditions' => array(),
                    'order' => array('SupplierTypes.id' => 'asc')
            ));

            if (!empty($data['SupplierTypes']['text_search'])) {
                $settings['SupplierType']['conditions'][] = array('or' => array());
                $settings['SupplierType']['conditions']['or']['lower(SupplierType.supplier_type_name) like'] = '%' . strtolower($data['SupplierTypes']['text_search']) . '%';
            }
            if (!empty($data['SupplierTypes']['supplier_type_name'])) {
                $settings['SupplierType']['conditions']['lower(SupplierType.supplier_type_name) like'] = '%' . strtolower($data['SupplierTypes']['supplier_type_name']) . '%';
            }
            $this->Paginator->settings = $settings;
            $this->set('supplierTypes', $this->Paginator->paginate());
        } else {
            $this->set('supplierTypes', $this->Paginator->paginate());
        }
        //$this->set('supplierTypes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->SupplierType->exists($id)) {
            throw new NotFoundException(__('Invalid supplier type'));
        }
        $options = array('conditions' => array('SupplierType.' . $this->SupplierType->primaryKey => $id));
        $this->set('supplierType', $this->SupplierType->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $sptId = $this->SupplierType->find('first', array('order' => array('SupplierType.id' => 'DESC'), 'fields' => array('id')));
        $int = (int) $sptId['SupplierType']['id'];
        $int+=1;
        $int = substr('00' . $int, -2, 2);
        $this->request->data['SupplierType']['id'] = $int;

        if ($this->request->is('post')) {
            $this->SupplierType->create();
            if ($this->SupplierType->save($this->request->data)) {
                $this->Session->setFlash(__('The supplier type has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The supplier type could not be saved. Please, try again.'));
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
        if (!$this->SupplierType->exists($id)) {
            throw new NotFoundException(__('Invalid supplier type'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->SupplierType->save($this->request->data)) {
                $this->Session->setFlash(__('The supplier type has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The supplier type could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('SupplierType.' . $this->SupplierType->primaryKey => $id));
            $this->request->data = $this->SupplierType->find('first', $options);
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
        $this->SupplierType->id = $id;
        if (!$this->SupplierType->exists()) {
            throw new NotFoundException(__('Invalid supplier type'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->SupplierType->delete()) {
            $this->Session->setFlash(__('The supplier type has been deleted.'));
        } else {
            $this->Session->setFlash(__('The supplier type could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $suptypeIds = array();
//            pr($this->request->data['Division']['id']); die();
            foreach ($this->request->data['SupplierType']['id'] as $id) {
                $suptypeIds[] = $id;
            }
            $this->SupplierType->deleteAll(array('id' => $suptypeIds), false);
            $this->Session->setFlash(__('The product has been deleted.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

}
