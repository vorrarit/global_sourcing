<?php

App::uses('AppController', 'Controller');

/**
 * Units Controller
 *
 * @property Unit $Unit
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UnitsController extends AppController {

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
        $this->Unit->recursive = 0;
        $condition = array();
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            $settings = array('Units' => array(
                    'conditions' => array(),
                    'order' => array('Units.id' => 'asc')
            ));

            if (!empty($data['Units']['text_search'])) {
                $settings['Unit']['conditions'][] = array('or' => array());
                $settings['Unit']['conditions']['or']['lower(Unit.unit_name) like'] = '%' . strtolower($data['Units']['text_search']) . '%';
            }
            if (!empty($data['Units']['supplier_type_name'])) {
                $settings['Unit']['conditions']['lower(Unit.unit_name) like'] = '%' . strtolower($data['Units']['unit_name']) . '%';
            }
            $this->Paginator->settings = $settings;
            $this->set('units', $this->Paginator->paginate());
        } else {
            $this->set('units', $this->Paginator->paginate());
        }
        //$this->set('units', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Unit->exists($id)) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
        $this->set('unit', $this->Unit->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $unitId = $this->Unit->find('first', array('order' => array('Unit.id' => 'DESC'), 'fields' => array('id')));
        $int = (int) $unitId['Unit']['id'];
        $int+=1;
        $int = substr('00' . $int, -2, 2);
        $this->request->data['Unit']['id'] = $int;

        if ($this->request->is('post')) {
            $currentUser = $this->Session->read('Auth.User');
            $this->Unit->create();
            $this->request->data['Unit']['created_by'] = $currentUser['username'];
            $this->request->data['Unit']['modified_by'] = $currentUser['username'];
            if ($this->Unit->save($this->request->data)) {
                $this->Session->setFlash(__('The unit has been saved.','default',array('class'=>'alert alert-success')));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The unit could not be saved. Please, try again.','default',array('class'=>'alert alert-danger')));
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
        if (!$this->Unit->exists($id)) {
            throw new NotFoundException(__('Invalid unit'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $currentUser = $this->Session->read('Auth.User');
            $this->request->data['Unit']['modified_by'] = $currentUser['username'];
            if ($this->Unit->save($this->request->data)) {
                $this->Session->setFlash(__('The unit has been saved.','default',array('class'=>'alert alert-success')));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The unit could not be saved. Please, try again.','default',array('class'=>'alert alert-danger')));
            }
        } else {
            $options = array('conditions' => array('Unit.' . $this->Unit->primaryKey => $id));
            $this->request->data = $this->Unit->find('first', $options);
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
        $this->Unit->id = $id;
        if (!$this->Unit->exists()) {
            throw new NotFoundException(__('Invalid unit'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Unit->delete()) {
            $this->Session->setFlash(__('The unit has been deleted.','default',array('class'=>'alert alert-success')));
        } else {
            $this->Session->setFlash(__('The unit could not be deleted. Please, try again.','default',array('class'=>'alert alert-danger')));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $unitIds = array();
            foreach ($this->request->data['Unit']['id'] as $id) {
                $unitIds[] = $id;
            }
            $this->Unit->deleteAll(array('id' => $unitIds), false);
            $this->Session->setFlash(__('The product has been deleted.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

}
