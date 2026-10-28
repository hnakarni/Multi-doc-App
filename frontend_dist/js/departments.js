function initDepartments() {

    const cards = document.querySelectorAll(".department-card");

    cards.forEach(card => {

        card.style.cursor = "pointer";

        card.addEventListener("click", function () {

            const department = this.dataset.department;

            console.log(department);

            localStorage.setItem("selectedDepartment", department);

            loadPage("department-details");

        });

    });

}