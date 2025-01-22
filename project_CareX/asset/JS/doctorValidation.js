function validateDoctorForm() {
    const phone = document.getElementById('phone').value.trim();
    const email = document.getElementById('email').value.trim();
    const name = document.getElementById('name').value.trim();
    const availableTime = document.getElementById('available_time').value.trim();
    const speciality = document.getElementById('speciality').value.trim();
    const hospital = document.getElementById('hospital').value.trim();
    const password = document.getElementById('password').value.trim();

    if (!phone || !email || !name || !availableTime || !speciality || !hospital || !password) {
        alert('All fields are required.');
        return false;
    }

    if (isNaN(phone)) {
        alert('Phone number must be numeric.');
        return false;
    }

    if (password.length < 6) {
        alert('Password must be at least 6 characters long.');
        return false;
    }

    return true;
}
