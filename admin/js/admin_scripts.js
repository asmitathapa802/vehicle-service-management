document.addEventListener('DOMContentLoaded', function() {
    // Toggle visibility of additional information
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

    // Form validation
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

    // Dynamic content update
    var updateButtons = document.querySelectorAll('.update-content');
    updateButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var targetId = this.getAttribute('data-target');
            var targetElement = document.getElementById(targetId);
            if (targetElement) {
                // Simulate an AJAX request to update content
                setTimeout(function() {
                    targetElement.textContent = 'Updated content!';
                }, 1000);
            }
        });
    });

    // Confirmation before deletion
    var deleteButtons = document.querySelectorAll('.delete-item');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            var itemType = this.getAttribute('data-item-type');
            var confirmed = confirm('Are you sure you want to delete this ' + itemType + '?');
            if (!confirmed) {
                event.preventDefault();
            }
        });
    });
});