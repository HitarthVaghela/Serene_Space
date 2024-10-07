const dateButtons = document.querySelectorAll('.date-btn');
const timeButtons = document.querySelectorAll('.time-btn');
const proceedBtn = document.querySelector('.proceed-btn');
const ageCheck = document.querySelector('#ageCheck');
const termsCheck = document.querySelector('#termsCheck');
const nameField = document.querySelector('#nameField');
const emailField = document.querySelector('#emailField');

let selectedDate = null;
let selectedTime = null;

dateButtons.forEach(btn => {
    btn.addEventListener('click', function() {
        if (this.classList.contains('disabled')) return;
        dateButtons.forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
        selectedDate = this.innerText;
        checkProceedStatus();
    });
});

timeButtons.forEach(btn => {
    btn.addEventListener('click', function() {
        timeButtons.forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
        selectedTime = this.innerText;
        checkProceedStatus();
    });
});

function checkProceedStatus() {
    if (selectedDate && selectedTime && ageCheck.checked && termsCheck.checked && nameField.value && emailField.value) {
        proceedBtn.classList.add('active');
        proceedBtn.classList.remove('disabled');
        proceedBtn.disabled = false;
        proceedBtn.style.cursor = 'pointer';
    } else {
        proceedBtn.classList.remove('active');
        proceedBtn.classList.add('disabled');
        proceedBtn.disabled = true;
        proceedBtn.style.cursor = 'not-allowed';
    }
}

ageCheck.addEventListener('change', checkProceedStatus);
termsCheck.addEventListener('change', checkProceedStatus);
nameField.addEventListener('input', checkProceedStatus);
emailField.addEventListener('input', checkProceedStatus);
