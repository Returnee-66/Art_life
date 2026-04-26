const burger = document.getElementById('burger');
const burgerMenu = document.getElementById('burgerMenu');

if (burger && burgerMenu) {
    burger.addEventListener('click', function(e) {
        e.stopPropagation();
        burger.classList.toggle('active');
        burgerMenu.classList.toggle('active');
        
        if (burgerMenu.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    });

    const burgerLinks = burgerMenu.querySelectorAll('.nav-link');
    burgerLinks.forEach(link => {
        link.addEventListener('click', function() {
            burger.classList.remove('active');
            burgerMenu.classList.remove('active');
            document.body.style.overflow = '';
        });
    });

    document.addEventListener('click', function(event) {
        const isClickInsideNav = event.target.closest('.nav');
        if (!isClickInsideNav && burgerMenu.classList.contains('active')) {
            burger.classList.remove('active');
            burgerMenu.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth > 980) {
            burger.classList.remove('active');
            burgerMenu.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
}

const slider = document.getElementById('slider');
const slides = document.querySelectorAll('.slide');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const dotsContainer = document.getElementById('dots');

let currentIndex = 0;
const totalSlides = slides.length;

slides.forEach((_, index) => {
    const dot = document.createElement('div');
    dot.classList.add('dot');
    if (index === 0) dot.classList.add('active');
    dot.addEventListener('click', () => goToSlide(index));
    dotsContainer.appendChild(dot);
});

const dots = document.querySelectorAll('.dot');

function updateSlider() {
    slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentIndex);
    });
}

function goToSlide(index) {
    currentIndex = index;
    updateSlider();
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlider();
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateSlider();
}

nextBtn.addEventListener('click', nextSlide);
prevBtn.addEventListener('click', prevSlide);

let autoSlide = setInterval(nextSlide, 5000);

slider.addEventListener('mouseenter', () => clearInterval(autoSlide));
slider.addEventListener('mouseleave', () => {
    autoSlide = setInterval(nextSlide, 5000);
});