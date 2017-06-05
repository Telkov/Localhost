<?php

// проверим, существует ли такой пользователь в базе
if(isset($_SESSION['user'])) {
	// $sessionInfo = $_SESSION['user'];
	$usocid = $_SESSION['user']['id'];
	$uname = $_SESSION['user']['name'];
	
	// echo '<pre>';
	// print_r($_SESSION['user']);
	// echo '</pre>';
	
	$data = new Select('Users');
	$usres = $data->getElementBySocid($usocid);
	//создадим пустой массив, на случай если БД с пользователями окажется пустой.
		if($usres == NULL) {
			$usres['name'] = NULL;
			$usres['socid'] = NULL;
		}

	// если пользователь с уникальным параметром SocialId в базе отсутствуем, добавим его туда.
	if (!in_array($usocid, $usres)) {
		$uparams['socid'] = $usocid;
		$uparams['name'] = $uname;
		$new = new Insert('Users', $uparams);
		$new->insertData();

	} else {
		return false;
	}

	
// $query = "SELECT `socid` FROM `Users` WHERE `socid` = $usocid";
	// echo $query;
	
			

}
