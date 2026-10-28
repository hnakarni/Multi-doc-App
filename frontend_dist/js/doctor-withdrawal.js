/*=========================================
        DOCTOR WITHDRAWAL
=========================================*/

function initDoctorWithdrawal() {

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

    document.getElementById("withdrawDoctorName").textContent =
        doctor.name;

    document.getElementById("withdrawDoctorId").textContent =
        doctor.id;

    document.getElementById("withdrawDoctorImage").src =
        doctor.image;


    /*=====================================
            BALANCE
    =====================================*/

    let currentBalance =
        Number(localStorage.getItem("doctorBalance")) || 12500;

    let totalEarning =
        Number(localStorage.getItem("doctorTotalEarning")) || 345000;

    let totalWithdraw =
        Number(localStorage.getItem("doctorTotalWithdraw")) || 295000;

    function updateSummary() {

        document.getElementById("currentBalance").textContent =
            `₹${currentBalance.toLocaleString()}`;

        document.getElementById("totalEarning").textContent =
            `₹${totalEarning.toLocaleString()}`;

        document.getElementById("totalWithdraw").textContent =
            `₹${totalWithdraw.toLocaleString()}`;

    }

    updateSummary();


    /*=====================================
            LOAD HISTORY
    =====================================*/

    let history = JSON.parse(

        localStorage.getItem("withdrawHistory")

    ) || [];

    const tbody =
        document.getElementById("withdrawTableBody");


    function renderHistory() {

        tbody.innerHTML = "";

        history.forEach((item, index) => {

            tbody.innerHTML += `

                <tr>

                    <td>${index + 1}</td>

                    <td>${item.date}</td>

                    <td>${item.method}</td>

                    <td>₹${item.amount}</td>

                    <td>₹${item.charge}</td>

                    <td>₹${item.net}</td>

                    <td>

                        <span class="withdraw-status ${item.status.toLowerCase()}">

                            ${item.status}

                        </span>

                    </td>

                </tr>

            `;

        });

    }

    renderHistory();


    /*=====================================
            WITHDRAW
    =====================================*/

    document.getElementById("withdrawForm")

        .addEventListener("submit", function (e) {

            e.preventDefault();

            const amount =
                Number(document.getElementById("withdrawAmount").value);

            const method =
                document.getElementById("paymentMethod").value;

            const account =
                document.getElementById("accountNumber").value;

            const remark =
                document.getElementById("withdrawRemark").value;

            if (

                amount <= 0 ||

                !method ||

                !account

            ) {

                alert("Please fill all required fields.");

                return;

            }

            if (amount > currentBalance) {

                alert("Insufficient balance.");

                return;

            }

            const charge =
                method === "Bank Transfer"
                    ? 50
                    : 0;

            const net =
                amount - charge;

            currentBalance -= amount;

            totalWithdraw += amount;

            localStorage.setItem(

                "doctorBalance",

                currentBalance

            );

            localStorage.setItem(

                "doctorTotalWithdraw",

                totalWithdraw

            );

            updateSummary();

            history.unshift({

                date:
                    new Date().toLocaleDateString("en-IN"),

                method,

                amount,

                charge,

                net,

                remark,

                status: "Pending"

            });

            localStorage.setItem(

                "withdrawHistory",

                JSON.stringify(history)

            );

            renderHistory();

            alert(

                "Withdrawal request submitted."

            );

            this.reset();

        });


    /*=====================================
            MENU ACTIVE
    =====================================*/

    document.querySelectorAll(

        ".doctor-withdrawal-menu-link"

    ).forEach(link => {

        link.addEventListener("click", function () {

            document.querySelectorAll(

                ".doctor-withdrawal-menu-link"

            ).forEach(item => {

                item.classList.remove("active");

            });

            this.classList.add("active");

        });

    });


    /*=====================================
            SCROLL ANIMATION
    =====================================*/

    const cards = document.querySelectorAll(

        ".doctor-withdrawal-card"

    );

    const observer = new IntersectionObserver(

        entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add(

                        "doctor-withdrawal-show"

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

            "doctor-withdrawal-hidden"

        );

        observer.observe(card);

    });

}