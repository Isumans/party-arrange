document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('addPackageForm');

    form.addEventListener('submit', function(event) {
        // Prevent form submission
        event.preventDefault();

        // Clear previous errors
        clearErrors();

        // Validate fields
        let isValid = true;

        const packageName = document.getElementById('package_name').value.trim();
        const category = document.getElementById('category').value.trim();
        const price = document.getElementById('price').value.trim();
        const capacity = document.getElementById('guest_limit').value.trim();
        const description = document.getElementById('description').value.trim();
        const duration = document.getElementById('duration').value.trim();
        // Validate package name (e.g., required and minimum length)
        if (packageName === '' || packageName.length <= 2) {
            showError('packageName', 'Package name must be at least 3 characters long.');
            isValid = false;
        }

        if (category === '') {
            showError('category', 'category is required.');
            isValid = false;
        }

        // Validate description (e.g., required)
        if (description === '') {
            showError('description', 'Description is required.');
            isValid = false;
        }

        // Validate price (e.g., positive number)
        if (price === '' || isNaN(price) || Number(price) <= 0) {
            showError('price', 'Please enter a valid price.');
            isValid = false;
        }

        // Validate capacity (e.g., positive number)
        if (capacity === '' || isNaN(capacity) || Number(capacity) <= 0) {
            showError('capacity', 'Please enter a valid capacity.');
            isValid = false;
        }

        if (duration === '' || isNaN(duration) || Number(duration) <= 0) {
            showError('duration', 'Please enter a valid duration.');
            isValid = false;
        }

        // Validate date (e.g., must be a future date)
        // if (new Date(date) <= new Date()) {
        //     showError('date', 'Please select a future date.');
        //     isValid = false;
        // }

        // If the form is valid, submit it
        if (isValid) {
            form.submit();
        }
    });

    // Function to display error message
    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorElement = document.createElement('p');
        errorElement.className = 'error';
        errorElement.textContent = message;
        field.parentNode.appendChild(errorElement);
        field.classList.add('error-border'); // Add border to indicate error
    }

    // Function to clear all error messages
    function clearErrors() {
        const errorElements = document.querySelectorAll('.error');
        errorElements.forEach(element => element.remove());

        const fields = document.querySelectorAll('.error-border');
        fields.forEach(field => field.classList.remove('error-border'));
    }
});
