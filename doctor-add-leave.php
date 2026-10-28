<?php include("frontend_header.php"); ?>
<!--=========================================
        ADD LEAVE PAGE
==========================================-->

<section class="add-leave-page">

    <!--=========================================
            PAGE BANNER
    ==========================================-->

    <section class="page-banner">

        <div class="container">

            <div class="breadcrumb">

                <a href="#" class="nav-link" data-page="home">

                    Home

                </a>

                <span>›</span>

                <a href="#" class="nav-link" data-page="doctor-dashboard">

                    Doctor Dashboard

                </a>

                <span>›</span>

                <span>

                    Add Leave

                </span>

            </div>

            <h1>

                Add Leave

            </h1>

            <p>

                Manage your leave requests and unavailable dates.

            </p>

        </div>

    </section>


    <!--=========================================
            MAIN SECTION
    ==========================================-->

    <section class="add-leave-main">

        <div class="container">

            <div class="add-leave-layout">


                <!--=========================================
                        SIDEBAR
                ==========================================-->

               <?php include('doctor-aside.php');?>


                <!--=========================================
                        CONTENT
                ==========================================-->

                <div class="add-leave-content">

                    <div class="add-leave-card">

                        <div class="add-leave-header">

                            <h2>

                                Apply for Leave

                            </h2>

                            <p>

                                Submit your leave request and manage your unavailable dates.

                            </p>

                        </div>

                        <form id="addLeaveForm">

                            <!--=========================================
            FORM GRID
    ==========================================-->

                            <div class="add-leave-form-grid">

                                <!-- Leave Date -->

                                <div class="add-leave-form-group">

                                    <label>

                                        Leave Date

                                    </label>

                                    <input type="date" id="leaveDate" required>

                                </div>


                                <!-- Leave Type -->

                                <div class="add-leave-form-group">

                                    <label>

                                        Leave Type

                                    </label>

                                    <select id="leaveType" required>

                                        <option value="">

                                            Select Leave Type

                                        </option>

                                        <option value="Medical">

                                            Medical Leave

                                        </option>

                                        <option value="Personal">

                                            Personal Leave

                                        </option>

                                        <option value="Conference">

                                            Conference

                                        </option>

                                        <option value="Emergency">

                                            Emergency

                                        </option>

                                        <option value="Vacation">

                                            Vacation

                                        </option>

                                    </select>

                                </div>


                                <!-- Reason -->

                                <div class="add-leave-form-group add-leave-full">

                                    <label>

                                        Reason

                                    </label>

                                    <textarea id="leaveReason" rows="5" placeholder="Write the reason for your leave..."
                                        required>

            </textarea>

                                </div>

                            </div>


                            <!--=========================================
            BUTTONS
    ==========================================-->

                            <div class="add-leave-buttons">

                                <button type="submit" class="add-leave-save-btn">

                                    <i class="fa-solid fa-calendar-plus"></i>

                                    Submit Leave

                                </button>

                                <button type="reset" class="add-leave-reset-btn">

                                    <i class="fa-solid fa-rotate-left"></i>

                                    Reset

                                </button>

                            </div>


                            <!--=========================================
            LEAVE HISTORY
    ==========================================-->

                            <div class="add-leave-table-section">

                                <div class="add-leave-table-header">

                                    <h3>

                                        Leave History

                                    </h3>

                                </div>

                                <div class="add-leave-table-wrapper">

                                    <table class="add-leave-table">

                                        <thead>

                                            <tr>

                                                <th>Date</th>

                                                <th>Leave Type</th>

                                                <th>Reason</th>

                                                <th>Status</th>

                                                <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody id="leaveTableBody">

                                            <!-- Leave 1 -->

                                            <tr>

                                                <td>20 Jul 2026</td>

                                                <td>Medical Leave</td>

                                                <td>Annual health check-up.</td>

                                                <td>

                                                    <span class="leave-status approved">

                                                        Approved

                                                    </span>

                                                </td>

                                                <td>

                                                    <button class="leave-delete-btn">

                                                        <i class="fa-solid fa-trash"></i>

                                                    </button>

                                                </td>

                                            </tr>


                                            <!-- Leave 2 -->

                                            <tr>

                                                <td>28 Jul 2026</td>

                                                <td>Conference</td>

                                                <td>Attending National Cardiology Conference.</td>

                                                <td>

                                                    <span class="leave-status pending">

                                                        Pending

                                                    </span>

                                                </td>

                                                <td>

                                                    <button class="leave-delete-btn">

                                                        <i class="fa-solid fa-trash"></i>

                                                    </button>

                                                </td>

                                            </tr>


                                            <!-- Leave 3 -->

                                            <tr>

                                                <td>10 Aug 2026</td>

                                                <td>Vacation</td>

                                                <td>Family vacation.</td>

                                                <td>

                                                    <span class="leave-status approved">

                                                        Approved

                                                    </span>

                                                </td>

                                                <td>

                                                    <button class="leave-delete-btn">

                                                        <i class="fa-solid fa-trash"></i>

                                                    </button>

                                                </td>

                                            </tr>


                                            <!-- Leave 4 -->

                                            <tr>

                                                <td>18 Aug 2026</td>

                                                <td>Emergency</td>

                                                <td>Personal emergency.</td>

                                                <td>

                                                    <span class="leave-status rejected">

                                                        Rejected

                                                    </span>

                                                </td>

                                                <td>

                                                    <button class="leave-delete-btn">

                                                        <i class="fa-solid fa-trash"></i>

                                                    </button>

                                                </td>

                                            </tr>


                                            <!-- Leave 5 -->

                                            <tr>

                                                <td>25 Aug 2026</td>

                                                <td>Personal Leave</td>

                                                <td>Family function.</td>

                                                <td>

                                                    <span class="leave-status pending">

                                                        Pending

                                                    </span>

                                                </td>

                                                <td>

                                                    <button class="leave-delete-btn">

                                                        <i class="fa-solid fa-trash"></i>

                                                    </button>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>

 <?php include("frontend_footer.php"); ?>