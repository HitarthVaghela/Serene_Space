function calculateScore() {
    let totalScore = 0;

    const form = document.getElementById("depressionForm"); 
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
        review = "You show minimal signs of depression.";
    } else if (totalScore <= 10) {
        review = "You may be experiencing mild depression.";
    } else if (totalScore <= 15) {
        review = "You may be experiencing moderate depression.";
    } else {
        review = "You may be experiencing severe depression. Consider seeking professional help.";
    }

    document.getElementById("review").textContent = review;
    document.getElementById("result").style.display = "block";
}
