document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.getElementById('nav-links');
    const backButton = document.getElementById('back-button');
    const hamburger = document.querySelector('.hamburger');

    
    function verifyAge() {
        console.log("verifyAge function called");
        const age = prompt("How old are you?");
        console.log("User's age:", age);
        if (age < 18) {
            alert("The legal age to drink is 18. Sorry ☹️.");
        } else {
            alert("Welcome🥂");
        }
    }

   
    verifyAge();

   
    if (hamburger) {
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active'); 
            hamburger.classList.toggle('active'); 
        });
    }

   
    if (backButton) {
        backButton.addEventListener('click', () => {
            window.location.href = 'index.html';
        });
    }

   
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            backButton.style.display = 'block';
            localStorage.setItem('navLinkClicked', 'true'); 
        });
    });

   
    if (localStorage.getItem('navLinkClicked')) {
        backButton.style.display = 'block';
    } else {
        backButton.style.display = 'none';
    }
});
