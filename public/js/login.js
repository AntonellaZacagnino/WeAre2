window.addEventListener("load", function() {
  var form = document.querySelector('form');
  var nameInput = document.getElementById('name');
  var userInput = document.getElementById('user');
  var emailInput = document.getElementById('email');
  var passwordInput = document.getElementById('password');

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


  userInput.onblur = function () {
  	var inputValue = this.value.trim();
  	var alertMsg = this.parentElement.querySelector('.invalid-feedback');
  	if (inputValue === '' || inputValue.length < 3) {
  		this.classList.add('is-invalid');
  		alertMsg.innerHTML = 'El usuario no puede estar vacío';
  	} else {
  		this.classList.remove('is-invalid');
  		this.classList.add('is-valid');
  		alertMsg.innerHTML = '';
  	}
  };

  nameInput.onblur = function () {
    var inputValue = this.value.trim();
    var alertMsg = this.parentElement.querySelector('.invalid-feedback');
    if (inputValue === '' || inputValue.length < 3) {
      this.classList.add('is-invalid');
      alertMsg.innerHTML = 'El nombre no puede estar vacío';
    } else {
      this.classList.remove('is-invalid');
      this.classList.add('is-valid');
      alertMsg.innerHTML = '';
    }
  };

  passwordInput.onblur = function () {
  	var inputValue = this.value.trim();
  	var alertMsg = this.parentElement.querySelector('.invalid-feedback');
  	if (inputValue === '' || inputValue.length < 3) {
  		this.classList.add('is-invalid');
  		alertMsg.innerHTML = 'La contraseña no puede estar vacía';
  	} else {
  		this.classList.remove('is-invalid');
  		this.classList.add('is-valid');
  		alertMsg.innerHTML = '';
  	}
  };

  var regexEmail = /\S+@\S+\.\S+/;

  emailInput.onblur = function () {
  	var inputValue = this.value.trim();
  	var alertMsg = this.parentElement.querySelector('.invalid-feedback');
  	if (inputValue === '') {
  		this.classList.add('is-invalid');
  		alertMsg.innerHTML = 'El correo no puede estar vacío';
  	} else if (!regexEmail.test(inputValue)) {
  		this.classList.add('is-invalid');
  		alertMsg.innerHTML = 'El formato de correo no es un email valido';
  	} else {
  		this.classList.remove('is-invalid');
  		this.classList.add('is-valid');
  		alertMsg.innerHTML = '';
  	}
  };

}
