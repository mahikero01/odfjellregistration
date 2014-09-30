<?php
App::uses('AppModel', 'Model');

class Visitor extends AppModel {

	public $findMethods = array('search' => true);
	protected function _findSearch($state, $query, $results = array()) {
		if ($state === 'before') {
			$searchQuery = Hash::get($query, 'searchQuery');
			$searchConditions = array(
				'or' => array(
					"{$this->alias}.lastname LIKE" => '%' . $searchQuery .'%',
					"{$this->alias}.firstname LIKE" => '%' . $searchQuery . '%',
					"{$this->alias}.rankcode LIKE" => '%' . $searchQuery . '%',
					"{$this->alias}.address LIKE" => '%' . $searchQuery . '%'
				)
			);
			$query['conditions'] = array_merge($searchConditions, (array)$query['conditions']);
			return $query;
		}
		return $results;
	}

}