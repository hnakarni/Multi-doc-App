/*=========================================
        DOCTOR PROFILE
=========================================*/

function initDoctorProfile() {

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

            image: "images/doctors/doctor1.jpg",

            email: "doctor@careplus.com",

            phone: "+91 9876543210",

            department: "Cardiology",

            qualification: "MBBS, FCPS",

            experience: "15 Years",

            hospital: "Main Hospital",

            city: "Ahmedabad",

            biography:
                "Experienced Cardiologist dedicated to providing quality healthcare."

        };

    }


    /*=====================================
            LOAD DATA
    =====================================*/

    document.getElementById("doctorProfileSidebarName").textContent =
        doctor.name;

    document.getElementById("doctorProfileSidebarId").textContent =
        doctor.id;

    document.getElementById("doctorProfileSidebarImage").src =
        doctor.image;

    document.getElementById("doctorProfilePreview").src =
        doctor.image;

    document.getElementById("doctorName").value =
        doctor.name;

    document.getElementById("doctorEmail").value =
        doctor.email;

    document.getElementById("doctorPhone").value =
        doctor.phone;

    document.getElementById("doctorDepartment").value =
        doctor.department;

    document.getElementById("doctorQualification").value =
        doctor.qualification;

    document.getElementById("doctorExperience").value =
        doctor.experience;

    document.getElementById("doctorHospital").value =
        doctor.hospital;

    document.getElementById("doctorCity").value =
        doctor.city;

    document.getElementById("doctorBiography").value =
        doctor.biography;


    /*=====================================
            IMAGE PREVIEW
    =====================================*/

    const imageInput =
        document.getElementById("doctorProfileImage");

    imageInput.addEventListener("change", function () {

        const file = this.files[0];

        if (!file) return;

        const reader = new FileReader();

        reader.onload = function (e) {

            document.getElementById(
                "doctorProfilePreview"
            ).src = e.target.result;

            document.getElementById(
                "doctorProfileSidebarImage"
            ).src = e.target.result;

            doctor.image = e.target.result;

        };

        reader.readAsDataURL(file);

    });


    /*=====================================
            UPDATE PROFILE
    =====================================*/

    document.getElementById("doctorProfileForm")

        .addEventListener("submit", function (e) {

            e.preventDefault();

            const password =
                document.getElementById("doctorPassword").value;

            const confirm =
                document.getElementById("doctorConfirmPassword").value;

            if (

                password !== "" &&

                password !== confirm

            ) {

                alert("Passwords do not match.");

                return;

            }

            doctor.name =
                document.getElementById("doctorName").value;

            doctor.email =
                document.getElementById("doctorEmail").value;

            doctor.phone =
                document.getElementById("doctorPhone").value;

            doctor.department =
                document.getElementById("doctorDepartment").value;

            doctor.qualification =
                document.getElementById("doctorQualification").value;

            doctor.experience =
                document.getElementById("doctorExperience").value;

            doctor.hospital =
                document.getElementById("doctorHospital").value;

            doctor.city =
                document.getElementById("doctorCity").value;

            doctor.biography =
                document.getElementById("doctorBiography").value;

            localStorage.setItem(

                "selectedDoctor",

                JSON.stringify(doctor)

            );

            document.getElementById(
                "doctorProfileSidebarName"
            ).textContent = doctor.name;

            alert("Profile updated successfully.");

        });


    /*=====================================
            MENU ACTIVE
    =====================================*/

    document.querySelectorAll(".doctor-profile-menu-link")

        .forEach(link => {

            link.addEventListener("click", function () {

                document

                    .querySelectorAll(".doctor-profile-menu-link")

                    .forEach(item => {

                        item.classList.remove("active");

                    });

                this.classList.add("active");

            });

        });


    /*=====================================
            SCROLL ANIMATION
    =====================================*/

    const cards = document.querySelectorAll(

        ".doctor-profile-card"

    );

    const observer = new IntersectionObserver(

        entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add(

                        "doctor-profile-show"

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

            "doctor-profile-hidden"

        );

        observer.observe(card);

    });

}