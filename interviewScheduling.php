<?php


?>
<html>
<head>
    <title>Interview Scheduling</title>
    <link rel="stylesheet" href="css/interviewScheduling.css">
</head>
<body>
    <div class="bar">
        <h3 class="webName">TOMYANG UNIVERSITY</h3>
        <h1 class="pageTitle">Interview Scheduling</h1>

        <a href=""><img src="ico/phone (1).png" class="iconPhone">  </a>
        <a href=""><img src="ico/bell.png" class="iconBell" >  </a>
        <a href=""><img src="ico/user (1).png" class="iconUser1">  </a>

    </div>

    
    <div class="nav">
    <img src="ico/home.png" class="iconHome"> 
    <img src="ico/enrollment.png" class="iconApplicants">
    <img src="ico/education.png" class="iconAdmission">
    <img src="ico/clipboard.png" class="iconCriteria"> 
    <img src="ico/test (1).png" class="iconInt"> 
    <img src="ico/school.png" class="iconTest">
    <img src="ico/admission.png" class="iconRes"> 
    <img src="ico/group.png" class="iconUser"> 
    <hr class="line">
    <div class="picker"></div>
    <a class="homeBTN" href="#">
        Home
    </a>
    <hr class="line2">
    <a class="applicantBTN" href="#">
        Applicants
    </a>
    <hr class="line3">
    <a class="admissionBTN" href="#">
         Admission
    </a>
    <hr class="line4">
    <a class="creteriaBTN" href="#">
       Criteria
    </a>
    <hr class="line5">
    <a class="interviewSchedulingBTN" href="interviewScheduling.php">
       Interview Scheduling
    </a>
    <hr class="line6">
    <a class="testSchedulingBTN" href="#">
        Test Scheduling
    </a>
    <hr class="line7">
    <a class="admissionResultBTN" href="#">
       Admission Result
    </a>
    <hr class="line8">
    <a class="userManagementBTN" href="#">
        User Management
    </a>
</div>


    <div class="interview-cards-container">
    <div class="interview-card1">
        <a href="toschedule.php" class="card-link">
            <div class="card-content">
                <h5 class="card-title">To Schedule Interviews</h5>
            </div>
        </a>
    </div>

    <div class="interview-card2">
        <a href="pending.php" class="card-link">
            <div class="card-content">
                <h5 class="card-title">Pending Interviews</h5>
            </div>
        </a>
    </div>

    <div class="interview-card3">
        <a href="ongoing.php" class="card-link">
            <div class="card-content">
                <h5 class="card-title">On Going Interviews</h5>
            </div>
        </a>
    </div>

    <div class="interview-card4">
        <a href="resched.php" class="card-link">
            <div class="card-content">
                <h5 class="card-title"q>Re-schedule Interview Request</h5>
            </div>
        </a>
    </div>

    <div class="interview-card5">
        <a href="completed.php" class="card-link">
            <div class="card-content">
                <h5 class="card-title">Completed Interviews</h5>
            </div>
        </a>
    </div>
</div>

</body>
</html>