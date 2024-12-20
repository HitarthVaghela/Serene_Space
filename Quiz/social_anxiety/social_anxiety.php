<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Anxiety Assessment</title>
    <link rel="stylesheet" href="social_anxiety.css">
</head>
<body>
    <div class="container">
        <h1>Social Anxiety Assessment Questionnaire</h1>
        <p>Please answer the following questions to assess your social anxiety level:</p>

        <form id="anxietyForm">
            <!-- Question 1 -->
            <div class="question">
                <h3>1. How often do you avoid social gatherings due to fear of embarrassment?</h3>
                <label><input type="radio" name="question1" value="0"> Not at all</label>
                <label><input type="radio" name="question1" value="1"> Sometimes</label>
                <label><input type="radio" name="question1" value="2"> Often</label>
                <label><input type="radio" name="question1" value="3"> Always</label>
            </div>

            <!-- Question 2 -->
            <div class="question">
                <h3>2. How often do you feel anxious about speaking in public or in a group?</h3>
                <label><input type="radio" name="question2" value="0"> Not at all</label>
                <label><input type="radio" name="question2" value="1"> Sometimes</label>
                <label><input type="radio" name="question2" value="2"> Often</label>
                <label><input type="radio" name="question2" value="3"> Always</label>
            </div>

            <!-- Question 3 -->
            <div class="question">
                <h3>3. How often do you worry about being judged negatively by others?</h3>
                <label><input type="radio" name="question3" value="0"> Not at all</label>
                <label><input type="radio" name="question3" value="1"> Sometimes</label>
                <label><input type="radio" name="question3" value="2"> Often</label>
                <label><input type="radio" name="question3" value="3"> Always</label>
            </div>

            <!-- Question 4 -->
            <div class="question">
                <h3>4. How often do you avoid eye contact with others in social situations?</h3>
                <label><input type="radio" name="question4" value="0"> Not at all</label>
                <label><input type="radio" name="question4" value="1"> Sometimes</label>
                <label><input type="radio" name="question4" value="2"> Often</label>
                <label><input type="radio" name="question4" value="3"> Always</label>
            </div>

            <!-- Question 5 -->
            <div class="question">
                <h3>5. How often do you experience physical symptoms like sweating or trembling in social situations?</h3>
                <label><input type="radio" name="question5" value="0"> Not at all</label>
                <label><input type="radio" name="question5" value="1"> Sometimes</label>
                <label><input type="radio" name="question5" value="2"> Often</label>
                <label><input type="radio" name="question5" value="3"> Always</label>
            </div>

            <!-- Question 6 -->
            <div class="question">
                <h3>6. How often do you worry excessively before social events?</h3>
                <label><input type="radio" name="question6" value="0"> Not at all</label>
                <label><input type="radio" name="question6" value="1"> Sometimes</label>
                <label><input type="radio" name="question6" value="2"> Often</label>
                <label><input type="radio" name="question6" value="3"> Always</label>
            </div>

            <button type="button" onclick="calculateAnxietyScore()">Submit</button>
        </form>

        <div id="result" style="display: none;">
            <h2>Your Social Anxiety Level:</h2>
            <p id="review"></p>
            <?php     
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
              ?> <a href="../../doc_profile/Dr. Priya Sen/Priya_Sen.php?doctor_id=52">Consult a Specialist</a>
          <?php }
            else{ ?> <a href="../../login_signup/signup.php">Consult a Specialist</a>
          <?php }?>
        </div>
    </div>

    <script src="social_anxiety.js"></script>
</body>
</html>
