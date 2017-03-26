<?php
/*
* validation->check(source_array, item_rule){
	source_array = POST/GET;
	item_rule = array(
	'field_name' => array('required' => true, min => '6', max = '10')
	)
}

available rules = {
	'required' => boolean
	'min' / 'max' => int
	'unique'	=> table in db which column should be unique
	'matches' => name of form variable
}
*/

class Validate
{
	private $_passed = false,
			$_errors = array(),
			$_db = null;

	public function __construct()
	{
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = array())
	{
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule_name => $rule_value) {
				$value = trim($source[$item]);
				$item = escape($item);
				if ($rule_name === "required" && empty($value)) {
					$this->addErrors("{$item} is required");
				} else if (!empty($value)) {
					switch ($rule_name) {
						case 'min':
							if (strlen($value) < $rule_value) {
								$this->addErrors("{$item}","{$item} must be a minimum of {$rule_value}");
							}
							break;
						case 'max':
							if (strlen($value) > $rule_value) {
								$this->addErrors("{$item}","{$item} must be a maximum of {$rule_value}");
							}
							break;
						case 'matches':
							if ($value != $source[$rule_value]) {
								$this->addErrors("{$item}","{$item} must matches {$rule_value}");
							}
							break;
						case 'unique':
							$check = $this->_db->get($rule_value, array($item, '=', $value));
							if ($check->count()) {
								$this->addErrors("{$item}","{$item} is exist");
							}
							break;
					}
				}
			}
		}
		if (empty($this->_errors)) {
			$this->_passed = true;
		}
		return $this;
	}

	private function addErrors($item, $error)
	{
		$this->_errors[$item] = $error;
	}

	public function errors()

	{
		return $this->_errors;
	}

	public function passed()
	{
		return $this->_passed;
	}

}