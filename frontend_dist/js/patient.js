function initPatient() {

    const patientForm = document.getElementById("patientLoginForm");
    const patientEmail = document.getElementById("patientEmail");
    const patientPassword = document.getElementById("patientPassword");
    const rememberPatient = document.getElementById("rememberPatient");
    const togglePatientPassword = document.getElementById("togglePatientPassword");

    if (!patientForm) return;

    // Show / Hide Password
    if (togglePatientPassword) {

        togglePatientPassword.addEventListener("click", function () {

            if (patientPassword.type === "password") {

                patientPassword.type = "text";
                this.innerHTML = "🙈";

            } else {

                patientPassword.type = "password";
                this.innerHTML = "👁";

            }

        });

    }

    // Remember Me
    const savedEmail = localStorage.getItem("patientEmail");

    if (savedEmail) {

        patientEmail.value = savedEmail;

        if (rememberPatient) {
            rememberPatient.checked = true;
        }

    }

    // Login
    // patientForm.addEventListener("submit", function (e) {

    //     e.preventDefault();

    //     const email = patientEmail.value.trim();
    //     const password = patientPassword.value.trim();

    //     if (email === "" || password === "") {

    //         alert("Please fill all required fields.");
    //         return;

    //     }

    //     if (!email.includes("@")) {

    //         alert("Please enter a valid Email Address.");
    //         return;

    //     }

    //     if (password.length < 6) {

    //         alert("Password must be at least 6 characters.");
    //         return;

    //     }

    //     if (rememberPatient && rememberPatient.checked) {

    //         localStorage.setItem("patientEmail", email);

    //     } else {

    //         localStorage.removeItem("patientEmail");

    //     }

    //     alert("🎉 Login Successful!\n\nWelcome Back!");

    //     loadPage("patient-dashboard");

    //     patientForm.reset();

    // });


    // Login
    patientForm.addEventListener("submit", function (e) {

        e.preventDefault();

        const email = patientEmail.value.trim();
        const password = patientPassword.value.trim();

        if (email === "" || password === "") {

            alert("Please fill all required fields.");
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

        if (rememberPatient && rememberPatient.checked) {

            localStorage.setItem("patientEmail", email);

        } else {

            localStorage.removeItem("patientEmail");

        }

        alert("🎉 Login Successful!\n\nWelcome Back!");

        loadPage("patient-dashboard");
    });
}