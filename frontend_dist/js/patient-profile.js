/*=========================================
        PATIENT PROFILE
=========================================*/

function initPatientProfile() {

    /*=====================================
            GET ELEMENTS
    =====================================*/

    const form = document.getElementById("patientProfileForm");

    if (!form) return;

    const image = document.getElementById("patientProfileImage");
    const preview = document.getElementById("patientProfilePreview");
    const upload = document.getElementById("patientProfileUpload");

    const sidebarName =
        document.getElementById("patientProfileSidebarName");

    const sidebarId =
        document.getElementById("patientProfileSidebarId");


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

            email: "rahul@gmail.com",

            phone: "9876543210",

            gender: "Male",

            dob: "",

            bloodGroup: "B+",

            height: "170",

            weight: "68",

            address: "",

            image: "images/patients/patient1.jpg"

        };

    }


    /*=====================================
            SET VALUES
    =====================================*/

    if (sidebarName) sidebarName.textContent = patient.name;

    if (sidebarId) sidebarId.textContent = patient.id;

    if (image) image.src = patient.image;

    if (preview) preview.src = patient.image;

    document.getElementById("patientProfileName").value =
        patient.name || "";

    document.getElementById("patientProfileEmail").value =
        patient.email || "";

    document.getElementById("patientProfilePhone").value =
        patient.phone || "";

    document.getElementById("patientProfileGender").value =
        patient.gender || "Male";

    document.getElementById("patientProfileDob").value =
        patient.dob || "";

    document.getElementById("patientProfileBloodGroup").value =
        patient.bloodGroup || "B+";

    document.getElementById("patientProfileHeight").value =
        patient.height || "";

    document.getElementById("patientProfileWeight").value =
        patient.weight || "";

    document.getElementById("patientProfileAddress").value =
        patient.address || "";


    /*=====================================
            IMAGE PREVIEW
    =====================================*/

    if (upload) {

        upload.addEventListener("change", function () {

            const file = this.files[0];

            if (!file) return;

            const reader = new FileReader();

            reader.onload = function (e) {

                preview.src = e.target.result;

                image.src = e.target.result;

            };

            reader.readAsDataURL(file);

        });

    }


    /*=====================================
            SAVE PROFILE
    =====================================*/

    form.addEventListener("submit", function (e) {

        e.preventDefault();

        const updatedPatient = {

            id: patient.id,

            name: document.getElementById("patientProfileName").value,

            email: document.getElementById("patientProfileEmail").value,

            phone: document.getElementById("patientProfilePhone").value,

            gender: document.getElementById("patientProfileGender").value,

            dob: document.getElementById("patientProfileDob").value,

            bloodGroup: document.getElementById("patientProfileBloodGroup").value,

            height: document.getElementById("patientProfileHeight").value,

            weight: document.getElementById("patientProfileWeight").value,

            address: document.getElementById("patientProfileAddress").value,

            image: preview.src

        };


        const newPassword =
            document.getElementById("patientProfileNewPassword").value;

        const confirmPassword =
            document.getElementById("patientProfileConfirmPassword").value;

        if (

            newPassword !== "" ||

            confirmPassword !== ""

        ) {

            if (newPassword !== confirmPassword) {

                alert("New Password and Confirm Password do not match.");

                return;

            }

            updatedPatient.password = newPassword;

        }


        localStorage.setItem(

            "loggedInPatient",

            JSON.stringify(updatedPatient)

        );

        alert("✅ Profile Updated Successfully!");

        sidebarName.textContent = updatedPatient.name;

    });


    /*=====================================
            MENU ACTIVE
    =====================================*/

    document.querySelectorAll(

        ".patient-profile-menu-link"

    ).forEach(link => {

        link.addEventListener("click", function () {

            document.querySelectorAll(

                ".patient-profile-menu-link"

            ).forEach(item => {

                item.classList.remove("active");

            });

            this.classList.add("active");

        });

    });


    /*=====================================
            ANIMATION
    =====================================*/

    const content = document.querySelector(

        ".patient-profile-content"

    );

    if (content) {

        content.classList.add(

            "patient-profile-hidden"

        );

        setTimeout(() => {

            content.classList.add(

                "patient-profile-show"

            );

        }, 100);

    }

}