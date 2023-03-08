<?php
if (isset($_SESSION["login_details"]["id"])) {
    echo ("<div style = 'text-align : right;'><p>" . $_SESSION["login_details"]["fName"] . " " . $_SESSION["login_details"]["lName"] . "</p></div>");
}
