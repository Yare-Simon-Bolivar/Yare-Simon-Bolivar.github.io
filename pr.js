let index = 0;

function showNextImage() {
    const slides = document.querySelectorAll('.slides img');
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function showPrevImage() {
    const slides = document.querySelectorAll('.slides img');
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}

// Inicializa la primera imagen como activa
document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.slides img').classList.add('active');
});

setInterval(showNextImage, 10000); // Cambia de imagen cada 3 segundos
