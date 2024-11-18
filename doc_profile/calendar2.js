// calendar.js
const today = new Date();
const currentYear = today.getFullYear();
const currentMonth = today.getMonth();

function generateCalendar(month, year) {
    const calendar = document.getElementById("calendar");
    calendar.innerHTML = "";

    const header = document.createElement("div");
    header.classList.add("calendar-header");

    const prevButton = document.createElement("button");
    prevButton.textContent = "<";
    prevButton.addEventListener("click", () => generateCalendar(month - 1, year));
    header.appendChild(prevButton);

    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const monthYear = document.createElement("span");
    monthYear.textContent = `${monthNames[month]} ${year}`;
    header.appendChild(monthYear);

    const nextButton = document.createElement("button");
    nextButton.textContent = ">";
    nextButton.addEventListener("click", () => generateCalendar(month + 1, year));
    header.appendChild(nextButton);

    calendar.appendChild(header);

    const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    const daysRow = document.createElement("div");
    daysRow.classList.add("calendar-days");

    for (let day of daysOfWeek) {
        const dayCell = document.createElement("div");
        dayCell.textContent = day;
        daysRow.appendChild(dayCell);
    }
    calendar.appendChild(daysRow);

    const firstDay = new Date(year, month, 1).getDay();
    const numDays = new Date(year, month + 1, 0).getDate();

    const daysContainer = document.createElement("div");
    daysContainer.classList.add("calendar-days");

    for (let i = 0; i < firstDay; i++) {
        daysContainer.appendChild(document.createElement("div"));
    }

    for (let day = 1; day <= numDays; day++) {
        const dayElement = document.createElement("div");
        dayElement.textContent = day;
        dayElement.classList.add("calendar-day");

        const date = new Date(year, month, day);
        if (date.setHours(0, 0, 0, 0) < today.setHours(0, 0, 0, 0)) {
            dayElement.classList.add("disabled");
        }

        dayElement.addEventListener("click", function () {
            if (!dayElement.classList.contains("disabled")) {
                const selected = document.querySelector(".calendar-day.selected");
                if (selected) selected.classList.remove("selected");
                dayElement.classList.add("selected");

                document.getElementById("appointmentDate").value = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

                // Trigger event to load available slots
                document.dispatchEvent(new Event("dateSelected"));
            }
        });

        daysContainer.appendChild(dayElement);
    }

    calendar.appendChild(daysContainer);
}

document.addEventListener("DOMContentLoaded", () => {
    generateCalendar(currentMonth, currentYear);

    
});
