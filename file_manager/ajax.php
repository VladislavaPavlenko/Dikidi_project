<?php
require_once 'functions.php';

$oper = $_POST['oper'];

switch ($oper) {
	case "load_dir_files":
		$folderPath = $_POST['folder_path'];
		if (!stripos($folderPath, "example_file_manager")) $folderPath = "";
		
		$folderInfo = load_dir_files($folderPath);
		$html = getFileManagerHtml($folderInfo);
		echo json_encode(['folder_path' => $folderPath, 'html' => $html]);
	break;

	default:
		echo json_encode(['error' => "Ошибка"]);
}