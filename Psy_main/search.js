// Mock data for profiles
const profiles = [
    { name: "John Doe", age: 25, gender: "Male", location: "State 1, City 1" },
    { name: "Jane Smith", age: 30, gender: "Female", location: "State 2, City 2" },
    { name: "Michael Johnson", age: 35, gender: "Male", location: "State 1, City 3" },
    { name: "Emily Davis", age: 28, gender: "Female", location: "State 3, City 1" },
];


function search() {
    const query = document.getElementById('searchInput').value.toLowerCase();
    const state = document.getElementById('stateFilter').value.toLowerCase();
    const city = document.getElementById('cityFilter').value.toLowerCase();

    const filteredProfiles = profiles.filter(profile => {
        const matchesQuery = profile.name.toLowerCase().includes(query);
        const matchesState = !state || profile.location.toLowerCase().includes(state);
        const matchesCity = !city || profile.location.toLowerCase().includes(city);
        return matchesQuery && matchesState && matchesCity;
    });

    displayProfiles(filteredProfiles);
}


function displayProfiles(profiles) {
    const profilesContainer = document.querySelector('.profiles');
    profilesContainer.innerHTML = ''; 

    if (profiles.length === 0) {
        profilesContainer.innerHTML = '<p>No profiles found.</p>';
        return;
    }

    profiles.forEach(profile => {
        const profileHTML = `
            <div class="profile">
                <div class="img">
                    <img src="./psy_main_images/download.png" alt="Profile Picture">
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
        profilesContainer.innerHTML += profileHTML;
    });
}
