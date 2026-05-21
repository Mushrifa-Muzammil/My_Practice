function validateForm() {
    // Clear previous errors
    clearErrors();
    let isValid = true;
    const errors = [];

    // Validate Name
    const name = document.getElementById('name').value.trim();
    if (!name) {
        showError('nameError', 'Name is required');
        markInvalid('name');
        isValid = false;
        errors.push('Name is required');
    } else if (!/^[a-zA-Z\s'-]+$/.test(name)) {
        showError('nameError', 'Only letters, spaces, hyphens and apostrophes allowed');
        markInvalid('name');
        isValid = false;
    } else {
        markValid('name');
    }

    // Validate Email
    const email = document.getElementById('email').value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email) {
        showError('emailError', 'Email is required');
        markInvalid('email');
        isValid = false;
        errors.push('Email is required');
    } else if (!emailPattern.test(email)) {
        showError('emailError', 'Invalid email format');
        markInvalid('email');
        isValid = false;
    } else {
        markValid('email');
    }

    // Validate Contact
    const contact = document.getElementById('contact').value.trim();
    const phonePattern = /^[\+]?[0-9\s\-\(\)]{10,}$/;
    if (!contact) {
        showError('contactError', 'Contact number is required');
        markInvalid('contact');
        isValid = false;
        errors.push('Contact number is required');
    } else if (!phonePattern.test(contact)) {
        showError('contactError', 'Invalid phone number format');
        markInvalid('contact');
        isValid = false;
    } else {
        markValid('contact');
    }

    // Validate Date of Birth
    const dob = document.getElementById('dob').value;
    if (!dob) {
        showError('dobError', 'Date of birth is required');
        markInvalid('dob');
        isValid = false;
        errors.push('Date of birth is required');
    } else {
        const birthDate = new Date(dob);
        const today = new Date();
        const age = today.getFullYear() - birthDate.getFullYear();
        
        if (age < 18) {
            showError('dobError', 'You must be at least 18 years old');
            markInvalid('dob');
            isValid = false;
        } else {
            markValid('dob');
        }
    }

    // Validate Position
    const position = document.getElementById('position').value;
    if (!position) {
        showError('positionError', 'Please select a position');
        markInvalid('position');
        isValid = false;
        errors.push('Please select a position');
    } else {
        markValid('position');
    }

    // Validate Resume
    const resume = document.getElementById('resume').files[0];
    if (!resume) {
        showError('resumeError', 'Resume is required');
        markInvalid('resume');
        isValid = false;
        errors.push('Resume is required');
    } else {
        const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        const maxSize = 2 * 1024 * 1024; // 2MB
        
        if (!allowedTypes.includes(resume.type)) {
            showError('resumeError', 'Only PDF and DOC files are allowed');
            markInvalid('resume');
            isValid = false;
        } else if (resume.size > maxSize) {
            showError('resumeError', 'File size must be less than 2MB');
            markInvalid('resume');
            isValid = false;
        } else {
            markValid('resume');
        }
    }

    // Validate LinkedIn URL (optional)
    const linkedin = document.getElementById('linkedin').value.trim();
    if (linkedin) {
        const urlPattern = /^(https?:\/\/)?(www\.)?linkedin\.com\/in\/[a-zA-Z0-9-]+\/?$/;
        if (!urlPattern.test(linkedin)) {
            showError('linkedinError', 'Invalid LinkedIn profile URL');
            markInvalid('linkedin');
            isValid = false;
        } else {
            markValid('linkedin');
        }
    }

    // Validate Experience
    const experience = document.getElementById('experience').value;
    if (!experience) {
        showError('experienceError', 'Experience is required');
        markInvalid('experience');
        isValid = false;
        errors.push('Experience is required');
    } else if (experience < 0 || experience > 50) {
        showError('experienceError', 'Experience must be between 0 and 50 years');
        markInvalid('experience');
        isValid = false;
    } else {
        markValid('experience');
    }

    // Validate Skills
    const skillsCheckboxes = document.querySelectorAll('input[name="skills[]"]:checked');
    if (skillsCheckboxes.length === 0) {
        showError('skillsError', 'Please select at least one skill');
        isValid = false;
        errors.push('Please select at least one skill');
    }

    // Show all errors at the top if form is invalid
    if (!isValid) {
        const errorContainer = document.getElementById('error-messages');
        errorContainer.innerHTML = '<strong>Please fix the following errors:</strong><ul>' + 
            errors.map(error => `<li>${error}</li>`).join('') + '</ul>';
        errorContainer.style.display = 'block';
        errorContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    return isValid;
}

function showError(elementId, message) {
    const element = document.getElementById(elementId);
    if (element) {
        element.textContent = message;
    }
}

function clearErrors() {
    // Clear error messages
    const errorElements = document.querySelectorAll('.error');
    errorElements.forEach(element => {
        element.textContent = '';
    });
    
    // Clear error container
    const errorContainer = document.getElementById('error-messages');
    errorContainer.style.display = 'none';
    
    // Clear validation styles
    const inputs = document.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.classList.remove('invalid', 'valid');
    });
}

function markInvalid(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        element.classList.add('invalid');
        element.classList.remove('valid');
    }
}

function markValid(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        element.classList.add('valid');
        element.classList.remove('invalid');
    }
}

// Real-time validation
document.addEventListener('DOMContentLoaded', function() {
    const formElements = document.querySelectorAll('#jobForm input, #jobForm select, #jobForm textarea');
    
    formElements.forEach(element => {
        element.addEventListener('blur', function() {
            validateField(this.id);
        });
        
        element.addEventListener('input', function() {
            // Clear error when user starts typing
            const errorElement = document.getElementById(this.id + 'Error');
            if (errorElement) {
                errorElement.textContent = '';
            }
            this.classList.remove('invalid');
        });
    });
});

function validateField(fieldId) {
    const field = document.getElementById(fieldId);
    const value = field.value.trim();
    
    switch(fieldId) {
        case 'name':
            if (value && !/^[a-zA-Z\s'-]+$/.test(value)) {
                showError('nameError', 'Only letters, spaces, hyphens and apostrophes allowed');
                markInvalid('name');
            }
            break;
            
        case 'email':
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (value && !emailPattern.test(value)) {
                showError('emailError', 'Invalid email format');
                markInvalid('email');
            }
            break;
            
        case 'contact':
            const phonePattern = /^[\+]?[0-9\s\-\(\)]{10,}$/;
            if (value && !phonePattern.test(value)) {
                showError('contactError', 'Invalid phone number format');
                markInvalid('contact');
            }
            break;
    }
}