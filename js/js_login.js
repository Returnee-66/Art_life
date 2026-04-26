document.addEventListener('DOMContentLoaded', function() {
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
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    if (portfolioItems.length > 0) {
        function initPortfolio() {
            if (window.innerWidth <= 980) {
                portfolioItems.forEach(item => {
                    item.removeEventListener('click', item._clickHandler);

                    item._clickHandler = function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        portfolioItems.forEach(otherItem => {
                            if (otherItem !== this && otherItem.classList.contains('active')) {
                                otherItem.classList.remove('active');
                            }
                        });
                        this.classList.toggle('active');
                        
                        const projectId = this.getAttribute('data-project');
                        if (projectId) {
                            console.log('Проект: ' + projectId);
                        }
                    };
                    
                    item.addEventListener('click', item._clickHandler);
                });
            } else {
                portfolioItems.forEach(item => {
                    item.classList.remove('active');
                    if (item._clickHandler) {
                        item.removeEventListener('click', item._clickHandler);
                    }
                });
            }
        }

        initPortfolio();

        window.addEventListener('resize', function() {
            initPortfolio();
        });
    }
});

document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault(); 
    const login = document.getElementById('login').value;
    const password = document.getElementById('password').value;
    const messageBox = document.getElementById('messageBox');
    
    messageBox.style.display = 'none';
    messageBox.className = 'message-box';
    
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'login=' + encodeURIComponent(login) + '&password=' + encodeURIComponent(password)
    })
    .then(response => response.text())
    .then(data => {
        if (data.includes('profile.php') || data.includes('Location: profile.php')) {
            window.location.href = 'profile.php';
        } else if (data.includes('Неверный') || data.includes('не найден')) {
            messageBox.textContent = data.replace('Неверный пароль. Назад', 'Неверный пароль').replace('Пользователь не найден. Назад', 'Пользователь не найден');
            messageBox.classList.add('error');
            messageBox.style.display = 'block';
        } else {
            messageBox.textContent = 'Ошибка при входе. Попробуйте еще раз.';
            messageBox.classList.add('error');
            messageBox.style.display = 'block';
        }
    })
    .catch(error => {
        messageBox.textContent = 'Ошибка соединения. Попробуйте позже.';
        messageBox.classList.add('error');
        messageBox.style.display = 'block';
    });
});