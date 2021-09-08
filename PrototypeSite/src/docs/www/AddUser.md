@@@
use : articles2
title: ${document.name} | Setup
@@@


## Add User

~~~
<?php
if (!empty($_POST)) {
    $vars_arr = filter_input_array(INPUT_POST);
    $lastname = $vars_arr['lname'];
    $firstname = $vars_arr['fname'];
    $email = $vars_arr['email'];
    $result = false;

    if (!empty($lastname) && !empty($firstname) && !empty($email)) {
        /* You should enable error reporting for mysqli before attempting to make a connection */
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $mysqli = new mysqli('localhost', 'root', '', 'WebProgPHP_Six');

        /* Set the desired charset after establishing a connection */
        $mysqli->set_charset('utf8mb4');

        $sql_query = "INSERT INTO `Users` (`LastName`, `FirstName`, `Email`) "
                . "VALUES (\"{$vars_arr['lname']}\", \"{$vars_arr['fname']}\", \"{$vars_arr['email']}\")";

        $result = $mysqli->real_query($sql_query);
    }
}

?>
~~~

<table class="hidden">
    <tr>
        <td>
            <form action="AddUser.php" method="post">
                <table class="hidden">
                    <colgroup class="border">
                        <col span="2">
                    </colgroup>
                    <tr>
                        <td class="right"><label for="fname">First name:</label></td>
                        <?php
                        if (!$result) {
                            if (empty($firstname)) {
                                echo '<td><input type = "text" id = "fname" name = "fname"> * Required</td>';
                            } else {
                                echo "<td><input type = \"text\" id = \"fname\" name = \"fname\" value=\"$firstname\"></td>";
                            }
                        } else {
                            echo '<td><input type = "text" id = "fname" name = "fname"></td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="right"><label for="lname">Last name:</label></td>
                        <?php
                        if (!$result) {
                            if (empty($lastname)) {
                                echo '<td><input type = "text" id = "lname" name = "lname"> * Required</td>';
                            } else {
                                echo "<td><input type = \"text\" id = \"lname\" name = \"lname\" value=\"$lastname\"></td>";
                            }
                        } else {
                            echo '<td><input type = "text" id = "lname" name = "lname"></td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="right"><label for="email">Email:</label></td>
                        <?php
                        if (!$result) {
                                if (empty($email)) {
                                    echo '<td><input type = "email" id = "email" name = "email" size="30"
                                   placeholder="john.doe@domainname.com"> * Required</td>';
                                } else {
                                    echo "<td><input type = \"email\" id = \"email\" name = \"email\" value=\"$email\" size=\"30\"
                                   placeholder=\"john.doe@domainname.com\"></td>";
                                }
                            } else {
                                echo '<td><input type = "email" id = "email" name = "email" size="30"
                                   placeholder="john.doe@domainname.com"></td>';
                            }
                            ?>
                    </tr>
                </table>
                <p style="text-align: right">
                    <input type="submit" value="Submit">
                </p>
            </form>
        </td>
        <td></td>
    </tr>
</table>


@@@[#navbar]
-  [Home]
- [@subactive] [Administration](#)
    - [@active] [Add User](#)
    - [List Users]
- [@right] [About]
    - [License]

[About]:About.html
[Add User]:AddUser.php
[Home]:index.html
[License]:LICENSE.html
[List Users]:ListUsers.html
@@@
