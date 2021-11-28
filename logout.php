<?php

session_start();

session_destroy();
?>
<script>
    alert("You are logged out");
</script>
header("location: login.php");

?>
