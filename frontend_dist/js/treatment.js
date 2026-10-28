/*=========================================
        TREATMENT
=========================================*/

function initTreatment() {

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

    document.getElementById("treatmentDoctorName").textContent =
        doctor.name;

    document.getElementById("treatmentDoctorId").textContent =
        doctor.id;

    document.getElementById("treatmentDoctorImage").src =
        doctor.image;


    /*=====================================
            LOAD PATIENT
    =====================================*/

    let patient = JSON.parse(
        localStorage.getItem("selectedPatient")
    );

    if (!patient) {

        patient = {

            name: "Rahul Patel",

            phone: "+91 9876543210",

            age: "28",

            token: "101",

            fee: "₹500",

            time: "09:00 AM"

        };

    }

    document.getElementById("patientName").textContent =
        patient.name;

    document.getElementById("patientPhone").textContent =
        patient.phone;

    document.getElementById("patientAge").textContent =
        patient.age + " Years";

    document.getElementById("appointmentToken").textContent =
        patient.token;

    document.getElementById("appointmentFee").textContent =
        patient.fee;

    document.getElementById("appointmentTime").textContent =
        patient.time;

    document.getElementById("appointmentDate").textContent =
        new Date().toLocaleDateString("en-IN");


    /*=====================================
            ADD MEDICINE
    =====================================*/

    document.getElementById("addMedicineBtn")

        .addEventListener("click", function () {

            const container =
                document.getElementById("medicineContainer");

            const row =
                document.createElement("div");

            row.className = "medicine-row";

            row.innerHTML = `

                <select class="medicine-type">

                    <option>Tablet</option>

                    <option>Capsule</option>

                    <option>Syrup</option>

                    <option>Injection</option>

                </select>

                <input
                    type="text"
                    class="medicine-name"
                    placeholder="Medicine Name">

                <input
                    type="text"
                    class="medicine-dosage"
                    placeholder="1-0-1">

                <input
                    type="number"
                    class="medicine-days"
                    placeholder="5">

                <select class="medicine-time">

                    <option>Before Meal</option>

                    <option>After Meal</option>

                    <option>Morning</option>

                    <option>Night</option>

                </select>

            `;

            container.appendChild(row);

        });


    /*=====================================
            SAVE TREATMENT
    =====================================*/

    document.getElementById("saveTreatmentBtn")

        .addEventListener("click", function () {

            const medicines = [];

            document.querySelectorAll(".medicine-row")

                .forEach(row => {

                    medicines.push({

                        type:
                            row.querySelector(".medicine-type").value,

                        medicine:
                            row.querySelector(".medicine-name").value,

                        dosage:
                            row.querySelector(".medicine-dosage").value,

                        days:
                            row.querySelector(".medicine-days").value,

                        time:
                            row.querySelector(".medicine-time").value

                    });

                });

            const treatment = {

                patient,

                doctor,

                height:
                    document.getElementById("height").value,

                weight:
                    document.getElementById("weight").value,

                temperature:
                    document.getElementById("temperature").value,

                pulse:
                    document.getElementById("pulse").value,

                respiration:
                    document.getElementById("respiration").value,

                bloodPressure:
                    document.getElementById("bloodPressure").value,

                chiefComplaint:
                    document.getElementById("chiefComplaint").value,

                symptoms:
                    document.getElementById("symptoms").value,

                diagnosis:
                    document.getElementById("diagnosis").value,

                allergy:
                    document.getElementById("allergy").value,

                description:
                    document.getElementById("problemDescription").value,

                tests:
                    document.getElementById("recommendedTests").value,

                advice:
                    document.getElementById("doctorAdvice").value,

                followUpDate:
                    document.getElementById("followUpDate").value,

                followUpNotes:
                    document.getElementById("followUpNotes").value,

                medicines

            };

            localStorage.setItem(

                "patientTreatment",

                JSON.stringify(treatment)

            );

            alert("Treatment saved successfully.");

        });


    /*=====================================
            COMPLETE TREATMENT
    =====================================*/

    document.getElementById("treatmentForm")

        .addEventListener("submit", function (e) {

            e.preventDefault();

            alert("Treatment completed successfully.");

            loadPage("doctor-dashboard");

        });


    /*=====================================
            MENU ACTIVE
    =====================================*/

    document.querySelectorAll(".treatment-menu-link")

        .forEach(link => {

            link.addEventListener("click", function () {

                document.querySelectorAll(

                    ".treatment-menu-link"

                ).forEach(item => {

                    item.classList.remove("active");

                });

                this.classList.add("active");

            });

        });


    /*=====================================
            SCROLL ANIMATION
    =====================================*/

    const cards =
        document.querySelectorAll(".treatment-card");

    const observer =
        new IntersectionObserver(

            entries => {

                entries.forEach(entry => {

                    if (entry.isIntersecting) {

                        entry.target.classList.add(

                            "treatment-show"

                        );

                    }

                });

            },

            {

                threshold: 0.2

            }

        );

    cards.forEach(card => {

        card.classList.add("treatment-hidden");

        observer.observe(card);

    });

}