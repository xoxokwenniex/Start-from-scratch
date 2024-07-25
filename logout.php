<?php

session_start();
session_destroy();
ob_start();
header("Location: ./index.html");
ob_end_flush();
exit();