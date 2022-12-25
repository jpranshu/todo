<?php
    if(isset($_POST["submit"])){
        $data_missing=array();
        if(empty($_POST["name"])){
            $data_missing[]="Name";
        }
        
        if(empty($_POST["email"])){
            $data_missing[]="E-Mail";
        }

        if(empty($_POST["password"])){
            $data_missing[]="Password";
        }
 
        if(empty($data_missing)){
            include 'common.php';

            $name=mysqli_real_escape_string($dbc,$_POST["name"]);
            $email=mysqli_real_escape_string($dbc,$_POST["email"]);
            $password=md5(mysqli_real_escape_string($dbc,$_POST["password"]));


            $sql="SELECT email FROM users WHERE email='$email'";
            $result=mysqli_query($dbc,$sql);
            if(mysqli_num_rows($result)==0){
                $query="INSERT INTO users (name,email,password) VALUES (?, ?, ?)";
                $stmt=mysqli_prepare($dbc, $query);
                mysqli_stmt_bind_param($stmt, "sss",$name, $email, $password);
                mysqli_stmt_execute($stmt);
                $affected_rows = mysqli_stmt_affected_rows($stmt);

                if($affected_rows==1){
                    ?>
                        <script>
                            alert("You have successfully signed up !");
                            location.href="../login.php";
                        </script>
                    <?php
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
                }
                else{
                    ?>
                        <script>
                            alert("An error occurred. Try again later !");
                            location.href="../index.php";
                        </script>
                    <?php
                    echo mysqli_error();
                    mysqli_stmt_close($stmt);
                    mysqli_close($dbc);
                }
            }
            else{
                ?>
                    <script>
                        alert("User already exists");
                        location.href="../signup.php";
                    </script>
                <?php
            }
        }
        else{
            $count=1;
            ?>
                <script>
                    alert("Please enter the following :\n<?php $count.'. ';foreach($data_missing as $missing){echo $count.'. '.$missing.'\n';$count++;}?>");
                    location.href="../signup.php";
                </script>
            <?php
        }
    }
?>