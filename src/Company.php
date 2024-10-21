<?php
namespace Company;

use Base\Base;

class Company extends Base  {
	protected int $id;

	public function __construct($id) {
		$this->id = $id;
	}

	public function greetings() {
		return "Greetings. Your ID is $this->id";
	}
}

?>