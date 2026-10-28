<?php include("frontend_header.php"); ?>

<!--=========================================
        DOCTOR WITHDRAWAL PAGE
==========================================-->

<section class="doctor-withdrawal-page">

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

                    Withdrawal

                </span>

            </div>

            <h1>

                Doctor Withdrawal

            </h1>

            <p>

                Withdraw your earnings, view your balance and manage your withdrawal history.

            </p>

        </div>

    </section>


    <!--=========================================
            MAIN
    ==========================================-->

    <section class="doctor-withdrawal-main">

        <div class="container">

            <div class="doctor-withdrawal-layout">


                <!--=========================================
                        SIDEBAR
                ==========================================-->

                <?php include("doctor-aside.php"); ?>


                <!--=========================================
                        CONTENT
                ==========================================-->

                <div class="doctor-withdrawal-content">

                    <div class="doctor-withdrawal-card">

                        <div class="doctor-withdrawal-header">

                            <h2>

                                Withdraw Earnings

                            </h2>

                            <p>

                                Manage your available balance and withdraw your earnings securely.

                            </p>

                        </div>

                        <!--=========================================
        BALANCE CARDS
==========================================-->

                        <div class="withdraw-summary">

                            <div class="withdraw-summary-card">

                                <div class="withdraw-summary-icon">

                                    <i class="fa-solid fa-wallet"></i>

                                </div>

                                <div>

                                    <h3 id="currentBalance">

                                        ₹12,500

                                    </h3>

                                    <p>

                                        Current Balance

                                    </p>

                                </div>

                            </div>


                            <div class="withdraw-summary-card">

                                <div class="withdraw-summary-icon">

                                    <i class="fa-solid fa-sack-dollar"></i>

                                </div>

                                <div>

                                    <h3 id="totalEarning">

                                        ₹3,45,000

                                    </h3>

                                    <p>

                                        Total Earnings

                                    </p>

                                </div>

                            </div>


                            <div class="withdraw-summary-card">

                                <div class="withdraw-summary-icon">

                                    <i class="fa-solid fa-money-bill-transfer"></i>

                                </div>

                                <div>

                                    <h3 id="totalWithdraw">

                                        ₹2,95,000

                                    </h3>

                                    <p>

                                        Total Withdrawn

                                    </p>

                                </div>

                            </div>

                        </div>


                        <!--=========================================
        WITHDRAW FORM
==========================================-->

                        <form id="withdrawForm">

                            <div class="withdraw-form-grid">

                                <!-- Amount -->

                                <div class="withdraw-form-group">

                                    <label>

                                        Withdraw Amount

                                    </label>

                                    <input type="number" id="withdrawAmount" placeholder="Enter amount" required>

                                </div>


                                <!-- Payment Method -->

                                <div class="withdraw-form-group">

                                    <label>

                                        Payment Method

                                    </label>

                                    <select id="paymentMethod" required>

                                        <option value="">

                                            Select Method

                                        </option>

                                        <option>

                                            Bank Transfer

                                        </option>

                                        <option>

                                            UPI

                                        </option>

                                        <option>

                                            PayPal

                                        </option>

                                    </select>

                                </div>


                                <!-- Bank / UPI -->

                                <div class="withdraw-form-group">

                                    <label>

                                        Bank Account / UPI ID

                                    </label>

                                    <input type="text" id="accountNumber" placeholder="Enter Bank Account or UPI ID"
                                        required>

                                </div>


                                <!-- Remarks -->

                                <div class="withdraw-form-group">

                                    <label>

                                        Remarks

                                    </label>

                                    <input type="text" id="withdrawRemark" placeholder="Optional">

                                </div>

                            </div>


                            <div class="withdraw-buttons">

                                <button type="submit" class="withdraw-btn">

                                    <i class="fa-solid fa-money-bill-wave"></i>

                                    Withdraw Now

                                </button>

                                <button type="reset" class="withdraw-reset-btn">

                                    <i class="fa-solid fa-rotate-left"></i>

                                    Reset

                                </button>

                            </div>

                        </form>


                        <!--=========================================
        WITHDRAW HISTORY
==========================================-->

                        <div class="withdraw-history">

                            <div class="withdraw-history-header">

                                <h3>

                                    Withdrawal History

                                </h3>

                            </div>

                            <div class="withdraw-table-wrapper">

                                <table class="withdraw-table">

                                    <thead>

                                        <tr>

                                            <th>#</th>

                                            <th>Date</th>

                                            <th>Method</th>

                                            <th>Amount</th>

                                            <th>Charge</th>

                                            <th>Net Amount</th>

                                            <th>Status</th>

                                        </tr>

                                    </thead>

                                    <tbody id="withdrawTableBody">

                                        <!-- Withdrawal 1 -->

                                        <tr>

                                            <td>1</td>

                                            <td>20 Jul 2026</td>

                                            <td>Bank Transfer</td>

                                            <td>₹5,000</td>

                                            <td>₹50</td>

                                            <td>₹4,950</td>

                                            <td>

                                                <span class="withdraw-status completed">

                                                    Completed

                                                </span>

                                            </td>

                                        </tr>


                                        <!-- Withdrawal 2 -->

                                        <tr>

                                            <td>2</td>

                                            <td>15 Jul 2026</td>

                                            <td>UPI</td>

                                            <td>₹3,000</td>

                                            <td>₹0</td>

                                            <td>₹3,000</td>

                                            <td>

                                                <span class="withdraw-status pending">

                                                    Pending

                                                </span>

                                            </td>

                                        </tr>


                                        <!-- Withdrawal 3 -->

                                        <tr>

                                            <td>3</td>

                                            <td>10 Jul 2026</td>

                                            <td>PayPal</td>

                                            <td>₹7,500</td>

                                            <td>₹100</td>

                                            <td>₹7,400</td>

                                            <td>

                                                <span class="withdraw-status completed">

                                                    Completed

                                                </span>

                                            </td>

                                        </tr>


                                        <!-- Withdrawal 4 -->

                                        <tr>

                                            <td>4</td>

                                            <td>02 Jul 2026</td>

                                            <td>Bank Transfer</td>

                                            <td>₹2,000</td>

                                            <td>₹25</td>

                                            <td>₹1,975</td>

                                            <td>

                                                <span class="withdraw-status rejected">

                                                    Rejected

                                                </span>

                                            </td>

                                        </tr>


                                        <!-- Withdrawal 5 -->

                                        <tr>

                                            <td>5</td>

                                            <td>28 Jun 2026</td>

                                            <td>UPI</td>

                                            <td>₹10,000</td>

                                            <td>₹0</td>

                                            <td>₹10,000</td>

                                            <td>

                                                <span class="withdraw-status completed">

                                                    Completed

                                                </span>

                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>