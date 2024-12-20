<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generalized Anxiety Disorder (GAD) Assessment</title>
    <link rel="stylesheet" href="gadcss.css">
</head>
<body>
    <div class="container">
        <h1>GAD-10 Anxiety Assessment Questionnaire</h1>
        <p>Please answer the following questions to assess your anxiety symptoms over the last two weeks:</p>

        <!-- Form -->
        <form id="gadForm">
            <!-- Question 1 -->
            <div class="question">
                <h3>1. How often have you felt nervous, anxious, or on edge?</h3>
                <label><input type="radio" name="question1" value="0"> Not at all</label>
                <label><input type="radio" name="question1" value="1"> Several days</label>
                <label><input type="radio" name="question1" value="2"> More than half the days</label>
                <label><input type="radio" name="question1" value="3"> Nearly every day</label>
            </div>

            <!-- Question 2 -->
            <div class="question">
                <h3>2. How often have you had trouble relaxing?</h3>
                <label><input type="radio" name="question2" value="0"> Not at all</label>
                <label><input type="radio" name="question2" value="1"> Several days</label>
                <label><input type="radio" name="question2" value="2"> More than half the days</label>
                <label><input type="radio" name="question2" value="3"> Nearly every day</label>
            </div>

            <!-- Question 3 -->
            <div class="question">
                <h3>3. How often have you felt unable to control worrying?</h3>
                <label><input type="radio" name="question3" value="0"> Not at all</label>
                <label><input type="radio" name="question3" value="1"> Several days</label>
                <label><input type="radio" name="question3" value="2"> More than half the days</label>
                <label><input type="radio" name="question3" value="3"> Nearly every day</label>
            </div>

            <!-- Question 4 -->
            <div class="question">
                <h3>4. How often have you had difficulty falling or staying asleep?</h3>
                <label><input type="radio" name="question4" value="0"> Not at all</label>
                <label><input type="radio" name="question4" value="1"> Several days</label>
                <label><input type="radio" name="question4" value="2"> More than half the days</label>
                <label><input type="radio" name="question4" value="3"> Nearly every day</label>
            </div>

            <!-- Question 5 -->
            <div class="question">
                <h3>5. How often have you felt so restless that it’s hard to sit still?</h3>
                <label><input type="radio" name="question5" value="0"> Not at all</label>
                <label><input type="radio" name="question5" value="1"> Several days</label>
                <label><input type="radio" name="question5" value="2"> More than half the days</label>
                <label><input type="radio" name="question5" value="3"> Nearly every day</label>
            </div>

            <!-- Question 6 -->
            <div class="question">
                <h3>6. How often have you felt irritable or easily annoyed?</h3>
                <label><input type="radio" name="question6" value="0"> Not at all</label>
                <label><input type="radio" name="question6" value="1"> Several days</label>
                <label><input type="radio" name="question6" value="2"> More than half the days</label>
                <label><input type="radio" name="question6" value="3"> Nearly every day</label>
            </div>

            <!-- Question 7 -->
            <div class="question">
                <h3>7. How often have you felt afraid, as if something awful might happen?</h3>
                <label><input type="radio" name="question7" value="0"> Not at all</label>
                <label><input type="radio" name="question7" value="1"> Several days</label>
                <label><input type="radio" name="question7" value="2"> More than half the days</label>
                <label><input type="radio" name="question7" value="3"> Nearly every day</label>
            </div>

            <!-- Question 8 -->
            <div class="question">
                <h3>8. How often have you felt that your worry is excessive?</h3>
                <label><input type="radio" name="question8" value="0"> Not at all</label>
                <label><input type="radio" name="question8" value="1"> Several days</label>
                <label><input type="radio" name="question8" value="2"> More than half the days</label>
                <label><input type="radio" name="question8" value="3"> Nearly every day</label>
            </div>

            <!-- Question 9 -->
            <div class="question">
                <h3>9. How often have you avoided situations due to fear of anxiety?</h3>
                <label><input type="radio" name="question9" value="0"> Not at all</label>
                <label><input type="radio" name="question9" value="1"> Several days</label>
                <label><input type="radio" name="question9" value="2"> More than half the days</label>
                <label><input type="radio" name="question9" value="3"> Nearly every day</label>
            </div>

            <!-- Question 10 -->
            <div class="question">
                <h3>10. How often have you experienced physical symptoms such as headaches, body aches, or rapid heartbeat due to anxiety?</h3>
                <label><input type="radio" name="question10" value="0"> Not at all</label>
                <label><input type="radio" name="question10" value="1"> Several days</label>
                <label><input type="radio" name="question10" value="2"> More than half the days</label>
                <label><input type="radio" name="question10" value="3"> Nearly every day</label>
            </div>

            <button type="button" onclick="calculateGADScore()">Submit</button>
        </form>

        <!-- Result Section -->
        <div id="result" style="display: none;">
            <h2>Your Anxiety Level:</h2>
            <p id="review"></p>
            <?php     
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
              ?> <a href="../../doc_profile/Dr. Leela Kumar/Leela_Kumar.php?doctor_id=50">Consult a Specialist</a>
          <?php }
            else{ ?> <a href="../../login_signup/signup.php">Consult a Specialist</a>
          <?php }?>
        </div>
    </div>

    <script src="gadjs.js"></script>
</body>
</html>
