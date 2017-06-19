<html>
<head>
<title>Edit User</title>
<body>

<?php
    require_once "db.php";
    include "header.php";
    include "manage_header.php";
?>

<br><div style="text-align: center">
<form action="user_modify.php" method="post">
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
        $_GET['id'] . "'");
    echo "Username: <input type=\"text\" name=\"email\" value='" .
         $username . "'><br>\n";

    echo "Password: <input type=\"password\" name=\"password\"><br>\n";

    $email = queryWrapper("select email from users where id = '" . 
        $_GET['id'] . "'");
    echo "Email: <input type=\"text\" name=\"email\" value='" .
         $email . "'><br>\n";

    $firstName = queryWrapper("select firstName from users where id = '" .
        $_GET['id'] . "'");
    echo "First Name: <input type=\"text\" name=\"firstname\" value='" .
        $firstName . "'><br>\n";

    $lastName = queryWrapper("select firstName from users where id = '" .
        $_GET['id'] . "'");
    echo "Last Name: <input type=\"text\" name=\"lastname\" value='" .
        $lastName . "'><br>\n";

    $phoneNumber = queryWrapper("select phoneNumber from users where id = '" .
        $_GET['id'] . "'");
    echo "Phone Number: <input type=\"text\" name=\"phonenumber\" value='" .
        $phoneNumber . "'><br>\n";

    $admin = queryWrapper("select admin from users where id = '" .
        $_GET['id'] . "'");
    if ($admin == '0') {
        echo "Admin? <input type=\"checkbox\" id=\"admin\"" . 
            "name=\"admin\"><br>\n";
    }
    else {
        echo "Admin? <input type=\"checkbox\" id=\"admin\"" . 
            "name=\"admin\" checked><br>\n";
    }        
    echo "<input type='submit' value='Submit' name='submit'>";
?>
</form>
<?php
    $db = db_connect();
    if (!$db) {
        echo "Error connecting to database: " . mysqli_error($db);
    }
    $password = mysqli_query($db, "SELECT password FROM users WHERE id = " .
        $_GET['id']);

    function update_if_different($original, $new, $field) {
        global $db;
        if (isset($new) && !empty($new) && $new != $original) {
            $queryString = "UPDATE users SET " . $field . "=" . "'" . 
             $new . "'" . " WHERE id =" . $_GET['id'];
            $query = mysqli_query($db, $queryString);
            if (!$query) {
                echo "Error querying database: " . mysqli_error($db);
            }
        }
    }
    if (isset($_POST['submit'])) {
        update_if_different($password, $_POST['password'], "password");
        update_if_different($email, $_POST['email'], "email");
        update_if_different($firstName, $_POST['firstname'], "firstName");
        update_if_different($lastName, $_POST['lastname'], "lastName");
        update_if_different($phoneNumber, $_POST['phonenumber'], "phoneNumber");
    }
?>
</body>
<html>
