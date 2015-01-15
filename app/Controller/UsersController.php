<?php

App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function beforeFilter() {
        $this->Auth->allow('login', 'logout', 'index', 'add', 'edit');
        parent::beforeFilter();
    }

    public function index() {

        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
//                $userGroups = $this->User->UserGroup->find('list',array(
//                    'fields'=>array(
//                        'UserGroup.id',
//                        'UserGroup.user_group_name',
//                        
//                        
//                    ),
//                    'order'=>array('UserGroup.user_group_name')
//                    
//                    )
//                );
//                $this->set('userGroups',$userGroups);	}
    }

    public function login($username = '') {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password , try  again'));
        }
		
		$this->layout = 'login_layout';
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', array('order' => array('User.id' => 'ASC'))));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $countUser = $this->User->find('first', array('order' => array('User.id' => 'DESC'), 'fields' => array('id')));
		if (!empty($countUser)) {
			$idusr = (int) $countUser['User']['id'];
			$idusr += 1;
			$idusr = substr('0000' . $idusr, -4, 4);
		} else {
			$idusr = '0001';
		}
        $this->request->data['User']['id'] = $idusr;

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $currentUser = $this->Session->read('Auth.User');
                $this->request->data['Users']['created_by'] = $currentUser['username'];
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }

        $userGroups = $this->User->UserGroup->find('list', array('empty' => '(Please Select)',
            'fields' => array(
                'UserGroup.id',
                'UserGroup.user_group_name',
            ),
            'order' => array('UserGroup.user_group_name')
                )                
             
                );
        $this->set(compact('userGroups'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $currentUser = $this->Session->read('Auth.User');
            $this->request->data['User']['modified_by'] = $currentUser['username'];
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $userGroups = $this->User->UserGroup->find('list');
        $this->set(compact('userGroups'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

   public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $userIds = array();

            foreach ($this->request->data['User']['id'] as $id) {
                $userIds[] = $id;
            }
            $this->User->deleteAll(array('id' => $userIds), false);
            $this->Session->setFlash(__('The User has been deleted.'));
            return $this->redirect(array('action' => 'index'));
        }
    }
}
