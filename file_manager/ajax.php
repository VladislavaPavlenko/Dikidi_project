<?php
require_once 'functions.php';

$oper = $_POST['oper'];

switch ($oper) {
	case "load_dir_files":
		$folderPath = $_POST['folder_path'];
		
		$folderInfo = load_dir_files($folderPath);
		
		if (!isset($folderInfo['error'])) {
			$html = getFileManagerHtml($folderInfo);
			echo json_encode(['folder_path' => $folderPath, 'html' => $html]);
		} else {
			echo json_encode($folderInfo);
		}
		
	break;

	default:
		echo json_encode(['error' => "Ошибка"]);
}