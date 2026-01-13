document.addEventListener("DOMContentLoaded", () => {

    const addBtn = document.getElementById("addBtn");
    const form = document.querySelector(".student-form");
    const tbody = document.querySelector(".datagrid tbody");

    // Helper to generate unique ID
    let nextId = tbody.rows.length + 1;

    addBtn.addEventListener("click", () => {
        // Get values from form inputs
        const studentId = form.student_id.value || `S${String(nextId).padStart(3,'0')}`;
        const name = form.name.value || "New Student";
        const age = form.age.value || 18;
        const address = form.address.value || "Unknown";
        const section = form.section.value || "A";

        // Create new row
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${studentId}</td>
            <td>${name}</td>
            <td>${age}</td>
            <td>${address}</td>
            <td>${section}</td>
            <td>
                <a href="#" class="btn edit">Edit</a>
                <button class="btn delete">Delete</button>
            </td>
        `;

        // Add hover animation
        newRow.style.opacity = 0;
        tbody.prepend(newRow);
        setTimeout(() => {
            newRow.style.transition = "opacity 0.4s ease, transform 0.3s ease";
            newRow.style.opacity = 1;
            newRow.style.transform = "scale(1.02)";
        }, 50);

        setTimeout(() => newRow.style.transform = "scale(1)", 400);

        // Add delete functionality
        const deleteBtn = newRow.querySelector(".delete");
        deleteBtn.addEventListener("click", () => {
            newRow.style.transition = "opacity 0.4s ease, transform 0.3s ease";
            newRow.style.opacity = 0;
            newRow.style.transform = "scale(0.95)";
            setTimeout(() => newRow.remove(), 400);
        });

        // Optional: clear form inputs
        form.student_id.value = "";
        form.name.value = "";
        form.age.value = "";
        form.address.value = "";
        form.section.value = "";

        nextId++;
    });

});
