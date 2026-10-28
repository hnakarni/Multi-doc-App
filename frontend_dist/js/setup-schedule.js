/*=========================================
        SETUP SCHEDULE
=========================================*/

function initSetupSchedule() {

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

    document.getElementById("setupScheduleDoctorName").textContent =
        doctor.name;

    document.getElementById("setupScheduleDoctorId").textContent =
        doctor.id;

    document.getElementById("setupScheduleDoctorImage").src =
        doctor.image;


    /*=====================================
            LOAD SAVED SCHEDULES
    =====================================*/

    let schedules = JSON.parse(

        localStorage.getItem("doctorSchedules")

    ) || [];

    const tableBody =

        document.getElementById("scheduleTableBody");


    function renderSchedules() {

        tableBody.innerHTML = "";

        schedules.forEach((schedule, index) => {

            tableBody.innerHTML += `

                <tr>

                    <td>${schedule.date}</td>

                    <td>${schedule.start}</td>

                    <td>${schedule.end}</td>

                    <td>${schedule.capacity}</td>

                    <td>₹${schedule.fee}</td>

                    <td>${schedule.room}</td>

                    <td>

                        <button
                            class="schedule-edit-btn"
                            data-index="${index}">

                            <i class="fa-solid fa-pen-to-square"></i>

                        </button>

                        <button
                            class="schedule-delete-btn"
                            data-index="${index}">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </td>

                </tr>

            `;

        });

        attachButtons();

    }


    /*=====================================
            SAVE SCHEDULE
    =====================================*/

    document.getElementById(

        "setupScheduleForm"

    ).addEventListener("submit", function (e) {

        e.preventDefault();

        const date =

            document.getElementById("scheduleDate").value;

        const start =

            document.getElementById("scheduleStartTime").value;

        const end =

            document.getElementById("scheduleEndTime").value;

        const capacity =

            document.getElementById("scheduleCapacity").value;

        const fee =

            document.getElementById("scheduleFee").value;

        const room =

            document.getElementById("scheduleRoom").value;

        if (start >= end) {

            alert(

                "End time must be later than Start time."

            );

            return;

        }

        schedules.push({

            date,

            start,

            end,

            capacity,

            fee,

            room

        });

        localStorage.setItem(

            "doctorSchedules",

            JSON.stringify(schedules)

        );

        renderSchedules();

        this.reset();

    });


    /*=====================================
            EDIT & DELETE
    =====================================*/

    function attachButtons() {

        document.querySelectorAll(".schedule-delete-btn")

            .forEach(button => {

                button.onclick = function () {

                    const index =

                        this.dataset.index;

                    if (

                        confirm(

                            "Delete this schedule?"

                        )

                    ) {

                        schedules.splice(index, 1);

                        localStorage.setItem(

                            "doctorSchedules",

                            JSON.stringify(schedules)

                        );

                        renderSchedules();

                    }

                };

            });


        document.querySelectorAll(".schedule-edit-btn")

            .forEach(button => {

                button.onclick = function () {

                    const index =

                        this.dataset.index;

                    const s = schedules[index];

                    document.getElementById("scheduleDate").value =
                        s.date;

                    document.getElementById("scheduleStartTime").value =
                        s.start;

                    document.getElementById("scheduleEndTime").value =
                        s.end;

                    document.getElementById("scheduleCapacity").value =
                        s.capacity;

                    document.getElementById("scheduleFee").value =
                        s.fee;

                    document.getElementById("scheduleRoom").value =
                        s.room;

                    schedules.splice(index, 1);

                    localStorage.setItem(

                        "doctorSchedules",

                        JSON.stringify(schedules)

                    );

                    renderSchedules();

                    window.scrollTo({

                        top: 0,

                        behavior: "smooth"

                    });

                };

            });

    }


    renderSchedules();


    /*=====================================
            SCROLL ANIMATION
    =====================================*/

    const cards = document.querySelectorAll(

        ".setup-schedule-card"

    );

    const observer = new IntersectionObserver(

        entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add(

                        "setup-schedule-show"

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

            "setup-schedule-hidden"

        );

        observer.observe(card);

    });

}