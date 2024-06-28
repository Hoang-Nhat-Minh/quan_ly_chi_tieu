<?php
include 'controller/controller.php';
$controller = new controller();
session_start();
if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = "";
}

if (isset($_SESSION['username'])) {
	//var_dump($_SESSION['username']); die();
	switch ($action) {
		case 'themchi':
			$controller->themchi();
			break;

		case 'suachi':
			$controller->suachi();
			break;

		case 'xoachi':
			$controller->xoachi();
			break;

		case 'qlthu':
			$controller->qlthu();
			break;

		case 'suathu':
			$controller->suathu();
			break;

		case 'xoathu':
			$controller->xoathu();
			break;

		case 'dangxuat':
			$controller->dangxuat();
			break;

		case 'qlsono':
			$controller->qlsono();
			break;

		case 'suano':
			$controller->suano();
			break;

		case 'xoano':
			$controller->xoano();
			break;

		case 'trano':
			$controller->trano();
			break;

		case 'trangcanhan':
			$controller->trangcanhan();
			break;

		case 'suamatkhau':
			$controller->suamatkhau();
			break;

		case 'xoataikhoan':
			$controller->xoataikhoan();
			break;

		default:
			$controller->trangchu();
			break;
	}
} else {
	switch ($action) {
		case 'dangky':
			$controller->dangky();
			break;

		default:
			$controller->dangnhap();
			break;
	}
}
?>