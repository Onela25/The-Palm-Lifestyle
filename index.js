document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('.toggle-button');
    const navLinks = document.querySelector('.nav-links');
    const backButton = document.getElementById('back-button');
    const hamburger = document.querySelector('.hamburger');

   
    if (toggleButton) {
        toggleButton.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    }

   
    if (localStorage.getItem('navLinkClicked')) {
        backButton.style.display = 'block';
    } else {
        backButton.style.display = 'none';
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

  
    if (hamburger) {
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.classList.toggle('active');
        });
    }

   
    function verifyAge() {
        const age = prompt("How old are you?");
        if (age < 18) {
            alert("The legal age to drink is 18. Sorry ☹️.");
        } else {
            alert("Welcome🥂");
        }
    }

   
    verifyAge();
});
