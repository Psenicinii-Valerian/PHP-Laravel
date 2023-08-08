const dinosaurForm = document.getElementById('dinosaur_form');
const searchInput = document.getElementById('search_input');

// Attach event listener to the form
dinosaurForm.addEventListener('change', function() {
    // Submit the form when any of the form elements are changed
    this.submit();
});