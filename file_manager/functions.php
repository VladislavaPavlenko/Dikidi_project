<?php

function load_dir_files($dirPath) {
	if (empty($dirPath)) return [];

  $dirData = glob($dirPath . "/[!.,!..]*", GLOB_BRACE);
	$folders = [];
	$files = [];
	foreach ($dirData as $filePath) {
		$nameFolder = str_replace($dirPath . "/", "", $filePath);

		if (stripos($nameFolder, ".png") || stripos($nameFolder, ".jpg") || stripos($nameFolder, ".jpeg")) {
			$files[] = [$filePath => $nameFolder];
		} elseif (!stripos($nameFolder, ".")) {
			$folders[] = [$filePath => $nameFolder];
		}
	}

	return ['folders' => $folders, 'files' => $files, 'dir_path' => $dirPath];
}

function getFileManagerHtml($fileManagerInfo) {
	$htmlFiles = "";
	$htmlFolders = "";
	$folders = $fileManagerInfo['folders'];
	$files = $fileManagerInfo['files'];

	foreach ($files as $file) {
		foreach ($file as $path => $name) {
			$htmlFiles .= '
				<li>
					<div>
						<p>
							<a href="#">' . $name . '</a>
						</p>
					</div>
				</li>
			';
		}
	}

	foreach ($folders as $folder) {
		foreach ($folder as $path => $name) {
			$htmlFolders .= '
				<li class="cl">
					<div>
						<p>
							<a href="#" class="sc folder" data-folder-path="' . $path . '" onclick="return UnHide(this)">►</a>
							<a href="#">' . $name . '</a>
						</p>
					</div>
						
				</li>
			';
		}
	}
	return $htmlFolders . $htmlFiles;
}
