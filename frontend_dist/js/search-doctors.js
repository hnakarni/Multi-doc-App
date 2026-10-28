/*=========================================
        SEARCH DOCTORS
=========================================*/

function initSearchDoctors() {

    const searchInput =
        document.getElementById("doctorSearchInput");

    const departmentFilter =
        document.getElementById("doctorDepartment");

    const locationFilter =
        document.getElementById("doctorLocation");

    const searchBtn =
        document.getElementById("searchDoctorsBtn");

    const clearBtn =
        document.getElementById("clearDoctorsBtn");

    const cards =
        document.querySelectorAll(".search-doctors-card");


    /*=====================================
            SEARCH FUNCTION
    =====================================*/

    function filterDoctors() {

        const name =
            searchInput.value.toLowerCase().trim();

        const department =
            departmentFilter.value;

        const location =
            locationFilter.value;

        cards.forEach(card => {

            const doctorName =
                card.dataset.name.toLowerCase();

            const doctorDepartment =
                card.dataset.department;

            const doctorLocation =
                card.dataset.location;

            const matchName =
                doctorName.includes(name);

            const matchDepartment =
                department === "all" ||
                doctorDepartment === department;

            const matchLocation =
                location === "all" ||
                doctorLocation === location;

            if (
                matchName &&
                matchDepartment &&
                matchLocation
            ) {

                card.style.display = "flex";

            } else {

                card.style.display = "none";

            }

        });

    }


    /*=====================================
            EVENTS
    =====================================*/

    searchBtn.addEventListener("click", filterDoctors);

    searchInput.addEventListener("keyup", filterDoctors);

    departmentFilter.addEventListener("change", filterDoctors);

    locationFilter.addEventListener("change", filterDoctors);


    /*=====================================
            CLEAR FILTER
    =====================================*/

    clearBtn.addEventListener("click", function () {

        searchInput.value = "";

        departmentFilter.value = "all";

        locationFilter.value = "all";

        filterDoctors();

    });


    /*=====================================
          VIEW PROFILE
    =====================================*/

    /*=====================================
        VIEW PROFILE
=====================================*/

    document.querySelectorAll(".search-doctors-profile-btn")
        .forEach(button => {

            button.addEventListener("click", function (e) {

                e.preventDefault();

                const card = this.closest(".search-doctors-card");

                const doctor = {

                    name: card.dataset.name,

                    department: card.dataset.department,

                    location: card.dataset.location,

                    image: card.querySelector("img").src,

                    degree: card.querySelector(".search-doctors-degree").textContent,

                    experience: card.querySelector(".search-doctors-info span:last-child").textContent,

                    phone: "+91 9876543210",

                    email: "doctor@careplus.com",

                    biography:
                        "Dr. " + card.dataset.name +
                        " is one of our experienced specialists dedicated to providing high-quality healthcare with modern medical practices.",

                    schedule: [

                        {
                            date: "20 Jul 2026",
                            day: "Monday",
                            time: "09:00 AM - 10:00 AM",
                            max: 10,
                            booked: 6,
                            available: 4,
                            status: "Available",
                            statusClass: "available"
                        },

                        {
                            date: "21 Jul 2026",
                            day: "Tuesday",
                            time: "10:00 AM - 11:00 AM",
                            max: 10,
                            booked: 10,
                            available: 0,
                            status: "Full",
                            statusClass: "full"
                        }

                    ],

                    leaves: [

                        {
                            date: "28 Jul 2026",
                            day: "Tuesday",
                            reason: "Medical Conference",
                            duration: "1 Day",
                            status: "Approved",
                            statusClass: "approved"
                        }

                    ]

                };

                localStorage.setItem(

                    "selectedDoctor",

                    JSON.stringify(doctor)

                );

                loadPage("doctor-details");

            });

        });

}