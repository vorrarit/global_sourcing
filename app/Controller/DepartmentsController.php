<?php

App::uses('AppController', 'Controller');

/**
 * Departments Controller
 *
 * @property Department $Department
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DepartmentsController extends AppController {

    public $uses = array("Department", "Division");

    /**
     * Components
     *
     * @var array
     */
    public $components = array('RequestHandler', 'Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Department->recursive = 0;
        $divisions = $this->Division->find('list', array(
            'fields' => array
                (
                'Division.id',
                'Division.division_name',
            )
        ));
        $this->set(compact('divisions'));
//       //pr($divisions); die();
        $condition = array();
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            $settings = array('Department' => array(
                    'conditions' => array(),
                    'order' => array('Department.id' => 'asc')
            ));


            if (!empty($data['Department']['text_search'])) {
                $settings['Department']['conditions'][] = array('or' => array());
                $settings['Department']['conditions']['or']['lower(Department.division_id) like'] = '%' . strtolower($data['Department']['text_search']) . '%';
                $settings['Department']['conditions']['or']['lower(Department.department_name) like'] = '%' . strtolower($data['Department']['text_search']) . '%';
            }
            if (!empty($data['Department']['division_id'])) {
                $settings['Department']['conditions']['lower(Department.division_id) like'] = '%' . strtolower($data['Department']['division_id']) . '%';
            }
            if (!empty($data['Department']['department_name'])) {
                $settings['Department']['conditions']['lower(Department.department_name) like'] = '%' . strtolower($data['Department']['department_name']) . '%';
            }
            $this->Paginator->settings = $settings;
            $this->set('departments', $this->Paginator->paginate());
        } else {
            $this->set('departments', $this->Paginator->paginate());
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
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Invalid department'));
        }
        $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
        $this->set('department', $this->Department->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $currentUser = $this->Session->read('Auth.User');
            $this->Department->create();
            $this->request->data['Department']['created_by'] = $currentUser['username'];
            $this->request->data['Department']['modified_by'] = $currentUser['username'];
            if ($this->Department->save($this->request->data)) {
                $this->Session->setFlash(__('The department has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The department could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        //$divisions = $this->Department->Division->find('list');
        $divisions = $this->Division->find('list', array(
            'fields' => array
                (
                'Division.id',
                'Division.division_name',
            )
        ));
        $this->set(compact('divisions'));
    }

    function setNewID($dvID) {
        $this->autoRender = false;

        $getOldID = $this->Department->find('first', array('conditions' => array(
                "Department.division_id" => $dvID), 'fields' => array('id'), 'order' => array('Department.id' => 'desc')
                )
        );
        $newID = empty($getOldID['Department']['id']) ? $dvID . '01' : (int) $getOldID['Department']['id'] + 1;
        $newID = substr('0000' . $newID, -4, 4);

        return $newID;
    }

    function loadDepartments($dvID) {
        $departments = $this->Department->find('all', array('conditions' => array('division_id' => $dvID), 'fields' => array('id', 'department_name')));

        $result['Departments'] = $departments;
        $this->set('result', $result);
        $this->set('_serialize', array('result'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Invalid department'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $currentUser = $this->Session->read('Auth.User');
            $this->request->data['Department']['modified_by'] = $currentUser['username'];
            if ($this->Department->save($this->request->data)) {
                $this->Session->setFlash(__('The department has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The department could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
            $this->request->data = $this->Department->find('first', $options);
        }
        $divisions = $this->Division->find('list', array(
            'fields' => array
                (
                'Division.id',
                'Division.division_name',
            )
        ));
        $this->set(compact('divisions'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Department->id = $id;
        if (!$this->Department->exists()) {
            throw new NotFoundException(__('Invalid department'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Department->delete()) {
            $this->Session->setFlash(__('The department has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The department could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $departmentIds = array();
//            pr($this->request->data['Division']['id']); die();
            foreach ($this->request->data['Department']['id'] as $id) {
                $departmentIds[] = $id;
            }
            $this->Department->deleteAll(array('id' => $departmentIds), false);
            $this->Session->setFlash(__('The product has been deleted.'), 'default', array('class' => 'alert alert-danger'));
            return $this->redirect(array('action' => 'index'));
        }
    }

}
