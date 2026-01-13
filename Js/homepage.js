console.log("Homepage JS loaded");

// ===============================
// PAGE LOAD & SCROLL ANIMATIONS
// ===============================
document.addEventListener("DOMContentLoaded", () => {

    const hero = document.querySelector(".hero-section");
    const centerImage = document.querySelector(".center-image-section");
    const details = document.querySelector(".details-section");

    // Initial states
    [hero, centerImage, details].forEach(el => {
        if (el) {
            el.style.opacity = "0";
            el.style.transform = "translateY(40px)";
        }
    });

    // Hero animation (on load)
    setTimeout(() => {
        if (hero) {
            hero.style.transition = "0.8s ease";
            hero.style.opacity = "1";
            hero.style.transform = "translateY(0)";
        }
    }, 200);

    // Image animation (slightly delayed)
    setTimeout(() => {
        if (centerImage) {
            centerImage.style.transition = "0.8s ease";
            centerImage.style.opacity = "1";
            centerImage.style.transform = "translateY(0)";
        }
    }, 500);

    // Details animation (last)
    setTimeout(() => {
        if (details) {
            details.style.transition = "0.8s ease";
            details.style.opacity = "1";
            details.style.transform = "translateY(0)";
        }
    }, 800);
});

// ===============================
// NAVIGATION HANDLERS
// ===============================
document.addEventListener("DOMContentLoaded", () => {

    const navMap = {
        "Dashboard": "dashboard.php",
        "Student Information": "studentinfo.php",
        "Student Fines": "studentfines.php",
        "Reports": "reports.php",
        "About CSC": "aboutcsc.php",
        "Logout": "logout.php"
    };

    document.querySelectorAll(".nav-links a").forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();

            const text = link.textContent.trim();
            const targetPage = navMap[text];

            if (targetPage) {
                // Fade-out animation before redirect
                document.body.style.transition = "opacity 0.4s ease";
                document.body.style.opacity = "0";

                setTimeout(() => {
                    window.location.href = targetPage;
                }, 400);
            }
        });
    });
});
