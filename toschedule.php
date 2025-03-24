<?php
include 'db_connect.php'; // Include the database connection
?>  
<html>
<head>
    <title>Interview Scheduling</title>
    <link rel="stylesheet" href="css/toschedule.css">
</head>
<body>
    <div class="bar">
        <h3 class="webName">TOMYANG UNIVERSITY</h3>
        <h1 class="pageTitle">To Schedule Interviews</h1>

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

<button class="delete-btn">Delete</button>
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
                    <th ></th>

                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM applicants";
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
                        echo '<td><button class="scheduleBTN" onclick="openModal(this)">Schedule</button>
 <a href="view.php?id=' . $row["id"] . '"><button class="viewBTN">View</button></a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No applicants found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>    
        </table>
    </div>

   <!-- Scheduling Form Modal -->
<div id="scheduleModal" class="modal">
    <div class="modal-content">
        <h2>Schedule Interview</h2>
        <form id="scheduleForm">
            <!-- Hidden fields to store applicant data -->
            <input type="hidden" id="applicantNo" name="applicantNo">
            <input type="hidden" id="lastName" name="lastName">
            <input type="hidden" id="firstName" name="firstName">
            <input type="hidden" id="middleName" name="middleName">
            <input type="hidden" id="course" name="course">

            <div class="date-time-container">
                <div>
                    <label for="scheduleDate" class="label">Date</label>
                    <input type="date" id="scheduleDate" name="scheduleDate" required>
                </div>

                <div class="time-interval">
                    <label class="label">Time</label>
                    <div class="time-box">
                        <input type="time" id="startTime" name="startTime" required>
                        <span class="time-separator">-</span>
                        <input type="time" id="endTime" name="endTime" required>
                    </div>
                </div>
            </div>

            <label for="mode" class="label">Mode of Schedule</label>
            <select id="mode" name="mode">
                <option value="face-to-face">Face-to-Face</option>
                <option value="online">Online</option>
            </select>

            <label for="location" class="label">Location</label>
            <input type="text" id="location" name="location" required>

            <label for="panel1" class="label">Panel 1 Name</label>
            <input type="text" id="panel1" name="panel1" required>

            <label for="panel2" class="label">Panel 2 Name</label>
            <input type="text" id="panel2" name="panel2" required>

            <label for="panel3" class="label">Panel 3 Name</label>
            <input type="text" id="panel3" name="panel3" required>

            <div class="button-group">
                <button type="button" class="cancel-btn" onclick="closeModal()">Cancel</button>
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>
</div>



        <script>
function openModal(button) {
    var row = button.closest("tr");

    document.getElementById("applicantNo").value = row.cells[1].innerText;
    document.getElementById("lastName").value = row.cells[2].innerText;
    document.getElementById("firstName").value = row.cells[3].innerText;
    document.getElementById("middleName").value = row.cells[4].innerText;
    document.getElementById("course").value = row.cells[5].innerText;

    document.getElementById('scheduleModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('scheduleModal').style.display = 'none';
}

document.getElementById("scheduleForm").addEventListener("submit", function(event) {
    event.preventDefault();

    var formData = {
        applicantNo: document.getElementById("applicantNo").value,
        scheduleDate: document.getElementById("scheduleDate").value,
        startTime: document.getElementById("startTime").value,
        endTime: document.getElementById("endTime").value,
        mode: document.getElementById("mode").value,
        location: document.getElementById("location").value,
        panel1: document.getElementById("panel1").value,
        panel2: document.getElementById("panel2").value,
        panel3: document.getElementById("panel3").value
    };

    fetch("schedule_process.php", {  // Removed http://localhost/SOFTDEV/SMS/
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert("Interview scheduled successfully!");
            closeModal();
            location.reload();
        } else {
            alert("Error scheduling interview: " + data.error);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred while scheduling the interview");
    });
});



</script>



</body>
</html>