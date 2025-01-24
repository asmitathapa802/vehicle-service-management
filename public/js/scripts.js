document.addEventListener('DOMContentLoaded', function() {
    // Example of how to add interactivity

    // Toggle visibility of additional information (e.g., FAQs)
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

    // Form validation (example for a contact form)
    var contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            var isValid = true;
            var emailInput = document.getElementById('email');
            if (!emailInput.value.includes('@')) {
                isValid = false;
                alert('Please enter a valid email address.');
            }
            if (!isValid) {
                event.preventDefault();
            }
        });
    }

    // Smooth scrolling for navigation links
    var navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            var targetId = this.getAttribute('href').substring(1);
            var targetElement = document.getElementById(targetId);
            if (targetElement) {
                event.preventDefault();
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
});
