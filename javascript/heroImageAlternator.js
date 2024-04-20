document.addEventListener("DOMContentLoaded", function() {
    var heroSection = document.getElementById("hero-section");
    var backgroundImage = document.querySelector(".background-image");

    var herosecbg = ["../Images/hero section image.webp", "../Images/basketball.webp"];
    var currentbgIndex = 0;

    function changeBackground() {
        currentbgIndex = (currentbgIndex + 1) % herosecbg.length;
        backgroundImage.style.backgroundImage = "url('" + herosecbg[currentbgIndex] + "')";
    }

    changeBackground();

    setInterval(changeBackground, 5000);
});
