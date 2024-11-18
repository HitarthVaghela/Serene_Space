const profiles = [
    { name: "Dr. Anika Choudhury", age: 42, gender: "Female", location: "New Delhi, Delhi", imagePath: "../doc_profile/doc_profile_images/anika.jpg" },
    { name: "Dr. Rahul Mehta", age: 50, gender: "Male", location: "Mumbai, Maharashtra", imagePath: "../doc_profile/doc_profile_images/rahul.jpg" },
    { name: "Dr. Leela Kumar", age: 38, gender: "Female", location: "Bengaluru, Karnataka", imagePath: "../doc_profile/doc_profile_images/leela.jpg" },
    { name: "Dr. Arjun Desai", age: 45, gender: "Male", location: "Pune, Maharashtra", imagePath: "../doc_profile/doc_profile_images/arjun.jpg" },
    { name: "Dr. Priya Sen", age: 37, gender: "Female", location: "Kolkata, West Bengal", imagePath: "../doc_profile/doc_profile_images/priya.jpg" },
    { name: "Dr. Karan Iyer", age: 46, gender: "Male", location: "Chennai, Tamil Nadu", imagePath: "../doc_profile/doc_profile_images/karan.jpg" },
    { name: "Dr. Sanjana Rao", age: 39, gender: "Female", location: "Hyderabad, Andhra Pradesh", imagePath: "../doc_profile/doc_profile_images/sanjana.jpg" },
    { name: "Dr. Devansh Kapoor", age: 40, gender: "Male", location: "Gurugram, Haryana", imagePath: "../doc_profile/doc_profile_images/devansh.jpg" },
    { name: "Dr. Nisha Gupta", age: 36, gender: "Female", location: "Ahmedabad, Gujarat", imagePath: "../doc_profile/doc_profile_images/nisha.jpg" },
];

function displayProfiles(profiles) {
    const profilesContainer = document.querySelector(".profiles");
    profilesContainer.innerHTML = ""; // Clear the container before adding profiles

    if (profiles.length === 0) {
        profilesContainer.innerHTML = "<p>No profiles found.</p>";
        return;
    }

    let profilesHTML = ""; // Initialize an empty string for profiles HTML

    profiles.forEach(profile => {
        profilesHTML += `
            <div class="profile">
                <div class="img">
                    <img src="${profile.imagePath}" alt="${profile.name}">
                </div>
                <div class="details">
                    <p>Name: ${profile.name}</p>
                    <p>Age: ${profile.age}</p>
                    <p>Gender: ${profile.gender}</p>
                    <p>Location: ${profile.location}</p>
                    <div class="show-prf">
                        <a href="#">View Profile</a>
                    </div>
                </div>
            </div>
        `;
    });

    profilesContainer.innerHTML = profilesHTML; // Insert the constructed HTML
}
