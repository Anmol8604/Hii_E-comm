if (document.getElementById('popUp')) {
    var popUp = document.getElementById('popUp');
    setTimeout(() => {
        popUp.style.display = 'none';
    }, 3000);
}

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

function complete() {
    console.log('complete');
    image();
    city();
    state();
    zip();
    gender();
    hobbies();

    if (document.querySelectorAll('.error-msg').length > 0) {
        return false;
    } else {
        var form = document.getElementById('submit');
        form.click();
    }
}

function image(){
    var child = document.getElementById('formFile');
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
    }
}

function city() {
    var child = document.getElementById('inputCity');
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
    }
}

function state() {
    var child = document.getElementById('inputState');
    var parent = child.parentNode;
    var input = child.value;
    if (parent.querySelector('.error-msg')) {
        child.classList.remove('border-danger');
        parent.querySelector('.error-msg').remove();
    }
    if (input == "Choose...") {
        var error = document.createElement('span')
        child.classList.add('border-danger');
        error.innerHTML = "this field is required";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
    }
}

function zip() {
    var child = document.getElementById('inputZip');
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
    }
}

function gender() {
    var child = document.getElementsByName('gender');
    var parent = child[0].parentNode.parentNode;
    var input = child[0].checked;
    if (parent.querySelector('.error-msg')) {
        parent.querySelector('.error-msg').remove();
    }
    if (!input) {
        var error = document.createElement('span')
        error.innerHTML = "this field is required";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
    }
}

function hobbies() {
    var child = document.getElementsByName('hobbies[]');
    var parent = child[0].parentNode.parentNode;
    var input1 = child[0].checked;
    var input2 = child[1].checked;
    var input3 = child[2].checked;
    var input4 = child[3].checked;

    var count = 0;
    if (input1) {
        count++;
    }
    if (input2) {
        count++;
    }
    if (input3) {
        count++;
    }
    if (input4) {
        count++;
    }

    if (parent.querySelector('.error-msg')) {
        parent.querySelector('.error-msg').remove();
    }
    if (count != 2) {
        var error = document.createElement('span')
        error.innerHTML = "Select any two hobbies";
        error.classList.add('error-msg', 'text-danger');
        parent.appendChild(error);
    }
}

document.getElementById('inputCountry').addEventListener('change', function() {
    document.getElementById('state').innerHTML = '';
    document.getElementById('city').innerHTML = '';
    document.getElementById('inputState').innerHTML = "<option value='Choose...' selected>Choose...</option>";
    document.getElementById('inputCity').innerHTML = "<option value='Choose...' selected>Choose...</option>";
    if (document.getElementById('inputCountry').value == 'Choose...') {
        document.getElementById('Country').innerHTML = 'Country is required';
    } else {
        var a = document.getElementById('inputCountry').value;
        document.getElementById('Country').innerHTML = '';

        const newLocal = '/Controller/ajax.state.php';
        jQuery.ajax({
            type: 'POST',
            url: newLocal,
            data: {
                methodName: 'state',
                countryVal: a
            },
            success: function(res) {
                var x = "<option value='Choose...' selected>Choose...</option>" + res;
                document.getElementById('inputState').innerHTML = x;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error: ' + textStatus, errorThrown); // Handle any errors
            }
        });
    }
});

document.getElementById('inputState').addEventListener('change', function() {
    var a = document.getElementById('inputCountry').value;
    var b = document.getElementById('inputState').value;
    document.getElementById('city').innerHTML = '';
    if (a == 'Choose...') {
        document.getElementById('state').innerHTML = 'Country is required';
    } else if (b == 'Choose...') {
        document.getElementById('state').innerHTML = 'State is required';
    } else {
        document.getElementById('Country').innerHTML = '';
        const newLocal = '/Controller/ajax.city.php';
        jQuery.ajax({
            type: 'POST',
            url: newLocal,
            data: {
                methodName: 'city',
                stateVal: b
            },
            success: function(res) {
                var x = "<option value='Choose...' selected>Choose...</option>" + res;
                document.getElementById('inputCity').innerHTML = x;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error: ' + textStatus, errorThrown); // Handle any errors
            }
        });
    }
});


