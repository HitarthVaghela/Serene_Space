function calculateStressScore() {
    let totalScore = 0;

    const form = document.getElementById("stressForm"); 
    for (let i = 1; i <= 6; i++) {
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
        review = "You have a low level of stress.";
    } else if (totalScore <= 10) {
        review = "You have a moderate level of stress.";
    } else if (totalScore <= 15) {
        review = "You have a high level of stress. Try to manage your stress.";
    } else {
        review = "You have a very high level of stress. Consider seeking professional help.";
    }

    document.getElementById("review").textContent = review;
    document.getElementById("result").style.display = "block";
}
