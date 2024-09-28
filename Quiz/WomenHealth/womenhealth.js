function calculateHealthScore() {
    let totalScore = 0;

    const form = document.getElementById("womenHealthForm");
    
    for (let i = 1; i <= 5; i++) {
        const question = form[`question${i}`].value;
        if (question) {
            totalScore += parseInt(question);
        } else {
            alert(`Please answer question ${i}`);
            return; // Exit if any question is unanswered
        }
    }

   // Review based on the total score
   let review = "";

   if (totalScore <= 5) {
       review = "Your mental health concerning hormonal and fertility issues is stable.";
   } else if (totalScore <= 10) {
       review = "You may experience mild concerns regarding your hormonal health.";
   } else if (totalScore <= 15) {
       review = "You have moderate concerns that may require attention.";
   } else {
       review = "You have significant concerns regarding your mental health related to hormonal and fertility issues. It is recommended to consult a specialist.";
   }

   // Display the result
   document.getElementById("review").textContent = review;
   document.getElementById("result").style.display = "block";
}