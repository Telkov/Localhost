<?php
class Database
{
	private $host="localhost";
	private $user="lightadmin";
	private $pass="123456";
	private $db="lightdb";

	function connectToDb() {
		if (mysql_connect($this->host, $this->user, $this->pass)) {
			// echo 'connected to host','<br>'; //проверяем соединение с хостом
			if (mysql_select_db($this->db)) {
				// echo 'connected to db','<br>';  //проверяем соединение с БД
			}

		}
	}
	function closeConnection() {
		mysql_close();
	}
}