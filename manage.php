<html>
<head>
<title>Manage Users</title>
<body>
<?php
    require_once "db.php";
    
    $db = db_connect();

    include "header.php";
    include "manage_header.php";

    $query = "SELECT * FROM users";
    $results = mysqli_query($db, $query);
    if (!$results) {
        echo "<br>Error retrieving records: " . mysqli_error($db);
    }
    else {
        echo "<br><table style='text-align: center; margin: 0 auto'>";
        echo "<tr><th>User ID</th>";
        echo "<th>Username</th>";
        echo "<th>Password</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Email Address</th>";
        echo "<th>Phone Number</th>";
        echo "<th>Admin?</th></tr>";
       
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            echo "<tr><td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phoneNumber'] . "</td>";
            echo "<td>" . $row['admin'] . "</td>";
            echo "<td><a href=user_modify.php?id=" . $row['id'] . 
                ">Edit User</a>";
        }
        echo "</table></div>";
    }          
?>
</body>
</html>
