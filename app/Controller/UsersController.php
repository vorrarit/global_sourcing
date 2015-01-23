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
	public $uses = array('User', 'UserGroup');

    public function beforeFilter() {
        $this->Auth->allow('login', 'logout');
        parent::beforeFilter();
    }

    public function index() {

        $this->User->recursive = 0;
		$drop = $this->UserGroup->find('list', array('fields' => array('id', 'user_group_name')));
        $this->set('drop', $drop);
        
         
        
            $data = $this->request->data;

            $settings = array('User' => array(
                'conditions' => array(),
                'order' => array('User.id'=>'asc')
            ));

                $settings['User']['conditions'][] = array('and' => array());
				if (!empty($data['User']['user_group_id'])) {
					$settings['User']['conditions']['and']['lower(User.user_group_id) like'] = '%'. strtolower($data['User']['user_group_id']).'%';
				}
				if (!empty($data['User']['user_name'])) {
                $settings['User']['conditions']['and']['lower(User.user_name) like'] = '%'.strtolower($data['User']['user_name']).'%';
				}
				if (!empty($data['User']['username'])) {
				$settings['User']['conditions']['and']['lower(User.username) like'] = '%'.strtolower($data['User']['username']).'%';
				}
        $this->Paginator->settings = $settings;
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
			
			$useradd =  $this->request->data['User']['username'];
			$chkuseradd = $this->User->find('first',array('conditions' => array('User.username'=> trim($useradd))));
			if(empty($chkuseradd)){
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$currentUser = $this->Session->read('Auth.User');
					$this->request->data['Users']['created_by'] = $currentUser['username'];
					$this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
					return $this->redirect(array('action' => 'index'));
				}else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			}else{
				$this->Session->setFlash(__('This Username cant be used becuase it has same username already.'), 'default', array('class' => 'alert alert-danger'));
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
                $this->Session->setFlash(__('The user has been saved.'),'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
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
//		debug($id);die;
		if($id == '0001'){
			$this->Session->setFlash(__('The user could not be deleted. '), 'default', array('class' => 'alert alert-danger'));
		}else{
			if ($this->User->delete()) {
				$this->Session->setFlash(__('The user has been deleted.'), 'default', array('class' => 'alert alert-success'));
			} else {
				$this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
		}
        return $this->redirect(array('action' => 'index'));
    }

   public function multiSelect() {
        if ($this->request->is(array('post', 'put'))) {
            $userIds = array();

            foreach ($this->request->data['User']['id'] as $ids) {
				if($ids!='0001'){
					$userIds[] = $ids;
				}
            }
			if($this->User->deleteAll(array('id' => $userIds),false)){
				$this->User->deleteAll(array('id' => $userIds), false);
				$this->Session->setFlash(__('The User has been deleted.'), 'default', array('class' => 'alert alert-success'));
			}            
            else
			{
				$this->Session->setFlash(__('The User has been deleted.'), 'default', array('class' => 'alert alert-danger'));
			}
            return $this->redirect(array('action' => 'index'));
        }
    }
	
	public function search() {
		$this->User->recursive = 0;
		$drop = $this->UserGroup->find('list', array('fields' => array('id', 'user_group_name')));
		$this->set('drop', $drop);



		$data = $this->request->data;

		$settings = array('User' => array(
				'conditions' => array(),
				'order' => array('User.id' => 'asc')
		));

		$settings['User']['conditions'][] = array('and' => array());
		$settings['User']['conditions']['and']['lower(User.user_group_id) like'] = '%' . strtolower($data['User']['User_Group_id']) . '%';
		$settings['User']['conditions']['and']['lower(User.user_name) like'] = '%' . strtolower($data['User']['Name']) . '%';
		$settings['User']['conditions']['and']['lower(User.username) like'] = '%' . strtolower($data['User']['UserName']) . '%';

		$this->Paginator->settings = $settings;
		$this->set('users', $this->Paginator->paginate());

	}
	
}
