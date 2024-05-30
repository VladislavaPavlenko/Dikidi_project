<?php

function load_dir_files($dirPath) {
	if (empty($dirPath)) return [];
	$dirPath = str_replace('//', '/', $dirPath);
	
	foreach (explode('/', $dirPath) as $name) {
		if (in_array($name, ['..', '.'])) {
			return ['error' => true];
		}
	}

	if (stripos($dirPath, __DIR__) === FALSE) {
		return ['error' => true];
	}

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
							<a href="javascript:void(0)">' . $name . '</a>
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
							<a href="javascript:void(0)" class="sc folder" data-folder-path="' . $path . '" onclick="UnHide(this)">►</a>
							<a href="javascript:void(0)">' . $name . '</a>
						</p>
					</div>
						
				</li>
			';
		}
	}
	return $htmlFolders . $htmlFiles;
}
