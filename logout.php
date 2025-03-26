<?php

//ksekinaei session
session_start();

//ginetai diagrafi olwn twn session metavlitwn
session_unset();

//katastrefetai to session
session_destroy();

header("Location: index.php");



?>