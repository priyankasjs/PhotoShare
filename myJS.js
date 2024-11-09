function validate(){

	clearErrors();

  //declare variables in js with the keyword let

	let valid = true;

  //validating username

  let user_element = document.getElementById('user_name');
  //retrieves the input object with id user_name

  let user_regex = /^[a-zA-Z0-9_-]{4,30}$/;

  if (!user_regex.test(user_element.value)){
    user_element.value = "";
    user_element.focus();
    user_element.style.backgroundColor = "#890620";

    // write a message directly onto the web page using the innerHTML property

		var user_err = document.getElementById('userErr');

    user_err.innerHTML = "Username must only contain no less than 4 characters, letters, numbers, _, and -.";

    valid = false;
  }

  //validating email
  let email_element = document.getElementById('email');
  //retrieves the input object with id email

  let email_regex = /^[a-zA-Z0-9.]{2,30}@[a-zA-Z0-9.]{2,20}.[a-zA-Z]{2,4}$/;

  if (!email_regex.test(email_element.value)){
    email_element.value = "";
    email_element.focus();
    email_element.style.backgroundColor = "#890620";

    // write a message directly onto the web page using the innerHTML property

		var email_err = document.getElementById('emailErr');

    email_err.innerHTML = "Invalid email address entered.";

    valid = false;
  }

  //validating password
  let pword_element = document.getElementById('pword');
  //retrieves the input object with id pword

  let pword_regex = /^[a-zA-Z0-9@&!*%$]{10,60}$/;

  if (!pword_regex.test(pword_element.value)){
    pword_element.value = "";
    pword_element.focus();
    pword_element.style.backgroundColor = "#890620";

    // write a message directly onto the web page using the innerHTML property

		var pword_err = document.getElementById('pwordErr');

    pword_err.innerHTML = "Password must only contain letters, numbers, @, &, !, *, %, and $.";

    valid = false;
  }

  //validating first name
  let fn_element = document.getElementById('fname');
  //retrieves the input object with id fname

  let fn_regex = /^[a-zA-Z'!-]{2,30}$/;

  if (!fn_regex.test(fn_element.value)){
    fn_element.value = "";
    fn_element.focus();
    fn_element.style.backgroundColor = "#890620";

    // write a message directly onto the web page using the innerHTML property

		var fn_err = document.getElementById('fnErr');

    fn_err.innerHTML = "First name must only contain letters, ', !, and -.";

    valid = false;
  }

  //validating last name
  let ln_element = document.getElementById('lname');
  //retrieves the input object with id lname

  let ln_regex = /^[a-zA-Z'!-]{2,50}$/;

  if (!ln_regex.test(ln_element.value)){
    ln_element.value = "";
    ln_element.focus();
    ln_element.style.backgroundColor = "#890620";

    // write a message directly onto the web page using the innerHTML property

		var ln_err = document.getElementById('lnErr');

    ln_err.innerHTML = "Last name must only contain letters, ', !, and -.";

    valid = false;
  }

  //validating age
  let age_element = document.getElementById('age');
  //retrieves the input object with id age

  let age_regex = /^[0-9]{2,3}$/;

  if (!age_regex.test(age_element.value)){
    age_element.value = "";
    age_element.focus();
    age_element.style.backgroundColor = "#890620";

    // write a message directly onto the web page using the innerHTML property

		var age_err = document.getElementById('ageErr');

    age_err.innerHTML = "Age must only contain numbers.";

    valid = false;
  }

  //validating phone number
  let phone_element = document.getElementById('phone');
  //retrieves the input object with id phone

  let phone_regex = /^\([0-9]{3}\)[0-9]{3}\-[0-9]{4}$/;

  if (!phone_regex.test(phone_element.value)){
    phone_element.value = "";
    phone_element.focus();
    phone_element.style.backgroundColor = "#890620";

    // write a message directly onto the web page using the innerHTML property

		var phone_err = document.getElementById('phoneErr');

    phone_err.innerHTML = "Phone number must be in the format: (000)000-0000.";

    valid = false;
  }
}

function clearErrors(){
	var errors = document.getElementsByClassName('error');
	for(var i = 0; i < errors.length; i++){
		errors[i].innerHTML = "";
	} 
}