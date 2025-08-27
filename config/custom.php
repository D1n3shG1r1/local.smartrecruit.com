<?php
return [
    "support_email" => "support@smartrecruit.ng",
    "skills" =>
    [
        "Administrative & Office Skills" => [
          "Office Administration",
          "Data Entry",
          "Calendar Management",
          "Customer Service",
          "Receptionist Duties"
        ],
        "Business & Management" => [
          "Project Management",
          "Operations Management",
          "Business Development",
          "Strategic Planning",
          "Procurement Management"
        ],
        "Sales & Marketing" => [
          "Sales Strategy",
          "Digital Marketing",
          "SEO/SEM",
          "Social Media Management",
          "Content Writing",
          "Telemarketing",
          "Advertising"
        ],
        "IT & Technology" => [
          "Web Development",
          "Mobile App Development",
          "Database Management",
          "IT Support",
          "Cybersecurity",
          "Cloud Computing",
          "UI/UX Design",
          "Graphic Design",
          "Software Development",
          "Networking & Infrastructure"
        ],
        "Finance & Accounting" => [
          "Bookkeeping",
          "Financial Analysis",
          "Payroll Management",
          "Auditing",
          "Tax Preparation",
          "Budget Management"
        ],
        "Engineering & Technical Skills (Expanded)" => [
          "Civil Engineering",
          "Mechanical Engineering",
          "Electrical Engineering",
          "Structural Engineering",
          "Petroleum Engineering",
          "Chemical Engineering",
          "Process Engineering",
          "Pipeline Engineering",
          "Instrumentation and Control Engineering",
          "Drilling Engineering",
          "Subsea Engineering",
          "Reservoir Engineering",
          "Production Engineering",
          "Facilities Engineering",
          "Health, Safety, and Environment (HSE Management)",
          "Maintenance Engineering (Oil & Gas Facilities)",
          "Project Engineering",
          "Offshore Operations Engineering",
          "Rig Operations and Maintenance",
          "CAD Design (AutoCAD, SolidWorks, etc.)",
          "Quality Assurance/Quality Control (QA/QC)",
          "Welding and Fabrication Engineering",
          "Corrosion Engineering",
          "Environmental Engineering",
          "Marine Engineering (for offshore oil operations)",
          "Rotating Equipment Engineering",
          "Piping Engineering",
          "Materials Engineering",
          "Energy Management"
        ],
        "Healthcare & Medical" => [
          "Nursing",
          "Medical Laboratory Technology",
          "Patient Care",
          "Medical Records Management",
          "Pharmacy Assistance"
        ],
        "Education & Training" => [
          "Teaching",
          "Curriculum Development",
          "Training Facilitation",
          "Educational Consulting"
        ],
        "Legal" => [
          "Legal Research",
          "Contract Drafting",
          "Corporate Law",
          "Paralegal Services"
        ],
        "Creative & Media" => [
          "Photography",
          "Videography",
          "Content Creation",
          "Animation",
          "Creative Writing",
          "Copywriting",
          "Branding"
        ],
        "Human Resources" => [
          "Recruitment",
          "HR Administration",
          "Payroll Administration",
          "Employee Relations",
          "Talent Management"
        ],
        "Hospitality & Tourism" => [
          "Hotel Management",
          "Food and Beverage Service",
          "Tour Guiding",
          "Event Planning"
        ],
        "Construction & Real Estate" => [
          "Construction Management",
          "Quantity Surveying",
          "Real Estate Sales",
          "Property Management"
        ],
        "Logistics & Supply Chain" => [
          "Logistics Coordination",
          "Warehouse Management",
          "Procurement",
          "Fleet Management"
        ],
        "Other Skills" => [
          "Negotiation",
          "Time Management",
          "Leadership",
          "Teamwork",
          "Problem Solving",
          "Communication Skills",
          "Critical Thinking"
        ]
    ],
    "pricing" => [
      "payasyougo" => [
        "name" => "Pay as you go",
        "price" => 7000,
        "currency" => "NGN",
        "symbol" => "₦",
        "candidatelimit" => 1,
      ],
      "basicaccess" => [
        "name" => "Basic Access",
        "price" => 30000,
        "currency" => "NGN",
        "symbol" => "₦",
        "candidatelimit" => 5,
      ],
      "recruiterspackage" => [
        "name" => "Recruiters Package",
        "price" => 55000,
        "currency" => "NGN",
        "symbol" => "₦",
        "candidatelimit" => 10,
      ],
      "custompackage" => [
        "name" => "Custom Package",
        "price" => 0,
        "currency" => "NGN",
        "symbol" => "₦",
        "candidatelimit" => 10000, //unlimited
      ],
      "featureprofile" => [
        "name" => "Feature Profile",
        "price" => 2000, //monthly
        "currency" => "NGN",
        "symbol" => "₦"
      ]
    ],
    "paystack" => [
        "publickey" => "pk_test_48f9c1d23041e406b620438391c682afbe66cfbb",
        "secretkey" => "sk_test_48f9c1d23041e406b620438391c682afbe66cfbb",
        "transInitialize" => "https://api.paystack.co/transaction/initialize",
        "transVerify" => "https://api.paystack.co/transaction/verify/",
        "transFetch" => "https://api.paystack.co/transaction/",
        "paySessTime" => "https://api.paystack.co/integration/payment_session_timeout"
    ],
    "baseCurrency" => [
      "currency" => "NGN",
      "symbol" => "₦"
    ],
    "videoInterviewLink" => "https://smartrecruit.ng/interview"
    
];