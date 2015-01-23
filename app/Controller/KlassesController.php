<?php

App::uses('AppController', 'Controller');

/**
 * Klasses Controller
 *
 * @property Klass $Klass
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class KlassesController extends AppController {

    public $uses = array("Klass", "Department", "Division");

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
        $this->Klass->recursive = 0;
        $divisions = $this->Division->find('list', array(
            'fields' => array
                (
                'Division.id',
                'Division.division_name',
            )
        ));
        $departments = $this->Department->find('list', array(
            'fields' => array
                (
                'Department.id',
                'Department.department_name',
            )
        ));
        $this->set(compact('divisions', 'departments'));
//       //pr($divisions); die();
        $condition = array();
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            $settings = array('Klass' => array(
                    'conditions' => array(),
                    'order' => array('Klass.id' => 'asc')
            ));


            if (!empty($data['Klass']['text_search'])) {
                $settings['Klass']['conditions'][] = array('or' => array());
                $settings['Klass']['conditions']['or']['lower(Klass.division_id) like'] = '%' . strtolower($data['Klass']['text_search']) . '%';
                $settings['Klass']['conditions']['or']['lower(Klass.department_id) like'] = '%' . strtolower($data['Klass']['text_search']) . '%';
                $settings['Klass']['conditions']['or']['lower(Klass.klass_name) like'] = '%' . strtolower($data['Klass']['text_search']) . '%';
            }
            if (!empty($data['Klass']['division_id'])) {
                $settings['Klass']['conditions']['lower(Klass.division_id) like'] = '%' . strtolower($data['Klass']['division_id']) . '%';
            }
            if (!empty($data['Klass']['department_id'])) {
                $settings['Klass']['conditions']['lower(Klass.department_id) like'] = '%' . strtolower($data['Klass']['department_id']) . '%';
            }
            if (!empty($data['Klass']['klass_name'])) {
                $settings['Klass']['conditions']['lower(Klass.klass_name) like'] = '%' . strtolower($data['Klass']['klass_name']) . '%';
            }
            $this->Paginator->settings = $settings;
            $this->set('klasses', $this->Paginator->paginate());
        } else {
            $this->set('klasses', $this->Paginator->paginate());
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
        if (!$this->Klass->exists($id)) {
            throw new NotFoundException(__('Invalid klass'));
        }
        $options = array('conditions' => array('Klass.' . $this->Klass->primaryKey => $id));
        $this->set('klass', $this->Klass->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ((!empty($this->request->data['Klass']['id'])) &&
                (!empty($this->request->data['Klass']['klass_name'])) &&
                (!empty($this->request->data['Klass']['department_id']))) {
            if ($this->request->is('post')) {
                $currentUser = $this->Session->read('Auth.User');
                $this->Klass->create();
                $this->request->data['Klass']['created_by'] = $currentUser['username'];
                $this->request->data['Klass']['modified_by'] = $currentUser['username'];
                if ($this->Klass->save($this->request->data)) {
                    $this->Session->setFlash(__('The klass has been saved.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The klass could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                }
            }
        }
        $divisions = $this->Division->find('list', array(
            'fields' => array
                (
                'Division.id',
                'Division.division_name',
            )
        ));
        $departments = $this->Department->find('list', array(
            'fields' => array
                (
                'Department.id',
                'Department.department_name',
            )
        ));
        $this->set(compact('divisions', 'departments'));
    }

    function setNewID($deptID) {
        $this->autoRender = false;

        $getOldID = $this->Klass->find('first', array('conditions' => array(
                "Klass.department_id" => $deptID), 'fields' => array('id'), 'order' => array('Klass.id' => 'desc')
                )
        );
        $newID = empty($getOldID['Klass']['id']) ? $deptID . '0001' : (int) $getOldID['Klass']['id'] + 1;
        $newID = substr('00000000' . $newID, -8, 8);

        return $newID;
    }

    function loadDepartments($dvID) {
        $departments = $this->Department->find('all', array('conditions' => array('division_id' => $dvID), 'fields' => array('id', 'department_name')));

        $result['Departments'] = $departments;
        $this->set('result', $result);
        $this->set('_serialize', array('result'));
    }

//        function loadKlasses($deptID) {
//        $klasses = $this->Klass->find('all', array('conditions' => array('department_id' => $deptID), 'fields' => array('id', 'klass_name')));
//
//        $result['Klasses'] = $klasses;
//        $this->set('result', $result);
//        $this->set('_serialize', array('result'));
//    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Klass->exists($id)) {
            throw new NotFoundException(__('Invalid klass'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $currentUser = $this->Session->read('Auth.User');
            $this->request->data['Klass']['modified_by'] = $currentUser['username'];
            if ($this->Klass->save($this->request->data)) {
                $this->Session->setFlash(__('The klass has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The klass could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Klass.' . $this->Klass->primaryKey => $id));
            $this->request->data = $this->Klass->find('first', $options);
        }
        $divisions = $this->Division->find('list', array(
            'fields' => array
                (
                'Division.id',
                'Division.division_name',
            )
        ));
        $departments = $this->Department->find('list', array(
            'fields' => array
                (
                'Department.id',
                'Department.department_name',
            )
        ));
        $this->set(compact('divisions', 'departments'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Klass->id = $id;
        if (!$this->Klass->exists()) {
            throw new NotFoundException(__('Invalid klass'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Klass->delete()) {
            $this->Session->setFlash(__('The klass has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The klass could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $klassIds = array();
//            pr($this->request->data['Division']['id']); die();
            foreach ($this->request->data['Klass']['id'] as $id) {
                $klassIds[] = $id;
            }
            $this->Klass->deleteAll(array('id' => $klassIds), false);
            $this->Session->setFlash(__('The product has been deleted.'), 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        }
    }

}
