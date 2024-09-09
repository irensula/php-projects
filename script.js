const hamMenu = document.querySelector(".burger-spans");

const offScreenMenu = document.querySelector(".off-screen-menu");

hamMenu.addEventListener("click", () => {
  hamMenu.classList.toggle("active");
  offScreenMenu.classList.toggle("active");
});

// load
window.addEventListener("load", function() {
    // Minimum loading time of 3 seconds
    const minLoadTime = 3000;
    const startTime = new Date().getTime();

    // Hide loader after the page is fully loaded but wait at least 3 seconds
    const hideLoader = () => {
        const currentTime = new Date().getTime();
        const elapsedTime = currentTime - startTime;

        if (elapsedTime >= minLoadTime) {
            document.getElementById('loader').style.display = 'none';
            document.getElementById('content').style.display = 'block';
            document.body.style.overflow = 'auto'; // Restore scrolling
        } else {
            setTimeout(hideLoader, minLoadTime - elapsedTime);
        }
    };

    hideLoader();
  });