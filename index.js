document.addEventListener('DOMContentLoaded', () => {
        const toggleButton = document.querySelector('.toggle-button');
        const navLinks = document.querySelector('.nav-links');

        toggleButton.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    });

   

            document.querySelectorAll('.nav-links a').forEach(link => {
                link.addEventListener('click', () => {
                    document.getElementById('back-button').style.display = 'block';
                });
            });

            document.getElementById('back-button').addEventListener('click', () => {
                window.history.back();
            });
   