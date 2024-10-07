function calculateAlcoholScore() {
    let totalScore = 0;

    const form = document.getElementById("alcoholForm"); 
    for (let i = 1; i <= 6; i++) {
        const question = form[`question${i}`].value; 
        if (question) {
            totalScore += parseInt(question);
        } else {
            alert(`Please answer question ${i}`);
            return;
        }
    }

    // Review based on the total score
    let review = "";

    if (totalScore <= 7) {
        review = "Your alcohol consumption level is low. It is within a healthy range.";
    } else if (totalScore <= 15) {
        review = "Your alcohol consumption level is moderate. You might want to reduce your intake.";
    } else if (totalScore <= 20) {
        review = "Your alcohol consumption level is high. It may pose health risks. Consider reducing your alcohol intake.";
    } else {
        review = "Your alcohol consumption level is very high. It is recommended to seek professional help.";
    }

    // Display the result
    document.getElementById("review").textContent = review;
    document.getElementById("result").style.display = "block";
}
