<html>
<head>
<title>Patient Portal</title>
<body>
<?php
    require_once "db.php";
    
    $db = db_connect();

    $portalLink = "<a href='portal.php'>Records</a> ";
    $settingLink = "<a href='settings.php'>Account Settings</a> ";
    $userMgmtLink = "<a href='usermgmt.php'>Manage Users</a> ";
    $newRecordLink = "<a href='newrecord.php'>New Patient</a> ";
    $startDiv = "<div style='text-align:center'>";
    $endDiv = "</div>";
    switch ($_GET['action']) {
        case usermgmt:
            printf("%s %s", $startDiv, $portalLink);
            printf("%s", $settingLink);
            printf("%s", "<strong>Manage Users</strong> ");
            printf("%s %s", $newRecordLink, $endDiv);
        case settings:
            printf("%s %s", $startDiv, $portalLink);
            printf("%s", "<strong>Account Settings</strong> ");
            printf("%s", $userMgmtLink);
            printf("%s %s", $newRecordLink, $endDiv);
        case newrecord:
            printf("%s %s", $startDiv, $portalLink);
            printf("%s", $settingLink);
            printf("%s", $userMgmtLink);
            printf("%s %s", "<strong>New Patient</strong> ", $endDiv);
        default:
            printf("%s %s", $startDiv, "<strong>Records</strong> ");
            printf("%s", $settingLink);
            printf("%s", $userMgmtLink);
            printf("%s %s", $newRecordLink, $endDiv);
    }

    $query = "SELECT * FROM patients";
    $results = mysqli_query($db, $query);
    if (!$results) {
        echo "<br>Error retrieving records: " . mysqli_error($db);
    }
    else {
        echo "<br><table style='text-align: center; margin: 0 auto'>";
        echo "<tr><th>Patient Number</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Gender</th>";
        echo "<th>Date of Birth</th>";
        echo "<th>Notes</th></tr>";
       
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            echo "<tr><td>" . $row['id'] . "</td>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['birthDate'] . "</td>";
            echo "<td>" . $row['notes'] . "</td>";
            echo "<td><a href=modify.php?id=" . $row['id'] . ">Edit Notes</a>";
        }
        echo "</table></div>";
    }          
?>
</body>
</html>
