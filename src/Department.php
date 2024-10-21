<?php
namespace Department;

use Base\Base;

require_once './User.php';

class Department extends Base {
	private User\User $user;

	public function __construct() {
		$this->user = new User\User(); // @todo fixme
	}
}
?>