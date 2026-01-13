document.addEventListener("DOMContentLoaded", () => {

    /* ===============================
       BUTTON HOVER & GLOW (Back, Next, Add)
    =============================== */
    document.querySelectorAll(".btn, .back-btn, .next-dept-btn").forEach(btn => {
        btn.style.transition = "0.3s";
        btn.addEventListener("mouseenter", () => {
            btn.style.boxShadow = "0 0 18px rgba(168,85,247,0.9)";
            btn.style.transform = "scale(1.05)";
        });
        btn.addEventListener("mouseleave", () => {
            btn.style.boxShadow = "none";
            btn.style.transform = "scale(1)";
        });
    });

    /* ===============================
       INPUT & SELECT FOCUS ANIMATION
    =============================== */
    document.querySelectorAll("input, select").forEach(el => {
        el.style.transition = "0.2s";
        el.addEventListener("focus", () => {
            el.style.transform = "scale(1.04)";
            el.style.boxShadow = "0 0 14px rgba(168,85,247,0.8)";
        });
        el.addEventListener("blur", () => {
            el.style.transform = "scale(1)";
            el.style.boxShadow = "none";
        });
    });

    /* ===============================
       TABLE ROW FADE-IN & HOVER ANIMATION
    =============================== */
    const rows = document.querySelectorAll(".datagrid tbody tr");
    rows.forEach((row, index) => {
        row.style.opacity = "0";
        row.style.transform = "translateY(10px)";
        row.style.transition = "0.4s ease";

        // Fade-in on page load
        setTimeout(() => {
            row.style.opacity = "1";
            row.style.transform = "translateY(0)";
        }, index * 80);

        // Hover scale
        row.addEventListener("mouseenter", () => {
            row.style.transform = "scale(1.015)";
        });
        row.addEventListener("mouseleave", () => {
            row.style.transform = "scale(1)";
        });
    });

    /* ===============================
       FORM SUBMIT FEEDBACK
    =============================== */
    const form = document.querySelector(".student-form");
    if (form) {
        form.addEventListener("submit", () => {
            form.style.opacity = "0.7";
            form.style.pointerEvents = "none";
        });
    }

    /* ===============================
       NEXT DEPARTMENT BUTTON PULSE
    =============================== */
    const nextBtn = document.querySelector(".next-dept-btn");
    if (nextBtn) {
        nextBtn.style.transition = "0.4s";
        setInterval(() => {
            nextBtn.style.transform = "scale(1.03)";
            setTimeout(() => {
                nextBtn.style.transform = "scale(1)";
            }, 500);
        }, 2000); // pulses every 2 seconds
    }

});

