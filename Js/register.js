// Input focus animation
const input = document.querySelector("input");
const form = document.querySelector("form");

input.addEventListener("focus", () => {
    input.style.transform = "scale(1.03)";
});

input.addEventListener("blur", () => {
    input.style.transform = "scale(1)";
});

// Simple Student ID validation
form.addEventListener("submit", (e) => {
    if (input.value.trim() === "") {
        e.preventDefault();
        input.style.borderColor = "red";
        input.placeholder = "Student ID is required";
        input.focus();
    }
});
