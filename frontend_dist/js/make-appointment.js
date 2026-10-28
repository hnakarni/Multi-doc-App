/*=========================================
        MAKE APPOINTMENT
=========================================*/

function initMakeAppointment() {

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

    document.getElementById("appointmentPatientName").textContent =
        patient.name;

    document.getElementById("appointmentPatientId").textContent =
        patient.id;

    document.getElementById("appointmentPatientImage").src =
        patient.image;


    /*=====================================
            DOCTORS DATA
    =====================================*/

    const doctors = {

        Cardiology: [

            { name: "Dr. John Smith", fee: 700 },

            { name: "Dr. David Wilson", fee: 800 }

        ],

        Neurology: [

            { name: "Dr. George Steven", fee: 900 }

        ],

        Orthopedic: [

            { name: "Dr. Michael Williams", fee: 600 }

        ],

        Dermatology: [

            { name: "Dr. Emma Wilson", fee: 500 }

        ],

        ENT: [

            { name: "Dr. Sophia Brown", fee: 550 }

        ],

        Pediatrics: [

            { name: "Dr. Rex Davis", fee: 450 }

        ]

    };


    const department =
        document.getElementById("appointmentDepartment");

    const doctor =
        document.getElementById("appointmentDoctor");

    const fee =
        document.getElementById("consultationFee");


    /*=====================================
            LOAD DOCTORS
    =====================================*/

    department.addEventListener("change", function () {

        doctor.innerHTML =

            `<option value="">Select Doctor</option>`;

        fee.value = "₹500";

        if (!this.value) return;

        doctors[this.value].forEach(item => {

            doctor.innerHTML += `

                <option
                    value="${item.name}"
                    data-fee="${item.fee}">

                    ${item.name}

                </option>

            `;

        });

        updateSummary();

    });


    /*=====================================
            DOCTOR CHANGE
    =====================================*/

    doctor.addEventListener("change", function () {

        const selected =
            this.options[this.selectedIndex];

        const doctorFee =
            selected.dataset.fee || 500;

        fee.value = `₹${doctorFee}`;

        updateSummary();

    });


    /*=====================================
            TODAY DATE
    =====================================*/

    const dateInput =
        document.getElementById("appointmentDate");

    const today =
        new Date().toISOString().split("T")[0];

    dateInput.min = today;


    /*=====================================
            SUMMARY
    =====================================*/

    function updateSummary() {

        document.getElementById("summaryDepartment").textContent =
            department.value || "-";

        document.getElementById("summaryDoctor").textContent =
            doctor.value || "-";

        document.getElementById("summaryDate").textContent =
            dateInput.value || "-";

        document.getElementById("summaryTime").textContent =
            document.getElementById("appointmentTime").value || "-";

        document.getElementById("summaryFee").textContent =
            fee.value;

    }

    department.addEventListener("change", updateSummary);

    doctor.addEventListener("change", updateSummary);

    dateInput.addEventListener("change", updateSummary);

    document.getElementById("appointmentTime")

        .addEventListener("change", updateSummary);


    /*=====================================
            BOOK APPOINTMENT
    =====================================*/

    document.getElementById("appointmentForm")

        .addEventListener("submit", function (e) {

            e.preventDefault();

            const token =
                Math.floor(Math.random() * 900) + 100;

            const appointment = {

                patientId: patient.id,

                patientName: patient.name,

                department: department.value,

                doctor: doctor.value,

                date: dateInput.value,

                time:

                    document.getElementById(

                        "appointmentTime"

                    ).value,

                fee: fee.value,

                payment:

                    document.getElementById(

                        "paymentMethod"

                    ).value,

                notes:

                    document.getElementById(

                        "appointmentNotes"

                    ).value,

                token,

                status: "Pending"

            };

            const appointments = JSON.parse(

                localStorage.getItem(

                    "appointments"

                )

            ) || [];

            appointments.push(appointment);

            localStorage.setItem(

                "appointments",

                JSON.stringify(appointments)

            );

            alert(

                `Appointment booked successfully!\n\nToken No : ${token}`

            );

            this.reset();

            doctor.innerHTML =

                `<option value="">Select Doctor</option>`;

            fee.value = "₹500";

            updateSummary();

        });


    /*=====================================
            MENU ACTIVE
    =====================================*/

    document.querySelectorAll(

        ".make-appointment-menu-link"

    ).forEach(link => {

        link.addEventListener("click", function () {

            document.querySelectorAll(

                ".make-appointment-menu-link"

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

        ".make-appointment-card"

    );

    const observer = new IntersectionObserver(

        entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add(

                        "make-appointment-show"

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

            "make-appointment-hidden"

        );

        observer.observe(card);

    });

}