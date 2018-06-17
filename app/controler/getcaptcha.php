<?php
	session_start();
	require_once('../lips/captcha.php');
	//kiem tra xem co phai la request ajax khong 
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	{
		$captcha = simple_php_captcha();
		echo json_encode($captcha);
	}
?>