document.addEventListener('DOMContentLoaded', function() {
    // Example: Toggle visibility of additional information
    var toggleButtons = document.querySelectorAll('.toggle-info');
    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var targetId = this.getAttribute('data-target');
            var targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.classList.toggle('visible');
            }
        });
    });

    // Example: Form validation
    var forms = document.querySelectorAll('form');
    forms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            var isValid = true;
            var inputs = form.querySelectorAll('input[required], textarea[required]');
            inputs.forEach(function(input) {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('error');
                } else {
                    input.classList.remove('error');
                }
            });
            if (!isValid) {
                event.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    });
});