<?php
namespace User;

use Base\Base;

class User extends Base {
	private $db;

	public function getUsernamesByIds($ids) {
		$users = [];

		$idList = implode(',', $ids);
		$users[] = $this->db->q('SELECT username FROM user WHERE id IN (' . $idList . ')');

		return $users;
	}

	public function getLargestDepartmentForAllUsers() {
		$result = $this->db->q('SELECT u.id, u.username, d.name AS department_name, d.employees
			FROM user u
			JOIN user_department ud ON u.id = ud.user
			JOIN department d ON ud.department = d.id
			WHERE d.employees = 
			(SELECT MAX(d2.employees)
			FROM user_department ud2
			JOIN department d2 ON ud2.department = d2.id
			WHERE ud2.user = u.id)');
	
		return $result; 
	}
}

?>