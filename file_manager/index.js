function aj(oper, param, url_me, callback, async) {
	async = async || false;
	oper = oper || "";
	param = param || '';
	url_me = url_me || "ajax.php";

	let sended = "oper=" + oper + '&' + param;
	waitRequest = true;
	$.ajax({ url: url_me,
		type: "POST", dataType: "html", data: sended,
		success: function(data) {
			waitRequest = false;

			if (callback) callback(data);
		},
		complete: function() {
			waitRequest = false;	
		},
		async: async, cache: false
	});
}

function UnHide(elem) {
	if (elem.innerHTML.charCodeAt(0) == 9658 ) {
		elem.innerHTML = '&#9660;'
		elem.parentNode.parentNode.parentNode.className = '';
	} else {
		elem.innerHTML = '&#9658;'
		elem.parentNode.parentNode.parentNode.className = 'cl';
	}
	return false;
}

$("body").on('click', ".folder", function() {
	let folder_path = $(this).data('folder-path');
	if (folder_path == "") return false;

	$(this).removeClass('folder');
	var $this = $(this);
	aj('load_dir_files', $.param({folder_path}), "", function(data) {
		data = JSON.parse(data);
		$this.closest('li').append("<ul>" + data['html'] + "</ul>");
	});
});