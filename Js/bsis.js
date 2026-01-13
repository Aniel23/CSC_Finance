document.addEventListener("DOMContentLoaded", () => {

    /* ===============================
       BUTTON HOVER & GLOW EFFECT
    =============================== */
    const buttons = document.querySelectorAll(".btn, .back-btn, .next-dept-btn");

    buttons.forEach(btn => {
        btn.addEventListener("mouseenter", () => {
            btn.style.boxShadow = "0 0 15px rgba(168,85,247,0.8)";
            btn.style.transform = "scale(1.05)";
        });

        btn.addEventListener("mouseleave", () => {
            btn.style.boxShadow = "none";
            btn.style.transform = "scale(1)";
        });
    });

    /* ===============================
       INPUT & SELECT FOCUS EFFECT
    =============================== */
    const fields = document.querySelectorAll("input, select");

    fields.forEach(field => {
        field.addEventListener("focus", () => {
            field.style.transform = "scale(1.04)";
            field.style.boxShadow = "0 0 12px rgba(168,85,247,0.7)";
        });

        field.addEventListener("blur", () => {
            field.style.transform = "scale(1)";
            field.style.boxShadow = "none";
        });
    });

    /* ===============================
       TABLE ROW HOVER ANIMATION
    =============================== */
    const rows = document.querySelectorAll(".datagrid tbody tr");

    rows.forEach(row => {
        row.style.transition = "0.25s ease";

        row.addEventListener("mouseenter", () => {
            row.style.transform = "scale(1.015)";
            row.style.background = "rgba(168,85,247,0.12)";
        });

        row.addEventListener("mouseleave", () => {
            row.style.transform = "scale(1)";
            row.style.background = "transparent";
        });
    });

    /* ===============================
       TABLE ROW FADE-IN ON LOAD
    =============================== */
    rows.forEach((row, index) => {
        row.style.opacity = "0";
        row.style.transform = "translateY(10px)";
        setTimeout(() => {
            row.style.transition = "0.4s ease";
            row.style.opacity = "1";
            row.style.transform = "translateY(0)";
        }, index * 80);
    });

    /* ===============================
       FORM SUBMIT FEEDBACK
    =============================== */
    const form = document.querySelector(".student-form");

    if (form) {
        form.addEventListener("submit", (e) => {
            form.style.opacity = "0.7";
            form.style.pointerEvents = "none";
        });
    }

    /* ===============================
       NEXT DEPARTMENT BUTTON EFFECT
    =============================== */
    const nextBtn = document.querySelector(".next-dept-btn");
    if (nextBtn) {
        nextBtn.addEventListener("mouseenter", () => {
            nextBtn.style.boxShadow = "0 0 20px rgba(74,222,128,0.8)";
            nextBtn.style.transform = "scale(1.08)";
        });

        nextBtn.addEventListener("mouseleave", () => {
            nextBtn.style.boxShadow = "none";
            nextBtn.style.transform = "scale(1)";
        });
    }

});

