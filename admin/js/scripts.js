// Toggle visibility of the form for adding new parts
function toggleForm() {
    var form = document.getElementById('addPartForm');
    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
}

// Confirm deletion of a part
function confirmDelete() {
    return confirm('Are you sure you want to delete this part?');
}

// Example of how to add more interactivity
document.addEventListener('DOMContentLoaded', function() {
    var deleteLinks = document.querySelectorAll('.delete-link');
    deleteLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            if (!confirmDelete()) {
                event.preventDefault();
            }
        });
    });
});