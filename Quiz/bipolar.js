function calculateBipolarScore() {
    let totalScore = 0;

    const form = document.getElementById("bipolarForm");
    for (let i = 1; i <= 5; i++) {
        const question = form.querySelector(`input[name="question${i}"]:checked`);
        if (question) {
            totalScore += parseInt(question.value);
        } else {
            alert(`Please answer question ${i}`);
            return;
        }
    }

    let review = "";

    if (totalScore <= 5) {
        review = "You have a low likelihood of bipolar disorder symptoms.";
    } else if (totalScore <= 10) {
        review = "You may have mild symptoms of bipolar disorder. Monitoring is recommended.";
    } else if (totalScore <= 15) {
        review = "You have moderate symptoms of bipolar disorder. Consider seeking professional help.";
    } else {
        review = "You have severe symptoms of bipolar disorder. It is important to seek professional assistance.";
    }

    document.getElementById("review").textContent = review;
    document.getElementById("result").style.display = "block";
}
