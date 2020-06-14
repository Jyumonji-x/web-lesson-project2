<?php
//登出逻辑

session_start();
session_destroy();
echo "<script>location='../web/Login.php'</script>";
