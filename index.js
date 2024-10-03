document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('.toggle-button');
    const navLinks = document.querySelector('.nav-links');
    const backButton = document.getElementById('back-button');

  
    if (localStorage.getItem('navLinkClicked')) {
        backButton.style.display = 'block';
    } else {
        backButton.style.display = 'none';
    }

   
    if (toggleButton) {
        toggleButton.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    }

   
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            backButton.style.display = 'block';
            localStorage.setItem('navLinkClicked', 'true');
        });
    });

    
    backButton.addEventListener('click', () => {
        window.location.href = 'index.html';
    });
});
