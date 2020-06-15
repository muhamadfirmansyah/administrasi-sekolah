var buttonSave = document.getElementById('modalsave');
var filexl = document.getElementById('filexl');

buttonSave.addEventListener('click', function(){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			xhr.responseText;
		}
	}

	console.log(xhr);
	xhr.open('GET', 'ajax/upload.php?file=' + filexl.value, true);
	xhr.send();
});