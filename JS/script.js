// Register Form Submission
$('#registrationForm').submit(function(event) {
    event.preventDefault();
    var fullName = $('#fullName').val();
    var mobileNumber = $('#mobileNumber').val();
    var emailAddress = $('#emailAddress').val();
    var password = $('#password').val();

    // Client-side validation
    if (!validateFullName(fullName)) {
        alert("Please enter a valid full name.");
        return;
    }
    if (!validateMobileNumber(mobileNumber)) {
        alert("Please enter a valid 10-digit mobile number.");
        return;
    }
    if (!validateEmail(emailAddress)) {
        alert("Please enter a valid email address.");
        return;
    }
    if (!validatePassword(password)) {
        alert("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
        return;
    }

    // AJAX call to register.php
    $.ajax({
        type: 'POST',
        url: '../Php/data.php',
        data: {
            fullName: fullName,
            mobileNumber: mobileNumber,
            emailAddress: emailAddress,
            password: password
        },
        success: function(response) {
            alert("Registration successful! Please login to continue.");
            window.location.href = 'login.html';
        },
        error: function(xhr, status, error) {
            alert("Registration failed: " + xhr.responseText);
        }
    });
});

// Login Form Submission
$('#loginForm').submit(function(event) {
    event.preventDefault();
    var usernameOrEmail = $('#usernameOrEmail').val();
    var password = $('#password').val();

    // AJAX call to login.php
    $.ajax({
        type: 'POST',
        url: '../Php/login.php',
        data: {
            usernameOrEmail: usernameOrEmail,
            password: password
        },
        success: function(response) {
            alert("Login successful!");
            window.location.href = 'profile.html';
        },
        error: function(xhr, status, error) {
            alert("Login failed: " + xhr.responseText);
        }
    });
});

// Profile Form Submission
$('#profileForm').submit(function(event) {
    event.preventDefault();
    // Fetch all form data
    var formData = {
        firstName: $('#firstName').val(),
        lastName: $('#lastName').val(),
        password: $('#password').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        address: $('#address').val(),
        nation: $('#nation').val(),
        gender: $('#gender').val(),
        language: $('#language').val(),
        dobMonth: $('#dobMonth').val(),
        dobDay: $('#dobDay').val(),
        dobYear: $('#dobYear').val(),
        twitter: $('#twitter').val(),
        linkedin: $('#linkedin').val(),
        facebook: $('#facebook').val()
    };

    // AJAX call to update profile.php
    $.ajax({
        type: 'POST',
        url: '../Php/profile.php',
        data: formData,
        success: function(response) {
            alert("Profile updated successfully!");
            // Optional: Update displayed profile details without reloading the page
        },
        error: function(xhr, status, error) {
            alert("Profile update failed: " + xhr.responseText);
        }
    });
});

// Client-side validation functions
function validateFullName(fullName) {
    return fullName.trim().length > 0;
}

function validateMobileNumber(mobileNumber) {
    var regex = /^\d{10}$/;
    return regex.test(mobileNumber);
}

function validateEmail(email) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function validatePassword(password) {
    var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
    return regex.test(password);
}
