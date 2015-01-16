<?php

App::uses('AppController', 'Controller');

/**
 * Currencies Controller
 *
 * @property Currency $Currency
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CurrenciesController extends AppController {

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
        $this->Currency->recursive = 0;
        $condition = array();
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            $settings = array('Currency' => array(
                    'conditions' => array(),
                    'order' => array('Currency.id' => 'asc')
            ));
            //pr($settings); die();

            if (!empty($data['Currency']['text_search'])) {
                $settings['Currency']['conditions'][] = array('or' => array());
                $settings['Currency']['conditions']['or']['lower(Currency.currency_name) like'] = '%' . strtolower($data['Currency']['text_search']) . '%';
            }
            if (!empty($data['Currency']['division_name'])) {
                $settings['Currency']['conditions']['lower(Currency.currency_name) like'] = '%' . strtolower($data['Currency']['currency_name']) . '%';
            }
            $this->Paginator->settings = $settings;
            $this->set('currencies', $this->Paginator->paginate());
        } else {
            $this->set('currencies', $this->Paginator->paginate());
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
        if (!$this->Currency->exists($id)) {
            throw new NotFoundException(__('Invalid currency'));
        }
        $options = array('conditions' => array('Currency.' . $this->Currency->primaryKey => $id));
        $this->set('currency', $this->Currency->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $curId = $this->Currency->find('first', array('order' => array('Currency.id' => 'DESC'), 'fields' => array('id')));
        $int = (int) $curId['Currency']['id'];
        $int+=1;
        $int = substr('00' . $int, -2, 2);
        $this->request->data['Currency']['id'] = $int;

        if ($this->request->is('post')) {
            $this->Currency->create();
            if ($this->Currency->save($this->request->data)) {
                $this->Session->setFlash(__('The currency has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The currency could not be saved. Please, try again.'));
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
        if (!$this->Currency->exists($id)) {
            throw new NotFoundException(__('Invalid currency'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Currency->save($this->request->data)) {
                $this->Session->setFlash(__('The currency has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The currency could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Currency.' . $this->Currency->primaryKey => $id));
            $this->request->data = $this->Currency->find('first', $options);
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
        $this->Currency->id = $id;
        if (!$this->Currency->exists()) {
            throw new NotFoundException(__('Invalid currency'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Currency->delete()) {
            $this->Session->setFlash(__('The currency has been deleted.'));
        } else {
            $this->Session->setFlash(__('The currency could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $currencyIds = array();
//            pr($this->request->data['Division']['id']); die();
            foreach ($this->request->data['Currency']['id'] as $id) {
                $currencyIds[] = $id;
            }
            $this->Currency->deleteAll(array('id' => $currencyIds), false);
            $this->Session->setFlash(__('The product has been deleted.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

}
