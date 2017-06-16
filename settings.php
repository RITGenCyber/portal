<html>
<head>
<title>Account Settings</title>
<body>

<?php
    require_once "db.php";
    include "header.php";
   ?>

<br><div style="text-align: center">
<form action="settings.php" method="post">
<?php
    function queryWrapper($queryString) {
    	$db = db_connect();
        $query = mysqli_query($db, $queryString);
        if (!$query) {
            echo "Error accessing database: " . mysqli_error($db);
        }
        $row = mysqli_fetch_row($query);
        return $row[0];
    }
    $username = queryWrapper("select username from users where id = '" .
        $_COOKIE['id'] . "'");
    echo "Username: <input type=\"text\" name=\"username\" value='" .
         $username . "'><br>";

    echo "Password: <input type=\"password\" name=\"password\"" . 
        "value=\"******\"'><br>";

    $email = queryWrapper("select email from users where id = '" . 
        $_COOKIE['id'] . "'");
    echo "Email: <input type=\"text\" name=\"email\" value='" .
         $email . "'><br>";

    $firstName = queryWrapper("select firstName from users where id = '" .
        $_COOKIE['id'] . "'");
    echo "First Name: <input type=\"text\" name=\"firstname\" value='" .
        $firstName . "'><br>";

    $lastName = queryWrapper("select firstName from users where id = '" .
        $_COOKIE['id'] . "'");
    echo "Last Name: <input type=\"text\" name=\"lastname\" value='" .
        $lastName . "'><br>";

    $phoneNumber = queryWrapper("select phoneNumber from users where id = '" .
        $_COOKIE['id'] . "'");
    echo "Phone Number: <input type=\"text\" name=\"phonenumber\" value='" .
        $phoneNumber . "'><br>";

    echo "<input type='submit' value='Submit'>";
?>
</form>

</body>
</html>
