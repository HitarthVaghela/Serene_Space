const slider = document.querySelector('.slider');
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');

let counter = 0;
const size = document.querySelector('.slider-item').clientWidth + 20; // item width + margin

next.addEventListener('click', () => {
    if (counter < slider.children.length - 1) {
        counter++;
        slider.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
});

prev.addEventListener('click', () => {
    if (counter > 0) {
        counter--;
        slider.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
});