function addVendor() {

    var formData = new FormData(document.getElementById('venForm')); // Create a new FormData object
    let flag = true;
    // First Name
    let fname = formData.get('fname');
    if (fname == null || fname == '') {
        flag = false;
        document.getElementById('fname').innerHTML = 'First Name is required';
    } else if (fname.length < 3 || fname.length > 20) {
        flag = false;
        document.getElementById('fname').innerHTML = 'First Name must be between 3 to 20 characters';
    } else if (!/^[a-zA-Z-' ]*$/.test(fname)) {
        flag = false;
        document.getElementById('fname').innerHTML = 'Only letters and spaces allowed in Name';
    } else {
        document.getElementById('fname').innerHTML = "";
    }
    // Last Name
    let lname = formData.get('lname');
    if (lname == null || lname == '') {
        flag = false;
        document.getElementById('lname').innerHTML = 'Last Name is required';
    } else if (lname.length < 3 || lname.length > 20) {
        flag = false;
        document.getElementById('lname').innerHTML = 'Last Name must be between 3 to 20 characters';
    } else if (!/^[a-zA-Z-' ]*$/.test(lname)) {
        flag = false;
        document.getElementById('lname').innerHTML = 'Only letters and spaces allowed in Name';
    } else {
        document.getElementById('lname').innerHTML = "";
    }

    // Email
    let email = formData.get('email');
    if (email == null || email == '') {
        flag = false;
        document.getElementById('email').innerHTML = 'Email is required';
    } else if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
        flag = false;
        document.getElementById('email').innerHTML = 'Invalid Email format';
    } else {
        document.getElementById('email').innerHTML = "";
    }
    // Phone
    let phone = formData.get('phone');
    if (phone == null || phone == '') {
        flag = false;
        document.getElementById('phone').innerHTML = 'Phone is required';
    } else if (!/^[0-9]*$/.test(phone)) {
        flag = false;
        document.getElementById('phone').innerHTML = 'Only numbers allowed in Phone';
    } else {
        document.getElementById('phone').innerHTML = "";
    }
    // Country
    let country = document.getElementById('inputCountry').options[document.getElementById('inputCountry').selectedIndex].text;
    if (country == null || country == 'Choose...') {
        flag = false;
        document.getElementById('Country').innerHTML = 'Country is required';
    } else {
        document.getElementById('Country').innerHTML = "";
    }
    // State
    let state = document.getElementById('inputState').options[document.getElementById('inputState').selectedIndex];
    console.log(state);
    if (state == null || state == 'Choose...') {
        flag = false;
        document.getElementById('state').innerHTML = 'State is required';
    } else {
        document.getElementById('state').innerHTML = "";
    }
    // City
    let city = document.getElementById('inputCity').options[document.getElementById('inputCity').selectedIndex];
    console.log(city);
    if (city == null || city == '') {
        flag = false;
        document.getElementById('city').innerHTML = 'City is required';
    } else {
        document.getElementById('city').innerHTML = "";
    }
    // Zip
    let zip = formData.get('zip');
    if (zip == null || zip == '') {
        flag = false;
        document.getElementById('zip').innerHTML = 'Zip is required';
    } else if (!/^[0-9]*$/.test(zip)) {
        flag = false;
        document.getElementById('zip').innerHTML = 'Only numbers allowed in Zip';
    } else {
        document.getElementById('zip').innerHTML = "";
    }
    // Business Type
    let businessT = formData.get('businessT');
    if (businessT == null || businessT == 'Choose...') {
        flag = false;
        document.getElementById('businessT').innerHTML = 'Business Type is required';
    } else {
        document.getElementById('businessT').innerHTML = "";
    }
    // Business Name
    let Bname = formData.get('Bname');
    if (Bname == null || Bname == '') {
        flag = false;
        document.getElementById('Bname').innerHTML = 'Business Name is required';
    } else {
        document.getElementById('Bname').innerHTML = "";
    }
    if (flag) {
        jQuery.ajax({
            url: 'action.php',
            type: 'POST',
            data: {
                methodName: 'addVendor',
                fname: fname,
                lname: lname,
                email: email,
                phone: phone,
                country: country,
                state: state,
                city: city,
                zip: zip,
                businessT: businessT,
                Bname: Bname
            },
            success: function(res) {
                if (res == "Email already exists<br>") {
                    document.getElementById('email').innerHTML = 'Email already exists';
                } else if (res == "Please fill the city<br>") {
                    document.getElementById('city').innerHTML = 'City is required';
                } else {
                    console.log(res);
                    window.location.href = 'vendor.php';
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error: ' + textStatus, errorThrown); // Handle any errors
            }
        });
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
        const newLocal = '/Controller/ajax.VerifyEmail.php';

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