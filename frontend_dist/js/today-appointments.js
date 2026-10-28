/*=========================================
        TODAY APPOINTMENTS
=========================================*/

function initTodayAppointments() {

    /*=====================================
            LOAD DOCTOR
    =====================================*/

    let doctor = JSON.parse(

        localStorage.getItem("selectedDoctor")

    );

    if (!doctor) {

        doctor = {

            id: "DOC1001",

            name: "Dr. John Smith",

            image: "images/doctors/doctor1.jpg"

        };

    }

    document.getElementById("todayAppointmentsDoctorName").textContent =
        doctor.name;

    document.getElementById("todayAppointmentsDoctorId").textContent =
        doctor.id;

    document.getElementById("todayAppointmentsDoctorImage").src =
        doctor.image;


    /*=====================================
            TODAY DATE
    =====================================*/

    const options = {

        day: "numeric",

        month: "long",

        year: "numeric"

    };

    document.getElementById(

        "todayAppointmentsDate"

    ).textContent = new Date().toLocaleDateString(

        "en-IN",

        options

    );


    /*=====================================
            FILTER APPOINTMENTS
    =====================================*/

    function filterAppointments() {

        const selectedTime =

            document.getElementById(

                "todayAppointmentTime"

            ).value;

        const rows = document.querySelectorAll(

            "#todayAppointmentsTable tr"

        );

        rows.forEach(row => {

            const rowTime = row.dataset.time;

            if (

                selectedTime === "all" ||

                rowTime === selectedTime

            ) {

                row.style.display = "";

            }

            else {

                row.style.display = "table-row";

                row.style.display = "none";

            }

        });

    }

    document.getElementById(

        "todayAppointmentSearch"

    ).addEventListener(

        "click",

        filterAppointments

    );


    /*=====================================
            VIEW PATIENT
    =====================================*/

    document.querySelectorAll(

        ".today-appointments-view-btn"

    ).forEach(button => {

        button.addEventListener("click", function () {

            const row =

                this.closest("tr");

            const patient = {

                name:

                    row.children[1]

                        .querySelector("strong")

                        .textContent,

                phone:

                    row.children[1]

                        .querySelector("small")

                        .textContent,

                age:

                    row.children[2].textContent,

                fee:

                    row.children[3].textContent,

                token:

                    row.children[4].textContent,

                time:

                    row.children[5].textContent,

                status:

                    row.children[6].textContent.trim()

            };

            localStorage.setItem(

                "selectedPatient",

                JSON.stringify(patient)

            );

            loadPage(

                "patient-description"

            );

        });

    });


    /*=====================================
            SIDEBAR ACTIVE
    =====================================*/

    document.querySelectorAll(

        ".today-appointments-menu-link"

    ).forEach(link => {

        link.addEventListener("click", function () {

            document.querySelectorAll(

                ".today-appointments-menu-link"

            ).forEach(item => {

                item.classList.remove("active");

            });

            this.classList.add("active");

        });

    });


    /*=====================================
            SCROLL ANIMATION
    =====================================*/

    const cards = document.querySelectorAll(

        ".today-appointments-card"

    );

    const observer = new IntersectionObserver(

        entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add(

                        "today-appointments-show"

                    );

                }

            });

        },

        {

            threshold: 0.2

        }

    );

    cards.forEach(card => {

        card.classList.add(

            "today-appointments-hidden"

        );

        observer.observe(card);

    });

}