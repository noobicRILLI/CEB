let currentIndexNew = 0;
let currentIndexAnother = 0;

const slidesNew = document.querySelectorAll('.new-product__card .product-card');
const totalSlidesNew = slidesNew.length;

const slidesAnother = document.querySelectorAll('.best-seller-product__card .product-card');
const totalSlidesAnother = slidesAnother.length;

let touchStartXNew = 0;
let touchEndXNew = 0;
let touchStartXAnother = 0;
let touchEndXAnother = 0;

function getVisibleSlides() {
    // Получаем ширину экрана
    const screenWidth = window.innerWidth;
    
    // Если ширина экрана меньше или равна 480px, показываем 2 карточки
    if (screenWidth <= 480) {
        return 2;
    } else {
        // Если экран больше 480px, показываем 4 карточки
        return 4;
    }
}

function updateSlider(sliderClass, currentIndex) {
    const slider = document.querySelector(sliderClass);
    
    if (!slider) return; // Проверяем, существует ли слайдер

    // Получаем количество видимых слайдов
    const visibleSlides = getVisibleSlides();

    // Получаем ширину экрана
    const screenWidth = window.innerWidth;
    
    // Если ширина экрана меньше или равна 480px, используем сдвиг на 180px
    let offset;
    if (screenWidth <= 480) {
        offset = -currentIndex * 180;  // Сдвиг на 180px для экранов 480px и меньше
    } else {
        offset = -currentIndex * 345;  // Стандартный сдвиг для экранов больше 480px
    }
    
    slider.style.transform = `translateX(${offset}px)`;
}

function changeSlide(direction, sliderType) {
    const visibleSlides = getVisibleSlides();

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

function handleTouchStartNew(event) {
    touchStartXNew = event.changedTouches[0].screenX;
}

function handleTouchEndNew(event) {
    touchEndXNew = event.changedTouches[0].screenX;

    if (touchStartXNew - touchEndXNew > 50) {
        // Swipe left
        changeSlide(1, 'new');
    } else if (touchEndXNew - touchStartXNew > 50) {
        // Swipe right
        changeSlide(-1, 'new');
    }
}

function handleTouchStartAnother(event) {
    touchStartXAnother = event.changedTouches[0].screenX;
}

function handleTouchEndAnother(event) {
    touchEndXAnother = event.changedTouches[0].screenX;

    if (touchStartXAnother - touchEndXAnother > 50) {
        // Swipe left
        changeSlide(1, 'another');
    } else if (touchEndXAnother - touchStartXAnother > 50) {
        // Swipe right
        changeSlide(-1, 'another');
    }
}

// Привязываем события к контейнерам слайдера
const newProductSlider = document.querySelector('.new-product__card');
const bestSellerSlider = document.querySelector('.best-seller-product__card');

if (newProductSlider) {
    newProductSlider.addEventListener('touchstart', handleTouchStartNew);
    newProductSlider.addEventListener('touchend', handleTouchEndNew);
}

if (bestSellerSlider) {
    bestSellerSlider.addEventListener('touchstart', handleTouchStartAnother);
    bestSellerSlider.addEventListener('touchend', handleTouchEndAnother);
}

// Инициализация слайдеров
updateSlider('.new-product__card', currentIndexNew);
updateSlider('.best-seller-product__card', currentIndexAnother);
