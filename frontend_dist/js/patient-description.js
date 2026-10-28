/*=========================================
        PATIENT DESCRIPTION
=========================================*/

function initPatientDescription() {

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

            age: "28",

            gender: "Male",

            phone: "+91 9876543210",

            image: "images/patients/patient1.jpg"

        };

    }

    document.getElementById("patientDescriptionName").textContent =
        patient.name;

    document.getElementById("patientDescriptionId").textContent =
        patient.id;

    document.getElementById("patientDescriptionImage").src =
        patient.image;


    /*=====================================
            LOAD TREATMENT
    =====================================*/

    const treatment = JSON.parse(
        localStorage.getItem("patientTreatment")
    );

    if (!treatment) {

        alert("No prescription found.");

        return;

    }


    /*=====================================
            DOCTOR DETAILS
    =====================================*/

    document.getElementById("prescriptionDoctorName").textContent =
        treatment.doctor.name;

    document.getElementById("signatureDoctorName").textContent =
        treatment.doctor.name;

    document.getElementById("prescriptionDoctorDegree").textContent =
        treatment.doctor.degree || "MBBS";

    document.getElementById("signatureDegree").textContent =
        treatment.doctor.degree || "MBBS";

    document.getElementById("prescriptionDoctorDepartment").textContent =
        treatment.doctor.department || "General Medicine";


    /*=====================================
            PATIENT DETAILS
    =====================================*/

    document.getElementById("prescriptionPatientName").textContent =
        treatment.patient.name;

    document.getElementById("prescriptionAge").textContent =
        (treatment.patient.age || patient.age) + " Years";

    document.getElementById("prescriptionGender").textContent =
        treatment.patient.gender || patient.gender;

    document.getElementById("prescriptionPhone").textContent =
        treatment.patient.phone;

    document.getElementById("prescriptionDate").textContent =
        new Date().toLocaleDateString("en-IN");


    /*=====================================
            MEDICAL DETAILS
    =====================================*/

    document.getElementById("prescriptionSymptoms").textContent =
        treatment.symptoms || "-";

    document.getElementById("prescriptionDiagnosis").textContent =
        treatment.diagnosis || "-";

    document.getElementById("prescriptionTests").textContent =
        treatment.tests || "-";

    document.getElementById("prescriptionAdvice").textContent =
        treatment.advice || "-";

    document.getElementById("prescriptionFollowUp").textContent =
        treatment.followUpDate || "-";


    /*=====================================
            MEDICINES
    =====================================*/

    const tbody =
        document.getElementById("prescriptionMedicineBody");

    tbody.innerHTML = "";

    if (
        treatment.medicines &&
        treatment.medicines.length > 0
    ) {

        treatment.medicines.forEach((medicine, index) => {

            tbody.innerHTML += `

                <tr>

                    <td>${index + 1}</td>

                    <td>${medicine.medicine}</td>

                    <td>${medicine.type}</td>

                    <td>${medicine.dosage}</td>

                    <td>${medicine.days}</td>

                    <td>${medicine.time}</td>

                </tr>

            `;

        });

    } else {

        tbody.innerHTML = `

            <tr>

                <td colspan="6">

                    No medicines prescribed.

                </td>

            </tr>

        `;

    }


    /*=====================================
            PRINT
    =====================================*/

    document.getElementById("printPrescriptionBtn")

        .addEventListener("click", function () {

            window.print();

        });


    /*=====================================
            MENU ACTIVE
    =====================================*/

    document.querySelectorAll(

        ".patient-description-menu-link"

    ).forEach(link => {

        link.addEventListener("click", function () {

            document.querySelectorAll(

                ".patient-description-menu-link"

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
        ".prescription-card"
    );

    const observer = new IntersectionObserver(

        entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add(
                        "patient-description-show"
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
            "patient-description-hidden"
        );

        observer.observe(card);

    });

}