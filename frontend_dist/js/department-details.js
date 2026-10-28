function initDepartmentDetails() {
    const department = localStorage.getItem("selectedDepartment") || "cardiology";

    const departments = {

        cardiology: {

            title: "Cardiology Department",

            breadcrumb: "Cardiology",

            subtitle: "Specialized heart care with world-class doctors and advanced medical technology.",

            about: `
                Our Cardiology Department is dedicated to providing comprehensive
                diagnosis, treatment and prevention of heart diseases.

                We provide advanced cardiovascular care using modern equipment,
                experienced cardiologists and patient-centered treatment plans.

                From routine heart checkups to complex cardiac surgeries,
                our team ensures the highest quality healthcare for every patient.
            `,

            services: [

                "Heart Checkups",

                "ECG & Echo",

                "Angiography",

                "Angioplasty",

                "Cardiac Surgery",

                "Heart Rehabilitation"

            ],

            info: {

                location: "3rd Floor, CarePlus Hospital",

                phone: "+1 (555) 123-4567",

                emergency: "+1 (555) 911-0000",

                hours: "Mon - Fri<br>8:00 AM - 6:00 PM"

            },

            gallery: [

                "images/gallery/cardiology-1.jpeg",

                "images/gallery/cardiology-2.jpeg",

                "images/gallery/cardiology-3.jpeg",

                "images/gallery/cardiology-4.jpeg"

            ],

            doctors: [

                {

                    image: "images/doctors/doctor1.jpeg",

                    name: "Dr. John Smith",

                    role: "Chief Cardiologist",

                    degree: "MBBS, FCPS"

                },

                {

                    image: "images/doctors/doctor2.jpeg",

                    name: "Dr. George Steven",

                    role: "Cardiac Surgeon",

                    degree: "MBBS, FCPS"

                },

                {

                    image: "images/doctors/doctor3.jpeg",

                    name: "Dr. Robert Davis",

                    role: "Electrophysiologist",

                    degree: "MBBS, FCPS"

                },

                {

                    image: "images/doctors/doctor4.jpeg",

                    name: "Dr. Rex Davis",

                    role: "Pediatric Cardiologist",

                    degree: "MBBS, FCPS"

                }

            ]

        },

        neurology: {

            title: "Neurology Department",

            breadcrumb: "Neurology",

            subtitle: "Advanced diagnosis and treatment for brain, spine and nervous system disorders.",

            about: `
            Our Neurology Department provides comprehensive care for disorders
            affecting the brain, spinal cord and nervous system.

            Our experienced neurologists use advanced diagnostic equipment
            and evidence-based treatments to ensure the best possible care.
        `,

            services: [

                "Brain MRI",

                "Stroke Treatment",

                "Epilepsy Care",

                "Parkinson's Disease",

                "Neurosurgery",

                "Neuro Rehabilitation"

            ],

            info: {

                location: "2nd Floor, CarePlus Hospital",

                phone: "+1 (555) 222-1111",

                emergency: "+1 (555) 911-0000",

                hours: "Mon - Sat<br>9:00 AM - 6:00 PM"

            },

            gallery: [

                "images/gallery/neurology-1.jpeg",

                "images/gallery/neurology-2.jpeg",

                "images/gallery/neurology-3.jpeg",

                "images/gallery/neurology-4.jpeg"

            ],

            doctors: [

                {

                    image: "images/doctors/doctor5.jpeg",

                    name: "Dr. Emily Johnson",

                    role: "Senior Neurologist",

                    degree: "MBBS, MD"

                },

                {

                    image: "images/doctors/doctor2.jpeg",

                    name: "Dr. Daniel Clark",

                    role: "Brain Surgeon",

                    degree: "MBBS, MCh"

                },

                {

                    image: "images/doctors/doctor6.jpeg",

                    name: "Dr. Sophia Adams",

                    role: "Stroke Specialist",

                    degree: "MBBS, DM"

                },

                {

                    image: "images/doctors/doctor3.jpeg",

                    name: "Dr. Kevin Lee",

                    role: "Neurosurgeon",

                    degree: "MBBS, MCh"

                }

            ]

        },

        orthopedic: {

            title: "Orthopedic Department",

            breadcrumb: "Orthopedic",

            subtitle: "Complete care for bones, joints, muscles and sports injuries.",

            about: `
            Our Orthopedic Department specializes in the diagnosis and treatment
            of bone, joint and muscle disorders.

            We provide advanced orthopedic surgeries, joint replacement,
            fracture management and sports injury rehabilitation.
        `,

            services: [

                "Bone Fracture",

                "Joint Replacement",

                "Sports Injury",

                "Arthroscopy",

                "Spine Care",

                "Physiotherapy"

            ],

            info: {

                location: "1st Floor, CarePlus Hospital",

                phone: "+1 (555) 333-2222",

                emergency: "+1 (555) 911-0000",

                hours: "Mon - Fri<br>8:00 AM - 5:00 PM"

            },

            gallery: [

                "images/gallery/orthopedic-1.jpeg",

                "images/gallery/orthopedic-2.jpeg",

                "images/gallery/orthopedic-3.jpeg",

                "images/gallery/orthopedic-4.jpeg"

            ],

            doctors: [

                {

                    image: "images/doctors/doctor1.jpeg",

                    name: "Dr. Michael Brown",

                    role: "Orthopedic Surgeon",

                    degree: "MBBS, MS"

                },

                {

                    image: "images/doctors/doctor2.jpeg",

                    name: "Dr. William Scott",

                    role: "Joint Specialist",

                    degree: "MBBS, MS"

                },

                {

                    image: "images/doctors/doctor5.jpeg",

                    name: "Dr. Olivia White",

                    role: "Sports Injury Specialist",

                    degree: "MBBS, DNB"

                },

                {

                    image: "images/doctors/doctor4.jpeg",

                    name: "Dr. Ethan Moore",

                    role: "Spine Surgeon",

                    degree: "MBBS, MCh"

                }

            ]

        },

        pediatrics: {

            title: "Pediatrics Department",

            breadcrumb: "Pediatrics",

            subtitle: "Specialized healthcare for infants, children and adolescents.",

            about: `
            Our Pediatrics Department provides comprehensive healthcare for
            newborns, infants, children and teenagers.

            Our experienced pediatricians ensure your child receives
            compassionate and personalized treatment in a child-friendly
            environment.
        `,

            services: [

                "Child Checkups",

                "Vaccination",

                "Nutrition Guidance",

                "Growth Monitoring",

                "Newborn Care",

                "Pediatric Emergency"

            ],

            info: {

                location: "Ground Floor, CarePlus Hospital",

                phone: "+1 (555) 444-1111",

                emergency: "+1 (555) 911-0000",

                hours: "Mon - Sat<br>8:00 AM - 7:00 PM"

            },

            gallery: [

                "images/gallery/pediatrics-1.jpeg",

                "images/gallery/pediatrics-2.jpeg",

                "images/gallery/pediatrics-3.jpeg",

                "images/gallery/pediatrics-4.jpeg"

            ],

            doctors: [

                {

                    image: "images/doctors/doctor1.jpeg",

                    name: "Dr. Emma Wilson",

                    role: "Senior Pediatrician",

                    degree: "MBBS, MD"

                },

                {

                    image: "images/doctors/doctor6.jpeg",

                    name: "Dr. Noah Carter",

                    role: "Child Specialist",

                    degree: "MBBS, DCH"

                },

                {

                    image: "images/doctors/doctor4.jpeg",

                    name: "Dr. Ava Green",

                    role: "Neonatologist",

                    degree: "MBBS, MD"

                },

                {

                    image: "images/doctors/doctor3.jpeg",

                    name: "Dr. Lucas Hall",

                    role: "Pediatric Surgeon",

                    degree: "MBBS, MS"

                }

            ]

        },

        eyecare: {

            title: "Eye Care Department",

            breadcrumb: "Eye Care",

            subtitle: "Advanced diagnosis and treatment for all eye conditions.",

            about: `
            Our Eye Care Department provides comprehensive vision care,
            cataract surgery, LASIK procedures and retinal treatments using
            the latest ophthalmic technology.
        `,

            services: [

                "Eye Examination",

                "LASIK",

                "Cataract Surgery",

                "Retina Care",

                "Glaucoma Treatment",

                "Vision Testing"

            ],

            info: {

                location: "2nd Floor, CarePlus Hospital",

                phone: "+1 (555) 555-1234",

                emergency: "+1 (555) 911-0000",

                hours: "Mon - Fri<br>9:00 AM - 6:00 PM"

            },

            gallery: [

                "images/gallery/eyecare-1.jpeg",

                "images/gallery/eyecare-2.jpeg",

                "images/gallery/eyecare-3.jpeg",

                "images/gallery/eyecare-4.jpeg"

            ],

            doctors: [

                {

                    image: "images/doctors/doctor5.jpeg",

                    name: "Dr. Sophia Clark",

                    role: "Ophthalmologist",

                    degree: "MBBS, MS"

                },

                {

                    image: "images/doctors/doctor2.jpeg",

                    name: "Dr. Ethan Young",

                    role: "Eye Surgeon",

                    degree: "MBBS, DO"

                },

                {

                    image: "images/doctors/doctor1.jpeg",

                    name: "Dr. Lily Walker",

                    role: "Retina Specialist",

                    degree: "MBBS, MS"

                },

                {

                    image: "images/doctors/doctor4.jpeg",

                    name: "Dr. Henry Scott",

                    role: "LASIK Specialist",

                    degree: "MBBS, DNB"

                }

            ]

        },

        dental: {

            title: "Dental Department",

            breadcrumb: "Dental",

            subtitle: "Complete dental care with modern equipment and experienced dentists.",

            about: `
            Our Dental Department offers preventive, cosmetic and restorative
            dental treatments to maintain healthy and beautiful smiles.
        `,

            services: [

                "Dental Cleaning",

                "Root Canal",

                "Braces",

                "Dental Implants",

                "Teeth Whitening",

                "Smile Makeover"

            ],

            info: {

                location: "1st Floor, CarePlus Hospital",

                phone: "+1 (555) 666-2222",

                emergency: "+1 (555) 911-0000",

                hours: "Mon - Sat<br>9:00 AM - 7:00 PM"

            },

            gallery: [

                "images/gallery/dental-1.jpeg",

                "images/gallery/dental-2.jpeg",

                "images/gallery/dental-3.jpeg",

                "images/gallery/dental-4.jpeg"

            ],

            doctors: [

                {

                    image: "images/doctors/doctor1.jpeg",

                    name: "Dr. Olivia Martin",

                    role: "Chief Dentist",

                    degree: "BDS, MDS"

                },

                {

                    image: "images/doctors/doctor2.jpeg",

                    name: "Dr. James Lewis",

                    role: "Orthodontist",

                    degree: "BDS, MDS"

                },

                {

                    image: "images/doctors/doctor6.jpeg",

                    name: "Dr. Amelia King",

                    role: "Implant Specialist",

                    degree: "BDS"

                },

                {

                    image: "images/doctors/doctor4.jpeg",

                    name: "Dr. Benjamin Hill",

                    role: "Cosmetic Dentist",

                    degree: "BDS, MDS"

                }

            ]

        },

        generalmedicine: {

            title: "General Medicine Department",

            breadcrumb: "General Medicine",

            subtitle: "Comprehensive healthcare for adults with expert physicians.",

            about: `
            Our General Medicine Department provides diagnosis and treatment
            for a wide range of medical conditions. We focus on preventive care,
            early diagnosis and long-term health management.

            Our experienced physicians work closely with specialists to ensure
            complete patient care.
        `,

            services: [

                "General Checkup",

                "Diabetes Care",

                "Blood Pressure Management",

                "Fever Treatment",

                "Health Screening",

                "Preventive Medicine"

            ],

            info: {

                location: "Ground Floor, CarePlus Hospital",

                phone: "+1 (555) 777-1111",

                emergency: "+1 (555) 911-0000",

                hours: "Mon - Sat<br>8:00 AM - 8:00 PM"

            },

            gallery: [

                "images/gallery/general-1.jpeg",

                "images/gallery/general-2.jpeg",

                "images/gallery/general-3.jpeg",

                "images/gallery/general-4.jpeg"

            ],

            doctors: [

                {

                    image: "images/doctors/doctor2.jpeg",

                    name: "Dr. Daniel Harris",

                    role: "General Physician",

                    degree: "MBBS, MD"

                },

                {

                    image: "images/doctors/doctor5.jpeg",

                    name: "Dr. Emily Moore",

                    role: "Internal Medicine",

                    degree: "MBBS, MD"

                },

                {

                    image: "images/doctors/doctor3.jpeg",

                    name: "Dr. David Hall",

                    role: "Senior Physician",

                    degree: "MBBS"

                },

                {

                    image: "images/doctors/doctor1.jpeg",

                    name: "Dr. Sarah Wilson",

                    role: "Family Medicine",

                    degree: "MBBS"

                }

            ]

        },

        emergency: {

            title: "Emergency Department",

            breadcrumb: "Emergency",

            subtitle: "24×7 emergency and trauma care with rapid response teams.",

            about: `
            Our Emergency Department provides immediate medical attention
            for accidents, trauma, cardiac emergencies and critical illnesses.

            Our emergency physicians are available 24 hours a day with
            advanced life-saving equipment.
        `,

            services: [

                "Emergency Care",

                "Trauma Treatment",

                "Ambulance Service",

                "Critical Care",

                "Accident Treatment",

                "Emergency Surgery"

            ],

            info: {

                location: "Emergency Wing",

                phone: "+1 (555) 888-1111",

                emergency: "24 × 7 Emergency",

                hours: "Open 24 Hours"

            },

            gallery: [

                "images/gallery/emergency-1.jpeg",

                "images/gallery/emergency-2.jpeg",

                "images/gallery/emergency-3.jpeg",

                "images/gallery/emergency-4.jpeg"

            ],

            doctors: [

                {

                    image: "images/doctors/doctor2.jpeg",

                    name: "Dr. Robert King",

                    role: "Emergency Physician",

                    degree: "MBBS"

                },

                {

                    image: "images/doctors/doctor1.jpeg",

                    name: "Dr. Sophia Miller",

                    role: "Trauma Specialist",

                    degree: "MBBS"

                },

                {

                    image: "images/doctors/doctor3.jpeg",

                    name: "Dr. Ryan Carter",

                    role: "Emergency Surgeon",

                    degree: "MBBS, MS"

                },

                {

                    image: "images/doctors/doctor4.jpeg",

                    name: "Dr. Grace Adams",

                    role: "Critical Care",

                    degree: "MBBS, MD"

                }

            ]

        },

        icu: {

            title: "ICU Department",

            breadcrumb: "ICU",

            subtitle: "Intensive Care Unit providing advanced critical care around the clock.",

            about: `
            Our Intensive Care Unit provides specialized treatment for
            critically ill patients using state-of-the-art monitoring
            systems and experienced intensivists.

            We deliver compassionate care with 24-hour monitoring.
        `,

            services: [

                "Critical Care",

                "Ventilator Support",

                "Cardiac Monitoring",

                "Post Surgery Care",

                "Emergency Observation",

                "Life Support"

            ],

            info: {

                location: "5th Floor, ICU Block",

                phone: "+1 (555) 999-1111",

                emergency: "24 × 7 ICU",

                hours: "Open 24 Hours"

            },

            gallery: [

                "images/gallery/icu-1.jpeg",

                "images/gallery/icu-2.jpeg",

                "images/gallery/icu-3.jpeg",

                "images/gallery/icu-4.jpeg"

            ],

            doctors: [

                {

                    image: "images/doctors/doctor1.jpeg",

                    name: "Dr. Michael Scott",

                    role: "Intensivist",

                    degree: "MBBS, MD"

                },

                {

                    image: "images/doctors/doctor5.jpeg",

                    name: "Dr. Emma Brown",

                    role: "Critical Care Specialist",

                    degree: "MBBS"

                },

                {

                    image: "images/doctors/doctor3.jpeg",

                    name: "Dr. Ethan Walker",

                    role: "ICU Consultant",

                    degree: "MBBS"

                },

                {

                    image: "images/doctors/doctor6.jpeg",

                    name: "Dr. Olivia Davis",

                    role: "Critical Care Physician",

                    degree: "MBBS, MD"

                }

            ]

        }

    };
    const departmentName =
        localStorage.getItem("selectedDepartment") || "cardiology";

    const current = departments[departmentName];

    if (!current) {

        console.log("Department not found");

        return;

    }

    /*=====================================
            BANNER
    =====================================*/

    document.getElementById("departmentHeading").textContent =
        current.title;

    document.getElementById("departmentTitle").textContent =
        current.breadcrumb;

    document.querySelector(".department-details-banner p").textContent =
        current.subtitle;


    /*=====================================
            ABOUT
    =====================================*/

    document.getElementById("departmentAbout").innerHTML =
        current.about;


    /*=====================================
            INFORMATION CARD
    =====================================*/

    document.getElementById("departmentLocation").innerHTML =
        current.info.location;

    document.getElementById("departmentPhone").innerHTML =
        current.info.phone;

    document.getElementById("departmentEmergency").innerHTML =
        current.info.emergency;

    document.getElementById("departmentHours").innerHTML =
        current.info.hours;


    /*=====================================
            SERVICES
    =====================================*/

    const services =
        document.querySelector(".department-details-list");

    services.innerHTML = "";

    current.services.forEach(service => {

        services.innerHTML += `

            <li>

                <i class="fa-solid fa-circle-check"></i>

                ${service}

            </li>

        `;

    });


    /*=====================================
            GALLERY
=====================================*/

    const galleryGrid =
        document.querySelector(".department-details-gallery-grid");

    galleryGrid.innerHTML = "";

    current.gallery.forEach(image => {

        galleryGrid.innerHTML += `

        <div class="department-details-gallery-item">

            <img src="${image}" alt="Department Gallery">

            <div class="department-details-gallery-overlay">

                <i class="fa-solid fa-magnifying-glass-plus"></i>

            </div>

        </div>

    `;

    });

    document.querySelectorAll(".department-details-gallery-item img")
        .forEach(image => {

            image.addEventListener("click", function () {

                window.open(this.src, "_blank");

            });

        });


    /*=====================================
        DOCTORS
=====================================*/

    const doctorGrid =
        document.querySelector(".department-details-doctors-grid");

    doctorGrid.innerHTML = "";

    current.doctors.forEach((doctor, index) => {

        doctorGrid.innerHTML += `

<div class="department-details-doctor-card">

    <div class="department-details-doctor-image">

        <img src="${doctor.image}" alt="${doctor.name}">

    </div>

    <div class="department-details-doctor-content">

        <h3>

            ${doctor.name}

        </h3>

        <h4>

            ${doctor.role}

        </h4>

        <p>

            ${doctor.degree}

        </p>

        <a href="#"

           class="department-details-profile-btn"

           data-index="${index}">

            View Profile →

        </a>

    </div>

</div>

`;

    });


    /*=====================================
      VIEW PROFILE
=====================================*/

    document.querySelectorAll(".department-details-profile-btn")
        .forEach(button => {

            button.addEventListener("click", function (e) {

                e.preventDefault();

                const doctor =
                    current.doctors[this.dataset.index];

                localStorage.setItem(

                    "selectedDoctor",

                    JSON.stringify(doctor)

                );

                loadPage("doctor-details");

            });

        });

    /*=====================================
    GALLERY LIGHTBOX
=====================================*/

    const galleryItems = document.querySelectorAll(
        ".department-details-gallery-item img"
    );

    galleryItems.forEach(image => {

        image.addEventListener("click", function () {

            let lightbox = document.querySelector(".department-lightbox");

            if (!lightbox) {

                lightbox = document.createElement("div");

                lightbox.className = "department-lightbox";

                lightbox.innerHTML = `

                <span class="department-lightbox-close">&times;</span>

                <img class="department-lightbox-image">

            `;

                document.body.appendChild(lightbox);

            }

            lightbox.querySelector("img").src = this.src;

            lightbox.style.display = "flex";

            lightbox.querySelector(".department-lightbox-close").onclick =
                () => lightbox.style.display = "none";

            lightbox.onclick = function (e) {

                if (e.target === this) {

                    this.style.display = "none";

                }

            };

        });

    });


    /*=====================================
          SCROLL ANIMATION
    =====================================*/

    const sections = document.querySelectorAll(

        ".department-details-content,.department-details-gallery-section,.department-details-doctors-section"

    );

    const observer = new IntersectionObserver(entries => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                entry.target.classList.add("department-show");

            }

        });

    }, {
        threshold: .2
    });

    sections.forEach(section => {

        section.classList.add("department-hidden");

        observer.observe(section);

    });

}