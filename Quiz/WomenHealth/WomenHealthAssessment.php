<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Health Assessment</title>
    <link rel="stylesheet" href="womenhealth.css">
</head>
<body>
    <div class="container">
        <h1>Women's Health Assessment Questionnaire</h1>
        <p>Please answer the following questions to assess your mental health concerning hormonal, sexual, or fertility concerns:</p>

        <!-- Form -->
        <form id="womenHealthForm">
            <!-- Question 1 -->
            <div class="question">
                <h3>1. How often do you feel anxious or nervous about your hormonal health?</h3>
                <label><input type="radio" name="question1" value="0"> Never</label>
                <label><input type="radio" name="question1" value="1"> Occasionally</label>
                <label><input type="radio" name="question1" value="2"> Frequently</label>
                <label><input type="radio" name="question1" value="3"> Always</label>
            </div>

            <!-- Question 2 -->
            <div class="question">
                <h3>2. How often do you experience mood swings related to your menstrual cycle?</h3>
                <label><input type="radio" name="question2" value="0"> Never</label>
                <label><input type="radio" name="question2" value="1"> Occasionally</label>
                <label><input type="radio" name="question2" value="2"> Frequently</label>
                <label><input type="radio" name="question2" value="3"> Always</label>
            </div>

            <!-- Question 3 -->
            <div class="question">
                <h3>3. Do you have concerns about your sexual health or libido?</h3>
                <label><input type="radio" name="question3" value="0"> No concerns</label>
                <label><input type="radio" name="question3" value="1"> Mild concerns</label>
                <label><input type="radio" name="question3" value="2"> Moderate concerns</label>
                <label><input type="radio" name="question3" value="3"> Severe concerns</label>
            </div>

            <!-- Question 4 -->
            <div class="question">
                <h3>4. How often do you feel fatigued or lack energy due to hormonal changes?</h3>
                <label><input type="radio" name="question4" value="0"> Never</label>
                <label><input type="radio" name="question4" value="1"> Occasionally</label>
                <label><input type="radio" name="question4" value="2"> Frequently</label>
                <label><input type="radio" name="question4" value="3"> Always</label>
            </div>

            <!-- Question 5 -->
            <div class='question'>
              <h3>5. Have you experienced any fertility-related stress or anxiety?</h3>
              <label><input type='radio' name='question5' value='0'> No stress</label>
              <label><input type='radio' name='question5' value='1'> Mild stress</label>
              <label><input type='radio' name='question5' value='2'> Moderate stress</label>
              <label><input type='radio' name='question5' value='3'> Severe stress</label>
            </div>

            <!-- Question 6 -->
            <div class="question">
                <h3>6. How often do you experience vaginal dryness or discomfort during sexual activity?</h3>
                <label><input type="radio" name="question6" value="0"> Never</label>
                <label><input type="radio" name="question6" value="1"> Occasionally</label>
                <label><input type="radio" name="question6" value="2"> Frequently</label>
                <label><input type="radio" name="question6" value="3"> Always</label>
            </div>

            <!-- Question 7 -->
            <div class="question">
                <h3>7. Have you experienced any changes in your menstrual cycle that concern you?</h3>
                <label><input type="radio" name="question7" value="0"> No changes</label>
                <label><input type="radio" name="question7" value="1"> Mild changes</label>
                <label><input type="radio" name="question7" value="2"> Moderate changes</label>
                <label><input type="radio" name="question7" value="3"> Severe changes</label>
            </div>

            <!-- Question 8 -->
            <div class="question">
                <h3>8. How often do you experience hot flashes or night sweats?</h3>
                <label><input type="radio" name="question8" value="0"> Never</label>
                <label><input type="radio" name="question8" value="1"> Occasionally</label>
                <label><input type="radio" name="question8" value="2"> Frequently</label>
                <label><input type="radio" name="question8" value="3"> Always</label>
            </div>

            <!-- Question 9 -->
            <div class='question'>
              <h3>9. Have you experienced any changes in your skin or hair related to hormonal fluctuations?</h3>
              <label><input type='radio' name='question9' value='0'> No changes</label>
              <label><input type='radio' name='question9' value='1'> Mild changes</label>
              <label><input type='radio' name='question9' value='2'> Moderate changes</label>
              <label><input type='radio' name='question9' value='3'> Severe changes</label>
            </div>

            <!-- Question 10 -->
            <div class='question'>
              <h3>10. How often do you experience headaches or migraines related to hormonal changes?</h3>
              <label><input type='radio' name='question10' value='0'> Never</label>
              <label><input type='radio' name='question10' value='1'> Occasionally</label>
              <label><input type='radio' name='question10' value='2'> Frequently</label>
              <label><input type='radio' name='question10' value='3'> Always</label>
            </div>

            <!-- Submit Button -->
            <button type="button" onclick="calculateHealthScore()">Submit</button>
        </form>

        <!-- Result Section -->
        <div id="result" style="display: none;">
            <h2>Your Health Assessment Result:</h2>
            <p id="review"></p>
            <?php     
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
              ?> <a href="../../doc_profile/Dr. Sanjana Rao/Sanjana_Rao.php?doctor_id=54">Consult a Specialist</a>
          <?php }
            else{ ?> <a href="../../login_signup/signup.php">Consult a Specialist</a>
          <?php }?>
        </div>
    </div>

    <script src="womenhealth.js"></script>
</body>
</html>