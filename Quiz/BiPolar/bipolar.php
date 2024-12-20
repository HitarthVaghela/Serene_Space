<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bipolar Disorder Assessment</title>
    <link rel="stylesheet" href="bipolar.css">
</head>
<body>
    <div class="container">
        <h1>Bipolar Disorder Assessment Questionnaire</h1>
        <p>Please answer the following questions to assess symptoms related to bipolar disorder:</p>

        <!-- Form -->
        <form id="bipolarForm">
            <!-- Question 1 -->
            <div class="question">
                <h3>1. How often do you experience mood swings that range from extreme highs to extreme lows?</h3>
                <label><input type="radio" name="question1" value="0"> Never</label>
                <label><input type="radio" name="question1" value="1"> Sometimes</label>
                <label><input type="radio" name="question1" value="2"> Often</label>
                <label><input type="radio" name="question1" value="3"> Always</label>
            </div>

            <!-- Question 2 -->
            <div class="question">
                <h3>2. Do you have periods of unusually elevated mood or irritability?</h3>
                <label><input type="radio" name="question2" value="0"> Never</label>
                <label><input type="radio" name="question2" value="1"> Rarely</label>
                <label><input type="radio" name="question2" value="2"> Often</label>
                <label><input type="radio" name="question2" value="3"> Very Often</label>
            </div>

            <!-- Question 3 -->
            <div class="question">
                <h3>3. How frequently do you have episodes of increased energy and decreased need for sleep?</h3>
                <label><input type="radio" name="question3" value="0"> Never</label>
                <label><input type="radio" name="question3" value="1"> Rarely</label>
                <label><input type="radio" name="question3" value="2"> Often</label>
                <label><input type="radio" name="question3" value="3"> Very Often</label>
            </div>

            <!-- Question 4 -->
            <div class="question">
                <h3>4. Do you find yourself having racing thoughts or jumping between topics frequently?</h3>
                <label><input type="radio" name="question4" value="0"> Never</label>
                <label><input type="radio" name="question4" value="1"> Rarely</label>
                <label><input type="radio" name="question4" value="2"> Often</label>
                <label><input type="radio" name="question4" value="3"> Very Often</label>
            </div>

            <!-- Question 5 -->
            <div class="question">
                <h3>5. Do you have moments of impulsive or risky behavior?</h3>
                <label><input type="radio" name="question5" value="0"> Never</label>
                <label><input type="radio" name="question5" value="1"> Rarely</label>
                <label><input type="radio" name="question5" value="2"> Often</label>
                <label><input type="radio" name="question5" value="3"> Very Often</label>
            </div>

            <button type="button" onclick="calculateBipolarScore()">Submit</button>
        </form>

        <!-- Result Section -->
        <div id="result" style="display: none;">
            <h2>Your Bipolar Disorder Assessment Result:</h2>
            <p id="review"></p>
            <?php     
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
              ?> <a href="../../doc_profile/Dr. Devansh Kapoor/Devansh_Kapoor.php?doctor_id=48">Consult a Specialist</a>
          <?php }
            else{ ?> <a href="../../login_signup/signup.php">Consult a Specialist</a>
          <?php }?>
        </div>
    </div>

    <script src="bipolar.js"></script>
</body>
</html>
