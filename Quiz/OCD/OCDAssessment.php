<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCD Assessment Questionnaire</title>
    <link rel="stylesheet" href="ocdassessment.css">
</head>
<body>
    <div class="container">
        <h1>Obsessive Compulsive Disorder (OCD) Assessment Questionnaire</h1>
        <p>Please answer the following questions to assess your symptoms related to OCD:</p>

        <!-- Form -->
        <form id="ocdForm">
            <!-- Question 1 -->
            <div class="question">
                <h3>1. How often do you experience unwanted thoughts that cause you anxiety?</h3>
                <label><input type="radio" name="question1" value="0"> Never</label>
                <label><input type="radio" name="question1" value="1"> Occasionally</label>
                <label><input type="radio" name="question1" value="2"> Frequently</label>
                <label><input type="radio" name="question1" value="3"> Always</label>
            </div>

            <!-- Question 2 -->
            <div class="question">
                <h3>2. How often do you feel compelled to perform certain rituals or behaviors?</h3>
                <label><input type="radio" name="question2" value="0"> Never</label>
                <label><input type="radio" name="question2" value="1"> Occasionally</label>
                <label><input type="radio" name="question2" value="2"> Frequently</label>
                <label><input type="radio" name="question2" value="3"> Always</label>
            </div>

            <!-- Question 3 -->
            <div class="question">
                <h3>3. How much time do you spend on compulsive behaviors each day?</h3>
                <label><input type="radio" name="question3" value="0"> None</label>
                <label><input type="radio" name="question3" value="1"> Less than 1 hour</label>
                <label><input type="radio" name="question3" value="2"> 1-3 hours</label>
                <label><input type="radio" name="question3" value="3"> More than 3 hours</label>
            </div>

            <!-- Question 4 -->
            <div class="question">
                <h3>4. Do you avoid certain situations due to your obsessions or compulsions?</h3>
                <label><input type="radio" name="question4" value="0"> Never</label>
                <label><input type="radio" name="question4" value="1"> Occasionally</label>
                <label><input type="radio" name="question4" value="2"> Frequently</label>
                <label><input type="radio" name="question4" value="3"> Always</label>
            </div>

            <!-- Question 5 -->
            <div class="question">
                <h3>5. How often do your obsessions interfere with your daily life?</h3>
                <label><input type="radio" name="question5" value="0"> Never</label>
                <label><input type="radio" name="question5" value="1"> Occasionally</label>
                <label><input type="radio" name="question5" value="2"> Frequently</label>
                <label><input type="radio" name="question5" value="3"> Always</label>
            </div>

            <!-- Question 6 -->
            <div class="question">
                <h3>6. Do you feel distressed about your obsessive thoughts?</h3>
                <label><input type="radio" name="question6" value="0"> Never</label>
                <label><input type="radio" name="question6" value="1"> Occasionally</label>
                <label><input type="radio" name="question6" value="2"> Frequently</label>
                <label><input type="radio" name="question6" value="3"> Always</label>
            </div>

            <!-- Question 7 -->
            <div class="question">
                <h3>7. How often do you check things repeatedly (e.g., locks, appliances)?</h3>
                <label><input type="radio" name="question7" value="0"> Never</label>
                <label><input type="radio" name="question7" value="1"> Occasionally</label>
                <label><input type="radio" name="question7" value="2"> Frequently</label>
                <label><input type="radio" name="question7" value="3"> Always</label>
            </div>

            <!-- Question 8 -->
            <div class="question">
                <h3>8. Do you feel the need to arrange items in a specific order?</h3>
                <label><input type="radio" name="question8" value="0"> Never</label>
                <label><input type="radio" name="question8" value="1"> Occasionally</label>
                <label><input type="radio" name="question8" value="2"> Frequently</label>
                <label><input type="radio" name="question8" value="3"> Always</label>
            </div>

            <!-- Question 9 -->
            <div class="question">
                <h3>9. How often do you wash your hands excessively?</h3>
                <label><input type="radio" name="question9" value="0"> Never</label>
                <label><input type="radio" name="question9" value="1"> Occasionally</label>
                <label><input type="radio" name="question9" value="2"> Frequently</label>
                <label><input type="radio" name="question9" value="3"> Always</label>
            </div>

            <!-- Question 10 -->
            <div class="question">
                <h3>10. Do you find it hard to control your obsessive thoughts or compulsive behaviors?</h3>
                <label><input type="radio" name="question10" value="0"> Never</label>
                <label><input type="radio" name="question10" value="1"> Occasionally</label>
                <label><input type="radio" name="question10" value="2"> Frequently</label>
                <label><input type="radio" name="question10" value="3"> Always</label>
            </div>

            <!-- Submit Button -->
            <button type="button" onclick="calculateOCDScore()">Submit</button>
        </form>

        <!-- Result Section -->
        <div id="result" style="display: none;">
            <h2>Your OCD Assessment Result:</h2>
            <p id="review"></p>
            <?php     
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
              ?> <a href="../../doc_profile/Dr. Nisha Gupta/Nisha_Gupta.php?doctor_id=51">Consult a Specialist</a>
          <?php }
            else{ ?> <a href="../../login_signup/signup.php">Consult a Specialist</a>
          <?php }?>
        </div>
    </div>

    <script src="ocd.js"></script>
</body>
</html>
