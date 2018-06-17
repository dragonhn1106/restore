<?php
	function connection()
	{
		try {
			$conn=new PDO('mysql:host=localhost;dbname=chuvanduong_eyewearstore_th17;charset=utf8','root','');
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $conn;
			
		} catch (PDOException $e) {
			echo "Error".$e->getMessage();
		}
	}
	function disconnection($conn)
	{
		$conn=null;
	} 
?>