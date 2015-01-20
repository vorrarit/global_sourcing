<?php
App::uses('AppController', 'Controller');
/**
 * UserGroups Controller
 *
 * @property UserGroup $UserGroup
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UserGroupsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

    public function beforeFilter() {
        $this->Auth->allow('login', 'logout', 'index', 'add', 'edit');
        parent::beforeFilter();
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserGroup->recursive = 0;
		$data = $this->request->data;
		$settings = array('UserGroup' => array(
				'conditions' => array(),
				'order' => array('UserGroup.id' => 'asc')
		));
		if (!empty($data['UserGroup']['user_group_name'])) {
			$settings['UserGroup']['conditions']['lower(UserGroup.user_group_name) like'] = '%'. strtolower($data['UserGroup']['user_group_name']).'%';
		}
		$this->Paginator->settings = $settings;
		$this->set('userGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserGroup->exists($id)) {
			throw new NotFoundException(__('Invalid user group'));
		}
		$options = array('conditions' => array('UserGroup.' . $this->UserGroup->primaryKey => $id));
		$this->set('userGroup', $this->UserGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			$currentUser = $this->Session->read('Auth.User');
			$this->UserGroup->create();
			$this->request->data['UserGroup']['created_by'] = $currentUser['username'];
			if ($this->UserGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The user group has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user group could not be saved. Please, try again.'));
			}
		}

		$countUserGroup = $this->UserGroup->find('first', array('order' => array('UserGroup.id' => 'DESC'), 'fields' => array('id')));
		$idgroup = (int) $countUserGroup['UserGroup']['id'];
		$idgroup += 1;
		$idgroup = substr('00' . $idgroup, -2, 2);
		$this->request->data['UserGroup']['id'] = $idgroup;
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserGroup->exists($id)) {
			throw new NotFoundException(__('Invalid user group'), 'default', array('class' => 'alert alert-danger'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$currentUser = $this->Session->read('Auth.User');
			$this->request->data['UserGroup']['modified_by'] = $currentUser['username'];
			if ($this->UserGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The user group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserGroup.' . $this->UserGroup->primaryKey => $id));
			$this->request->data = $this->UserGroup->find('first', $options);
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
		$this->UserGroup->id = $id;
		if (!$this->UserGroup->exists()) {
			throw new NotFoundException(__('Invalid user group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserGroup->delete()) {
			$this->Session->setFlash(__('The user group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function isAuthorized($user) {
		$currentUser = $this->Session->read('Auth.User');
		if ($currentUser['UserGroup']['m003'] == 'Y') {
			return true;
		} else {
			return false;
		}
	}

	  public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $usergroupIds = array();

            foreach ($this->request->data['UserGroup']['id'] as $id) {
                $usergroupIds[] = $id;
            }
            $this->UserGroup->deleteAll(array('id' => $usergroupIds), false);
            $this->Session->setFlash(__('The UserGroup has been deleted.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

}
