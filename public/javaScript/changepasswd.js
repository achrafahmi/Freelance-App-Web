 // Client-side validation using JavaScript
 document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
    var newPasswordInput = document.getElementById('newPassword');
    var renewPasswordInput = document.getElementById('renewPassword');
    var newPasswordError = document.getElementById('newPasswordError');
    var renewPasswordError = document.getElementById('renewPasswordError');

    // Reset previous error states
    newPasswordInput.classList.remove('error');
    renewPasswordInput.classList.remove('error');
    newPasswordError.innerText = '';
    renewPasswordError.innerText = '';

    if (newPasswordInput.value.length < 8) {
      newPasswordInput.classList.add('error');
      newPasswordError.innerText = 'New password must be at least 8 characters long.';
      event.preventDefault(); // Prevent form submission
    }

    if (newPasswordInput.value !== renewPasswordInput.value) {
      renewPasswordInput.classList.add('error');
      renewPasswordError.innerText = 'Passwords do not match.';
      event.preventDefault(); // Prevent form submission
    }
  });