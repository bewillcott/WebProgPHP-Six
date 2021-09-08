<!DOCTYPE html>
<!--
/**
 *  File Name:    ListUsers.php
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
                                <li><a href="AddUser.php">Add User</a></li>
                                <li class="active"><a href="#">List Users</a></li></ul></li>
                        <li class="right"><a href="About.html">About</a>
                            <ul>
                                <li><a href="LICENSE.html">License</a></li></ul></li>
                    </ul>

                </div>

            </header>
            <h2>List Users</h2>

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

            <footer id="bottom">
                <hr>
                Copyright © 2021 <a href="mailto:bw.opensource@yahoo.com">Bradley Willcott</a><br>
                Last updated: Wed Sep 08 14:33:01 AWST 2021
            </footer>
        </article>
    </body>
</html>
