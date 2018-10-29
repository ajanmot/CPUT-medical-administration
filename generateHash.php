<?php
/**
 * Created by PhpStorm.
 * User: Antonin
 * Date: 29/10/2018
 * Time: 15:23
 */

$fileName = "password.txt";

$file = fopen($fileName, "r") or die("Unable to open file!");

while (($string = fgets($file)) !== FALSE) {
    echo md5("admin") . "<br>";
}
