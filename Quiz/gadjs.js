function calculateGADScore() {
    let totalScore = 0;

    for (let i = 1; i <= 10; i++) {
        const question = document.querySelector(`input[name="question${i}"]:checked`);
        if (question) {
            totalScore += parseInt(question.value);
        } else {
            alert(`Please answer question ${i}`);
            return;
        }
    }

    let review = '';

    if (totalScore <= 5) {
        review = 'Your score suggests minimal or no anxiety symptoms.';
    } else if (totalScore <= 10) {
        review = 'Your score suggests mild anxiety symptoms. Consider monitoring your symptoms or talking to a professional if they worsen.';
    } else if (totalScore <= 15) {
        review = 'Your score suggests moderate anxiety symptoms. It may be beneficial to consult a mental health professional for further evaluation.';
    } else {
        review = 'Your score suggests severe anxiety symptoms. It is strongly recommended to seek professional help for a comprehensive assessment and support.';
    }

    document.getElementById('review').innerText = review;
    document.getElementById('result').style.display = "block";
}
