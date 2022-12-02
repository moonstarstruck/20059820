/* name the variables */
var nameError = document.getElementById('name-error');
var emailError = document.getElementById('email-error');
var messageError = document.getElementById('message-error');
var submitError = document.getElementById('submit-error');

/* call the function on name*/
function validateName() {
    var name = document.getElementById('contact-name').value;

    if (name.length == 0) { /* if name is empty */
        nameError.innerHTML = 'Name is required';
        return false;
    }
    if (!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) { /* if name is not valid */
        nameError.innerHTML = 'Please enter your first and last name';
        return false;
    } else { /* if name is valid */
        nameError.innerHTML = '';
        return true;
    }
}

/* call the function on email */
function validateEmail() {
    var email = document.getElementById('contact-email').value;

    if (email.length == 0) { /* if email is empty */
        emailError.innerHTML = 'Email is required';
        return false;
    }
    if (!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) { 
        /* if email is not valid */
        emailError.innerHTML = 'Invalid email';
        return false;
    } else { /* if email is valid */
        emailError.innerHTML = '';
        return true;
    }
}

/* call the function on message */
function validateMessage() {
    var message = document.getElementById('contact-message').value;
    var required = 10; /* minimum required characters */
    var left = required - message.length; /* characters left */

    if (left > 0) { /* if message is empty */
        messageError.innerHTML = left + ' more characters required';
        return false;
    } else { /* if message is valid */
        messageError.innerHTML = '';
        return true;
    }
}

/* call the function on submit */
function validateForm() { /* if all fields are not valid */
    if (!validateName() || !validateEmail() || !validateMessage()) {
        submitError.innerHTML = 'Please fix the errors above';
        return false;
    } else { /* if all fields are valid */
        alert("Thank you for your message. We will get back to you soon.");
        return true;
    }
}


