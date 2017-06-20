<?php
    $portalLink = "<a href='portal.php'>Records</a> ";
    $settingLink = "<a href='settings.php'>Account Settings</a> ";
    $userMgmtLink = "<a href='manage.php'>Manage Users</a> ";
    $newRecordLink = "<a href='newrecord.php'>New Patient</a> ";
    $logOutLink = "<a href='logout.php'>Log Out</a>";
    $startDiv = "<div style='text-align:center'>";
    $endDiv = "</div>";
    switch ($_SERVER['PHP_SELF']) {
        case "/manage.php":
            printf("%s %s", $startDiv, $portalLink);
            printf("%s", $settingLink);
            printf("%s", "<strong>Manage Users</strong> ");
            printf("%s", $newRecordLink);
            printf("%s %s", $logOutLink, $endDiv);
            break;
        case "/new_user.php":
            printf("%s %s", $startDiv, $portalLink);
            printf("%s", $settingLink);
            printf("%s", "<strong>Manage Users</strong> ");
            printf("%s", $newRecordLink);
            printf("%s %s", $logOutLink, $endDiv);
            break;
        case "/settings.php":
            printf("%s %s", $startDiv, $portalLink);
            printf("%s", "<strong>Account Settings</strong> ");
            printf("%s", $userMgmtLink);
            printf("%s", $newRecordLink);
            printf("%s %s", $logOutLink, $endDiv);
            break;
        case "/newrecord.php":
            printf("%s %s", $startDiv, $portalLink);
            printf("%s", $settingLink);
            printf("%s", $userMgmtLink);
            printf("%s", "<strong>New Patient</strong> ");
            printf("%s %s", $logOutLink, $endDiv);
            break;
        default:
            printf("%s %s", $startDiv, "<strong>Records</strong> ");
            printf("%s", $settingLink);
            printf("%s", $userMgmtLink);
            printf("%s", $newRecordLink);
            printf("%s %s", $logOutLink, $endDiv);
    }
?>
