const app = document.getElementById("app");

// Load page into the app container
async function loadPage(page) {

    console.log("====================");
    console.log("Loading page:", page);

    try {

        const response = await fetch(`pages/${page}.html`);

        console.log("Status:", response.status);

        if (!response.ok) throw new Error("Page not found");

        const html = await response.text();

        document.getElementById("app").innerHTML = html;

        // Highlight current menu
        document.querySelectorAll(".nav-link").forEach(nav => {

            nav.classList.remove("active");

            if (nav.dataset.page === page) {

                nav.classList.add("active");

            }

        });

        // Scroll to top
        window.scrollTo(0, 0);

        if (typeof initializePage === "function") {

            initializePage(page);

        }

    } catch (err) {

        console.error(err);

        console.error("Page:", page);

        document.getElementById("app").innerHTML =
            `<h2 style="padding:40px;color:red;">
            ${err.message}
        </h2>`;

    }

}

document.addEventListener("DOMContentLoaded", () => {

    loadPage("home");

});

window.loadPage = loadPage;

/*=========================================
        NAVIGATION
=========================================*/

// document.querySelector("header").addEventListener("click", function (e) {

//     const link = e.target.closest(".nav-link");

//     if (!link) return;

//     e.preventDefault();

//     document.querySelectorAll("header .nav-link").forEach(item => {

//         item.classList.remove("active");

//     });

//     link.classList.add("active");

//     console.log("Loading:", link.dataset.page);

//     loadPage(link.dataset.page);

// });

document.addEventListener("click", function (e) {

    const link = e.target.closest(".nav-link");

    if (!link) return;

    e.preventDefault();

    if (link.dataset.page) {

        loadPage(link.dataset.page);

    }

});