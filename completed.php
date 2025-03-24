<?php


?>
<html>
<head>
    <title>Interview Scheduling</title>
    <link rel="stylesheet" href="css/completed.css">
</head>
<body>
    <div class="bar">
        <h3 class="webName">TOMYANG UNIVERSITY</h3>
        <h1 class="pageTitle">Completed Interviews</h1>

        <a href=""><img src="ico/phone (1).png" class="iconPhone">  </a>
        <a href=""><img src="ico/bell.png" class="iconBell">  </a>
        <a href=""><img src="ico/user (1).png" class="iconUser1">  </a>
    </div>
    
    <a href="interviewScheduling.php">
    <img src="ico/back.png" alt="Back Icon" class="iconBack">
</a>
   
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

  
<div class="applicantTable">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Applicant No.</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Course</th>
                    <th>Interview Score</th>
                    <th></th>


                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connect.php';

                $sql = "SELECT * FROM completed_interviews ORDER BY completion_date DESC";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo '<td><input type="checkbox" class="checkbox" value="' . $row["id"] . '"></td>';
                        echo "<td>" . htmlspecialchars($row["applicant_no"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["last_name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["first_name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["middle_name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["course"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["interview_score"]) . "</td>";
                        echo '<td><button class="viewBTN" onclick="viewDetails(\'' . $row["applicant_no"] . '\')">View</button></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No completed interviews found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>


</body>
</html>