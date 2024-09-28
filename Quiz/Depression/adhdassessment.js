function calculateADHDScore() {
    let totalScore = 0;

    const form = document.getElementById("adhdForm");
    
    for (let i = 1; i <= 10; i++) {
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
       review = "Your responses suggest minimal symptoms of ADHD.";
   } else if (totalScore <= 15) {
       review = "You may be experiencing mild symptoms of ADHD.";
   } else if (totalScore <= 25) {
       review = "You may have moderate symptoms of ADHD that could benefit from further evaluation.";
   } else {
       review = "Your responses indicate significant symptoms of ADHD. It is recommended to consult a mental health professional.";
   }

   // Display the result
   document.getElementById("review").textContent = review;
   document.getElementById("result").style.display = "block";
}