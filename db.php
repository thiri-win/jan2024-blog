<?php

define("HOSTNAME", "localhost");
define("DB_USER_NAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "blog");

$conn = mysqli_connect(HOSTNAME, DB_USER_NAME, DB_PASSWORD, DB_NAME);

if(!$conn) {
    echo mysqli_connect_errno();
}