function initAppointment() {

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

}