<?php

App::uses('AppController', 'Controller');

/**
 * Divisions Controller
 *
 * @property Division $Division
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DivisionsController extends AppController {

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
        $this->Division->recursive = 0;
        $condition = array();
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            $settings = array('Division' => array(
                    'conditions' => array(),
                    'order' => array('Division.id' => 'asc')
            ));
            //pr($settings); die();

            if (!empty($data['Division']['text_search'])) {
                $settings['Division']['conditions'][] = array('or' => array());
                $settings['Division']['conditions']['or']['lower(Division.division_name) like'] = '%' . strtolower($data['Division']['text_search']) . '%';
            }
            if (!empty($data['Division']['division_name'])) {
                $settings['Division']['conditions']['lower(Division.division_name) like'] = '%' . strtolower($data['Division']['division_name']) . '%';
            }
            $this->Paginator->settings = $settings;
            $this->set('divisions', $this->Paginator->paginate());
        } else {
            $this->set('divisions', $this->Paginator->paginate());
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Division->exists($id)) {
            throw new NotFoundException(__('Invalid division'));
        }
        $options = array('conditions' => array('Division.' . $this->Division->primaryKey => $id));
        $this->set('division', $this->Division->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        //$count = $this->Division->find('count');
        $divId = $this->Division->find('first', array('order' => array('Division.id' => 'DESC'), 'fields' => array('id')));
        $int = (int) $divId['Division']['id'];
        $int+=1;
        $int = substr('00' . $int, -2, 2);
        $this->request->data['Division']['id'] = $int;

        if (!empty($this->request->data['Division']['division_name'])) {
            if ($this->request->is('post')) {
                $currentUser = $this->Session->read('Auth.User');
                $this->Division->create();
                $this->request->data['Division']['created_by'] = $currentUser['username'];
                $this->request->data['Division']['modified_by'] = $currentUser['username'];

                if ($this->Division->save($this->request->data)) {
                    $this->Session->setFlash(__('The division has been saved.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The division could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
        if (!$this->Division->exists($id)) {
            throw new NotFoundException(__('Invalid division'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $currentUser = $this->Session->read('Auth.User');
            $this->request->data['Division']['modified_by'] = $currentUser['username'];
            if ($this->Division->save($this->request->data)) {
                $this->Session->setFlash(__('The division has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The division could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Division.' . $this->Division->primaryKey => $id));
            $this->request->data = $this->Division->find('first', $options);
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
        $this->Division->id = $id;
        if (!$this->Division->exists()) {
            throw new NotFoundException(__('Invalid division'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Division->delete()) {
            $this->Session->setFlash(__('The division has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The division could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $divisionIds = array();
//            pr($this->request->data['Division']['id']); die();
            foreach ($this->request->data['Division']['id'] as $id) {
                $divisionIds[] = $id;
            }
            $this->Division->deleteAll(array('id' => $divisionIds), false);
            $this->Session->setFlash(__('The division(s) has been deleted.'), 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        }
    }

}
