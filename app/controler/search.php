<?php
	require_once('app/model/search_model.php');
	$key=isset($_GET['s']) ? trim($_GET['s']) : "";
	$key=urldecode($key);
	$data=get_all_sanpham_keyword_model($key);

	require_once('app/view/search/index_view.php');
?>