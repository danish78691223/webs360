document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Simulate sending OTP
    const userInput = document.getElementById('userInput').value;
    if (validateInput(userInput)) {
        document.getElementById('otpSection').classList.remove('hidden');
        document.getElementById('statusMessage').textContent = 'OTP sent to ' + userInput;
    } else {
        document.getElementById('statusMessage').textContent = 'Invalid email or mobile number';
    }
});

function validateInput(input) {
    // Simple email/mobile validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const mobilePattern = /^[0-9]{10}$/;
    return emailPattern.test(input) || mobilePattern.test(input);
}

function verifyOTP() {
    const otpInput = document.getElementById('otpInput').value;
    
    if (otpInput === '1234') { // Simulate OTP verification
        document.getElementById('statusMessage').textContent = 'OTP verified! You can now reset your password.';
        // Redirect to reset password page or handle password reset
    } else {
        document.getElementById('statusMessage').textContent = 'Invalid OTP, please try again.';
    }
}
