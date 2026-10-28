/*=========================================
        PATIENT DASHBOARD
=========================================*/

function initPatientDashboard() {

    /*=====================================
            PATIENT DETAILS
    =====================================*/

    let patient = JSON.parse(
        localStorage.getItem("loggedInPatient")
    );

    if (!patient) {

        patient = {

            id: "PAT1001",

            name: "Rahul Patel",

            image: "images/patients/patient1.jpg"

        };

    }

    const patientName =
        document.getElementById("patientDashboardName");

    const welcomeName =
        document.getElementById("patientWelcomeName");

    const patientId =
        document.getElementById("patientDashboardId");

    const patientImage =
        document.getElementById("patientDashboardImage");

    if (patientName) {

        patientName.textContent = patient.name;

    }

    if (welcomeName) {

        welcomeName.textContent = patient.name;

    }

    if (patientId) {

        patientId.textContent = patient.id;

    }

    if (patientImage) {

        patientImage.src = patient.image;

    }


    /*=====================================
            APPOINTMENTS
    =====================================*/

    const appointments = JSON.parse(

        localStorage.getItem("appointments")

    ) || [];

    const totalAppointments =
        document.getElementById("patientTotalAppointments");

    const upcomingAppointments =
        document.getElementById("patientUpcomingAppointments");

    const prescriptionCount =
        document.getElementById("patientPrescriptionCount");

    const doctorsVisited =
        document.getElementById("patientDoctorsVisited");

    if (totalAppointments) {

        totalAppointments.textContent = appointments.length;

    }

    const upcoming = appointments.filter(item =>

        item.status !== "Completed"

    );

    if (upcomingAppointments) {

        upcomingAppointments.textContent =
            upcoming.length;

    }

    if (doctorsVisited) {

        const doctors = [

            ...new Set(

                appointments.map(item => item.doctor)

            )

        ];

        doctorsVisited.textContent = doctors.length;

    }


    /*=====================================
            PRESCRIPTION
    =====================================*/

    const treatment = JSON.parse(

        localStorage.getItem("patientTreatment")

    );

    if (treatment) {

        if (prescriptionCount) {

            prescriptionCount.textContent = "1";

        }

        const doctor =
            document.getElementById("latestDoctor");

        const department =
            document.getElementById("latestDepartment");

        const diagnosis =
            document.getElementById("latestDiagnosis");

        const date =
            document.getElementById("latestPrescriptionDate");

        if (doctor) {

            doctor.textContent =
                treatment.doctor.name;

        }

        if (department) {

            department.textContent =
                treatment.doctor.department;

        }

        if (diagnosis) {

            diagnosis.textContent =
                treatment.diagnosis;

        }

        if (date) {

            date.textContent =
                new Date().toLocaleDateString("en-IN");

        }

    } else {

        if (prescriptionCount) {

            prescriptionCount.textContent = "0";

        }

    }


    /*=====================================
            APPOINTMENT TABLE
    =====================================*/

    const table =
        document.getElementById("patientAppointmentTable");

    if (table) {

        table.innerHTML = "";

        if (upcoming.length === 0) {

            table.innerHTML = `

                <tr>

                    <td colspan="6">

                        No Upcoming Appointments

                    </td>

                </tr>

            `;

        } else {

            upcoming.slice(0, 5).forEach(item => {

                table.innerHTML += `

                    <tr>

                        <td>${item.doctor}</td>

                        <td>${item.department}</td>

                        <td>${item.date}</td>

                        <td>${item.time}</td>

                        <td>

                            <span class="status pending">

                                ${item.status}

                            </span>

                        </td>

                        <td>

                            <a href="#"

                               class="nav-link dashboard-btn"

                               data-page="patient-appointment-details">

                                View

                            </a>

                        </td>

                    </tr>

                `;

            });

        }

    }


    /*=====================================
            ACTIVE MENU
    =====================================*/

    document.querySelectorAll(".patient-menu")

        .forEach(link => {

            link.addEventListener("click", function () {

                document

                    .querySelectorAll(".patient-menu")

                    .forEach(item =>

                        item.classList.remove("active")

                    );

                this.classList.add("active");

            });

        });


    /*=====================================
            SCROLL ANIMATION
    =====================================*/

    const cards = document.querySelectorAll(

        ".dashboard-card,.dashboard-section,.action-card"

    );

    const observer = new IntersectionObserver(

        entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.style.opacity = "1";

                    entry.target.style.transform =

                        "translateY(0)";

                }

            });

        },

        {

            threshold: 0.15

        }

    );

    cards.forEach(card => {

        card.style.opacity = "0";

        card.style.transform =

            "translateY(30px)";

        card.style.transition = ".6s";

        observer.observe(card);

    });

}