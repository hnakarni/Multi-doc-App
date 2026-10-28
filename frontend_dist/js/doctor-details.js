/*=========================================
        DOCTOR DETAILS PAGE
=========================================*/

function initDoctorDetails() {

    const doctor = JSON.parse(
        localStorage.getItem("selectedDoctor")
    );

    if (!doctor) {

        document.querySelector(".doctor-details-page").innerHTML = `

            <div class="container">

                <h2 style="text-align:center;padding:100px 0;">

                    Doctor not found.

                </h2>

            </div>

        `;

        return;

    }

    /*=====================================
            BANNER
    =====================================*/

    document.getElementById("doctorDetailsName").textContent =
        doctor.name;

    document.getElementById("doctorDetailsDepartment").textContent =
        doctor.department;

    document.getElementById("doctorDetailsBreadcrumb").textContent =
        doctor.name;


    /*=====================================
            PROFILE CARD
    =====================================*/

    document.getElementById("doctorProfileImage").src =
        doctor.image;

    document.getElementById("doctorProfileName").textContent =
        doctor.name;

    document.getElementById("doctorProfileDepartment").textContent =
        doctor.degree;

    document.getElementById("doctorProfileExperience").textContent =
        doctor.experience;

    document.getElementById("doctorProfilePhone").textContent =
        doctor.phone;

    document.getElementById("doctorProfileEmail").textContent =
        doctor.email;

    document.getElementById("doctorProfileLocation").textContent =
        doctor.location;


    /*=====================================
            BIOGRAPHY
    =====================================*/

    document.getElementById("doctorBiography").textContent =
        doctor.biography;


    /*=====================================
            SCHEDULE
    =====================================*/

    const scheduleBody =
        document.getElementById("doctorScheduleBody");

    scheduleBody.innerHTML = "";

    doctor.schedule.forEach(item => {

        scheduleBody.innerHTML += `

            <tr>

                <td>${item.date}</td>

                <td>${item.day}</td>

                <td>${item.time}</td>

                <td>${item.max}</td>

                <td>${item.booked}</td>

                <td>${item.available}</td>

                <td>

                    <span class="doctor-details-status ${item.statusClass}">

                        ${item.status}

                    </span>

                </td>

            </tr>

        `;

    });


    /*=====================================
            LEAVE TABLE
    =====================================*/

    const leaveBody =
        document.getElementById("doctorLeaveBody");

    leaveBody.innerHTML = "";

    doctor.leaves.forEach(item => {

        leaveBody.innerHTML += `

            <tr>

                <td>${item.date}</td>

                <td>${item.day}</td>

                <td>${item.reason}</td>

                <td>${item.duration}</td>

                <td>

                    <span class="doctor-details-status ${item.statusClass}">

                        ${item.status}

                    </span>

                </td>

            </tr>

        `;

    });


    /*=====================================
            BOOK APPOINTMENT
    =====================================*/

    const bookingForm =
        document.getElementById("doctorBookingForm");

    bookingForm.addEventListener("submit", function (e) {

        e.preventDefault();

        localStorage.setItem(

            "appointmentDoctor",

            JSON.stringify(doctor)

        );

        loadPage("appointment");

    });


    /*=====================================
            SCROLL ANIMATION
    =====================================*/

    const cards = document.querySelectorAll(

        ".doctor-details-profile-card," +

        ".doctor-details-biography-card," +

        ".doctor-details-book-card," +

        ".doctor-details-schedule-card," +

        ".doctor-details-leave-card"

    );

    const observer = new IntersectionObserver(entries => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                entry.target.classList.add("doctor-details-show");

            }

        });

    }, {

        threshold: .2

    });

    cards.forEach(card => {

        card.classList.add("doctor-details-hidden");

        observer.observe(card);

    });

}