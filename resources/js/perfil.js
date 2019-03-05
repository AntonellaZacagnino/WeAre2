console.log('prueba');
var form = document.querySelector('form');
// console.log(theForm.elements);
var countriesSelect = document.getElementById('country');
var citiesSelect = document.getElementById('cities');
var usernameInput = document.getElementById('username');
var emailInput = document.getElementById('email');
var passwordInput = document.getElementById('password');
var citiesCol = document.getElementById('citiesCol');

function fetchCall (url, callback) {
	window.fetch(url)
		.then(function (response) {
			return response.json();
		})
		.then(function (data) {
			callback(data);
		})
		.catch(function (error) {
			console.log(error);
		});
}

function fillCitiesSelect (data) {
	for (var oneCity of data) {
		citiesSelect.innerHTML += '<option>' + oneCity.state + '</option>';
	}
}

function fillCountrySelect (data) {
	for (var oneCountrie of data) {
		countriesSelect.innerHTML += '<option>' + oneCountrie.name + '</option>';
	}
}

fetchCall('https://restcountries.eu/rest/v2/all', fillCountrySelect);


var regexEmail = /\S+@\S+\.\S+/;

emailInput.onblur = function () {
	var inputValue = this.value.trim();
	var alertMsg = this.parentElement.querySelector('.invalid-feedback');
	if (inputValue === '') {
		this.classList.add('is-invalid');
		alertMsg.innerHTML = 'El <b>correo</b> no puede estar vacío';
	} else if (!regexEmail.test(inputValue)) {
		this.classList.add('is-invalid');
		alertMsg.innerHTML = 'El formato de correo no es un email valido';
	} else {
		this.classList.remove('is-invalid');
		this.classList.add('is-valid');
		alertMsg.innerHTML = '';
	}
};

countriesSelect.onchange = function () {
	if (this.value === 'Argentina') {
		citiesCol.classList.remove('hidden');
		fetchCall('https://dev.digitalhouse.com/api/getProvincias', fillCitiesSelect);
	} else {
		citiesCol.classList.add('hidden');
		citiesSelect.innerHTML = '';
	}
};
