<?php
namespace Posts\Models;

use Posts\Core\Model;
use \PDO as PDO;

class Model_User extends Model
{

	public function getUser($email)
	{
		$sql = "SELECT *
				FROM `user`
				WHERE u_email = '" . $email . "'";
		$sth = $this->db()->prepare($sql);
		$sth->execute();
		$rez = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $rez;
	}

	public function addUser($name, $email, $ip = 0)
	{

		try {
			$sql = "INSERT INTO `user`
                (u_name, u_email, u_ip)
                VALUES
                ('" . $name . "', '" . $email . "', " . $ip . ")
                ";
			$rdb = $this->db();
			$sth = $rdb->prepare($sql);
			$sth->execute();
			return $rdb->lastInsertId();

		} catch (Exception $e) {
			var_dump($e);
			exit(0);
		}
		if (!$rez) {
			echo "\nPDO::errorInfo():\n";
			print_r($sth->errorInfo());
			exit(0);
		}
	}

}
