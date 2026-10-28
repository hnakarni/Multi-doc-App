<?php include("frontend_header.php"); ?>
<!-- APPOINTMENT PAGE -->

<section id="appointment">

    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">
                <a href="#" class="nav-link" data-page="home">Home</a>
                <span>›</span>
                Appointment
            </div>

            <h1>Make an Appointment</h1>

            <p>
                Book your slot with our specialists in a few easy steps.
            </p>

        </div>

    </section>

    <div class="container">
        <section class="appointment-section">

            <div class="container">

                <div class="appointment-card">

                    <!-- Progress -->

                    <div class="progressbar">

                        <div class="step active" id="circle1">

                            <div class="circle">1</div>

                            <p>Doctor</p>

                        </div>

                        <div class="step" id="circle2">

                            <div class="circle">2</div>

                            <p>Schedule</p>

                        </div>

                        <div class="step" id="circle3">

                            <div class="circle">3</div>

                            <p>Details</p>

                        </div>

                    </div>

                    <!-- ================= STEP 1 ================= -->

                    <div class="step-content active-step" id="step1">

                        <h2>Select Doctor & Department</h2>

                        <div class="input-group">

                            <label>Department *</label>

                            <select id="appointmentDepartment">

                                <option value="">Choose Department</option>

                                <option>Cardiology</option>

                                <option>Neurology</option>

                                <option>Orthopedic</option>

                                <option>Pediatrician</option>

                                <option>Dermatologist</option>

                                <option>ENT Specialist</option>

                            </select>

                        </div>

                        <div class="input-group">

                            <label>Doctor *</label>

                            <select id="appointmentDoctor">

                                <option value="">Choose Doctor</option>

                                <option>Dr. John Smith - Cardiologist</option>

                                <option>Dr. George Steven - Neurologist</option>

                                <option>Dr. Michael Williams - Orthopedic</option>

                                <option>Dr. Rex Davis - Pediatrician</option>

                                <option>Dr. Emma Wilson - Dermatologist</option>

                                <option>Dr. Sophia Brown - ENT Specialist</option>

                            </select>

                        </div>

                        <button class="btn-main next-btn" id="next1">

                            Continue →

                        </button>

                    </div>

                    <!-- ================= STEP 2 ================= -->

                    <div class="step-content" id="step2">

                        <h2>Choose Date & Time</h2>

                        <div class="row">

                            <div class="input-group">

                                <label>Preferred Date *</label>

                                <input type="date" id="appointmentDate">

                            </div>

                            <div class="input-group">

                                <label>Preferred Time *</label>

                                <select id="appointmentTime">

                                    <option>09:00 AM</option>

                                    <option>10:00 AM</option>

                                    <option>11:00 AM</option>

                                    <option>12:00 PM</option>

                                    <option>02:00 PM</option>

                                    <option>03:00 PM</option>

                                    <option>04:00 PM</option>

                                </select>

                            </div>

                        </div>

                        <div class="input-group">

                            <label>Reason For Visit</label>

                            <textarea rows="5" id="appointmentReason"
                                placeholder="Describe your symptoms..."></textarea>

                        </div>

                        <div class="button-group">

                            <button class="btn-secondary" id="back1">

                                ← Back

                            </button>

                            <button class="btn-main" id="next2">

                                Continue →

                            </button>

                        </div>

                    </div>

                    <!-- ================= STEP 3 ================= -->

                    <div class="step-content" id="step3">

                        <h2>Your Personal Details</h2>

                        <div class="row">

                            <div class="input-group">

                                <label>First Name *</label>

                                <input type="text" id="appointmentFirstName" placeholder="John">

                            </div>

                            <div class="input-group">

                                <label>Last Name *</label>

                                <input type="text" id="appointmentLastName" placeholder="Doe">

                            </div>

                        </div>

                        <div class="input-group">

                            <label>Email *</label>

                            <input type="email" id="appointmentEmail" placeholder="john@email.com">

                        </div>

                        <div class="input-group">

                            <label>Phone *</label>

                            <input type="tel" id="appointmentPhone" placeholder="+91 9876543210">

                        </div>

                        <div class="row">

                            <div class="input-group">

                                <label>Patient Type</label>

                                <select>

                                    <option>New Patient</option>

                                    <option>Existing Patient</option>

                                </select>

                            </div>

                            <div class="input-group">

                                <label>Insurance</label>

                                <select>

                                    <option>None / Self Pay</option>

                                    <option>Private Insurance</option>

                                    <option>Government Insurance</option>

                                </select>

                            </div>

                        </div>

                        <div class="button-group">

                            <button class="btn-secondary" id="back2">

                                ← Back

                            </button>

                            <button class="btn-confirm" id="confirmAppointment">

                                ✅ Confirm Appointment

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

</section>

<?php include("frontend_footer.php"); ?>