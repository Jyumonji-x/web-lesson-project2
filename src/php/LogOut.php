<!--登出逻辑-->
<?php
session_start();
session_destroy();
echo "<script>location='../web/Login.php'</script>";
