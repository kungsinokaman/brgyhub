<?php

require_once 'core/config.php';

echo $DBQuery->getUser()->getName() . "<br>";
echo $DBQuery->getUser()->getProfileImage();