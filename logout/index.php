<?php
session_start();

unset($_SESSION['id_profissional']);
unset($_SESSION['id_recrutador']);
unset($_SESSION['email']);
session_destroy();

header("Location: ../");

?>