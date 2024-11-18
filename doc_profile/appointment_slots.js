document.addEventListener("DOMContentLoaded", function () {
    const appointmentTime = document.getElementById("appointmentTime");
    const urlParams = new URLSearchParams(window.location.search);
    const doctorId = urlParams.get('doctor_id'); // Fetching doctor_id from the URL query string

    if (!doctorId) {
        console.error("Doctor ID not found in the URL.");
        return; // Stop if no doctor_id is found
    }

    document.addEventListener("dateSelected", function () {
        const selectedDate = document.getElementById("appointmentDate").value;
        if (!selectedDate) return;

        appointmentTime.innerHTML = '<option value="">Loading...</option>'; // Show loading message

        const fetchUrl = `get_booked_slots.php?doctor_id=${encodeURIComponent(doctorId)}&selected_date=${encodeURIComponent(selectedDate)}`;

        fetch(fetchUrl)
            .then(response => response.json())
            .then(bookedSlotsArray => {
                console.log("Fetched booked slots:", bookedSlotsArray); // Debugging line

                if (!Array.isArray(bookedSlotsArray)) {
                    console.error("Invalid response format:", bookedSlotsArray);
                    appointmentTime.innerHTML = '<option value="">Failed to load slots</option>';
                    return;
                }

                const currentTime = new Date();
                const selectedDateTime = new Date(selectedDate);

                selectedDateTime.setHours(0, 0, 0, 0);

                const isToday = currentTime.toDateString() === selectedDateTime.toDateString();

                // Check if the current time is past 16:00 and disable the day if true
                if (isToday && currentTime.getHours() >= 16) {
                    appointmentTime.innerHTML = '<option value="">No slots available today</option>';
                    return;
                }

                const bookedSlotsSet = new Set(bookedSlotsArray);
                const allTimeSlotsSet = new Set([
                    "10:00:00", "11:00:00", "12:00:00", "13:00:00",
                    "14:00:00", "15:00:00", "16:00:00", "17:00:00"
                ]);

                const availableSlots = Array.from(allTimeSlotsSet).filter(slot => {
                    const [hour, minute, second] = slot.split(":").map(Number);
                    const slotTime = new Date(selectedDate);
                    slotTime.setHours(hour, minute, second);

                    // Exclude slots before the current time and consider unbooked slots
                    if (isToday && slotTime <= currentTime) return false;
                    return !bookedSlotsSet.has(slot);
                });

                appointmentTime.innerHTML = '<option value="">Select a time</option>';
                if (availableSlots.length > 0) {
                    let previousSlotTime = null;

                    availableSlots.forEach(slot => {
                        const [hour, minute, second] = slot.split(":").map(Number);
                        const slotTime = new Date(selectedDate);
                        slotTime.setHours(hour, minute, second);

                        // Ensure there's at least a 1-hour gap from the previous slot
                        if (!previousSlotTime || (slotTime - previousSlotTime >= 3600000)) {
                            const option = document.createElement("option");
                            option.value = slot;
                            option.textContent = formatTime(slot);
                            appointmentTime.appendChild(option);
                            previousSlotTime = slotTime;
                        }
                    });
                } else {
                    const option = document.createElement("option");
                    option.value = "";
                    option.textContent = "No available slots";
                    appointmentTime.appendChild(option);
                }
            })
            .catch(error => {
                console.error('Error fetching slots:', error);
                appointmentTime.innerHTML = '<option value="">Failed to load slots</option>';
            });
    });

    function formatTime(time) {
        const [hour, minute] = time.split(":");
        const amPm = hour >= 12 ? "PM" : "AM";
        const formattedHour = (hour % 12) || 12;
        return `${formattedHour}:${minute} ${amPm}`;
    }
});
