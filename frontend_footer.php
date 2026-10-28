

<footer class="footer">

        <div class="container">

            <div class="footer-grid">

                <!-- About -->

                <div class="footer-box">

                    <div class="footer-logo">

                        <img src="frontend_dist/frontend_dist/images/logo.png" alt="DokApp Logo">

                    </div>

                    <p>

                        Your trusted healthcare companion. Connecting patients with experienced specialists for better healthcare.

                    </p>

                    <div class="footer-social">

                        <a href="#"><i class="fab fa-facebook-f"></i></a>

                        <a href="#"><i class="fab fa-x-twitter"></i></a>

                        <a href="#"><i class="fab fa-instagram"></i></a>

                        <a href="#"><i class="fab fa-linkedin-in"></i></a>

                    </div>

                </div>


                <!-- Links -->

                <div class="footer-box">

                    <h3>Important Links</h3>

                    <ul>

                        <li><a href="#">Home</a></li>

                        <li><a href="#">Doctors</a></li>

                        <li><a href="#">Departments</a></li>

                        <li><a href="#">Contact</a></li>

                        <li><a href="#">Appointment</a></li>

                    </ul>

                </div>


                <!-- Contact -->

                <div class="footer-box">

                    <h3>Contact Info</h3>

                    <p>

                        <i class="fa-solid fa-location-dot"></i> New York, USA

                    </p>

                    <p>

                        <i class="fa-solid fa-phone"></i> +1 555 123456

                    </p>

                    <p>

                        <i class="fa-solid fa-envelope"></i> info@dokapp.com

                    </p>

                </div>


                <!-- Newsletter -->

                <div class="footer-box">

                    <h3>Newsletter</h3>

                    <p>

                        Subscribe to receive health tips.

                    </p>

                    <form class="newsletter">

                        <input type="email" placeholder="Your email">

                        <button>

                            <i class="fa-solid fa-arrow-right"></i>

                        </button>

                    </form>

                </div>

            </div>

            <div class="footer-bottom">

                © 2026 <b>CarePlus</b> | Designed with ❤️ by Drashti & Yash

            </div>

        </div>

    </footer>

    <script src="frontend_dist/js/common.js"></script>
    <script src="frontend_dist/js/home.js"></script>
    <script src="frontend_dist/js/doctors.js"></script>
    <script src="frontend_dist/js/departments.js"></script>
    <script src="frontend_dist/js/department-details.js"></script>
    <script src="frontend_dist/js/search-doctors.js"></script>
    <script src="frontend_dist/js/doctor-details.js"></script>
    <script src="frontend_dist/js/contact.js"></script>
    <script src="frontend_dist/js/appointment.js"></script>
    <script src="frontend_dist/js/patient.js"></script>
    <script src="frontend_dist/js/doctor.js"></script>
    <script src="frontend_dist/js/doctor-dashboard.js"></script>
    <script src="frontend_dist/js/doctor-profile.js"></script>
    <script src="frontend_dist/js/today-appointments.js"></script>
    <script src="frontend_dist/js/setup-schedule.js"></script>
    <script src="frontend_dist/js/add-leave.js"></script>
    <script src="frontend_dist/js/treatment.js"></script>
    <script src="frontend_dist/js/doctor-withdrawal.js"></script>
    <script src="frontend_dist/js/make-appointment.js"></script>
    <script src="frontend_dist/js/patient-description.js"></script>
    <script src="frontend_dist/js/patient-dashboard.js"></script>
    <script src="frontend_dist/js/patient-profile.js"></script>
    <script src="frontend_dist/js/patient-appointment-details.js"></script>

    <script src="frontend_dist/js/main.js"></script>
    <script src="frontend_dist/js/router.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.2/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0/jquery.min.js" integrity="sha512-8LENNbXmzI/Gbj+OwXmqR6V4QaUAw0/porPzy1+dQoJqC0JPHedWoe0DDOTL2uHA5XXJyIsPtiMHH86pVlay6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    
    <script>

        $(document).ready(function(){
            $('#habits').select2({
                allowClear : true,
                placeholder : "Select Habits",
                tags : true,
                tokenSeperators : [','],
            })
            $('#symptoms').select2({
                allowClear : true,
                placeholder : "Select Habits",
                tags : true,
                tokenSeperators : [','],
            })
            $('#diagnosis').select2({
                allowClear : true,
                placeholder : "Select Habits",
                tags : true,
                tokenSeperators : [','],
            })
        })

        $('#addMedicineBtn').click(function(){
            var mediPreDom = document.querySelectorAll('.medicine-row');
            // alert(mediPreDom.length);
            $.ajax({
                url : "Add_more_medicine_ajax.php",
                method:"post",
                data : {
                    medicineRowCount : mediPreDom.length
                },
                success: function(res){
                    $('#medicineContainer').append(res);
                }
            })
        })

        function removeMedicineRow(medicineRow){
            $('#medicinePrescription'+medicineRow).remove();
        }


        function removeFromDB(mediPreId, prescriptionId){
            $.ajax({
                url : "remove_medicine_prescription_ajax.php",
                method : "post",
                data : {
                    medicinePrescriptionId : mediPreId,
                    presId : prescriptionId
                },
                success: function(res){
                    $('#medicineContainer').html(res);
                }
            })
        }


        $( function() {
            $( "#scheduleDate" ).datepicker({
                dateFormat : 'yy-mm-dd'
            });
        } );


        $(document).ready(function(){
            $('#scheduleStartTime').timepicker({
                interval:1,
                timepicker: true,
                onlyTimepicker: true,
                timeFormat : 'H:m:s',
                dateFormat: false,
            });
        });

         $(document).ready(function(){
            $('#scheduleEndTime').timepicker({
                interval:1,
                timepicker: true,
                onlyTimepicker: true,
                timeFormat : 'H:m:s',
                dateFormat: false,
            });
        });

    ///ajax = asynchronouse javascript and xml
        $(document).ready(function(){
            $('#appointmentDepartment').on('change', function(){
                 var departId = $('#appointmentDepartment').val();
                 $.ajax({
                    url : "get_ajax_doctor.php",
                    method : "post",
                    data : {
                        departmentId : departId
                    },
                    success: function(res){
                        // alert(res);
                        $("#appointmentDoctor").html(res);
                    }
                 })
            });


             $('#appointmentDoctor').change(function(){
                 var doctId = $('#appointmentDoctor').val();
                 $.ajax({
                    url : "get_ajax_schedules.php",
                    method : "post",
                    data : {
                        doctorId : doctId
                    },
                    success: function(res){
                        // alert(res);
                        $("#appointmentDate").html(res);
                    }
                 })
            })


            $('#appointmentDate').change(function(){
                 var doctId = $('#appointmentDoctor').val();
                 var scheduleDate = $('#appointmentDate').val();
                 $.ajax({
                    url : "get_ajax_slots.php",
                    method : "post",
                    data : {
                        doctorId : doctId,
                        scheduleDate : scheduleDate
                    },
                    success: function(res){
                        // alert(res);
                        $("#appointmentTime").html(res);
                    }
                 })
            })
       


        })
           
    </script>
</body>

</html>