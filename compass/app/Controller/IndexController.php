<?php

// Include navbar

include 'View/nav.twig';

// Include rest of the package

if ($_GET['url'] == "home") 
{ echo 'you are on the home page';}


if ($_GET['url'] == "discoverpage") 
{ echo 'You are on the discoverpage page';}