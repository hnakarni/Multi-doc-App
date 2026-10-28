function initDoctors() {

    const departmentFilter = document.getElementById("departmentFilter");
    const doctorCards = document.querySelectorAll(".doctor-card");

    if (departmentFilter) {

        departmentFilter.addEventListener("change", function () {

            const selectedDepartment = this.value;

            doctorCards.forEach(card => {

                if (
                    selectedDepartment === "All" ||
                    card.dataset.department === selectedDepartment
                ) {

                    card.style.display = "block";

                } else {

                    card.style.display = "none";

                }

            });

        });

    }

}