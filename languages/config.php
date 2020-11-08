<?php

if(!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = "ge";
}
else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
    if($_GET['lang'] == "ge") {
        $_SESSION['lang'] = "ge";
    }
    else {
        $_SESSION['lang'] = "en";
    }
}

require $_SESSION['lang'] . ".php";
?>