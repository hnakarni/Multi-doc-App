 <aside class="patient-sidebar">

                    <div class="patient-sidebar-header">

                        <img id="patientDashboardImage" src="images/patients/patient-1.jpeg" alt="Patient">

                        <h3 id="patientDashboardName">

                          <?php  echo $_SESSION['patientData']['name']; ?>

                        </h3>

                        <p>

                            Patient ID :
                            <span id="patientDashboardId">

                                <?php  echo $_SESSION['patientData']['patientId']; ?>

                            </span>

                        </p>

                    </div>


                    <ul class="patient-sidebar-menu">

                        <li>

                            <a href="patient-dashboard.php" class="patient-menu <?php echo $current_page=='patient-dashboard.php'?'active':''; ?>">

                                <i class="fa-solid fa-house"></i>

                                Dashboard

                            </a>

                        </li>


                        <li>

                            <a href="patient-profile.php" class="patient-menu <?php echo $current_page=='patient-profile.php'?'active':''; ?>" data-page="patient-profile">

                                <i class="fa-solid fa-user"></i>

                                My Profile

                            </a>

                        </li>


                        <li>

                            <a href="make-appointment.php" class="patient-menu <?php echo $current_page=='make-appointment.php'?'active':''; ?>" data-page="make-appointment">

                                <i class="fa-solid fa-calendar-plus"></i>

                                Make Appointment

                            </a>

                        </li>


                        <li>

                            <a href="patient-appointment-details.php" class="patient-menu <?php echo $current_page=='patient-appointment-details.php'?'active':''; ?>" data-page="patient-appointment-details">

                                <i class="fa-solid fa-calendar-days"></i>

                                My Appointments

                            </a>

                        </li>


                         <li>

                            <a href="patient-change-password.php" class="patient-menu" data-page="home">

                                <i class="fa-solid fa-right-from-bracket"></i>

                                Change Password

                            </a>

                        </li>

                        <li>

                            <a href="patient-logout.php" class="patient-menu" data-page="home">

                                <i class="fa-solid fa-right-from-bracket"></i>

                                Logout

                            </a>

                        </li>

                    </ul>

                </aside>