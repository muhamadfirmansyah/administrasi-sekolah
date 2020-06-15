var button = document.getElementById('cari');
var nis = document.getElementById('nis')
var nama = document.getElementById('formNama');
var biaya = document.getElementById('biaya');


button.addEventListener('click', function () {
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200) {
			nama.innerHTML = xhr.responseText;
		}
	}

	
	xhr.open('GET', 'ajax/nama.php?nis=' + nis.value, true);
	xhr.send();
});

button.addEventListener('click', function(){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			biaya.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET', 'ajax/biaya.php?nis=' + nis.value, true);
	xhr.send();
});

