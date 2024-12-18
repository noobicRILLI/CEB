let currentIndexNew = 0;
let currentIndexAnother = 0;

const slidesNew = document.querySelectorAll('.new-product__card .product-card');
const totalSlidesNew = slidesNew.length;
const visibleSlides = 4; // Количество видимых слайдов

const slidesAnother = document.querySelectorAll('.best-seller-product__card .product-card');
const totalSlidesAnother = slidesAnother.length;

function updateSlider(sliderClass, currentIndex) {
    const slider = document.querySelector(sliderClass);
    const offset = -currentIndex * (310 + 35); // 310px ширина блока + 35px отступ
    slider.style.transform = `translateX(${offset}px)`;
}

function changeSlide(direction, sliderType) {
    if (sliderType === 'new') {
        currentIndexNew += direction;

        // Проверяем границы
        if (currentIndexNew < 0) {
            currentIndexNew = 0; // не даем уйти за пределы
        } else if (currentIndexNew > totalSlidesNew - visibleSlides) {
            currentIndexNew = totalSlidesNew - visibleSlides; // не даем уйти за пределы
        }

        updateSlider('.new-product__card', currentIndexNew);
    } else if (sliderType === 'another') {
        currentIndexAnother += direction;

        // Проверяем границы
        if (currentIndexAnother < 0) {
            currentIndexAnother = 0; // не даем уйти за пределы
        } else if (currentIndexAnother > totalSlidesAnother - visibleSlides) {
            currentIndexAnother = totalSlidesAnother - visibleSlides; // не даем уйти за пределы
        }

        updateSlider('.best-seller-product__card', currentIndexAnother);
    }
}

// Инициализация слайдеров
updateSlider('.new-product__card', currentIndexNew);
updateSlider('.best-seller-product__card', currentIndexAnother);