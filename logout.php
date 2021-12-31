<?php
// ! start session
session_start();
// ! empty session and delete 
session_destroy();
// ! redirect back to login
header("Location: http://localhost/forms");