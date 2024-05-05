function login() {
    emaili();
    loginPassword();
    if (document.querySelectorAll('.error-msg').length > 0) {
        return false;
    } else {
        var form = document.getElementById('submit');
        form.click();
    }
}

function register() {
    fname();
    lname();
    phone();
    password();
    password2();
    terms();
    if (emaili()) {
        return false;
    } else {
        email().then(a => {
            if (document.querySelectorAll('.error-msg').length > 0) {
                return false;
            } else {
                var form = document.getElementById('submit');
                form.click();
            }
        });
    }
}

function loginPassword() {
    var child = document.getElementById('password');
    var parent = child.parentNode;
    var input = child.value;
    if (parent.querySelector('.error-msg')) {
        child.classList.remove('border-danger');
        parent.querySelector('.error-msg').remove();
    } 
    if (input == "") {
        var error = document.createElement('span')
        child.classList.add('border-danger');
        error.innerHTML = "this field is required";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
        return true;
    }
    return false;  
}


if (document.getElementById('popUp')) {
    var popUp = document.getElementById('popUp');
    setTimeout(() => {
        popUp.style.display = 'none';
    }, 3000);
}

function emaili() {
    var child = document.getElementById('email');
    var parent = child.parentNode;
    var input = child.value;
    if (parent.querySelector('.error-msg')) {
        child.classList.remove('border-danger');
        parent.querySelector('.error-msg').remove();
    }
    if (input == "") {
        var error = document.createElement('span')
        child.classList.add('border-danger');
        error.innerHTML = "this field is required";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
        return true;
    }
    return false;
}


function name(child) {
    var parent = child.parentNode;
    var input = child.value;

    if (parent.querySelector('.error-msg')) {
        child.classList.remove('border-danger');
        parent.querySelector('.error-msg').remove();
    }

    if (input == "") {
        var error = document.createElement('span')
        child.classList.add('border-danger');
        error.innerHTML = "this field is required";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
    } else if (input.length < 3) {
        var error = document.createElement('span')
        child.classList.add('border-danger');
        error.innerHTML = "Name must have 3 characters";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
    } else if (input.length > 20) {
        var error = document.createElement('span')
        child.classList.add('border-danger');
        error.innerHTML = "Name must have less than 20 characters";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
    }
}

function fname() {
    var child = document.getElementById('fname');
    name(child);
}

function lname() {
    var child = document.getElementById('lname');
    name(child);
}


function email() {
    return new Promise((resolve, reject) => {
        const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var child = document.getElementById('email');
        var parent = child.parentNode;
        var input = child.value;
        if (parent.querySelector('.error-msg')) {
            child.classList.remove('border-danger');
            parent.querySelector('.error-msg').remove();
        }
        const newLocal = 'VerifyEmail.php';

        jQuery.ajax({
            url: newLocal,
            type: 'POST',
            data: {
                email: input
            },
            success: function (response) {
                if (response == 'Success') {
                    helper(child);
                    resolve(true);
                } else {
                    resolve(false);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                reject(new Error('AJAX request failed: ' + textStatus));
            }
        });
    });
}

email().then(bool => {
    return bool;
}).catch(error => {
    console.error(error); // This will log any errors that occurred during the AJAX request
});

function helper(child) {
    var error = document.createElement('span')
    var parent = child.parentNode;
    child.classList.add('border-danger');
    error.innerHTML = "Email already exists";
    error.classList.add('error-msg', 'text-danger');
    parent.appendChild(error);
    const bool = true;
    return bool;
}

function phone() {
    const regex = /^[0-9]{10}$/;
    var child = document.getElementById('phone');
    var parent = child.parentNode;
    var input = child.value;
    if (parent.querySelector('.error-msg')) {
        child.classList.remove('border-danger');
        parent.querySelector('.error-msg').remove();
    }
    if (!regex.test(input)) {
        var error = document.createElement('span')
        child.classList.add('border-danger');
        error.innerHTML = "Invalid phone number";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
    }
}

function password() {
    const regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
    var child = document.getElementById('password');
    var parent = child.parentNode;
    var input = child.value;
    if (parent.querySelector('.error-msg')) {
        child.classList.remove('border-danger');
        parent.querySelector('.error-msg').remove();
    }
    if (!regex.test(input)) {
        var error = document.createElement('span')
        child.classList.add('border-danger');
        error.innerHTML = "Weak password";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
    }
}

function password2() {
    var child = document.getElementById('password2');
    var parent = child.parentNode;
    var input = child.value;
    if (parent.querySelector('.error-msg')) {
        child.classList.remove('border-danger');
        parent.querySelector('.error-msg').remove();
    }
    if (input !== document.getElementById('password').value || input == "") {
        var error = document.createElement('span')
        child.classList.add('border-danger');
        error.innerHTML = "Passwords do not match";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
    }
}

function terms() {
    var child = document.getElementById('terms');
    var parent = child.parentNode;
    if (parent.querySelector('.error-msg')) {
        child.classList.remove('border-danger');
        parent.querySelector('.error-msg').remove();
    }
    if (!child.checked) {
        var error = document.createElement('span')
        child.classList.add('border-danger');
        error.innerHTML = "You must agree to the terms";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
    }
}
