<?php
    if(isset($_POST["submit"])){
        $data_missing=array();
        if(empty($_POST["user"])){
            $data_missing[]="Username";
        }
        
        if(empty($_POST["pass"])){
            $data_missing[]="Password";
        }
        
        if(empty($data_missing)){
            include 'common.php';

            $username=mysqli_real_escape_string($dbc,$_POST["user"]);
            $password=md5(mysqli_real_escape_string($dbc,$_POST["pass"]));

            $sql="SELECT uid,email,name FROM users WHERE email='$username' AND password='$password'";
            $result=mysqli_query($dbc,$sql);
            if(mysqli_num_rows($result)==0){?>
                    <script>
                        alert("Incorrect username or Password");
                        location.href="../login.php";
                    </script>
                <?php
            }
            else{
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION["email"]=$row["email"];
                $_SESSION["uid"]=$row["uid"];
                $_SESSION["name"]=$row["name"];
                ?>
                    <script>
                        alert("You have successfully logged in !");
                        location.href="../index.php";
                    </script>
                <?php
            }
        }
        else{
            $count=1;
            ?>
                <script>
                    alert("Please enter the following :\n<?php $count.'. ';foreach($data_missing as $missing){echo $count.'. '.$missing.'\n';$count++;}?>");
                    location.href="../login.php";
                </script>
            <?php
        }
    }
?>