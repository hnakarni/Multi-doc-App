/*=========================================
        PATIENT APPOINTMENTS
=========================================*/

function initPatientAppointmentDetails() {

    /*=====================================
            LOAD PATIENT
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

    document.getElementById("patientAppointmentName").textContent =
        patient.name;

    document.getElementById("patientAppointmentId").textContent =
        patient.id;

    document.getElementById("patientAppointmentImage").src =
        patient.image;


    /*=====================================
            LOAD APPOINTMENTS
    =====================================*/

    let appointments = JSON.parse(

        localStorage.getItem("appointments")

    ) || [];


    const table =
        document.getElementById("patientAppointmentTableBody");

    const search =
        document.getElementById("patientAppointmentSearch");

    const filter =
        document.getElementById("patientAppointmentStatusFilter");


    function renderTable() {

        let keyword = search.value.toLowerCase();

        let status = filter.value;

        let data = appointments.filter(item => {

            let matchSearch =

                item.doctor.toLowerCase().includes(keyword) ||

                item.department.toLowerCase().includes(keyword) ||

                item.date.toLowerCase().includes(keyword);

            let matchStatus =

                status === "all" ||

                item.status === status;

            return matchSearch && matchStatus;

        });


        /* Statistics */

        document.getElementById("patientAppointmentTotal").textContent =
            appointments.length;

        document.getElementById("patientAppointmentPending").textContent =
            appointments.filter(x => x.status === "Pending").length;

        document.getElementById("patientAppointmentCompleted").textContent =
            appointments.filter(x => x.status === "Completed").length;

        document.getElementById("patientAppointmentCancelled").textContent =
            appointments.filter(x => x.status === "Cancelled").length;


        /* Table */

        table.innerHTML = "";

        if (data.length === 0) {

            table.innerHTML = `

                <tr>

                    <td colspan="7">

                        No appointments found.

                    </td>

                </tr>

            `;

            return;

        }

        data.forEach((item, index) => {

            let buttons = `

                <div class="patient-appointment-action">

                    <button
                        class="patient-appointment-view-btn">

                        <i class="fa-solid fa-eye"></i>

                        View

                    </button>

            `;

            if (item.status === "Completed") {

                buttons += `

                    <a href="#"

                       class="nav-link patient-appointment-prescription-btn"

                       data-page="patient-description">

                        <i class="fa-solid fa-file-prescription"></i>

                        Prescription

                    </a>

                `;

            }

            if (item.status === "Pending") {

                buttons += `

                    <button

                        class="patient-appointment-cancel-btn"

                        data-index="${index}">

                        <i class="fa-solid fa-xmark"></i>

                        Cancel

                    </button>

                `;

            }

            buttons += `</div>`;

            table.innerHTML += `

                <tr>

                    <td>${index + 1}</td>

                    <td>${item.doctor}</td>

                    <td>${item.department}</td>

                    <td>${item.date}</td>

                    <td>${item.time}</td>

                    <td>

                        <span class="patient-appointment-status ${item.status.toLowerCase()}">

                            ${item.status}

                        </span>

                    </td>

                    <td>

                        ${buttons}

                    </td>

                </tr>

            `;

        });


        /* Cancel */

        document

            .querySelectorAll(".patient-appointment-cancel-btn")

            .forEach(btn => {

                btn.onclick = function () {

                    const index = this.dataset.index;

                    appointments[index].status = "Cancelled";

                    localStorage.setItem(

                        "appointments",

                        JSON.stringify(appointments)

                    );

                    renderTable();

                }

            });

    }


    renderTable();

    search.addEventListener("keyup", renderTable);

    filter.addEventListener("change", renderTable);


    /*=====================================
            ACTIVE MENU
    =====================================*/

    document.querySelectorAll(

        ".patient-appointment-menu-link"

    ).forEach(link => {

        link.addEventListener("click", function () {

            document.querySelectorAll(

                ".patient-appointment-menu-link"

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

        ".patient-appointment-stat-card,.patient-appointment-table-wrapper"

    );

    const observer = new IntersectionObserver(

        entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add(

                        "patient-appointment-show"

                    );

                }

            });

        },

        {

            threshold: .2

        }

    );

    cards.forEach(card => {

        card.classList.add(

            "patient-appointment-hidden"

        );

        observer.observe(card);

    });

}