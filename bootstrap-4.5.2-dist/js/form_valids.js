
function validateName() {

    var name = document.getElementById('contact-name').value;
  
    if(name.length == 0) {
  
      producePrompt('Name is required', 'name-error' , 'red')
      return false;
  
    }
  
    if (!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {
  
      producePrompt('First and last name, please.','name-error', 'red');
      return false;
  
    }
  
    producePrompt('Valid', 'name-error', 'green');
    return true;
  
  }
  
  function validatePhone() {
  
    var phone = document.getElementById('contact-phone').value;
  
      if(phone.length == 0) {
        producePrompt('Phone number is required.', 'phone-error', 'red');
        return false;
      }
  
      if(phone.length != 10) {
        producePrompt('Please enter correct Phone number. ', 'phone-error', 'red');
        return false;
      }
  
      if(!phone.match(/^[0-9]{10}$/)) {
        producePrompt('Only digits, please.' ,'phone-error', 'red');
        return false;
      }
  
      producePrompt('Valid', 'phone-error', 'green');
      return true;
  
  }
  
  function validateEmail () {
  
    var email = document.getElementById('contact-email').value;
  
    if(email.length == 0) {
  
      producePrompt('Please enter valid Email Address','email-error', 'red');
      return false;
  
    }
  
    if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
  
      producePrompt('Please enter valid Email Address', 'email-error', 'red');
      return false;
  
    }
  
    producePrompt('Valid', 'email-error', 'green');
    return true;
  
  }
  
  function validateMessage() {
    var message = document.getElementById('contact-message').value;
    var required = 10;
    var left = required - message.length;
    

    if (left > 0) {
      producePrompt(left + ' more characters required','message-error','red');
      return false;
    }
    
    producePrompt('Valid', 'message-error', 'green');
    return true;
  
  }
  
  function validatePwd () {
  
    var pwd = document.getElementById('contact-pwd').value;
    var str = 'NULL';
    
    if(pwd.length == 0) {
      producePrompt('Password is required.', 'pwd-error', 'red');
      return false;
    }
    

    if(!pwd.match(/[a-z]/g) ) {
      producePrompt('Please enter lowercase characters', 'pwd-error', 'red');
      return false;    

    }
    if(!pwd.match(/[A-Z]/g) ) {
      producePrompt('Please enter uppercase characters', 'pwd-error', 'red');
      return false;    

    }

    if(!pwd.match(/[0-9]/g) ) {
      producePrompt('Please enter digits', 'pwd-error', 'red');
      return false;    

    }

    if(!pwd.match(/[^a-zA-Z\d]/g) ) {
      producePrompt('Please enter at least 1 special character', 'pwd-error', 'red');
      return false;    

    }

    if(pwd.length <= 6) {
      producePrompt('Minimum password length should be 6', 'pwd-error', 'red');
      return false;
    }

    producePrompt('Valid', 'pwd-error', 'green');
    return true;

  }


  function validateForm() {
    if (!validateName() || !validatePhone() || !validateEmail() || !validateMessage() || !validatePwd()) {
        jsShow('submit-error');
        producePrompt('Please fix errors to submit.', 'submit-error', 'red');
        setTimeout(function(){jsHide('submit-error');}, 2000);
        return false;
    }
}

  function jsShow(id) {
    document.getElementById(id).style.display = 'block';
  }
  
  function jsHide(id) {
    document.getElementById(id).style.display = 'none';
  }
  
  
  
  
  function producePrompt(message, promptLocation, color) {
  
    document.getElementById(promptLocation).innerHTML = message;
    document.getElementById(promptLocation).style.color = color;
  
  
  }