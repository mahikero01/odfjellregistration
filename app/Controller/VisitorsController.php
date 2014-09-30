<?php
App::uses('AppController', 'Controller');

class VisitorsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'Paginator');
	
	public $paginate = array(
		'limit' => 10
	);
	
	public function index() {
		$this->Visitor->recursive = -1;
		$this->set('visitors', $this->paginate());
		$this->set('personall', $this->Visitor->find('all'));
	}
	
	public function view($id) {
		if (!($visitor = $this->Visitor->findById($id))) {
			throw new NotFoundException(__('Visitor not found'));
		}
	
		$this->set(compact('visitor'));
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$this->Visitor->create();
		
			if ($this->Visitor->save($this->request->data)) {
				$this->Session->setFlash(__('New visitor created'));
				return $this->redirect(array('action' => 'index'));
			}
			
			$this->Session->setFlash(__('Could not create visitor'));
		}
	}
	
	public function redit($id) {
		$visitor = $this->Visitor->findById($id);
		
		
		if ($visitor['Visitor']['in'] == 0) {
			$this->Visitor->in = 1;
		} else {
			$this->Visitor->in = 0;
		}
		
		$this->set(compact('visitor'));
		
		if (!$visitor) {
			throw new NotFoundException(__('Visitor not found'));
		}
		
		$this->Visitor->id = $id;
		$this->Visitor->save($this->data);
		return $this->redirect(array('action' => 'index'));
	}
	
	
	
	public function edit($id) {
		$visitor = $this->Visitor->findById($id);
		$this->set(compact('visitor'));
		
		if (!$visitor) {
			throw new NotFoundException(__('Visitor not found'));
		}

		if ($this->request->is(array('post','put'))) {
			$this->Visitor->id = $id;
			if ($this->Visitor->save($this->request->data)) {
				$this->Session->setFlash(__('Visitor updated'));

				return $this->redirect(array('action' => 'index'));
			}

		$this->Session->setFlash(__('Could not update visitor'));

		} else {
			$this->request->data = $visitor;
		}
	}
	
	
	
	public function search() {
		if ($this->request->is('put') || $this->request->is('post')) {
			// poor man's Post Redirect Get behavior
			return $this->redirect(array(
				'?' => array(
				'q' => $this->request->data('Visitor.searchQuery')
				)
			));
		}

		$this->Visitor->recursive = 0;
		$searchQuery = $this->request->query('q');
		$this->Paginator->settings = array(
			'Visitor' => array(
				'findType' => 'search',
				'searchQuery' => $searchQuery
			)
		);

		$this->set('visitors', $this->Paginator->paginate());
		$this->set('searchQuery', $searchQuery);
		$this->set('personall', $this->Visitor->find('all'));
		$this->render('index');
}
	
	
}