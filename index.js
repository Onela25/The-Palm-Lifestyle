document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('.toggle-button');
    const navLinks = document.querySelector('.nav-links');
    const backButton = document.getElementById('back-button');

    toggleButton.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            backButton.style.display = 'block';
        });
    });


    backButton.addEventListener('click', () => {
        window.history.back(); 
        backButton.style.display = 'none'; 
    });

   
    if (window.location.pathname.endsWith('index.html')) {
        backButton.style.display = 'none';
    }
});
