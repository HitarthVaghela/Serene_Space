<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alcohol Addiction Assessment</title>
    <link rel="stylesheet" href="alcohol.css">
</head>
<body>
    <div class="container">
        <h1>Alcohol Addiction Assessment Questionnaire</h1>
        <p>Please answer the following questions to assess your alcohol consumption habits:</p>

        <!-- Form -->
        <form id="alcoholForm">
            <!-- Question 1 -->
            <div class="question">
                <h3>1. How often do you have a drink containing alcohol?</h3>
                <label><input type="radio" name="question1" value="0"> Never</label>
                <label><input type="radio" name="question1" value="1"> Monthly or less</label>
                <label><input type="radio" name="question1" value="2"> 2-4 times a month</label>
                <label><input type="radio" name="question1" value="3"> 2-3 times a week</label>
                <label><input type="radio" name="question1" value="4"> 4 or more times a week</label>
            </div>

            <!-- Question 2 -->
            <div class="question">
                <h3>2. How many drinks containing alcohol do you have on a typical day when you are drinking?</h3>
                <label><input type="radio" name="question2" value="0"> 1 or 2</label>
                <label><input type="radio" name="question2" value="1"> 3 or 4</label>
                <label><input type="radio" name="question2" value="2"> 5 or 6</label>
                <label><input type="radio" name="question2" value="3"> 7 to 9</label>
                <label><input type="radio" name="question2" value="4"> 10 or more</label>
            </div>

            <!-- Question 3 -->
            <div class="question">
                <h3>3. How often do you find you are unable to stop drinking once you have started?</h3>
                <label><input type="radio" name="question3" value="0"> Never</label>
                <label><input type="radio" name="question3" value="1"> Less than monthly</label>
                <label><input type="radio" name="question3" value="2"> Monthly</label>
                <label><input type="radio" name="question3" value="3"> Weekly</label>
                <label><input type="radio" name="question3" value="4"> Daily or almost daily</label>
            </div>

            <!-- Question 4 -->
            <div class="question">
                <h3>4. How often during the last year have you needed a first drink in the morning to get yourself going after a heavy drinking session?</h3>
                <label><input type="radio" name="question4" value="0"> Never</label>
                <label><input type="radio" name="question4" value="1"> Less than monthly</label>
                <label><input type="radio" name="question4" value="2"> Monthly</label>
                <label><input type="radio" name="question4" value="3"> Weekly</label>
                <label><input type="radio" name="question4" value="4"> Daily or almost daily</label>
            </div>

            <!-- Question 5 -->
            <div class="question">
                <h3>5. How often during the last year have you had a feeling of guilt or remorse after drinking?</h3>
                <label><input type="radio" name="question5" value="0"> Never</label>
                <label><input type="radio" name="question5" value="1"> Less than monthly</label>
                <label><input type="radio" name="question5" value="2"> Monthly</label>
                <label><input type="radio" name="question5" value="3"> Weekly</label>
                <label><input type="radio" name="question5" value="4"> Daily or almost daily</label>
            </div>

            <!-- Question 6 -->
            <div class="question">
                <h3>6. Have you or someone else been injured as a result of your drinking?</h3>
                <label><input type="radio" name="question6" value="0"> No</label>
                <label><input type="radio" name="question6" value="2"> Yes, but not in the last year</label>
                <label><input type="radio" name="question6" value="4"> Yes, during the last year</label>
            </div>

            <!-- Question 7 -->
            <div class="question">
                <h3>7. How often during the last year have you been unable to remember what happened the night before because you had been drinking?</h3>
                <label><input type="radio" name="question7" value="0"> Never</label>
                <label><input type="radio" name="question7" value="1"> Less than monthly</label>
                <label><input type="radio" name="question7" value="2"> Monthly</label>
                <label><input type="radio" name="question7" value="3"> Weekly</label>
                <label><input type="radio" name="question7" value="4"> Daily or almost daily</label>
            </div>

            <!-- Question 8 -->
            <div class="question">
                <h3>8. Have you or someone else suggested that you cut down on your drinking?</h3>
                <label><input type="radio" name="question8" value="0"> No</label>
                <label><input type="radio" name="question8" value="2"> Yes, but not in the last year</label>
                <label><input type="radio" name="question8" value="4"> Yes, during the last year</label>
            </div>

            <!-- Question 9 -->
            <div class="question">
                <h3>9. How often do you drink in situations where you could cause harm to yourself or others (e.g., driving)?</h3>
                <label><input type="radio" name="question9" value="0"> Never</label>
                <label><input type="radio" name="question9" value="1"> Less than monthly</label>
                <label><input type="radio" name="question9" value="2"> Monthly</label>
                <label><input type="radio" name="question9" value="3"> Weekly</label>
                <label><input type="radio" name="question9" value="4"> Daily or almost daily</label>
            </div>

            <!-- Question 10 -->
            <div class="question">
                <h3>10. How often have you missed work or other obligations because of drinking?</h3>
                <label><input type="radio" name="question10" value="0"> Never</label>
                <label><input type="radio" name="question10" value="1"> Less than monthly</label>
                <label><input type="radio" name="question10" value="2"> Monthly</label>
                <label><input type="radio" name="question10" value="3"> Weekly</label>
                <label><input type="radio" name="question10" value="4"> Daily or almost daily</label>
            </div>

            <button type="button" onclick="calculateAlcoholScore()">Submit</button>
        </form>

        <!-- Result Section -->
        <div id="result" style="display: none;">
            <h2>Your Alcohol Consumption Level:</h2>
            <p id="review"></p>
            <?php     
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
              ?> <a href="../../doc_profile/Dr. Arjun Desai/Arjun_Desai.php?doctor_id=47">Consult a Specialist</a>
          <?php }
            else{ ?> <a href="../../login_signup/signup.php">Consult a Specialist</a>
          <?php }?>
        </div>
    </div>

    <script src="alcohol.js"></script>
</body>
</html>
