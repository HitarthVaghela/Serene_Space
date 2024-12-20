<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tobacco Addiction Assessment</title>
    <link rel="stylesheet" href="tobacco.css">
</head>
<body>
    <div class="container">
        <h1>Tobacco Addiction Assessment Questionnaire</h1>
        <p>Please answer the following questions to assess your tobacco consumption habits:</p>

        <!-- Form -->
        <form id="tobaccoForm">
            <!-- Question 1 -->
            <div class="question">
                <h3>1. How often do you smoke tobacco?</h3>
                <label><input type="radio" name="question1" value="0"> Never</label>
                <label><input type="radio" name="question1" value="1"> Occasionally</label>
                <label><input type="radio" name="question1" value="2"> Daily</label>
            </div>

            <!-- Question 2 -->
            <div class="question">
                <h3>2. How many cigarettes do you smoke on a typical day?</h3>
                <label><input type="radio" name="question2" value="0"> 0</label>
                <label><input type="radio" name="question2" value="1"> 1-5</label>
                <label><input type="radio" name="question2" value="2"> 6-10</label>
                <label><input type="radio" name="question2" value="3"> 11-20</label>
                <label><input type="radio" name="question2" value="4"> More than 20</label>
            </div>

            <!-- Question 3 -->
            <div class="question">
                <h3>3. How soon after waking up do you smoke your first cigarette?</h3>
                <label><input type="radio" name="question3" value="0"> More than 60 minutes</label>
                <label><input type="radio" name="question3" value="1"> 31-60 minutes</label>
                <label><input type="radio" name="question3" value="2"> 6-30 minutes</label>
                <label><input type="radio" name="question3" value="4"> Within 5 minutes</label>
            </div>

            <!-- Question 4 -->
            <div class="question">
                <h3>4. Do you find it difficult to refrain from smoking in places where it is prohibited?</h3>
                <label><input type="radio" name="question4" value="0"> No</label>
                <label><input type="radio" name="question4" value="2"> Yes, sometimes</label>
                <label><input type="radio" name="question4" value="4"> Yes, often</label>
            </div>

            <!-- Question 5 -->
            <div class="question">
                <h3>5. Have you ever tried to quit smoking but were unsuccessful?</h3>
                <label><input type="radio" name="question5" value="0"> No</label>
                <label><input type="radio" name="question5" value="2"> Yes, once or twice</label>
                <label><input type="radio" name="question5" value="4"> Yes, multiple times</label>
            </div>

            <!-- Question 6 -->
            <div class='question'>
                <h3>6. Do you feel anxious or irritable when you cannot smoke?</h3>
                <label><input type='radio' name='question6' value='0'> No</label>
                <label><input type='radio' name='question6' value='2'> Yes, sometimes</label>
                <label><input type='radio' name='question6' value='4'> Yes, often</label>
            </div>

            <!-- Question 7 -->
            <div class='question'>
                <h3>7. Have you ever experienced health problems that you think are related to smoking?</h3>
                <label><input type='radio' name='question7' value='0'> No</label>
                <label><input type='radio' name='question7' value='2'> Yes, but not serious</label>
                <label><input type='radio' name='question7' value='4'> Yes, serious health issues</label>
            </div>

            <!-- Question 8 -->
            <div class='question'>
                <h3>8. Do you smoke even when you are sick or have a cold?</h3>
                <label><input type='radio' name='question8' value='0'> No</label>
                <label><input type='radio' name='question8' value='2'> Yes, sometimes</label>
                <label><input type='radio' name='question8' value='4'> Yes, often</label>
            </div>

            <!-- Question 9 -->
            <div class='question'>
                <h3>9. Do friends or family express concern about your smoking habits?</h3>
                <label><input type='radio' name='question9' value='0'> No</label>
                <label><input type='radio' name='question9' value='2'> Yes, sometimes</label>
                <label><input type='radio' name='question9' value='4'> Yes, often</label>
            </div>

            <!-- Question 10 -->
            <div class='question'>
                <h3>10. Have you ever missed work or other obligations because of smoking?</h3>
                <label><input type='radio' name='question10' value='0'> Never</label>
                <label><input type='radio' name='question10' value='1'> Less than monthly</label>
                <label><input type='radio' name='question10' value='2'> Monthly</label>
                <label><input type='radio' name='question10' value='3'> Weekly</label>
                <label><input type='radio' name='question10' value='4'> Daily or almost daily</label>
            </div>

            <!-- Submit Button -->
            <button type="button" onclick="calculateTobaccoScore()">Submit</button>
        </form>

        <!-- Result Section -->
        <div id="result" style="display: none;">
            <h2>Your Tobacco Consumption Level:</h2>
            <p id="review"></p>
            <?php     
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
              ?> <a href="../../doc_profile/Dr. Rahul Mehta/Rahul_Mehta.php?doctor_id=53">Consult a Specialist</a>
          <?php }
            else{ ?> <a href="../../login_signup/signup.php">Consult a Specialist</a>
          <?php }?>
        </div>
    </div>

    <script src="tobacco.js"></script>
</body>
</html>
