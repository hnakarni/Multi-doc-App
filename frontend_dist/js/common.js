// ===============================
// MENU TOGGLE
// ===============================

function initCommon() {

    const menuToggle = document.querySelector(".menu-toggle");
    const header = document.querySelector("header");

    if (menuToggle && header) {

        menuToggle.addEventListener("click", () => {

            header.classList.toggle("active");

            const icon = menuToggle.querySelector("i");

            if (!icon) return;

            if (header.classList.contains("active")) {

                icon.classList.replace("fa-bars", "fa-xmark");

            } else {

                icon.classList.replace("fa-xmark", "fa-bars");

            }

        });

    }

    // ===============================
    // NEWSLETTER
    // ===============================

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

}