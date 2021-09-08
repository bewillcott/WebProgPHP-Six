<!DOCTYPE html>
<!--
/**
 *  File Name:    AddUser.php
 *  Project Name: WebProgPHP-Six
 *
 * PHP version 8
 *
 * LICENSE:
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ****************************************************************
 * Name: Bradley Willcott
 * ID:   M198449
 * Date: 7 Sept 2021
 * ****************************************************************
 */
-->
<html lang="en-us" id="top">
    <head>
        <title>Prototype Site | Setup</title>
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

            <footer id="bottom">
                <hr>
                Copyright © 2021 <a href="mailto:bw.opensource@yahoo.com">Bradley Willcott</a><br>
                Last updated: Wed Sep 08 14:33:01 AWST 2021
            </footer>
        </article>
    </body>
</html>
