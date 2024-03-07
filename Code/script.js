document.addEventListener('DOMContentLoaded', function() {
    const datesContainer = document.querySelector('.dates');

    // Sample data for company visits
    const companyVisits = [
        { date: '2024-03-07', description: 'Amazon Visit' },
        { date: '2024-03-08', description: 'Microsoft Visit' },
        // Add more company visit data as needed
    ];

    // Function to render dates on the calendar
    function renderCalendar() {
        const currentDate = new Date();
        const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

        // Clear previous dates
        datesContainer.innerHTML = '';

        // Render dates
        for (let i = 1; i <= daysInMonth; i++) {
            const dateElement = document.createElement('div');
            dateElement.classList.add('date');
            dateElement.textContent = i;
            dateElement.setAttribute('data-date', i.toString().padStart(2, '0')); // Add data attribute for the date

            // Check if the date has a company visit
            const currentDateFormatted = `${currentDate.getFullYear()}-${(currentDate.getMonth() + 1).toString().padStart(2, '0')}-${i.toString().padStart(2, '0')}`;
            const visit = companyVisits.find(visit => visit.date === currentDateFormatted);
            if (visit) {
                dateElement.title = visit.description;
                dateElement.classList.add('company-visit');
            }

            // Add click event listener to each date element
            dateElement.addEventListener('click', function() {
                const selectedDate = this.getAttribute('data-date');
                navigateToEventsPage(selectedDate);
            });

            datesContainer.appendChild(dateElement);
        }
    }

    // Function to navigate to the events page with selected date as query parameter
    function navigateToEventsPage(selectedDate) {
        // Construct the URL for the events page with the selected date as query parameter
        const eventsPageURL = 'events.html?date=' + selectedDate;
        // Redirect the user to the events page
        window.location.href = eventsPageURL;
    }

    // Render the calendar on page load
    renderCalendar();
});

document.addEventListener('DOMContentLoaded', function() {
    // Sample event data
    const eventsByCategory = {
        '07': [
            { company: 'Amazon', role: 'Junior Web Application Developer' },
            { company: 'Black Rock', role: 'Junior AI Analyst' },
            { company: 'TCS', role: 'Junior AI Analyst' },
            { company: 'BMW', role: 'Junior AI Analyst' },
            { company: 'Intel', role: 'Junior Electronics Analyst' }
        ],
        // Add more categories as needed
        '08': [
            { company: 'Microsoft', role: 'Junior Web Application Developer' },
            { company: 'Open AI', role: 'Junior AI Analyst' },
            { company: 'Wipro', role: 'Junior AI Analyst' },
            { company: 'VolksWagon', role: 'Junior AI Analyst' },
            { company: 'Snapdragon', role: 'Junior Electronics Analyst' }
        ],
    };

    // Get the selected date from the URL query parameter
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    let selectedDate = urlParams.get('date');

    // Ensure selectedDate is always two digits
    selectedDate = selectedDate.toString().padStart(2, '0');

    // Function to populate the table with events for the selected date
    function populateEventTable() {
        const eventTableBody = document.getElementById('eventTableBody');

        // Clear previous rows
        eventTableBody.innerHTML = '';

        // Get events for the selected date
        const eventsForSelectedDate = eventsByCategory[selectedDate];
        if (eventsForSelectedDate) {
            // Populate the table with event data
            eventsForSelectedDate.forEach(event => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${event.company}</td>
                    <td>${event.role}</td>
                    <td>${selectedDate}</td>
                `;
                eventTableBody.appendChild(row);
            });
        }
    }

    // Populate the table with events for the selected date
    populateEventTable();
});
const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
      question.addEventListener('click', () => {
        const answer = question.nextElementSibling;
        answer.style.display = answer.style.display === 'none' ? 'block' : 'none';
      });
    });