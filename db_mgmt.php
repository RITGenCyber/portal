<?php
    include "header.php";
    include "manage_header.php";
    require "db.php";
    if (isset($_POST) && !empty($_POST['action'])) {
        switch ($_POST['action']) {
            case "backup":
                if (!empty($_POST['filename'])) {
                    $filename = $_POST['filename'];
                }
                else {
                    date_default_timezone_set("America/New_York");
                    $dateString = date("ymd_His");
                    $filename = "db_dump_" . $dateString . ".sql";
                }
                chdir("/var/www/html/backups");
                $command = "mysqldump --user=root portal > " .
                    "/var/www/html/backups/" . $filename;
                shell_exec($command);
                break;
        }
    }
?>
<html>
<head>
<title>Database Management</title>
</head>
<body>
<?php
    chdir("/var/www/html/backups");
    $output = shell_exec("ls -al");
    $output = str_replace("\n", "<br>", $output);
    echo "<br><div style='text-align: center;'> $output";
?>
Filename: <input id='filename' type='text'><br>
<form action='db_mgmt.php' method='post'>
<input type="hidden" name="action" value="backup">
<button type="submit">Backup</button>
</form>

<form action='db_mgmt.php' method='post'>
<input type="hidden" name="action" value="restore">
<button type="submit">Restore</button>
</form>

<form action='db_mgmt.php' method='post'>
<input type="hidden" name="action" value="delete">
<button type="submit">Delete File</button>
</form>

</body>
</html>
