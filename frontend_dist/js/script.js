// Toggle Button 
const menuToggle = document.querySelector(".menu-toggle");
const header = document.querySelector("header");

menuToggle.addEventListener("click", () => {
    header.classList.toggle("active");

    const icon = menuToggle.querySelector("i");

    if (header.classList.contains("active")) {
        icon.classList.replace("fa-bars", "fa-xmark");
    } else {
        icon.classList.replace("fa-xmark", "fa-bars");
    }
});


// Doctor Depatment 
const departmentFilter = document.getElementById("departmentFilter");
const doctorCards = document.querySelectorAll(".doctor-card");

if (departmentFilter) {

    departmentFilter.addEventListener("change", function () {

        const selectedDepartment = this.value;

        doctorCards.forEach(card => {

            if (
                selectedDepartment === "All" ||
                card.dataset.department === selectedDepartment
            ) {

                card.style.display = "block";

            } else {

                card.style.display = "none";

            }

        });

    });

}


// Appointment Section
const step1 = document.getElementById("step1");
const step2 = document.getElementById("step2");
const step3 = document.getElementById("step3");

const circle1 = document.getElementById("circle1");
const circle2 = document.getElementById("circle2");
const circle3 = document.getElementById("circle3");

const next1 = document.getElementById("next1");
const next2 = document.getElementById("next2");

const back1 = document.getElementById("back1");
const back2 = document.getElementById("back2");

const confirmBtn = document.getElementById("confirmAppointment");

function showStep(step) {

    step1.classList.remove("active-step");
    step2.classList.remove("active-step");
    step3.classList.remove("active-step");

    circle1.classList.remove("active", "done");
    circle2.classList.remove("active", "done");
    circle3.classList.remove("active", "done");

    if (step === 1) {

        step1.classList.add("active-step");
        circle1.classList.add("active");

    }

    if (step === 2) {

        step2.classList.add("active-step");

        circle1.classList.add("done");
        circle2.classList.add("active");

    }

    if (step === 3) {

        step3.classList.add("active-step");

        circle1.classList.add("done");
        circle2.classList.add("done");
        circle3.classList.add("active");

    }

}


next1.addEventListener("click", function () {

    const department = document.getElementById("appointmentDepartment").value;
    const doctor = document.getElementById("appointmentDoctor").value;

    if (department === "" || doctor === "") {

        alert("Please select Department and Doctor.");
        return;

    }

    showStep(2);

});


next2.addEventListener("click", function () {

    const date = document.getElementById("appointmentDate").value;

    if (date === "") {

        alert("Please select Appointment Date.");
        return;

    }

    showStep(3);

});

back1.addEventListener("click", function () {

    showStep(1);

});

back2.addEventListener("click", function () {

    showStep(2);

});

confirmBtn.addEventListener("click", function () {

    const first = document.getElementById("appointmentFirstName").value.trim();
    const last = document.getElementById("appointmentLastName").value.trim();
    const email = document.getElementById("appointmentEmail").value.trim();
    const phone = document.getElementById("appointmentPhone").value.trim();

    if (first === "" || last === "" || email === "" || phone === "") {

        alert("Please fill all required details.");
        return;

    }

    alert("🎉 Appointment Booked Successfully!");

    document.getElementById("appointmentDepartment").selectedIndex = 0;
    document.getElementById("appointmentDoctor").selectedIndex = 0;
    document.getElementById("appointmentDate").value = "";
    document.getElementById("appointmentTime").selectedIndex = 0;
    document.getElementById("appointmentReason").value = "";

    document.getElementById("appointmentFirstName").value = "";
    document.getElementById("appointmentLastName").value = "";
    document.getElementById("appointmentEmail").value = "";
    document.getElementById("appointmentPhone").value = "";

    showStep(1);

});

showStep(1);

// SINGLE PAGE NAVIGATION
function initializePage(page) {

    console.log(page + " loaded");

}

// CONTACT FORM
const contactForm = document.getElementById("contactForm");

if (contactForm) {

    contactForm.addEventListener("submit", function (e) {

        e.preventDefault();

        const name = document.getElementById("cname").value.trim();
        const email = document.getElementById("cemail").value.trim();
        const subject = document.getElementById("csubject").value.trim();
        const message = document.getElementById("cmessage").value.trim();

        if (name === "" || email === "" || subject === "" || message === "") {

            alert("Please fill all fields.");

            return;

        }

        alert("Message Sent Successfully!");

        this.reset();

    });

}

// APPOINTMENT FORM
const appointmentForm = document.getElementById("appointmentForm");

if (appointmentForm) {

    appointmentForm.addEventListener("submit", function (e) {

        e.preventDefault();

        const patientName = document.getElementById("patientName").value.trim();
        const patientEmail = document.getElementById("patientEmail").value.trim();
        const patientPhone = document.getElementById("patientPhone").value.trim();
        const date = document.getElementById("appointmentDate").value;
        const time = document.getElementById("appointmentTime").value;

        if (
            patientName === "" ||
            patientEmail === "" ||
            patientPhone === "" ||
            date === "" ||
            time === ""
        ) {

            alert("Please complete all appointment details.");

            return;

        }

        alert("Appointment Booked Successfully!");

        this.reset();

    });

}

// PATIENT LOGIN
const patientForm = document.getElementById("patientLoginForm");
const patientEmail = document.getElementById("patientEmail");
const patientPassword = document.getElementById("patientPassword");
const rememberPatient = document.getElementById("rememberPatient");
const togglePatientPassword = document.getElementById("togglePatientPassword");

togglePatientPassword.addEventListener("click", function () {

    if (patientPassword.type === "password") {

        patientPassword.type = "text";
        this.innerHTML = "🙈";

    } else {

        patientPassword.type = "password";
        this.innerHTML = "👁";

    }

});


window.addEventListener("load", function () {

    const savedEmail = localStorage.getItem("patientEmail");

    if (savedEmail) {

        patientEmail.value = savedEmail;
        rememberPatient.checked = true;

    }

});

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

    if (rememberPatient.checked) {

        localStorage.setItem("patientEmail", email);

    } else {

        localStorage.removeItem("patientEmail");

    }

    alert("🎉 Login Successful!\n\nWelcome Back!");

    patientForm.reset();

});


document.querySelectorAll(".doctor-switch-btn").forEach(btn => {

    btn.addEventListener("click", function () {

        document.querySelectorAll(".page").forEach(page => {

            page.classList.remove("active");

        });

        document.getElementById("doctor-login").classList.add("active");

        window.scrollTo({

            top: 0,
            behavior: "smooth"

        });

    });

});

const searchButton = document.querySelector(".search-box button");

if (searchButton) {

    searchButton.addEventListener("click", function () {

        alert("Search feature coming soon!");

    });

}

const newsletter = document.querySelector(".newsletter form");

if (newsletter) {

    newsletter.addEventListener("submit", function (e) {

        e.preventDefault();

        const email = this.querySelector("input").value.trim();

        if (email === "") {

            alert("Please enter email.");

            return;

        }

        alert("Subscribed Successfully!");

        this.reset();

    });

}

document.querySelectorAll('[data-page="appointment"]').forEach(button => {

    button.addEventListener("click", function () {

        showPage("appointment");

    });

});
loadPage("home");