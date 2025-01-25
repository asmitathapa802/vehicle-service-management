document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for navigation links
    var navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                document.querySelector(hash).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

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
            var confirmed = confirm('Are you sure you want to delete this item?');
            if (!confirmed) {
                event.preventDefault();
            }
        });
    });
});