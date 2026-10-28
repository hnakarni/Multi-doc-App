<?php include("frontend_header.php");


if(empty($_SESSION['patientData'])){ 
   header('location:patient-login.php'); 
} 


if(isset($_POST['confirm_appointment'])){
    try{    
        $appointmentDepartment = isset($_POST['appointmentDepartment'])?$_POST['appointmentDepartment']:"";
        $appointmentDoctor = isset($_POST['appointmentDoctor'])?$_POST['appointmentDoctor']:"";
        $appointmentDate = isset($_POST['appointmentDate'])?$_POST['appointmentDate']:"";
        $appointmentScheduleId = isset($_POST['appointmentTime'])?$_POST['appointmentTime']:"";
        $paymentMethod = isset($_POST['paymentMethod'])?$_POST['paymentMethod']:"";
        if($appointmentDepartment==''){
            throw new Exception("Department is required");
        }

        $doctorfees= "select * from doctors where `id`='$appointmentDoctor'";
        $doctorfeesRun = mysqli_query($con,$doctorfees);
        $doctorData = mysqli_fetch_array($doctorfeesRun);

        if($paymentMethod=='Paypal'){
            $response = $gateway->purchase(array(
                'amount' => $doctorData['fees'],
                'currency' => PAYPAL_CURRENCY,
                'returnUrl' => PAYPAL_RETURN_URL,
                'cancelUrl' => PAYPAL_CANCEL_URL,
            ))->send();
            if ($response->isRedirect()) {
                $_SESSION['scheduleId'] = $appointmentScheduleId;
                $_SESSION['doctorId'] = $appointmentDoctor;
                $_SESSION['paymentMethod'] = $paymentMethod;
                $_SESSION['fees'] = $doctorData['fees'];
                $response->redirect();
            } else {
                $error_message = $response->getMessage();
            }
        }
        else if($paymentMethod =='Stripe'){
                \Stripe\Stripe::setApiKey(STRIPE_TEST_SK);
                $response = \Stripe\Checkout\Session::create([
                    'line_items' => [
                        [
                            'price_data' => [
                                'currency' => 'usd',
                                'product_data' => [
                                    'name' => 'Mobile Phone'
                                ],
                                'unit_amount' => $doctorData['fees'] * 100,
                            ],
                            'quantity' => 1,
                        ],
                    ],
                    'mode' => 'payment',
                    'success_url' => STRIPE_SUCCESS_URL.'?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => STRIPE_CANCEL_URL,
                ]);
                $_SESSION['scheduleId'] = $appointmentScheduleId;
                $_SESSION['doctorId'] = $appointmentDoctor;
                $_SESSION['paymentMethod'] = $paymentMethod;
                $_SESSION['fees'] = $doctorData['fees'];
                header('location: '.$response->url);
        }



    }
    catch(Exception $e){
        $error_message = $e->getMessage();
    }
}

if(isset($_SESSION['paypalSuccess'])){
    $success_message = $_SESSION['paypalSuccess'];
}


?>

<!--=========================================
        MAKE APPOINTMENT PAGE
==========================================-->

<section class="make-appointment-page">

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

                <a href="#" class="nav-link" data-page="patient-dashboard">

                    Patient Dashboard

                </a>

                <span>›</span>

                <span>

                    Make Appointment

                </span>

            </div>

            <h1>

                Make Appointment

            </h1>

            <p>

                Book an appointment with your preferred doctor quickly and securely.

            </p>

        </div>

    </section>


    <!--=========================================
            MAIN SECTION
    ==========================================-->

    <section class="make-appointment-main">

        <div class="container">

            <?php if(isset($error_message)){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>

            <?php if(isset($success_message)){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success_message; ?>
                </div>
             <?php } ?>

            <div class="make-appointment-layout">


                <!--=========================================
                        PATIENT SIDEBAR
                ==========================================-->

                <?php include('patient-aside.php'); ?>


                <!--=========================================
                        CONTENT
                ==========================================-->

                <div class="make-appointment-content">

                    <div class="make-appointment-card">

                        <div class="make-appointment-header">

                            <h2>

                                Book Appointment

                            </h2>

                            <p>

                                Select your preferred department, doctor, date and available time slot.

                            </p>

                        </div>

                        <form id="appointmentForm" method="post">

                            <!--=========================================
        APPOINTMENT FORM
==========================================-->

                            <div class="appointment-form-grid">

                                <!-- Department -->

                                <div class="appointment-form-group">

                                    <label>

                                        Department

                                    </label>

                                    <select id="appointmentDepartment" name="appointmentDepartment" >
                                        <option value=""> Select Department</option>
                                        <?php 
                                         $departData = "select departmentId,name from departments where `status`='Active'";
                                         $departDataRun = mysqli_query($con,$departData);
                                         while($departValue = mysqli_fetch_array($departDataRun)){
                                        ?>
                                            <option value="<?php echo $departValue['departmentId'];?>"><?php echo $departValue['name'];?></option>
                                        <?php } ?>
                                    
                                    </select>

                                </div>


                                <!-- Doctor -->

                                <div class="appointment-form-group">

                                    <label>

                                        Doctor

                                    </label>

                                    <select id="appointmentDoctor" name="appointmentDoctor">

                                        <option value="">

                                            Select Doctor

                                        </option>

                                    </select>

                                </div>


                                <!-- Date -->

                                <div class="appointment-form-group">

                                    <label>

                                        Appointment Date

                                    </label>
                                     <select id="appointmentDate" name="appointmentDate">

                                        <option value="">

                                            Select Schedule Date

                                        </option>

                                    </select>
                                    

                                </div>


                                <!-- Time -->

                                <div class="appointment-form-group">

                                    <label>

                                        Time Slot

                                    </label>

                                    <select id="appointmentTime" name="appointmentTime" >

                                        <option value="">

                                            Select Time Slot

                                        </option>

                                    

                                    </select>

                                </div>

                                <!-- Payment Method -->

                                <div class="appointment-form-group">

                                    <label>

                                        Payment Method

                                    </label>

                                    <select id="paymentMethod" name="paymentMethod" >

                                        <option value="">

                                            Select Payment Method

                                        </option>

                                        <option value="Paypal">

                                            Paypal

                                        </option>

                                        <option value="Stripe">

                                            Stripe

                                        </option>
                                    </select>

                                </div>
                            </div>


                            <!--=========================================
        ACTION BUTTONS
==========================================-->

                            <div class="appointment-actions">

                                <button type="submit" name="confirm_appointment" class="appointment-book-btn">

                                    <i class="fa-solid fa-calendar-check"></i>

                                    Confirm Appointment

                                </button>

                                <button type="reset" class="appointment-reset-btn">

                                    <i class="fa-solid fa-rotate-left"></i>

                                    Reset

                                </button>

                            </div>


                            <!--=========================================
        APPOINTMENT GUIDELINES
==========================================-->

                            <div class="appointment-guidelines">

                                <h3>

                                    <i class="fa-solid fa-circle-info"></i>

                                    Appointment Guidelines

                                </h3>

                                <ul>

                                    <li>

                                        Please arrive at least <strong>15 minutes</strong> before your appointment.

                                    </li>

                                    <li>

                                        Carry your previous medical reports and prescriptions if available.

                                    </li>

                                    <li>

                                        Keep your mobile number active for appointment updates.

                                    </li>

                                    <li>

                                        If you are unable to attend, please cancel or reschedule your appointment.

                                    </li>

                                    <li>

                                        Consultation fees may vary depending on the selected doctor.

                                    </li>

                                </ul>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>
<?php include("frontend_footer.php"); ?>