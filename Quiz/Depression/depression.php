<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depression Symptoms Questionnaire</title>
    <link rel="stylesheet" href="depression.css">
</head>
<body>
    <div class="container">
        <h1>Depression Symptoms Questionnaire</h1>
        <p>Please answer the following questions to assess your depression symptoms:</p>

        <!-- Form -->
        <form id="depressionForm">
            <!-- Question 1 -->
            <div class="question">
                <h3>1. How often have you felt down, depressed, or hopeless in the last 2 weeks?</h3>
                <label>
                    <input type="radio" name="question1" value="0"> Not at all
                </label>
                <label>
                    <input type="radio" name="question1" value="1"> Several days
                </label>
                <label>
                    <input type="radio" name="question1" value="2"> More than half the days
                </label>
                <label>
                    <input type="radio" name="question1" value="3"> Nearly every day
                </label>
            </div>

            <!-- Question 2 -->
            <div class="question">
                <h3>2. How often have you had little interest or pleasure in doing things?</h3>
                <label>
                    <input type="radio" name="question2" value="0"> Not at all
                </label>
                <label>
                    <input type="radio" name="question2" value="1"> Several days
                </label>
                <label>
                    <input type="radio" name="question2" value="2"> More than half the days
                </label>
                <label>
                    <input type="radio" name="question2" value="3"> Nearly every day
                </label>
            </div>

            <!-- Question 3 -->
            <div class="question">
                <h3>3. How often have you had trouble falling or staying asleep, or sleeping too much?</h3>
                <label>
                    <input type="radio" name="question3" value="0"> Not at all
                </label>
                <label>
                    <input type="radio" name="question3" value="1"> Several days
                </label>
                <label>
                    <input type="radio" name="question3" value="2"> More than half the days
                </label>
                <label>
                    <input type="radio" name="question3" value="3"> Nearly every day
                </label>
            </div>

            <!-- Question 4 -->
            <div class="question">
                <h3>4. How often have you felt tired or had little energy?</h3>
                <label>
                    <input type="radio" name="question4" value="0"> Not at all
                </label>
                <label>
                    <input type="radio" name="question4" value="1"> Several days
                </label>
                <label>
                    <input type="radio" name="question4" value="2"> More than half the days
                </label>
                <label>
                    <input type="radio" name="question4" value="3"> Nearly every day
                </label>
            </div>

            <!-- Question 5 -->
            <div class="question">
                <h3>5. How often have you had poor appetite or overeating?</h3>
                <label>
                    <input type="radio" name="question5" value="0"> Not at all
                </label>
                <label>
                    <input type="radio" name="question5" value="1"> Several days
                </label>
                <label>
                    <input type="radio" name="question5" value="2"> More than half the days
                </label>
                <label>
                    <input type="radio" name="question5" value="3"> Nearly every day
                </label>
            </div>

            <!-- Question 6 -->
            <div class="question">
                <h3>6. How often have you felt bad about yourself – or that you are a failure or have let yourself or your family down?</h3>
                <label>
                    <input type="radio" name="question6" value="0"> Not at all
                </label>
                <label>
                    <input type="radio" name="question6" value="1"> Several days
                </label>
                <label>
                    <input type="radio" name="question6" value="2"> More than half the days
                </label>
                <label>
                    <input type="radio" name="question6" value="3"> Nearly every day
                </label>
            </div>

            <!-- Question 7 -->
            <div class="question">
                <h3>7. How often have you had trouble concentrating on things, such as reading or watching TV?</h3>
                <label>
                    <input type="radio" name="question7" value="0"> Not at all
                </label>
                <label>
                    <input type="radio" name="question7" value="1"> Several days
                </label>
                <label>
                    <input type="radio" name="question7" value="2"> More than half the days
                </label>
                <label>
                    <input type="radio" name="question7" value="3"> Nearly every day
                </label>
            </div>

            <!-- Question 8 -->
            <div class="question">
                <h3>8. How often have you been moving or speaking so slowly that other people could have noticed? Or the opposite — being so fidgety or restless?</h3>
                <label>
                    <input type="radio" name="question8" value="0"> Not at all
                </label>
                <label>
                    <input type="radio" name="question8" value="1"> Several days
                </label>
                <label>
                    <input type="radio" name="question8" value="2"> More than half the days
                </label>
                <label>
                    <input type="radio" name="question8" value="3"> Nearly every day
                </label>
            </div>

            <!-- Question 9 -->
            <div class="question">
                <h3>9. How often have you thought that you would be better off dead, or of hurting yourself in some way?</h3>
                <label>
                    <input type="radio" name="question9" value="0"> Not at all
                </label>
                <label>
                    <input type="radio" name="question9" value="1"> Several days
                </label>
                <label>
                    <input type="radio" name="question9" value="2"> More than half the days
                </label>
                <label>
                    <input type="radio" name="question9" value="3"> Nearly every day
                </label>
            </div>

            <!-- Question 10 -->
            <div class="question">
                <h3>10. How often have you found it difficult to perform tasks at work, home, or school due to feeling depressed?</h3>
                <label>
                    <input type="radio" name="question10" value="0"> Not at all
                </label>
                <label>
                    <input type="radio" name="question10" value="1"> Several days
                </label>
                <label>
                    <input type="radio" name="question10" value="2"> More than half the days
                </label>
                <label>
                    <input type="radio" name="question10" value="3"> Nearly every day
                </label>
            </div>

            <button type="button" onclick="calculateScore()">Submit</button>
        </form>

        <!-- Result Section -->
        <div id="result" style="display: none;">
            <h2>Your Result:</h2>
            <p id="review"></p>
            <?php     
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
              ?> <a href="../../doc_profile/Dr. Karan Iyer/Karan_Iyer.php?doctor_id=49">Consult a Specialist</a>
          <?php }
            else{ ?> <a href="../../login_signup/signup.php">Consult a Specialist</a>
          <?php }?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
