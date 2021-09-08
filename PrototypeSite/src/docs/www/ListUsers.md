@@@
use : articles2
title: ${document.name} | Setup
@@@


## List Users


```
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli('localhost', 'root', '', 'WebProgPHP_Six');

/* Set the desired charset after establishing a connection */
$mysqli->set_charset('utf8mb4');

$result = $mysqli->query("SELECT `FirstName`, `LastName`, `Email` FROM `Users` ORDER BY `LastName`");

?>
```

List of All Users
| Full Name | Email address |
| :-------- | :------------ |
| XXXXXXXXX | xxxxxxxxxxxxx |
| XXXXXXXXX | xxxxxxxxxxxxx |[@alt]
| XXXXXXXXX | xxxxxxxxxxxxx |[@reset]

<?php while ($row = $result->fetch_assoc()) { ?>
| <?php echo $row["FirstName"] . " " . $row["LastName"]; ?> | <?php echo $row["Email"]; ?> |
<?php } ?>



@@@[#navbar]
-  [Home]
- [@subactive] [Administration](#)
    - [Add User]
    - [@active] [List Users](#)
- [@right] [About]
    - [License]

[About]:About.html
[Add User]:AddUser.php
[Home]:index.html
[License]:LICENSE.html
[List Users]:ListUsers.php
@@@
