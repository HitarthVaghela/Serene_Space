<?php 
include 'configure.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profiles</title>
    <link rel="stylesheet" href="Psy-main.css">
</head>

<body>

    <header class="header">
        <div class="nav">
            <ul>
                <li class="logo"></li>
                <li class="name">
                    <h3><a href="../home/home.php">Serene Space</a></h3>
                </li>
                <li><a href="../home/home.php">Home</a></li>
                <li class="nav-link">
                    <a href="#">Services</a>
                    <ul class="dropdown">
                        <li><a href="../abt_us/about_us.html">About us</a></li>
                        <li><a href="../Psy_main/Psy-main.php">Doctor's Profiles</a></li>
                    </ul>
                </li>
                <!-- <li><a href="../abt_us/about_us.html">About</a></li>
                <li><a href="#">Contact</a></li> -->
                <!-- <li class="login-button"><a href="/login_signup/sign_in.html" style="color: white;">Login/Sign-up</a></li> -->
            </ul>
        </div>
    </header> 
    
   <main class = "main">

        <div class="search-container">

            <input type="text" placeholder="Search..." class="search-input" id="searchInput">

            <select id="stateFilter" class="filter-dropdown">

            <option value="">Select State</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Delhi">Delhi</option>
            <option value="West Bengal">West Bengal</option>
            <option value="Haryana">Haryana</option>

            </select>

            <select id="cityFilter" class="filter-dropdown">

            <option value="">Select City</option>
            <option value="Ahmedabad">Ahmedabad</option>
            <option value="Bengaluru">Bengaluru</option>
            <option value="Hyderabad">Hyderabad</option>
            <option value="Pune">Pune</option>
            <option value="Gurugram">Gurugram</option>
            <option value="Kolkata">Kolkata</option>
            <option value="Chennai">Chennai</option>
            <option value="Mumbai">Mumbai</option>
            <option value="New Delhi">New Delhi</option>

            </select>

            <button class="search-button" onclick="search()">Search</button>

        </div>

        <div class="profiles">

            <div class="profile">

                <div class="img">
    
                    <img src="../doc_profile/doc_profile_images/anika.jpg" alt="Anika">
    
                </div>
    
                <div class="details">
    
                    <p> Name: Dr. Anika Choudhury </p>
                    <p> Age: 42 </p>
                    <p> Gender: Female </p>
                    <p> Location: New Delhi, India </p>
                
                     <div class="show-prf">
    
                     <a href="../doc_profile/Dr. Anika Choudhury/Anika_Choudhury.php?doctor_id=46">View Profile</a>


    
                     </div>
    
                </div>
    
            </div>
    
            <div class="profile">
    
                <div class="img">
    
                    <img src="../doc_profile/doc_profile_images/rahul.jpg" alt="Rahul">
    
                </div>
    
                <div class="details">
    
                    <p> Name: Dr. Rahul Mehta </p>
                    <p> Age: 50 </p>
                    <p> Gender: Male </p>
                    <p> Location: Mumbai, India </p>
                
                    <div class="show-prf">
    
                        <a href="../doc_profile/Dr. Rahul Mehta/Rahul_Mehta.php?doctor_id=53">View Profile</a>
    
                    </div>
    
                </div>
    
            </div>
    
            <div class="profile">
    
                <div class="img">
    
                    <img src="../doc_profile/doc_profile_images/leela.jpg" alt="Leela">
    
                </div>
    
                <div class="details">
    
                    
                    <p> Name: Dr. Leela Kumar </p>
                    <p> Age: 38 </p>
                    <p> Gender: Female </p>
                    <p> Location: Bengaluru, India </p>
                    
                    <div class="show-prf">
    
                        <a href="../doc_profile/Dr. Leela Kumar/Leela_Kumar.php?doctor_id=50">View Profile</a>
    
                    </div>
    
                </div>
    
            </div>

            <div class="profile">
    
                <div class="img">
    
                    <img src="../doc_profile/doc_profile_images/arjun.jpg" alt="Arjun">
    
                </div>
    
                <div class="details">
    
                    <p> Name: Dr. Arjun Desai </p>
                    <p> Age: 45 </p>
                    <p> Gender: Male </p>
                    <p> Location: Pune, India </p>
                
                    <div class="show-prf">
    
                        <a href="../doc_profile/Dr. Arjun Desai/Arjun_Desai.php?doctor_id=47">View Profile</a>
    
                    </div>
    
                </div>
    
            </div>

            <div class="profile">
    
                <div class="img">
    
                    <img src="../doc_profile/doc_profile_images/priya.jpg" alt="Priya">
    
                </div>
    
                <div class="details">
    
                    <p> Name: Dr. Priya Sen </p>
                    <p> Age: 37 </p>
                    <p> Gender: Female </p>
                    <p> Location: Kolkata, India </p>
                
                    <div class="show-prf">
    
                        <a href="../doc_profile/Dr. Priya Sen/Priya_Sen.php?doctor_id=52">View Profile</a>
    
                    </div>
    
                </div>
    
            </div>            

            <div class="profile">
    
                <div class="img">
    
                    <img src="../doc_profile/doc_profile_images/karan.jpg" alt="Karan">
    
                </div>
    
                <div class="details">
    
                    <p> Name: Dr. Karan Iyer </p>
                    <p> Age: 46 </p>
                    <p> Gender: Male </p>
                    <p> Location: Chennai, India </p>
                
                    <div class="show-prf">
    
                        <a href="../doc_profile/Dr. Karan Iyer/Karan_Iyer.php?doctor_id=49">View Profile</a>
    
                    </div>
    
                </div>
    
            </div> 

            <div class="profile">
    
                <div class="img">
    
                    <img src="../doc_profile/doc_profile_images/sanjana.jpg" alt="Sanjana">
    
                </div>
    
                <div class="details">
    
                    <p> Name: Dr. Sanjana Rao </p>
                    <p> Age: 39 </p>
                    <p> Gender: Female </p>
                    <p> Location: Hyderabad, India </p>
                
                    <div class="show-prf">
    
                        <a href="../doc_profile/Dr. Sanjana Rao/Sanjana_Rao.php?doctor_id=54">View Profile</a>
    
                    </div>
    
                </div>
    
            </div>

            <div class="profile">
    
                <div class="img">
    
                    <img src="../doc_profile/doc_profile_images/devansh.jpg" alt="Devansh">
    
                </div>
    
                <div class="details">
    
                    <p> Name: Dr. Devansh Kapoor </p>
                    <p> Age: 40 </p>
                    <p> Gender: Male </p>
                    <p> Location: Gurugram, India </p>
                
                    <div class="show-prf">
    
                        <a href="../doc_profile/Dr. Devansh Kapoor/Devansh_Kapoor.php?doctor_id=48">View Profile</a>
    
                    </div>
    
                </div>
    
            </div>            

            <div class="profile">
    
                <div class="img">
    
                    <img src="../doc_profile/doc_profile_images/nisha.jpg" alt="Nisha">
    
                </div>
    
                <div class="details">
    
                    <p> Name: Dr. Nisha Gupta </p>
                    <p> Age: 36 </p>
                    <p> Gender: Female </p>
                    <p> Location: Ahmedabad, India </p>

                
                    <div class="show-prf">
    
                        <a href="../doc_profile/Dr. Nisha Gupta/Nisha_Gupta.php?doctor_id=51">View Profile</a>
    
                    </div>
    
                </div>
    
            </div> 
    
            
        </div>

   </main>

   <footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>Serene Space</h3>
            <p>Your mental well-being, our priority.</p>
        </div>
        <div class="footer-section">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="../home/home.php">Home</a></li>
                <li><a href="../abt_us/about_us.html">About</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Contact Us</h4>
            <p>Email: <a href="mailto:serenespace01@gamil.com">serenespace01@gamil.com</a></p>
        </div>
    </div>
    <p>&copy; 2024 Serene Space. All rights reserved.</p>
</footer>

   <script>
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

   </script>

</body>

</html>
