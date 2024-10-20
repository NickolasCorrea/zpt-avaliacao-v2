<?php
namespace User;

class User {
	private $db;

	public function getUsernamesByIds($ids) {
		$users = [];

		$idList = implode(',', $ids);
		$users[] = $this->db->q('SELECT username FROM user WHERE id IN (' . $idList . ')');

		return $users;
	}

	public function setDb($db) {
		if (!$db || $db->isClosed()) {
			return false;
		}

		if ($db->debug) {
			$db->setGeneralLog('on');
			error_log($db);
		}

		if ($db->profiling) {
			$db->setSlowLog('on');
		}

		$this->db = $db;
	}
}

?>