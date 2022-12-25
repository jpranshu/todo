<?php 
include 'include/common.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Pranshu Jaiswal"> 
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="fonts/material-icons.css" rel="stylesheet">
        <link href="include/main.css" rel="stylesheet" type="text/css"/>
        
        <title>ToDo-Login</title>
    </head>
<body class="body">
<?php include 'include/header.php';?>

<div class="container cards">  
      <div class="card bg-light border-light m-10 mx-auto shadow-sm " style="max-width: 30rem;">
        <div class="card-header text-center ">Login</div>
        
        <div class="card-body text-secondary" > 
        <form action="include/login_submit.php" method="POST" >

            
              <div class="form-group mt-3">
                <label for="email">Email address:</label>
                <input type="email" name=user class="form-control" placeholder="Enter email" id="email" required>
              </div>
              <div class="form-group mt-3">
                <label for="pwd">Password:</label>
                <input type="password" name=pass class="form-control" placeholder="Enter password" id="pwd" required>
              </div>
              
              <div class="form-group my-3 mx-0"><input type="submit" name="submit" class="btn btn-primary float-right m-3" style="max-width: 7rem;" value="Login"></div>
                
             
        </form>
        </div>  
       
       <div class="card-footer  text-center "> <a
        href="Signup.php"
       style="text-decoration: none; color: #2f00ff;">Need a account? Signup</a></div>
      </div>
      
   
  </div>

</body>
</html>
