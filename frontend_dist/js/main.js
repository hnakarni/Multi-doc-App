function initializePage(page) {

    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "instant"
    });

    // Common functions
    initCommon();

    switch (page) {

        case "home":

            if (typeof initHome === "function") {

                initHome();

            }

            break;

        case "doctors":

            if (typeof initDoctors === "function") {

                initDoctors();

            }

            break;

        case "departments":

            if (typeof initDepartments === "function") {

                initDepartments();

            }

            break;

        case "departments":

            if (typeof initDepartments === "function") {

                initDepartments();

            }

            break;

        case "department-details":

            if (typeof initDepartmentDetails === "function") {

                initDepartmentDetails();

            }

            break;

        case "contact":

            if (typeof initContact === "function") {

                initContact();

            }

            break;

        case "appointment":

            if (typeof initAppointment === "function") {

                initAppointment();

            }

            break;

        case "patient":

            if (typeof initPatient === "function") {

                initPatient();

            }

            break;

        case "doctor-login":

            if (typeof initDoctor === "function") {

                initDoctor();

            }

            break;

        case "search-doctors":

            if (typeof initSearchDoctors === "function") {

                initSearchDoctors();

            }

            break;

        case "doctor-details":

            if (typeof initDoctorDetails === "function") {

                initDoctorDetails();

            }

            break;

        case "doctor-dashboard":

            if (typeof initDoctorDashboard === "function") {

                initDoctorDashboard();

            }

            break;

        case "doctor-profile":

            if (typeof initDoctorProfile === "function") {

                initDoctorProfile();

            }

            break;

        case "today-appointments":

            if (typeof initTodayAppointments === "function") {

                initTodayAppointments();

            }

            break;

        case "setup-schedule":

            if (typeof initSetupSchedule === "function") {

                initSetupSchedule();

            }

            break;

        case "add-leave":

            if (typeof initAddLeave === "function") {

                initAddLeave();

            }

            break;

        case "treatment":

            if (typeof initTreatment === "function") {

                initTreatment();

            }

            break;

        case "doctor-withdrawal":

            if (typeof initDoctorWithdrawal === "function") {

                initDoctorWithdrawal();

            }

            break;

        case "make-appointment":

            if (typeof initMakeAppointment === "function") {

                initMakeAppointment();

            }

            break;

        case "patient-description":

            if (typeof initPatientDescription === "function") {

                initPatientDescription();

            }

            break;

        case "patient-dashboard":

            if (typeof initPatientDashboard === "function") {

                initPatientDashboard();

            }

            break;

        case "patient-profile":

            if (typeof initPatientProfile === "function") {

                initPatientProfile();

            }

            break;

        case "patient-appointment-details":

            if (typeof initPatientAppointmentDetails === "function") {

                initPatientAppointmentDetails();

            }

            break;

    }

}