<?php


?>
<html>
<head>
    <title>Interview Scheduling</title>
    <link rel="stylesheet" href="css/ongoing.css">
</head>
<body>
    <div class="bar">
        <h3 class="webName">TOMYANG UNIVERSITY</h3>
        <h1 class="pageTitle">On Going Interviews</h1>

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

                $sql = "SELECT * FROM ongoing_interviews ORDER BY date, start_time";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo '<td><input type="checkbox" class="checkbox" value="' . $row["id"] . '"></td>';
                        echo "<td>" . $row["applicant_no"] . "</td>";
                        echo "<td>" . $row["last_name"] . "</td>";
                        echo "<td>" . $row["first_name"] . "</td>";
                        echo "<td>" . $row["middle_name"] . "</td>";
                        echo "<td>" . $row["course"] . "</td>";
                        echo "<td>" . date('M d, Y', strtotime($row["date"])) . "</td>";
                        echo "<td>" . date('h:i A', strtotime($row["start_time"])) . " - " . 
                                     date('h:i A', strtotime($row["end_time"])) . "</td>";
                        echo "<td>" . $row["mode"] . "</td>";
                        echo '<td>
                                <button class="doneBTN" onclick="openScoreModalNew(this)" type="button">Done</button>
                                <button class="viewBTN" onclick="viewDetails(\'' . $row["applicant_no"] . '\')" type="button">View</button>
                              </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No ongoing interviews.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div id="scoreModal" class="modal">
    <div class="modal-content">
        <h2>Interview Score</h2>
        <form id="scoreForm">
            <input type="hidden" id="scoreApplicantNo" name="applicantNo">
            <div class="form-group">
                <label for="interviewScore">Panel 1</label>
                <select id="interviewScore" name="interviewScore" required>
                    <option value="" disabled selected>Select Score</option>
                    <option value="1">1 - Excellent</option>
                    <option value="2">2 - Good</option>
                    <option value="3">3 - Average</option>
                    <option value="4">4 - Below Average</option>
                    <option value="5">5 - Poor</option>
                </select>
            </div>
            <div class="button-group">
                <button type="button" class="cancel-btn" onclick="closeScoreModal()">Cancel</button>
                <button type="submit" class="submit-btn">Submit</button>
            </div>


<div id="scoreModal" class="modal">
    <div class="modal-content">
        <h2>Interview Score</h2>
        <form id="scoreForm">
            <input type="hidden" id="scoreApplicantNo" name="applicantNo">
            <div class="form-group">
                <label for="interviewScore">Panel 2</label>
                <select id="interviewScore" name="interviewScore" required>
                    <option value="" disabled selected>Select Score</option>
                    <option value="1">1 - Excellent</option>
                    <option value="2">2 - Good</option>
                    <option value="3">3 - Average</option>
                    <option value="4">4 - Below Average</option>
                    <option value="5">5 - Poor</option>
                </select>
            </div>
            <div class="button-group">
                <button type="button" class="cancel-btn" onclick="closeScoreModal()">Cancel</button>
                <button type="submit" class="submit-btn">Submit</button>
            </div>
        
        
        <div id="scoreModal" class="modal">
    <div class="modal-content">
        <h2>Interview Score</h2>
        <form id="scoreForm">
            <input type="hidden" id="scoreApplicantNo" name="applicantNo">
            <div class="form-group">
                <label for="interviewScore">Panel 3</label>
                <select id="interviewScore" name="interviewScore" required>
                    <option value="" disabled selected>Select Score</option>
                    <option value="1">1 - Excellent</option>
                    <option value="2">2 - Good</option>
                    <option value="3">3 - Average</option>
                    <option value="4">4 - Below Average</option>
                    <option value="5">5 - Poor</option>
                </select>
            </div>
            <div class="button-group">
                <button type="button" class="cancel-btn" onclick="closeScoreModal()">Cancel</button>
                <button type="submit" class="submit-btn">Submit</button>
            </div></form>
    </div>
</div>
<script>

function openScoreModalNew(button) {
    var row = button.closest("tr");
    document.getElementById("scoreApplicantNo").value = row.cells[1].innerText;
    document.getElementById('scoreModal').style.display = 'flex';
}

function closeScoreModal() {
    document.getElementById('scoreModal').style.display = 'none';
    document.getElementById('scoreForm').reset();
}

// Add event listeners when document is ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('JavaScript Loaded');

    const modal = document.getElementById('scoreModal');
    const scoreForm = document.getElementById('scoreForm');

    // Close modal when clicking outside
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeScoreModal();
        }
    });

    // Handle form submission
    scoreForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Get the applicant number
        const applicantNo = document.getElementById("scoreApplicantNo").value;
        
        // Find the row by iterating through all rows and matching the applicant number
        const rows = document.querySelectorAll('table tbody tr');
        let row;
        for (let r of rows) {
            if (r.cells[1].innerText === applicantNo) {
                row = r;
                break;
            }
        }
        
        if (!row) {
            alert('Error: Row not found');
            return;
        }

        var formData = {
            applicantNo: applicantNo,
            lastName: row.cells[2].innerText,
            firstName: row.cells[3].innerText,
            middleName: row.cells[4].innerText,
            course: row.cells[5].innerText,
            date: row.cells[6].innerText,
            time: row.cells[7].innerText,
            mode: row.cells[8].innerText,
            score: document.getElementById("interviewScore").value
        };

        // Send data to server
        fetch('transfer_to_completed.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Interview marked as completed successfully!');
                closeScoreModal();
                location.reload(); // Refresh the page to update the table
            } else {
                alert('Error: ' + (data.error || 'Unknown error occurred'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing your request');
        });
    });
});
</script>

</body>
</html>