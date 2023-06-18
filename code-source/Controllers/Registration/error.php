<!-- <script>
    alert("log in Error")
</script> -->
<?php
session_start();
echo "<pre>";
var_dump(session_status() == 2);
echo "</pre>";
echo "<pre>";
var_dump($_SESSION['user']);
echo "</pre>";
?>