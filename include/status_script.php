<?php
    
       
        include 'common.php';
        $id=$_REQUEST['id'];
    if (!isset($_SESSION['email']))
    {?>
        <script>
            alert("Login to enter task");
            location.href="../login.php";
        </script>
<?php
    }
    $query="UPDATE tasks
                SET  status='completed'
                WHERE tid = '".$id."';";
    mysqli_query($dbc,$query);
    header("location: ../index.php")
    ?>