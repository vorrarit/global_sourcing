<?php

App::uses('AppController', 'Controller');

/**
 * Manufacturers Controller
 *
 * @property Manufacturer $Manufacturer
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ManufacturersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    public $uses = array('Manufacturer', 'ManufacturerContact');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Manufacturer->recursive = 0;
//        pr($this->Paginator->paginate());
//        die();
        if ($this->request->is('post')) {
            $manufacturer = $this->request->data['search']['manufacturer_name'];
        } else {
            $manufacturer = '';
        }

        $settings = array(
            'Manufacturer' => array(
                'conditions' => array(
                    'manufac_name_th like' => '%' . $manufacturer . '%'
                ),
        ));
        $this->Paginator->settings = $settings;
        $this->set('manufacturers', $this->Paginator->paginate());
        //$this->set('manufacturer', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Manufacturer->exists($id)) {
            throw new NotFoundException(__('Invalid manufacturer'));
        }
        $options = array('conditions' => array('Manufacturer.' . $this->Manufacturer->primaryKey => $id));
        $this->set('manufacturer', $this->Manufacturer->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        $count = $this->Manufacturer->find('first', array('order' => array('Manufacturer.id' => 'desc')));
        $Manufac = ($count['Manufacturer']['id'] * 1);
        $Manufac += 1;
        $Manufac = substr('000000' . $Manufac, -6, 6);
        $this->request->data['Manufacturer']['id'] = $Manufac;



        if ($this->request->is('post')) {
            $id = $this->Manufacturer->find('first', array('fields'=>array('Manufacturer.id'),'order' => array('Manufacturer.id'=>'desc')));
            $picID = $id['Manufacturer']['id'];
            $picID +=1;
            $picID = substr('000000' . $picID, -6, 6);

            $map = $this->request->data['Manufacturer']['map'];
            $ext = pathinfo($map['name'], PATHINFO_EXTENSION);
            if ($this->isUploadedFile($map)) {
                $this->request->data['Manufacturer']['manufac_map_name'] = $this->request->data['Manufacturer']['map']['name'];
                $this->request->data['Manufacturer']['manufac_map_path'] = '/img/pic';
                $this->request->data['Manufacturer']['manufac_map_file_type'] = $this->request->data['Manufacturer']['map']['type'];


                $this->saveUploadFile($map, '/img/pic', 'manufac_photo_' . '00000' . $picID . '.' . $ext);
            }
            $this->Manufacturer->create();
            if ($this->Manufacturer->save($this->request->data)) {
                $this->Session->setFlash(__('The manufacturer has been saved.'), 'default', array('class' => 'alert alert-sucess'));
                return $this->redirect(array('action' => 'edit', $Manufac));
            } else {
                $this->Session->setFlash(__('The manufacturer could not be saved. Please, try again.'), 'defualt', array('class' => 'alert alert-danger'));
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
    public function edit($id = null, $manufacturerContactId = null) {
//        pr($id); die();
        if (!$this->Manufacturer->exists($id)) {
            throw new NotFoundException(__('Invalid manufacturer'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Manufacturer->save($this->request->data)) {
                $this->Session->setFlash(__('The manufacturer has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The manufacturer could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Manufacturer.' . $this->Manufacturer->primaryKey => $id));
            $this->request->data = $this->Manufacturer->find('first', $options);
        }

        $manufacturerContacts = $this->ManufacturerContact->find('all', array('conditions' => array('ManufacturerContact.manufacturer_id' => $id)));
        $this->set(compact('manufacturerContacts'));

        if (!empty($manufacturerContactId)) {
            $manufacturerContact = $this->ManufacturerContact->findById($manufacturerContactId);
            $this->request->data['ManufacturerContact'] = $manufacturerContact['ManufacturerContact'];
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
        $this->Manufacturer->id = $id;
        if (!$this->Manufacturer->exists()) {
            throw new NotFoundException(__('Invalid manufacturer'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Manufacturer->delete()) {
            $this->Session->setFlash(__('The manufacturer has been deleted.'));
        } else {
            $this->Session->setFlash(__('The manufacturer could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
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

    public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $manufacturerIds = array();
//            pr($this->request->data); die();

            foreach ($this->request->data['Manufacturer']['id'] as $id) {

                $manufacturerIds[] = $id;
            }

            if ($this->Manufacturer->deleteAll(array('id' => $manufacturerIds), false)) {
                $this->Manufacturer->deleteAll(array('id' => $manufacturerIds), false);
                $this->Session->setFlash(__('The manufacturer has been deleted'));
            } else {
                $this->Session->setFlash(__('can not delete'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }

}
