<?php

class Query{
	private $_db,
			$_results,
			$_errors;
	public function __construct()
	{
		$this->_db = DB::getInstance();
	}
	//get all posts based on name
	public function getAll($name = array())
	{
		//array('id', 1);
		$field = $name[0];
		$value = $name[1];
		return $this->_db->get('posts', array($field, '=', $value)); //returns db object
	}
	public function catName()
	{
		$field = array(1,'=',1);
		return $this->_db->get('category', $field)->results();
	}

	public function insert($table, $field)
	{
		if ($this->_db->insert($table, $field)) {
				return true;
			}	
		return false;
	}

	public function update($id, $field)
	{
		//$field = array('name' => 'value');
		if ($this->_db->update('posts', $id, $field)) {
			return true;
		}
	}

	public function add_hits($pid)
	{
		if ($current = $this->hits($pid)) {
			$id = $current->id;
			$hit = $current->hits;
			$hit += 1;
			if ($this->_db->update('hits', $id, array('hits' => $hit))) {
				
			}
		}else{
			$current = 1;
			return $this->insert('hits', array('hits' => $current, 'pid' => $pid));
		}

		return false;
	}

	public function delete($where)
	{
		if($this->_db->delete('posts', $where)){
			return true;
		}

		return false;
	}
	public function hits($pid)
	{
		$hits = $this->_db->get('hits', array('pid', '=', $pid));
		if ($hits->count()) {
			return $hits->first();
		}
	}

	public function last_insert()
	{
		return $this->_db->last_insert();
	}

	public function last_error()
	{
		return $this->_db->last_error();
	}
}