console.log("Dashboard JS loaded");

document.addEventListener("DOMContentLoaded", () => {

    const cards = document.querySelectorAll(".card");
    const chart = document.querySelector(".chart-wrapper");
    const table = document.querySelector(".table-wrapper");
    const backBtn = document.querySelector(".back-btn");

    // Initial states
    [...cards, chart, table].forEach(el => {
        if (el) {
            el.style.opacity = "0";
            el.style.transform = "translateY(20px)";
        }
    });

    if (backBtn) {
        backBtn.style.opacity = "0";
        backBtn.style.transform = "translateY(-10px)";
    }

    // Back button
    if (backBtn) {
        setTimeout(() => {
            backBtn.style.transition = "0.4s ease";
            backBtn.style.opacity = "1";
            backBtn.style.transform = "translateY(0)";
        }, 100);
    }

    // Cards animation
    cards.forEach((card, i) => {
        setTimeout(() => {
            card.style.transition = "0.5s ease";
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }, 200 + i * 120);
    });

    // Chart
    if (chart) {
        setTimeout(() => {
            chart.style.transition = "0.6s ease";
            chart.style.opacity = "1";
            chart.style.transform = "translateY(0)";
        }, 700);
    }

    // Table
    if (table) {
        setTimeout(() => {
            table.style.transition = "0.6s ease";
            table.style.opacity = "1";
            table.style.transform = "translateY(0)";
        }, 900);
    }

    // Back button fade out
    if (backBtn) {
        backBtn.addEventListener("click", e => {
            e.preventDefault();
            document.body.style.opacity = "0";
            setTimeout(() => {
                window.location.href = backBtn.href;
            }, 400);
        });
    }
});
