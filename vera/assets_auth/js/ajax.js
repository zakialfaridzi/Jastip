// ambil elements yg di buutuhkan
var keyword = document.getElementById('pilih');

var container = document.getElementById('ctn');

// tambahkan event ketika keyword ditulis

keyword.addEventListener('change', function () {


	//buat objek ajax
	var xhr = new XMLHttpRequest();

	// cek kesiapan ajax
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			container.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET', 'http://localhost/vera/auth/hasilAjaxReg/' + keyword.value, true);
	xhr.send();


})
