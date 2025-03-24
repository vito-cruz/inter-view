<?php


?>
<html>
<head>
    <title>Interview Scheduling</title>
    <link rel="stylesheet" href="css/pending.css">
</head>
<body>
    <div class="bar">
        <h3 class="webName">TOMYANG UNIVERSITY</h3>
        <h1 class="pageTitle">Pending Interviews</h1>

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
                    <th>Date</th>
                    <th>Time</th>
                    <th>Mode of Interview</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
    <?php
    include 'db_connect.php';

    $sql = "SELECT * FROM pending_interviews ORDER BY date, start_time";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo '<td><input type="checkbox" class="delete-checkbox" value="' . $row["id"] . '"></td>';
            echo "<td>" . $row["applicant_no"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["middle_name"] . "</td>";
            echo "<td>" . $row["course"] . "</td>";
            echo "<td>" . date('M d, Y', strtotime($row["date"])) . "</td>";
            echo "<td>" . date('h:i A', strtotime($row["start_time"])) . " - " . 
                         date('h:i A', strtotime($row["end_time"])) . "</td>";
            echo "<td>" . $row["mode"] . "</td>";
            echo '<td><button class="viewBTN" onclick="openViewModal(\'' . $row["applicant_no"] . '\')">View</button></td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No scheduled interviews.</td></tr>";
    }

    $conn->close();
    ?>
</tbody>

        </table>
    </div>
   
    <div id="viewModal" class="modal">
    <div class="modal-content">
        <h2 class="formName">Interview Details</h2>
        <p id="viewDetails"></p>
        <button class="cancel-btn" onclick="closeViewModal()">Close</button>
    </div>
</div>

<script>
    function openViewModal(applicantNo) {
        fetch("view_interview.php?applicantNo=" + applicantNo)
        .then(response => response.json())
        .then(data => {
            document.getElementById("viewDetails").innerHTML = `
                <strong>Applicant No.:</strong> ${data.applicant_no}<br>
                <strong>Last Name:</strong> ${data.last_name}<br>
                <strong>First Name:</strong> ${data.first_name}<br>
                <strong>Middle Name:</strong> ${data.middle_name}<br>
                <strong>Course:</strong> ${data.course}<br>
                <strong>Date:</strong> ${data.date}<br>
                <strong>Time:</strong> ${data.start_time} - ${data.end_time}<br>
                <strong>Mode:</strong> ${data.mode}<br>
                <strong>Panel 1:</strong> ${data.panel1}<br>
                <strong>Panel 2:</strong> ${data.panel2}<br>
                <strong>Panel 3:</strong> ${data.panel3}
            `;
            document.getElementById("viewModal").style.display = "flex";
        });
    }

    function closeViewModal() {
        document.getElementById("viewModal").style.display = "none";
    }
</script>


</body>
</html>