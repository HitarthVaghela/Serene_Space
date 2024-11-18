function calculateTobaccoScore() {
    let totalScore = 0;

    const form = document.getElementById("tobaccoForm");
    
    for (let i = 1; i <= 10; i++) {
        const question = form[`question${i}`].value; 
        if (question) {
            totalScore += parseInt(question);
        } else {
            alert(`Please answer question ${i}`);
            return;
        }
    }

    let review = "";

    if (totalScore <= 5) {
        review = "Your tobacco consumption level is low. It is within a healthy range.";
    } else if (totalScore <= 15) {
        review = "Your tobacco consumption level is moderate. You might want to reduce your intake.";
    } else if (totalScore <= 25) {
        review = "Your tobacco consumption level is high. It may pose health risks. Consider reducing your tobacco intake.";
    } else {
        review = "Your tobacco consumption level is very high. It is recommended to seek professional help.";
    }

   document.getElementById("review").textContent = review;
   document.getElementById("result").style.display = "block";
}