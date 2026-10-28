/*=========================================
        DOCTOR DASHBOARD
=========================================*/

function initDoctorDashboard() {

    /*=====================================
            LOAD DOCTOR
    =====================================*/

    let doctor = JSON.parse(
        localStorage.getItem("selectedDoctor")
    );

    if (!doctor) {

        doctor = {

            name: "Dr. John Smith",

            department: "Cardiology",

            image: "images/doctors/doctor1.jpg"

        };

    }

    const profileImage =
        document.querySelector(".doctor-dashboard-profile img");

    if (profileImage) {

        profileImage.src = doctor.image;

    }

    const doctorName =
        document.getElementById("dashboardDoctorName");

    if (doctorName) {

        doctorName.textContent = doctor.name;

    }

    const doctorTitle =
        document.getElementById("dashboardDoctorTitle");

    if (doctorTitle) {

        doctorTitle.textContent = doctor.name;

    }


    /*=====================================
            DASHBOARD NUMBERS
    =====================================*/

    const dashboardData = {

        pending: 12,

        today: 8,

        patients: 245,

        todayEarning: "₹12,500",

        lifetime: "₹18,75,000",

        reviews: "4.9 ★"

    };

    document.getElementById("dashboardPendingAppointments").textContent =
        dashboardData.pending;

    document.getElementById("dashboardTodayAppointments").textContent =
        dashboardData.today;

    document.getElementById("dashboardPatients").textContent =
        dashboardData.patients;

    document.getElementById("dashboardTodayEarning").textContent =
        dashboardData.todayEarning;

    document.getElementById("dashboardLifetimeEarning").textContent =
        dashboardData.lifetime;

    document.getElementById("dashboardReviews").textContent =
        dashboardData.reviews;


    /*=====================================
            BUTTON EVENTS
    =====================================*/

    document.querySelectorAll(".doctor-dashboard-action-btn")
        .forEach(button => {

            button.addEventListener("click", function () {

                const row = this.closest("tr");

                const patient = row.children[0].textContent;

                localStorage.setItem(

                    "selectedPatient",

                    patient

                );

                alert(patient + " selected.");

            });

        });


    /*=====================================
            MENU ACTIVE
    =====================================*/

    document.querySelectorAll(".doctor-dashboard-menu-link")
        .forEach(link => {

            link.addEventListener("click", function () {

                document.querySelectorAll(
                    ".doctor-dashboard-menu-link"
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

        ".doctor-dashboard-header," +

        ".doctor-dashboard-stat-card," +

        ".doctor-dashboard-appointments," +

        ".doctor-dashboard-revenue-card," +

        ".doctor-dashboard-patients-card"

    );

    const observer = new IntersectionObserver(entries => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                entry.target.classList.add(

                    "doctor-dashboard-show"

                );

            }

        });

    }, {

        threshold: 0.2

    });

    cards.forEach(card => {

        card.classList.add(

            "doctor-dashboard-hidden"

        );

        observer.observe(card);

    });

}