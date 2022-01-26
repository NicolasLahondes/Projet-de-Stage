<?php

// Include navbar

include 'View/nav.twig';

// Include rest of the package

if ($_GET['url'] == "home") { 
    echo 'you are on the home page';
}

if ($_GET['url'] == "discoverpage") {
    echo 'You are on the discover page';
}

if ($_GET['url'] == "profile") { 
    echo 'You are on the profile page';
}

if ($_GET['url'] == "contact") { 
    echo 'You are on the contact page';
}