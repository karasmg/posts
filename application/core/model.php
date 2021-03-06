<?php
namespace Posts\Core;

use \PDO as PDO;
class Model
{

	private $_db = false;
	private $_sumReport = '';
	private $_sumError = '';
	private $_connectionString = 'mysql:host=localhost;dbname=posts';
	private $_charset = 'utf8';
	private $_username = 'root';
	private $_password = '';

	protected function db() {
		if ( $this->_db )
			return $this->_db;

		try {
			$link = new PDO ($this->_connectionString.';'.$this->_charset, $this->_username, $this->_password);
		} catch ( PDOException $e ) {
			$this->_sumReport = "Не удалось соединиться : <br/>" . $e->getMessage () . "<br/>";
			//$this->sendResult();
			echo $this->_sumReport;
			exit(0);
		}

		$this->_db = $link;
		return $this->_db;
	}
}