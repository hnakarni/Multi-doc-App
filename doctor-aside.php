 <aside class="doctor-dashboard-sidebar">

                    <div class="doctor-dashboard-profile">

                        <img src="Admin_panel/dist/img/<?php echo $_SESSION['doctorData']['photo']; ?>" alt="Doctor">

                        <h3 id="dashboardDoctorName">

                            <?php echo $_SESSION['doctorData']['name']; ?>

                        </h3>

                        <p>

                            Doctor ID :
                            <span>

                                <?php echo $_SESSION['doctorData']['doctorId']; ?>

                            </span>

                        </p>

                    </div>


                    <ul class="doctor-dashboard-menu">

                        <li>

                            <a href="doctor-dashboard.php" class="doctor-dashboard-menu-link <?php echo $current_page=='doctor-dashboard.php'?'active':''; ?>">

                                <i class="fa-solid fa-house"></i>

                                Dashboard

                            </a>

                        </li>

                         <li>

                            <a href="doctor-all-appointments.php" class="doctor-dashboard-menu-link <?php echo $current_page=='doctor-all-appointments.php'?'active':''; ?>  
                            <?php echo $current_page=='doctor-treatment.php'?'active':''; ?>
                            <?php echo $current_page=='doctor-treatment-edit.php'?'active':''; ?>" data-page="today-appointments">

                                <i class="fa-solid fa-calendar-check"></i>

                                All Appointments

                            </a>

                        </li>

                        <li>

                            <a href="doctor-today-appointments.php" class="doctor-dashboard-menu-link <?php echo $current_page=='doctor-today-appointments.php'?'active':''; ?>" data-page="today-appointments">

                                <i class="fa-solid fa-calendar-check"></i>

                                Today's Appointments

                            </a>

                        </li>

                        <li>

                            <a href="doctor-setup-schedule.php" class="doctor-dashboard-menu-link <?php echo $current_page=='doctor-setup-schedule.php'?'active':''; ?>" data-page="setup-schedule">

                                <i class="fa-solid fa-clock"></i>

                                Setup Schedule

                            </a>

                        </li>

                        <li>

                            <a href="doctor-add-leave.php" class="doctor-dashboard-menu-link <?php echo $current_page=='doctor-add-leave.php'?'active':''; ?>" data-page="add-leave">

                                <i class="fa-solid fa-calendar-xmark"></i>

                                Add Leave

                            </a>

                        </li>

                        <!-- <li>

                            <a href="doctor-treatment.php" class="doctor-dashboard-menu-link <?php echo $current_page=='doctor-treatment.php'?'active':''; ?>" data-page="treatment">

                                <i class="fa-solid fa-notes-medical"></i>

                                Treatments

                            </a>

                        </li> -->

                        <li>

                            <a href="doctor-withdrawal.php" class="doctor-dashboard-menu-link <?php echo $current_page=='doctor-withdrawal.php'?'active':''; ?>" data-page="doctor-withdrawal">

                                <i class="fa-solid fa-wallet"></i>

                                Withdrawal

                            </a>

                        </li>

                        <li>

                            <a href="doctor-profile.php" class="doctor-dashboard-menu-link <?php echo $current_page=='doctor-profile.php'?'active':''; ?>" data-page="doctor-profile">

                                <i class="fa-solid fa-user-gear"></i>

                                My Profile

                            </a>

                        </li>

                        <li>

                            <a href="doctor-logout.php" class="doctor-dashboard-menu-link" data-page="home">

                                <i class="fa-solid fa-right-from-bracket"></i>

                                Logout

                            </a>

                        </li>

                    </ul>

                </aside>