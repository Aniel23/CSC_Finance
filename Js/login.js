// Small animation effect on input focus
const inputs = document.querySelectorAll(".input-box input");

inputs.forEach(input => {
    input.addEventListener("focus", () => {
        input.style.transform = "scale(1.02)";
    });

    input.addEventListener("blur", () => {
        input.style.transform = "scale(1)";
    });
});

// Optional: Show/hide password toggle
document.querySelectorAll(".input-box input[type='password']").forEach(passwordInput => {
    const toggleBtn = document.createElement("i");
    toggleBtn.innerText = "👁️"; // You can replace with an eye icon
    toggleBtn.style.position = "absolute";
    toggleBtn.style.right = "10px";
    toggleBtn.style.top = "12px";
    toggleBtn.style.cursor = "pointer";
    passwordInput.parentElement.appendChild(toggleBtn);

    toggleBtn.addEventListener("click", () => {
        if(passwordInput.type === "password"){
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
});

