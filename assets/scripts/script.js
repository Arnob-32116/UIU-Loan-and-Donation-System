const slider = document.getElementById('slider');
const totalSlides = 2;
let index = 0;

function showSlide(i) {
  slider.style.transform = `translateX(-${i * 100}%)`;
  for (let j = 0; j < totalSlides; j++) {
    document.getElementById(`dot-${j}`).classList.remove('opacity-70');
    document.getElementById(`dot-${j}`).classList.add('opacity-40');
  }
  document.getElementById(`dot-${i}`).classList.add('opacity-70');
}

showSlide(index);

setInterval(() => {
  index = (index + 1) % totalSlides;
  showSlide(index);
}, 5000);

for (let i = 0; i < totalSlides; i++) {
  document.getElementById(`dot-${i}`).addEventListener('click', () => {
    index = i;
    showSlide(index);
  });
}
