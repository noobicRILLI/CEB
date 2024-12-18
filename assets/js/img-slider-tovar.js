let currentSlide = 0;

function changeSlide(index) {
    const thumbnails = document.querySelectorAll('.thumbnail');
    const largeImage = document.getElementById('largeImage');

    thumbnails[currentSlide].classList.remove('active');

    currentSlide = index;

    thumbnails[currentSlide].classList.add('active');
    largeImage.src = thumbnails[currentSlide].src;
}


