<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adult ADHD Assessment Questionnaire</title>
    <link rel="stylesheet" href="adhdassessment.css">
</head>
<body>
    <div class="container">
        <h1>Adult ADHD Assessment Questionnaire</h1>
        <p>Please answer the following questions to assess your symptoms related to Adult ADHD:</p>

        <!-- Form -->
        <form id="adhdForm">
            <!-- Question 1 -->
            <div class="question">
                <h3>1. How often do you have trouble wrapping up the final details of a project, once the challenging parts have been done?</h3>
                <label><input type="radio" name="question1" value="0"> Never</label>
                <label><input type="radio" name="question1" value="1"> Occasionally</label>
                <label><input type="radio" name="question1" value="2"> Frequently</label>
                <label><input type="radio" name="question1" value="3"> Always</label>
            </div>

            <!-- Question 2 -->
            <div class="question">
                <h3>2. How often do you have difficulty organizing tasks and activities?</h3>
                <label><input type="radio" name="question2" value="0"> Never</label>
                <label><input type="radio" name="question2" value="1"> Occasionally</label>
                <label><input type="radio" name="question2" value="2"> Frequently</label>
                <label><input type="radio" name="question2" value="3"> Always</label>
            </div>

            <!-- Question 3 -->
            <div class="question">
                <h3>3. How often do you find yourself distracted by extraneous stimuli or noises?</h3>
                <label><input type="radio" name="question3" value="0"> Never</label>
                <label><input type="radio" name="question3" value="1"> Occasionally</label>
                <label><input type="radio" name="question3" value="2"> Frequently</label>
                <label><input type="radio" name="question3" value="3"> Always</label>
            </div>

            <!-- Question 4 -->
            <div class="question">
                <h3>4. How often do you forget to complete daily activities (e.g., chores, paying bills)?</h3>
                <label><input type="radio" name="question4" value="0"> Never</label>
                <label><input type="radio" name="question4" value="1"> Occasionally</label>
                <label><input type="radio" name="question4" value="2"> Frequently</label>
                <label><input type="radio" name="question4" value="3"> Always</label>
            </div>

            <!-- Question 5 -->
            <div class="question">
                <h3>5. How often do you lose things necessary for tasks and activities (e.g., keys, glasses)?</h3>
                <label><input type="radio" name="question5" value="0"> Never</label>
                <label><input type="radio" name="question5" value="1"> Occasionally</label>
                <label><input type="radio" name="question5" value="2"> Frequently</label>
                <label><input type="radio" name="question5" value="3"> Always</label>
            </div>

            <!-- Question 6 -->
            <div class="question">
                <h3>6. How often do you feel restless or fidgety?</h3>
                <label><input type="radio" name="question6" value="0"> Never</label>
                <label><input type="radio" name="question6" value="1"> Occasionally</label>
                <label><input type="radio" name="question6" value="2"> Frequently</label>
                <label><input type="radio" name="question6" value="3"> Always</label>
            </div>

            <!-- Question 7 -->
            <div class="question">
                <h3>7. How often do you interrupt others or intrude on their conversations?</h3>
                <label><input type="radio" name="question7" value="0"> Never</label>
                <label><input type="radio" name="question7" value="1"> Occasionally</label>
                <label><input type="radio" name="question7" value="2"> Frequently</label>
                <label><input type="radio" name="question7" value="3"> Always</label>
            </div>

            <!-- Question 8 -->
            <div class="question">
                <h3>8. How often do you have difficulty waiting your turn in situations such as lines?</h3>
                <label><input type="radio" name="question8" value="0"> Never</label>
                <label><input type="radio" name="question8" value="1"> Occasionally</label>
                <label><input type="radio" name="question8" value="2"> Frequently</label>
                <label><input type="radio" name="question8" value="3"> Always</label>
            </div>

            <!-- Question 9 -->
            <div class="question">
                <h3>9. How often do you feel overwhelmed by tasks and responsibilities?</h3>
                <label><input type="radio" name="question9" value="0"> Never</label>
                <label><input type="radio" name="question9" value="1"> Occasionally</label>
                <label><input type="radio" name="question9" value="2"> Frequently</label>
                <label><input type="radio" name="question9" value="3"> Always</label>
            </div>

            <!-- Question 10 -->
            <div class="question">
                <h3>10. How often do you feel disorganized in your work or personal life?</h3>
                <label><input type="radio" name="question10" value="0"> Never</label>
                <label><input type="radio" name="question10" value="1"> Occasionally</label>
                <label><input type="radio" name="question10" value="2"> Frequently</label>
                <label><input type="radio" name="question10" value="3"> Always</label>
            </div>

            <!-- Submit Button -->
            <button type="button" onclick="calculateADHDScore()">Submit</button>
        </form>

        <!-- Result Section -->
        <div id="result" style="display: none;">
            <h2>Your ADHD Assessment Result:</h2>
            <p id="review"></p>
            <?php     
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
              ?> <a href="../../doc_profile/Dr. Anika Choudhury/Anika_Choudhury.php?doctor_id=46">Consult a Specialist</a>
          <?php }
            else{ ?> <a href="../../login_signup/signup.php">Consult a Specialist</a>
          <?php }?>
            
        </div>
    </div>

    <script src="adhdassessment.js"></script>
</body>
</html>
