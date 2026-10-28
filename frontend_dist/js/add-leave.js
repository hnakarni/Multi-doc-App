/*=========================================
        ADD LEAVE
=========================================*/

function initAddLeave() {

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

    document.getElementById("addLeaveDoctorName").textContent =
        doctor.name;

    document.getElementById("addLeaveDoctorId").textContent =
        doctor.id;

    document.getElementById("addLeaveDoctorImage").src =
        doctor.image;


    /*=====================================
            LOAD SAVED LEAVES
    =====================================*/

    let leaves = JSON.parse(
        localStorage.getItem("doctorLeaves")
    ) || [];

    const tableBody =
        document.getElementById("leaveTableBody");


    /*=====================================
            RENDER LEAVES
    =====================================*/

    function renderLeaves() {

        tableBody.innerHTML = "";

        leaves.forEach((leave, index) => {

            tableBody.innerHTML += `

                <tr>

                    <td>${leave.date}</td>

                    <td>${leave.type}</td>

                    <td>${leave.reason}</td>

                    <td>

                        <span class="leave-status ${leave.status.toLowerCase()}">

                            ${leave.status}

                        </span>

                    </td>

                    <td>

                        <button
                            class="leave-delete-btn"
                            data-index="${index}">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </td>

                </tr>

            `;

        });

        attachDeleteButtons();

    }


    /*=====================================
            ADD LEAVE
    =====================================*/

    document.getElementById("addLeaveForm")

        .addEventListener("submit", function (e) {

            e.preventDefault();

            const date =
                document.getElementById("leaveDate").value;

            const type =
                document.getElementById("leaveType").value;

            const reason =
                document.getElementById("leaveReason").value;

            if (
                !date ||
                !type ||
                !reason
            ) {

                alert("Please fill all fields.");

                return;

            }

            leaves.push({

                date,

                type,

                reason,

                status: "Pending"

            });

            localStorage.setItem(

                "doctorLeaves",

                JSON.stringify(leaves)

            );

            renderLeaves();

            this.reset();

        });


    /*=====================================
            DELETE LEAVE
    =====================================*/

    function attachDeleteButtons() {

        document.querySelectorAll(".leave-delete-btn")

            .forEach(button => {

                button.onclick = function () {

                    const index =
                        this.dataset.index;

                    if (
                        confirm(
                            "Delete this leave request?"
                        )
                    ) {

                        leaves.splice(index, 1);

                        localStorage.setItem(

                            "doctorLeaves",

                            JSON.stringify(leaves)

                        );

                        renderLeaves();

                    }

                };

            });

    }


    renderLeaves();


    /*=====================================
            SCROLL ANIMATION
    =====================================*/

    const cards = document.querySelectorAll(
        ".add-leave-card"
    );

    const observer = new IntersectionObserver(

        entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add(
                        "add-leave-show"
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
            "add-leave-hidden"
        );

        observer.observe(card);

    });

}