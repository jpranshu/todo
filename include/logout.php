<?php
    session_start();
    if(isset($_SESSION["email"])){
        ?>
        <script>
            alert("You have successfully logged out !");
        </script>
        <?php

        session_unset();
        session_destroy();
        ?>
        <script>
            location.href="../index.php";
        </script>
        <?php
    }
    else{
        header("location: ../index.php");
    }
    
?>