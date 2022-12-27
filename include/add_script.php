<?php
    
       
        include 'common.php';
        $id=$_REQUEST['id'];
    if (!isset($_SESSION['email'])){
        ?>
        <script>
            alert("Login to enter task");
            location.href="../login.php";
        </script>
        <?php
        }
    else{
        

            $title=mysqli_real_escape_string($dbc,$_POST["title"]);
            $category=mysqli_real_escape_string($dbc,$_POST["category"]);
            $task=mysqli_real_escape_string($dbc,$_POST["task"]);
            $deadline=mysqli_real_escape_string($dbc,$_POST["deadline"]);


            if(isset($id)){
                $query="UPDATE tasks
                SET title='".$title."' , category='".$category."',task='".$task."',deadline='".$deadline."'
                WHERE tid = '".$id."';";
                mysqli_query($dbc, $query);
                ?><script>
                    location.href="../index.php";
                    </script>
                <?php
            }
            else{
                $query="INSERT INTO tasks (uid,title,category,task,status,deadline) VALUES (?, ?, ?,?,?,?)";
                $stmt=mysqli_prepare($dbc, $query);
                $status="pending";
                mysqli_stmt_bind_param($stmt, "isssss",$_SESSION["uid"], $title,$category,$task,$status,$deadline);
                mysqli_stmt_execute($stmt);
                $affected_rows = mysqli_stmt_affected_rows($stmt);

            if($affected_rows==1){
                    ?>
                        <script>

                            location.href="../index.php";
                        </script>
                    <?php
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
                }
            else{
                ?>
                    <script>
                        location.href="../index.php";
                    </script>
                <?php
            }
        }
    }
?>