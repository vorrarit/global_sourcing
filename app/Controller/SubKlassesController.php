<?php

App::uses('AppController', 'Controller');

/**
 * SubKlasses Controller
 *
 * @property SubKlass $SubKlass
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SubKlassesController extends AppController {

    public $uses = array("SubKlass", "Klass", "Department", "Division");

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
        $this->SubKlass->recursive = 0;
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
        $klasses = $this->Klass->find('list', array(
            'fields' => array
                (
                'Klass.id',
                'Klass.klass_name',
            )
        ));
        //pr($klasses); die();
        $this->set(compact('divisions', 'departments', 'klasses'));
        //pr($klasses); die();
        $condition = array();
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            $settings = array('subKlasses' => array(
                    'conditions' => array(),
                    'order' => array('subKlasses.id' => 'asc')
            ));

            if (!empty($data['subKlasses']['text_search'])) {
                $settings['SubKlass']['conditions'][] = array('or' => array());
                $settings['SubKlass']['conditions']['or']['lower(SubKlass.klass_id) like'] = '%' . strtolower($data['subKlasses']['text_search']) . '%';
                $settings['SubKlass']['conditions']['or']['lower(SubKlass.sub_klass_name) like'] = '%' . strtolower($data['subKlasses']['text_search']) . '%';
            }
            if (!empty($data['subKlasses']['klass_id'])) {
                $settings['SubKlass']['conditions']['lower(SubKlass.klass_id) like'] = '%' . strtolower($data['subKlasses']['klass_id']) . '%';
            }
            if (!empty($data['subKlasses']['sub_klass_name'])) {
                $settings['SubKlass']['conditions']['lower(SubKlass.sub_klass_name) like'] = '%' . strtolower($data['subKlasses']['sub_klass_name']) . '%';
            }
            $this->Paginator->settings = $settings;
            $this->set('subKlasses', $this->Paginator->paginate());
        } else {
            $this->set('subKlasses', $this->Paginator->paginate());
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
        if (!$this->SubKlass->exists($id)) {
            throw new NotFoundException(__('Invalid sub klass'));
        }
        $options = array('conditions' => array('SubKlass.' . $this->SubKlass->primaryKey => $id));
        $this->set('subKlass', $this->SubKlass->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $currentUser = $this->Session->read('Auth.User');
            $this->SubKlass->create();
            $this->request->data['SubKlass']['created_by'] = $currentUser['username'];
            $this->request->data['SubKlass']['modified_by'] = $currentUser['username'];
            if ($this->SubKlass->save($this->request->data)) {
                $this->Session->setFlash(__('The sub klass has been saved.', 'default', array('class' => 'alert alert-success')));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The sub klass could not be saved. Please, try again.', 'default', array('class' => 'alert alert-danger')));
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
        $klasses = $this->Klass->find('list', array(
            'fields' => array
                (
                'Klass.id',
                'Klass.klass_name',
            )
        ));
        $this->set(compact('divisions', 'departments', 'klasses'));
    }

    function setNewID($klsID) {
        $this->autoRender = false;

        $getOldID = $this->SubKlass->find('first', array('conditions' => array(
                "SubKlass.department_id" => $klsID), 'fields' => array('id'), 'order' => array('SubKlass.id' => 'desc')
                )
        );
        $newID = empty($getOldID['SubKlass']['id']) ? $klsID . '01' : (int) $getOldID['SubKlass']['id'] + 1;
        $newID = substr('0000000000' . $newID, -10, 10);

        return $newID;
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

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->SubKlass->exists($id)) {
            throw new NotFoundException(__('Invalid sub klass'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $currentUser = $this->Session->read('Auth.User');
            $this->request->data['SubKlass']['modified_by'] = $currentUser['username'];
            if ($this->SubKlass->save($this->request->data)) {
                $this->Session->setFlash(__('The sub klass has been saved.', 'default', array('class' => 'alert alert-success')));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The sub klass could not be saved. Please, try again.', 'default', array('class' => 'alert alert-danger')));
            }
        } else {
            $options = array('conditions' => array('SubKlass.' . $this->SubKlass->primaryKey => $id));
            $this->request->data = $this->SubKlass->find('first', $options);
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
        $klasses = $this->Klass->find('list', array(
            'fields' => array
                (
                'Klass.id',
                'Klass.klass_name',
            )
        ));
        //pr($klasses); die();
        $this->set(compact('divisions', 'departments', 'klasses'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->SubKlass->id = $id;
        if (!$this->SubKlass->exists()) {
            throw new NotFoundException(__('Invalid sub klass'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->SubKlass->delete()) {
            $this->Session->setFlash(__('The sub klass has been deleted.', 'default', array('class' => 'alert alert-success')));
        } else {
            $this->Session->setFlash(__('The sub klass could not be deleted. Please, try again.', 'default', array('class' => 'alert alert-danger')));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $subklassIds = array();
//            pr($this->request->data['Division']['id']); die();
            foreach ($this->request->data['SubKlass']['id'] as $id) {
                $subklassIds[] = $id;
            }
            $this->SubKlass->deleteAll(array('id' => $subklassIds), false);
            $this->Session->setFlash(__('The product has been deleted.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

}
