<!DOCTYPE html>
<!--
Generated by
version: 1.1.5
on Thu Sep 09 11:25:57 AWST 2021
-->
<html lang="en-us" id="top">
    <head>
        <title>Add Users | Human Resources</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="">
        <link rel="stylesheet" type="text/css" href="css/darkstyle.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="icon" type="image/png" href="etc/markdown16.png">
    </head>
    <body>
        <article>
            <header>
                <p>Web Programming PHP - Six</p>

                <div id="navbar">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="subactive"><a href="#">Administration</a>
                            <ul>
                                <li class="active"><a href="#">Add User</a></li>
                                <li><a href="ListUsers.php">List Users</a></li></ul></li>
                        <li class="right"><a href="About.html">About</a>
                            <ul>
                                <li><a href="LICENSE.html">License</a></li></ul></li>
                    </ul>

                </div>

            </header>
            <h2>Add User</h2>

            <?php
            /**
             * Add new users to database.
             *
             * PHP version 8
             *
             * @category  Administration
             * @package   Admin
             * @author    Bradley Willcott <bw.opensource@yahoo.com>
             * @copyright 2021 Bradley Willcott
             * @license   https://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License Version 3
             * @version   Release: v1.0
             * @link      AddUser.php This file
             */

            /**
             * Used as a key
             */
            const VALID = "valid";
            /**
             * Used as a key
             */
            const TEXT = "text";
            /**
             * Used as a key
             */
            const FNAME = "fname";
            /**
             * Used as a key
             */
            const LNAME = "lname";
            /**
             * Used as a key
             */
            const EMAIL = "email";

            /**
             * Validate the text.
             *
             * @param array $subject the array containing two entries: string TEXT, bool VALID.
             *
             * @return bool the result of the validation
             */
            function validateName(array &$subject): bool
            {
                $subject[VALID] = (bool) preg_match("/^[a-zA-Z]+([ '-]?[a-zA-Z]+)*$/", $subject[TEXT]);
                return $subject[VALID];
            }
            // Process data
            if (!empty($_POST)) {
                $vars_arr = filter_input_array(INPUT_POST);
                $firstname = array(TEXT => $vars_arr[FNAME], VALID => false);
                $lastname = array(TEXT => $vars_arr[LNAME], VALID => false);
                $email = $vars_arr[EMAIL];
                $result = false;

                if (validateName($firstname) && validateName($lastname) && !empty($email)) {

                    /* You should enable error reporting for mysqli before attempting to make a connection */
                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                    $mysqli = new mysqli('localhost', 'root', '', 'WebProgPHP_Six');

                    /* Set the desired charset after establishing a connection */
                    $mysqli->set_charset('utf8mb4');

                    $sql_query = "INSERT INTO `Users` (`LastName`, `FirstName`, `Email`) "
                            . "VALUES (\"{$vars_arr[LNAME]}\", \"{$vars_arr[FNAME]}\", \"{$vars_arr[EMAIL]}\")";

                    $result = $mysqli->real_query($sql_query);
                }
            }
            ?>

            <table class="hidden">
                <tr>
                    <td>
                        <form action="AddUser.php" method="post">
                            <table class="hidden">
                                <colgroup class="border">
                                    <col span="2">
                                </colgroup>
                                <tr>
                                    <td class="right"><label for="fname">First&nbsp;name:</label></td>
                                    <?php
                                    if (!$result) {
                                        if (empty($firstname[TEXT])) {
                                            echo '<td><input type = TEXT id = "fname" name = "fname"><span class="error"> * Required</span></td>';
                                        } elseif (!$firstname[VALID]) {
                                            echo "<td><input type = \"text\" id = \"fname\" name = \"fname\" value=\"{$firstname['text']}\"><span class=\"error\"> * Invalid text</span></td>";
                                        } else {
                                            echo "<td><input type = \"text\" id = \"fname\" name = \"fname\" value=\"{$firstname['text']}\"></td>";
                                        }
                                    } else {
                                        echo '<td><input type = TEXT id = "fname" name = "fname"></td>';
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="right"><label for="lname">Last&nbsp;name:</label></td>
                                    <?php
                                    if (!$result) {
                                        if (empty($lastname[TEXT])) {
                                            echo '<td><input type = TEXT id = "lname" name = "lname"><span class="error"> * Required</span></td>';
                                        } elseif (!$lastname[VALID]) {
                                            echo "<td><input type = \"text\" id = \"lname\" name = \"lname\" value=\"{$lastname['text']}\"><span class=\"error\"> * Invalid text</span></td></td>";
                                        } else {
                                            echo "<td><input type = \"text\" id = \"lname\" name = \"lname\" value=\"{$lastname['text']}\"></td>";
                                        }
                                    } else {
                                        echo '<td><input type = TEXT id = "lname" name = "lname"></td>';
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="right"><label for="email">Email:</label></td>
                                    <?php
                                    if (!$result) {
                                        if (empty($email)) {
                                            echo '<td><input type = "email" id = "email" name = "email" size="30"
                                    placeholder="john.doe@domainname.com"><span class="error"> * Required</span></td>';
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
                                <?php
                                if ((!empty($firstname[TEXT]) && !$firstname[VALID]) || (!empty($lastname[TEXT]) && !$lastname[VALID])) {
                                    echo '<tr><td class="right error"><label><b>*&nbsp;Invalid&nbsp;text:</b></label></td>';
                                    echo "<td>Text must begin and end with an alphbetical character (a,A,b,B,c,C,...),"
                                    . " and must only contain alphbetic characters and"
                                    . " zero or more single spaces, zero or more single apostrophies, "
                                    . "and zero or more single hyphens.  Spaces, apostrophies and hyphens"
                                    . " can only be used individually<br/>(e.g. \"James the third\""
                                    . ", \"D'Arcy\", \"Jones-Adams\").</td></tr>";
                                }
                                ?>
                            </table>
                            <p style="text-align: right">
                                <input type="submit" value="Submit">
                            </p>
                        </form>
                    </td>
                    <td></td>
                </tr>
            </table>

            <footer id="bottom">
                <hr>
                Copyright © 2021 <a href="mailto:bw.opensource@yahoo.com">Bradley Willcott</a><br>
                Last updated: Thu Sep 09 11:25:57 AWST 2021
            </footer>
        </article>
    </body>
</html>
