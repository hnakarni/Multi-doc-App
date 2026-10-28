function initDoctor() {

    const doctorForm = document.getElementById("doctorLoginForm");
    const doctorEmail = document.getElementById("doctorEmail");
    const doctorPassword = document.getElementById("doctorPassword");
    const rememberDoctor = document.getElementById("rememberDoctor");
    const toggleDoctorPassword = document.getElementById("toggleDoctorPassword");
    const patientSwitch = document.querySelector(".patient-switch-btn");

    if (!doctorForm) return;

    // ===========================
    // Show / Hide Password
    // ===========================

    if (toggleDoctorPassword) {

        toggleDoctorPassword.addEventListener("click", function () {

            if (doctorPassword.type === "password") {

                doctorPassword.type = "text";
                this.innerHTML = "🙈";

            } else {

                doctorPassword.type = "password";
                this.innerHTML = "👁";

            }

        });

    }

    // ===========================
    // Remember Email
    // ===========================

    const savedDoctor = localStorage.getItem("doctorEmail");

    if (savedDoctor) {

        doctorEmail.value = savedDoctor;

        if (rememberDoctor) {

            rememberDoctor.checked = true;

        }

    }

    // ===========================
    // Login
    // ===========================

    doctorForm.addEventListener("submit", function (e) {

        e.preventDefault();

        const email = doctorEmail.value.trim();
        const password = doctorPassword.value.trim();

        if (email === "" || password === "") {

            alert("Please enter Doctor Email and Password.");

            return;

        }

        if (!email.includes("@")) {

            alert("Please enter a valid Email Address.");

            return;

        }

        if (password.length < 6) {

            alert("Password must be at least 6 characters.");

            return;

        }

        if (rememberDoctor.checked) {

            localStorage.setItem("doctorEmail", email);

        } else {

            localStorage.removeItem("doctorEmail");

        }

        loadPage("doctor-dashboard");


        alert("🎉 Doctor Login Successful!");

        doctorForm.reset();

    });

    // ===========================
    // Switch to Patient Login
    // ===========================

    if (patientSwitch) {

        patientSwitch.addEventListener("click", function () {

            loadPage("patient");

        });

    }

}