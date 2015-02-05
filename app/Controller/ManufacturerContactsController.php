<?php

App::uses('AppController', 'Controller');

/**
 * ManufacturerContacts Controller
 *
 * @property ManufacturerContact $ManufacturerContact
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ManufacturerContactsController extends AppController {
    
    public $uses = array('ManufacturerContact', 'Manufacturer');

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
        $this->ManufacturerContact->recursive = 0;
        $this->set('manufacturerContacts', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->ManufacturerContact->exists($id)) {
            throw new NotFoundException(__('Invalid manufacturer contact'));
        }
        $options = array('conditions' => array('ManufacturerContact.' . $this->ManufacturerContact->primaryKey => $id));
        $this->set('manufacturerContact', $this->ManufacturerContact->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {

            if (empty($this->request->data['ManufacturerContact']['id'])) {
                $this->ManufacturerContact->create();


                $ManufacturerContact = $this->ManufacturerContact->find('first', array('order' => array('ManufacturerContact.id' => 'desc')));
               
                if (empty($ManufacturerContact)) {
                    
                    $ManufacturerContactId = '000001';
                } else {

                    $ManufacturerContactId = ($ManufacturerContact['ManufacturerContact']['id'] * 1) + 1;
                    $ManufacturerContactId = substr('000000' . $ManufacturerContactId, -6, 6);
// pr($ManufacturerContactId); die();
                }

                $this->request->data['ManufacturerContact']['id'] = $ManufacturerContactId;
//            pr($this->request->data); die();

                if ($this->ManufacturerContact->save($this->request->data)) {
                    $this->Session->setFlash(__('The manufacturer contact has been saved.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('controller' => 'Manufacturers', 'action' => 'edit', $this->request->data['ManufacturerContact']['manufacturer_id']));
                } else {
                    $this->Session->setFlash(__('The manufacturer contact could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                }
            } else {
                if ($this->ManufacturerContact->save($this->request->data)) {
                    $this->Session->setFlash(__('The manufacturer contact has been saved.'));
                    return $this->redirect(array('controller' => 'Manufacturers', 'action' => 'edit', $this->request->data['ManufacturerContact']['manufacturer_id']));
                } else {
                    $this->Session->setFlash(__('The manufacturer contact could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
        if (!$this->ManufacturerContact->exists($id)) {
            throw new NotFoundException(__('Invalid manufacturer contact'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->ManufacturerContact->save($this->request->data)) {
                $this->Session->setFlash(__('The manufacturer contact has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The manufacturer contact could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('ManufacturerContact.' . $this->ManufacturerContact->primaryKey => $id));
            $this->request->data = $this->ManufacturerContact->find('first', $options);
        }
        $manufacturers = $this->ManufacturerContact->Manufacturer->find('list');
        
        $this->set(compact('manufacturers'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->ManufacturerContact->id = $id;
        if (!$this->ManufacturerContact->exists()) {
            throw new NotFoundException(__('Invalid manufacturer contact'));
        }

        $manufacturerContact = $this->ManufacturerContact->find('first', array('conditions' => array('ManufacturerContact.id' => $id)));

        $this->request->allowMethod('post', 'delete');
        if ($this->ManufacturerContact->delete()) {
            $this->Session->setFlash(__('The manufacturer contact has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The manufacturer contact could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('controller'=>'Manufacturers', 'action' => 'edit', $manufacturerContact['ManufacturerContact']['manufacturer_id']));
    }

}
