(function() {
    // Toggle visibility of the form for adding new parts
    function toggleForm() {
        var form = document.getElementById('addPartForm');
        form.classList.toggle('visible');
    }

    // Confirm deletion of a part
    function confirmDelete() {
        return confirm('Are you sure you want to delete this part?');
    }

    // Debouncing function
    function debounce(func, wait) {
        let timeout;
        return function() {
            const context = this, args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
    }

    // Add interactivity after DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle form visibility
        var toggleButton = document.querySelector('#toggleButton');
        if (toggleButton) {
            toggleButton.addEventListener('click', debounce(toggleForm, 300));
        }

        // Confirm deletion links
        var deleteLinks = document.querySelectorAll('.delete-link');
        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                if (!confirmDelete()) {
                    event.preventDefault();
                }
            });
        });

        // Additional interactive elements can be added here
    });
})();

