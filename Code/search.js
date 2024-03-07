document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');

    searchForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting

        // Get the search query from the input field
        const searchInput = document.getElementById('searchInput').value.trim();

        // Perform the search operation (you can customize this part)
        if (searchInput !== '') {
            alert('Searching for: ' + searchInput);
            // Here you can redirect to the search results page or perform AJAX search
        } else {
            alert('Please enter a search query.');
        }
    });
});

function showCompanies(domain) {
    // Hide all company boxes initially
    document.getElementById('webcard').style.display = 'none';
    document.getElementById('aicard').style.display = 'none';
    document.getElementById('itcard').style.display = 'none';
    document.getElementById('autocard').style.display = 'none';
    document.getElementById('electronicscard').style.display = 'none';

    // Show company boxes based on the domain button clicked
    switch(domain) {
        case 'web':
            document.getElementById('webcard').style.display = 'flex';
            break;
        case 'ai':
            document.getElementById('aicard').style.display = 'flex';
            break;
        case 'it':
            document.getElementById('itcard').style.display = 'flex';
            break;
        case 'automobile':
            document.getElementById('autocard').style.display = 'flex';
            break;
        case 'electronics':
            document.getElementById('electronicscard').style.display = 'flex';
            break;
        default:
            break;
    }
}
