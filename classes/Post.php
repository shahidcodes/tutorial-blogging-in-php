<?php

/**
* 
*/
class Post
{
	private $_db;
	function __construct()
	{
		$this->_db = DB::getInstance();
	}

	public function get($what = 'posts', $where = array())
	{
		if ($this->_db->get($what, $where)) {
			return $this->_db->results();
		}
		return false;
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

	public function delete($where)
	{
		if($this->_db->delete('posts', $where)){
			return true;
		}

		return false;
	}

	public function last_error()
	{
		return $this->_db->last_error();
	}

	public function last_insert()
	{
		return $this->_db->last_insert();
	}
}