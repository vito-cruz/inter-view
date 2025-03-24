<?php
include 'db_connect.php';
?>
<html>
<head>
    <title>Interview Scheduling</title>
    <link rel="stylesheet" href="css/userside.css">
</head>
<body>
    <div class="bar">
        <h3 class="webName">TOMYANG UNIVERSITY</h3>
        <h1 class="pageTitle">Notification</h1>

        <a href=""><img src="ico/phone (1).png" class="iconPhone">  </a>
        <div class="circle"></div>
        <a href=""><img src="ico/notif.png" class="iconBell1">  </a>
        <a href=""><img src="ico/user (1).png" class="iconUser1">  </a>

    </div>
   
     <div class="nav">
        <img src="ico/home.png" class="iconHome"> 
  
        <hr class="line">
        <a class="homeBTN" href="#">
        Home
        </a>

    </div>

    <div class="notifbar">
        <?php
        // Fetch pending interviews that need user response
        $sql = "SELECT * FROM pending_interviews WHERE status = 'pending_confirmation'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="notification-item">';
                echo '<div class="circleadmin">';
                echo '<h5 class="senderName">Admin</h5>';
                echo '<p class="message">has scheduled your interview for ' . date('M d, Y', strtotime($row["date"])) . 
                     ' at ' . date('h:i A', strtotime($row["start_time"])) . '</p>';
                echo '<div class="interview-details">';
                echo '<p>Mode: ' . $row["mode"] . '</p>';
                echo '<p>Location: ' . $row["location"] . '</p>';
                echo '<div class="button-group">';
                echo '<button class="confirm-btn" onclick="handleResponse(\'' . $row["applicant_no"] . '\', \'confirm\')">Confirm</button>';
                echo '<button class="reschedule-btn" onclick="handleResponse(\'' . $row["applicant_no"] . '\', \'reschedule\')">Reschedule</button>';
                echo '</div></div></div></div>';
            }
        } else {
            echo '<p>No new notifications</p>';
        }
        ?>
    </div>

    <script>
    function handleResponse(applicantNo, action) {
        fetch('process_response.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                applicantNo: applicantNo,
                action: action
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(action === 'confirm' ? 
                    'Interview schedule confirmed!' : 
                    'Reschedule request sent!');
                location.reload();
            } else {
                alert('Error: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing your request');
        });
    }
    </script>
</body>
</html>