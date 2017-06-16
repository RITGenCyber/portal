<?php
    $portalLink = "<a href='portal.php'>Records</a> ";
    $settingLink = "<a href='settings.php'>Account Settings</a> ";
    $userMgmtLink = "<a href='usermgmt.php'>Manage Users</a> ";
    $newRecordLink = "<a href='newrecord.php'>New Patient</a> ";
    $startDiv = "<div style='text-align:center'>";
    $endDiv = "</div>";
    switch ($_SERVER['REQUEST_URI']) {
        case "/usermgmt.php":
            printf("%s %s", $startDiv, $portalLink);
            printf("%s", $settingLink);
            printf("%s", "<strong>Manage Users</strong> ");
            printf("%s %s", $newRecordLink, $endDiv);
            break;
        case "/settings.php":
            printf("%s %s", $startDiv, $portalLink);
            printf("%s", "<strong>Account Settings</strong> ");
            printf("%s", $userMgmtLink);
            printf("%s %s", $newRecordLink, $endDiv);
            break;
        case "/newrecord.php":
            printf("%s %s", $startDiv, $portalLink);
            printf("%s", $settingLink);
            printf("%s", $userMgmtLink);
            printf("%s %s", "<strong>New Patient</strong> ", $endDiv);
            break;
        default:
            printf("%s %s", $startDiv, "<strong>Records</strong> ");
            printf("%s", $settingLink);
            printf("%s", $userMgmtLink);
            printf("%s %s", $newRecordLink, $endDiv);
    }
?>
