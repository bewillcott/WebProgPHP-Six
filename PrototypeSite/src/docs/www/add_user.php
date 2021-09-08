<?php

/**
 *  File Name:    add_user.php
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
 *
 * @category  Administration
 * @package   Admin
 * @author    Bradley Willcott <bw.opensource@yahoo.com>
 * @copyright 2021 Bradley Willcott
 * @license   https://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License Version 3
 * @version   Release: v1.0
 * @link      add_user This class
 */
/* Original code copied from: PHP Manual/mysqli.construct.html */

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
