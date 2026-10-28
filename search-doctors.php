<?php include("frontend_header.php"); ?>

<!--=========================================
        SEARCH DOCTORS PAGE
==========================================-->

<section class="search-doctors-page">

    <!-- Banner -->

    <section class="search-doctors-banner">

        <div class="container">

            <div class="search-doctors-breadcrumb">

                <a href="#" class="nav-link" data-page="home">
                    Home
                </a>

                <span>›</span>

                <a href="#" class="nav-link" data-page="doctors">
                    Doctors
                </a>

                <span>›</span>

                <span>
                    Search Doctors
                </span>

            </div>

            <h1>

                Search Doctors

            </h1>

            <p>

                Find the right specialist by searching with doctor name,
                department or location.

            </p>

        </div>

    </section>



    <!-- Search Section -->

    <section class="search-doctors-search-section">

        <div class="container">

            <div class="search-doctors-search-card">

               

                <div class="search-doctors-form">

                    <!-- Doctor Name -->

                    <div class="search-doctors-field">

                        <label>

                            Doctor Name

                        </label>

                        <input type="text" id="doctorSearchInput" placeholder="Enter doctor name">

                    </div>

                    <!-- Department -->

                    <div class="search-doctors-field">

                        <label>

                            Department

                        </label>

                        <select id="doctorDepartment">

                            <option value="all">

                                All Departments

                            </option>

                            <option value="Cardiology">

                                Cardiology

                            </option>

                            <option value="Neurology">

                                Neurology

                            </option>

                            <option value="Orthopedic">

                                Orthopedic

                            </option>

                            <option value="Pediatrics">

                                Pediatrics

                            </option>

                            <option value="Eye Care">

                                Eye Care

                            </option>

                            <option value="Dental">

                                Dental

                            </option>

                            <option value="General Medicine">

                                General Medicine

                            </option>

                        </select>

                    </div>

                    <!-- Location -->

                    <div class="search-doctors-field">

                        <label>

                            Location

                        </label>

                        <select id="doctorLocation">

                            <option value="all">

                                All Locations

                            </option>

                            <option value="Main Hospital">

                                Main Hospital

                            </option>

                            <option value="City Branch">

                                City Branch

                            </option>

                            <option value="West Wing">

                                West Wing

                            </option>

                            <option value="Emergency Block">

                                Emergency Block

                            </option>

                        </select>

                    </div>

                </div>


                <!-- Buttons -->

                <div class="search-doctors-buttons">

                    <button class="search-doctors-search-btn" id="searchDoctorsBtn">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        Search Doctors

                    </button>

                    <button class="search-doctors-clear-btn" id="clearDoctorsBtn">

                        <i class="fa-solid fa-rotate-left"></i>

                        Clear Filters

                    </button>

                </div>

            </div>

        </div>

    </section>



    <!-- Doctor Results -->

    <section class="search-doctors-results-section">

        <div class="container">

            <div class="search-doctors-results-grid">

                <!-- Doctor Card 1 -->

                <div class="search-doctors-card" data-name="John Smith" data-department="Cardiology"
                    data-location="Main Hospital">

                    <div class="search-doctors-image">

                        <img src="images/doctors/doctor3.jpeg" alt="Doctor">

                    </div>

                    <div class="search-doctors-content">

                        <span class="search-doctors-speciality">

                            Cardiology

                        </span>

                        <h3>

                            Dr. John Smith

                        </h3>

                        <p class="search-doctors-degree">

                            MBBS, FCPS

                        </p>

                        <div class="search-doctors-info">

                            <span>

                                <i class="fa-solid fa-location-dot"></i>

                                Main Hospital

                            </span>

                            <span>

                                <i class="fa-solid fa-user-doctor"></i>

                                15 Years

                            </span>

                        </div>

                        <div class="search-doctors-rating">

                            ⭐⭐⭐⭐⭐

                            <span>(4.9)</span>

                        </div>

                        <a href="#" class="search-doctors-profile-btn nav-link" data-page="doctor-details">

                            View Profile →

                        </a>

                    </div>

                </div>

                <!-- Doctor Card 2 -->

                <div class="search-doctors-card" data-name="Emily Johnson" data-department="Neurology"
                    data-location="City Branch">

                    <div class="search-doctors-image">

                        <img src="images/doctors/doctor5.jpeg" alt="Doctor">

                    </div>

                    <div class="search-doctors-content">

                        <span class="search-doctors-speciality">

                            Neurology

                        </span>

                        <h3>

                            Dr. Emily Johnson

                        </h3>

                        <p class="search-doctors-degree">

                            MBBS, MD

                        </p>

                        <div class="search-doctors-info">

                            <span>

                                <i class="fa-solid fa-location-dot"></i>

                                City Branch

                            </span>

                            <span>

                                <i class="fa-solid fa-user-doctor"></i>

                                12 Years

                            </span>

                        </div>

                        <div class="search-doctors-rating">

                            ⭐⭐⭐⭐⭐

                            <span>(4.8)</span>

                        </div>

                        <a href="#" class="search-doctors-profile-btn nav-link" data-page="doctor-details">

                            View Profile →

                        </a>

                    </div>

                </div>

                <!-- Doctor Card 3 -->

                <div class="search-doctors-card" data-name="Michael Brown" data-department="Orthopedic"
                    data-location="West Wing">

                    <div class="search-doctors-image">

                        <img src="images/doctors/doctor2.jpeg" alt="Doctor">

                    </div>

                    <div class="search-doctors-content">

                        <span class="search-doctors-speciality">

                            Orthopedic

                        </span>

                        <h3>

                            Dr. Michael Brown

                        </h3>

                        <p class="search-doctors-degree">

                            MBBS, MS

                        </p>

                        <div class="search-doctors-info">

                            <span>

                                <i class="fa-solid fa-location-dot"></i>

                                West Wing

                            </span>

                            <span>

                                <i class="fa-solid fa-user-doctor"></i>

                                18 Years

                            </span>

                        </div>

                        <div class="search-doctors-rating">

                            ⭐⭐⭐⭐⭐

                            <span>(5.0)</span>

                        </div>

                        <a href="#" class="search-doctors-profile-btn nav-link" data-page="doctor-details">

                            View Profile →

                        </a>

                    </div>

                </div>

                <!-- Doctor Card 4 -->

                <div class="search-doctors-card" data-name="Emma Wilson" data-department="Pediatrics"
                    data-location="Main Hospital">

                    <div class="search-doctors-image">

                        <img src="images/doctors/doctor1.jpeg" alt="Doctor">

                    </div>

                    <div class="search-doctors-content">

                        <span class="search-doctors-speciality">

                            Pediatrics

                        </span>

                        <h3>

                            Dr. Emma Wilson

                        </h3>

                        <p class="search-doctors-degree">

                            MBBS, MD

                        </p>

                        <div class="search-doctors-info">

                            <span>

                                <i class="fa-solid fa-location-dot"></i>

                                Main Hospital

                            </span>

                            <span>

                                <i class="fa-solid fa-user-doctor"></i>

                                10 Years

                            </span>

                        </div>

                        <div class="search-doctors-rating">

                            ⭐⭐⭐⭐⭐

                            <span>(4.9)</span>

                        </div>

                        <a href="#" class="search-doctors-profile-btn nav-link" data-page="doctor-details">

                            View Profile →

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>