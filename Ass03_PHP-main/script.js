// Form validation function
function validateForm() {
    let isValid = true;
    
    // Clear previous errors
    clearErrors();
    
    // Validate shop name
    const shopName = document.getElementById('shopName');
    if (shopName.value.trim() === '') {
        showError('shopNameError', 'Shop name is required');
        isValid = false;
    }
    
    // Validate address
    const address = document.getElementById('address');
    if (address.value.trim() === '') {
        showError('addressError', 'Address is required');
        isValid = false;
    }
    
    // Validate contact number
    const contact = document.getElementById('contact');
    const contactPattern = /^[0-9+\-() ]+$/;
    if (contact.value.trim() === '') {
        showError('contactError', 'Contact number is required');
        isValid = false;
    } else if (!contactPattern.test(contact.value)) {
        showError('contactError', 'Invalid phone number format. Use only numbers, +, - and spaces.');
        isValid = false;
    }
    
    // Validate email
    const email = document.getElementById('email');
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email.value.trim() === '') {
        showError('emailError', 'Email is required');
        isValid = false;
    } else if (!emailPattern.test(email.value)) {
        showError('emailError', 'Invalid email format. Please enter a valid email address.');
        isValid = false;
    }
    
    // Validate items - at least one item must have all fields filled
    const codes = document.getElementsByName("code[]");
    const names = document.getElementsByName("name[]");
    const quantities = document.getElementsByName("qty[]");
    const prices = document.getElementsByName("price[]");
    
    let hasValidItem = false;
    
    for (let i = 0; i < codes.length; i++) {
        // Check if at least one item is fully filled
        if (codes[i].value.trim() !== '' && 
            names[i].value.trim() !== '' && 
            quantities[i].value !== '' && 
            prices[i].value !== '') {
            hasValidItem = true;
            
            // Validate quantity
            if (quantities[i].value <= 0) {
                alert(`Quantity must be greater than zero for item ${i+1}`);
                quantities[i].focus();
                return false;
            }
            
            // Validate price
            if (prices[i].value <= 0) {
                alert(`Price must be greater than zero for item ${i+1}`);
                prices[i].focus();
                return false;
            }
        }
    }
    
    if (!hasValidItem) {
        alert("Please enter at least one item with all details");
        return false;
    }
    
    return isValid;
}

// Show error message
function showError(elementId, message) {
    const errorElement = document.getElementById(elementId);
    errorElement.textContent = message;
    
    // Highlight the input field
    const inputId = elementId.replace('Error', '');
    const inputElement = document.getElementById(inputId);
    if (inputElement) {
        inputElement.style.borderColor = '#e74c3c';
        inputElement.style.boxShadow = '0 0 0 3px rgba(231, 76, 60, 0.2)';
    }
}

// Clear all errors
function clearErrors() {
    const errorElements = document.querySelectorAll('.error');
    errorElements.forEach(element => {
        element.textContent = '';
    });
    
    // Reset input styles
    const inputs = document.querySelectorAll('.form-group input');
    inputs.forEach(input => {
        input.style.borderColor = '#ddd';
        input.style.boxShadow = 'none';
    });
}

// Add new item row
let itemCounter = 4;

function addItem() {
    const tableBody = document.getElementById('itemsBody');
    const newRow = document.createElement('tr');
    
    newRow.innerHTML = `
        <td><input type="text" name="code[]" class="table-input" placeholder="ITM${itemCounter.toString().padStart(3, '0')}"></td>
        <td><input type="text" name="name[]" class="table-input" placeholder="Item Name"></td>
        <td><input type="number" name="qty[]" class="table-input" min="1" placeholder="Qty"></td>
        <td><input type="number" name="price[]" class="table-input" step="0.01" min="0.01" placeholder="0.00"></td>
        <td><button type="button" class="remove-btn" onclick="removeItem(this)"><i class="fas fa-trash"></i></button></td>
    `;
    
    tableBody.appendChild(newRow);
    itemCounter++;
    
    // Update item count
    updateItemCount();
    
    // Add animation
    newRow.style.animation = 'fadeIn 0.5s';
    
    // Create CSS animation if not exists
    if (!document.querySelector('#fadeInAnimation')) {
        const style = document.createElement('style');
        style.id = 'fadeInAnimation';
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
        `;
        document.head.appendChild(style);
    }
}

// Remove item row
function removeItem(button) {
    const row = button.closest('tr');
    const tableBody = document.getElementById('itemsBody');
    const rows = tableBody.querySelectorAll('tr');
    
    // Ensure at least one row remains
    if (rows.length > 1) {
        row.remove();
        updateItemCount();
    }
}

// Update item count display
function updateItemCount() {
    const tableBody = document.getElementById('itemsBody');
    const rows = tableBody.querySelectorAll('tr');
    const countElement = document.getElementById('itemCount');
    
    // Update count
    countElement.textContent = rows.length;
    
    // Enable/disable remove buttons - keep at least one row
    const removeButtons = document.querySelectorAll('.remove-btn');
    removeButtons.forEach((btn, index) => {
        if (rows.length === 1) {
            btn.disabled = true;
        } else {
            btn.disabled = index === 0; // Disable only for first row
        }
    });
}

// Clear form completely
function clearForm() {
    // Reset the form
    document.getElementById('invoiceForm').reset();
    
    // Clear all errors
    clearErrors();
    
    // Reset items table to 3 rows
    const tableBody = document.getElementById('itemsBody');
    
    // Keep only first 3 rows
    const rows = tableBody.querySelectorAll('tr');
    
    // Remove extra rows
    for (let i = 3; i < rows.length; i++) {
        rows[i].remove();
    }
    
    // Reset the first 3 rows
    const firstRowInputs = rows[0].querySelectorAll('input');
    firstRowInputs[0].value = '';
    firstRowInputs[1].value = '';
    firstRowInputs[2].value = '';
    firstRowInputs[3].value = '';
    
    for (let i = 1; i < Math.min(3, rows.length); i++) {
        const rowInputs = rows[i].querySelectorAll('input');
        rowInputs[0].value = '';
        rowInputs[1].value = '';
        rowInputs[2].value = '';
        rowInputs[3].value = '';
    }
    
    // Reset counter
    itemCounter = 4;
    updateItemCount();
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateItemCount();
});