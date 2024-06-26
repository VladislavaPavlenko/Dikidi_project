<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
	</head>
	<style type="text/css">
	.treeview { padding: 0; clear: both; font-family: Arial, sans-serif; width: 100%; }
	.treeview * { font-size: 100.1%; }
	.treeview ul
	{
		overflow: hidden; width: 100%; margin: 0; padding: 0 0 1.5em 0;
		list-style-type: none;
	}
	.treeview ul ul { overflow: visible; width: auto; margin: 0 0 0 0; padding: 0 0 0 0.75em; }
	/* класс для ul после которых нет li в родительских ветках */
	.treeview ul.l { border-left: 1px solid; margin-left: -1px; }
	.treeview li.cl ul { display: none; }
	.treeview li { margin: 0; padding: 0; }
	.treeview li li { margin: 0 0 0 0.5em; border-left: 1px dotted; padding: 0; }
	.treeview li div { position: relative; height: 1.5em; min-height: 16px; //height: 1.3em; }
	.treeview li li div { border-bottom: 1px dotted; }
	.treeview li p
	{
		position: absolute; z-index: 1; top: 0.8em; //top: 0.65em; left: 1.75em;
		width: 100%; margin: 0; border-bottom: 1px dashed; padding: 0;
	}
	.treeview a { padding: 0.1em 0.2em; white-space: nowrap; //height: 1px; }
	.treeview img.i
	{
		border-right: 2px solid; border-bottom: 0.5em solid;
		margin-bottom: -0.5em; vertical-align: middle;
	}
	.treeview a.sc
	{
		position: absolute; top: 0.06em;
		margin-left: -1em; padding: 0; text-decoration: none;
	}

	/* colors */
	.treeview li p,
	.treeview img.i,
	.treeview .sc
	{ background: #f5f5ea; }
	.treeview ul.l,
	.treeview li p,
	.treeview img.i
	{ border-color: #f5f5ea; }
	.treeview ul li li,
	.treeview ul li li div
	{ border-color: #999999; }
	.treeview a,
	.treeview a.sc,
	.treeview a.sc:hover
	{ color: #000000; }
	.treeview a:hover
	{ color: #cc0000; }
</style>
<?php

require_once 'functions.php';

$fileManagerInfo = load_dir_files(__DIR__ . "/example_file_manager");
$html = getFileManagerHtml($fileManagerInfo);

?>


	<div class="treeview">
		<ul>
			<?=$html;?>
		</ul>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
	<script src="index.js"></script>
</html>