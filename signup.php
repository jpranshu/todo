<?php include 'include/common.php';
 if (isset($_SESSION['email'])){
  header('location: index.php');}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Pranshu Jaiswal"> 
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="include/main.css" rel="stylesheet" type="text/css"/>
        
        <title>ToDo-Signup</title>
    </head>
<body class="body">

<?php include 'include/header.php';?>
 


    <div class=" container bg-gradient-dark cards">
        <div class="card bg-light border-light mb-3 mx-auto shadow-sm " style="max-width: 40rem;">
        <div class="card-header text-center "><h4>Create Account</h4></div>
        <div class="card-body text-secondary">
      <form action="include/signup_script.php" method="POST">
          <div class="form-row">
            <div class="form-group">
              <label for="First Name" class="pb-2 ">Name:</label>
              <input
                type="First Name"
                name="name"
                class="form-control mb-2 "
                placeholder="Enter Name"
                               
              />
            </div>

          </div>
          <div class="form-group">
            <label for="email">Email address:</label>
            <input
              type="email"
              name="email"
              class="form-control"
              placeholder="Enter email address"
              required
             
            />
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="Password" class="pb-2 ">Password</label>
              <input
                type="Password"
                name="password"
                class="form-control mb-2 "
                placeholder="Enter Password"
                id="password" required/>
            </div>
            <div class="form-group">
              <label for="Confirm Password" class="pb-2 "
                >Confirm Password</label
              >
              <input
                name="confirm_password"
                type="password"
                class="form-control mb-2 "
                placeholder="Confirm Password"
                id="confirm_password" required
                
              />
            </div>
           
          </div>
          
          <div class="form-group"><input type="submit" name="submit" class="btn btn-primary m-3" style="width: 35rem;" value=" Create Account"></div>

        </form>
      </div>
              
    

         <div class="card-footer  mt-4 text-center "> 
            <a href="login.php" style="color: #2400c3;">Have an account? Go to Login</a></div>
      </div>

    </div>
  </form>
  <script src="include/signup.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>