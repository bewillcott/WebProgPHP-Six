@@@
use : articles2
title: List Users | ${document.name}
@@@


## List Users


```
            <?php
            /**
             * Retrieve records from database.
             *            
             * PHP version 8
             *
             * @category  Administration
             * @package   Admin
             * @author    Bradley Willcott <bw.opensource@yahoo.com>
             * @copyright 2021 Bradley Willcott
             * @license   https://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License Version 3
             * @version   Release: v1.0
             * @link      ListUsers.php This file
             */
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            $mysqli = new mysqli('localhost', 'root', '', 'WebProgPHP_Six');

            /* Set the desired charset after establishing a connection */
            $mysqli->set_charset('utf8mb4');

            $result = $mysqli->query("SELECT `FirstName`, `LastName`, `Email` FROM `Users` ORDER BY `LastName`");
            $alt = false;
            ?>
```

<table>
    <caption>
        List of All Users
    </caption>
    <thead>
        <tr>
            <th style="text-align: left">
                Full Name
            </th>
            <th style="text-align: left">
                Email address
            </th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
                <td <?php echo $alt ? 'class="alt" ' : ''; ?>style = "text-align: left">
                    <?php echo $row["FirstName"] . " " . $row["LastName"]; ?>
                </td>
                <td <?php echo $alt ? 'class="alt" ' : ''; ?>style="text-align: left">
                    <?php echo $row["Email"]; ?>
                </td>
            </tr>
            <?php
            $alt = !$alt;
        }
        ?>
    </tbody>
</table>


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
