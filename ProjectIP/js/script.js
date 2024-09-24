// navbar toggling
const navbarShowBtn = document.querySelector('.navbar-show-btn');
const navbarCollapseDiv = document.querySelector('.navbar-collapse');
const navbarHideBtn = document.querySelector('.navbar-hide-btn');

navbarShowBtn.addEventListener('click', function () {
    navbarCollapseDiv.classList.add('navbar-show');
});
navbarHideBtn.addEventListener('click', function () {
    navbarCollapseDiv.classList.remove('navbar-show');
});

// changing search icon image on window resize
window.addEventListener('resize', changeSearchIcon);
function changeSearchIcon() {
    let winSize = window.matchMedia("(min-width: 1200px)");
    if (winSize.matches) {
        document.querySelector('.search-icon img').src = "images/search-icon.png";
    } else {
        document.querySelector('.search-icon img').src = "images/search-icon-dark.png";
    }
}
changeSearchIcon();

// stopping all animation and transition
let resizeTimer;
window.addEventListener('resize', () => {
    document.body.classList.add('resize-animation-stopper');
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        document.body.classList.remove('resize-animation-stopper');
    }, 400);
});

// навигация по странице с использованием smooth scroll
document.addEventListener('DOMContentLoaded', function () {
    // Smooth scroll для ссылок с якорями
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));

            if (target) {
                window.scrollTo({
                    top: target.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
});

// Добавляем обработчик события для кнопки "Learn More" в разделе "About"
const learnMoreBtn = document.querySelector('.about .btn-white');
const aboutDetails = document.querySelector('.about .text-lg'); // Предположим, что здесь хранится скрытая информация

learnMoreBtn.addEventListener('click', function () {
    // Переключаем класс для показа/скрытия дополнительной информации
    aboutDetails.classList.toggle('show');
});


// Добавляем обработчик события для кнопки "Sign In"
const signInBtn = document.querySelector('.header-inner .btn-light-blue');

signInBtn.addEventListener('click', function () {
    // Перенаправляем пользователя на страницу входа или регистрации
    window.location.href = "signin.html"; // Предполагается, что страница для входа называется signin.html
});


// Добавляем обработчик события для кнопки "Read More" в разделе блога
const readMoreBtns = document.querySelectorAll('.posts .btn-blue');

readMoreBtns.forEach(btn => {
    btn.addEventListener('click', function () {
        // Находим родительский элемент кнопки, содержащий дополнительный текст
        const postContent = this.closest('.post-item').querySelector('.text-sm'); // Предположим, что здесь хранится скрытая информация

        // Переключаем класс для показа/скрытия дополнительного текста
        postContent.classList.toggle('show');
    });
});

