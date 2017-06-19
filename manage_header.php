<?php
    $managementLink = "<a href = 'manage.php'>Manage Users</a>";
    $newUserLink = "<a href='new_user.php'>New User</a> ";
    $startDiv = "<div style='text-align:center'>";
    $endDiv = "</div>";
    switch ($_SERVER['REQUEST_URI']) {
        case "/manage.php":
            printf("%s %s", $startDiv, "<strong>Manage Users</strong>");
            printf("%s %s", $newUserLink, $endDiv);
            break;
        case "/new_user.php":
            printf("%s %s", $startDiv, $managementLink);
            printf("%s %s", "<strong>New User</strong>", $endDiv);
            break;
        default:
            printf("%s %s", $startDiv, $managementLink);
            printf("%s %s", $newUserLink, $endDiv);
    }
?>
