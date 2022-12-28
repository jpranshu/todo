<?php 
include 'include/common.php';

if(isset($_REQUEST['action'])){
    $action=$_REQUEST['action'];  
}
if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $ed_query = "SELECT * from tasks where tid='".$id."'"; 
    $ed_result = mysqli_query($dbc, $ed_query);
    $row = mysqli_fetch_assoc($ed_result); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="pranshu" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" href="include/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="include/script.js"></script>
    
    <title>To-Do</title>
</head>
<body class="body">
<?php include 'include/header.php';?>

    <div class="filter-check">
        <a href="index.php" class="cat-button"><button class="btn btn-sm btn-secondary">Clear</button></a>    `
        <a href="index.php?action=Home" class="cat-button">
            <?php if(isset($action)&&$action=="Home"){?><button class="btn btn-sm btn-dark">Home</button><?php }
            else{?><button class="btn btn-sm btn-secondary">Home</button><?php } ?></a>
        <a href="index.php?action=Personal" class="cat-button">
            <?php if(isset($action)&&$action=="Personal"){?><button class="btn btn-sm btn-dark">Personal</button><?php }
            else{?><button class="btn btn-sm btn-secondary">Personal</button><?php } ?></a>
        <a href="index.php?action=University" class="cat-button">
            <?php if(isset($action)&&$action=="University"){?><button class="btn btn-sm btn-dark">University</button><?php }
            else{?><button class="btn btn-sm btn-secondary">University</button><?php } ?></a>
        
    </div>


   <div class="content">
        <!-- note form -->
        <?php
        if(isset($id))
        {?>
        <div class="note">
            <form action="include/add_script.php?id=<?php echo $id?>" method="post">
                <div class="note-body">
                    <div class="form-group">
                        <input type="hidden" id="tid" name="tid" class="form-control bg-light" value="<?php echo $id?>"/>
                    </div>
                    <div class="form-group mt-2">
                        <label for="title" class="form-label fs-20">Title<input type="text" id="title" name="title" class="form-control bg-light" placeholder="" value="<?php echo $row['title']?>" required/></label>
                    </div>
                    
                    <div class="form-group">
                            <label for="Task" class="form-label"></label>
                            <input class="form-control bg-light" id="task" name="task" rows="2" placeholder="Task" value="<?php echo $row['task']?>" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="date" class="form-label"></label>
                            <div class="input-group date" id="deadline" >
                                <input type="text" name="deadline" class="form-control bg-light" placeholder="Deadline" value="<?php echo $row['deadline']?>"  required>
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        </svg>
                                    </span>
                                </span>
                            </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="Personal">
                            <label class="form-check-label" for="personal">
                            Personal
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="Home">
                            <label class="form-check-label" for="home">
                            Home
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="University">
                            <label class="form-check-label" for="university">
                            University
                            </label>
                        </div>
                    </div>
                    
                    <div class="text-center p-0 m-0"><button type="submit" name="submit" class="btn btn-secondary btn-lg mt-3">Edit</button></div>
                    
                    
                            
                        
                    
                    

                </div>
            </form>
            
        </div>

        <?php   }
        else{?>
        <div class="note">
            <form action="include/add_script.php" method="post">
                
                <div class="note-body">
                    <div class="form-group mt-2">
                        <label for="title" class="form-label">Title :<input type="text" id="title" name="title" class="form-control bg-light" placeholder="" required/></label>
                    </div>
                    
                    <div class="form-group">
                            <label for="Task" class="form-label"></label>
                            <textarea class="form-control bg-light" id="task" name="task" rows="2" placeholder="Task" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="date" class="form-label"></label>
                            <div class="input-group date" id="deadline" >
                                <input type="text" name="deadline" class="form-control bg-light" placeholder="Deadline" required>
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        </svg>
                                    </span>
                                </span>
                            </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="Personal">
                            <label class="form-check-label" for="personal">
                            Personal
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="Home">
                            <label class="form-check-label" for="home">
                            Home
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="University">
                            <label class="form-check-label" for="university">
                            University
                            </label>
                        </div>
                    </div>
                    
                    <div class="text-center p-0 m-0"><button type="submit" name="submit" class="btn btn-secondary btn-lg mt-3">Add Task</button></div>
                </div>
            </form>
        </div>


        <?php }
        if (isset($_SESSION['email'])){
            
            $uid=$_SESSION["uid"];
            if(isset($action)){
                $rows="SELECT * FROM tasks WHERE tasks.uid='$uid' AND tasks.status='pending'AND tasks.category='".$action."'";
            }
            else{
                $rows="SELECT * FROM tasks WHERE tasks.uid='$uid' AND tasks.status='pending'";
            }
            $result=mysqli_query($dbc,$rows);

            if(mysqli_num_rows($result)>0){
            while($ro=mysqli_fetch_assoc($result)){
                    ?>
            <!-- database notes -->
        <div class="note">
                <div class="note-title">
                    <?php echo $ro['title'];
                    echo " - ";echo $ro['category']?>
                </div>
                <div class="note-body">
                    <p><?php echo $ro['task']?></p>
                </div>
                <div class="note-dl">
                <?php echo $ro['deadline']?>
                </div>
                <div class="note-action">
                    <div class="edit"><a href="index.php?id=<?php echo $ro["tid"]?>">
                    <button type="button" class="btn btn-primary" id="editBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="80%" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
                        </svg>
                    </button></a></div>
                    <div class="status"><a href="include/status_script.php?id=<?php echo $ro["tid"]?>"><button type="button" name="status" class="btn btn-success" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="80%" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z">

                        </path>
                        </svg>
                    </button>
                </a>
                    </div>
                    <div class="delete"><a href="include/remove_script.php?id=<?php echo $ro["tid"]?>"><button type="button" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="80%" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button></a>
                    </div>
                </div>
        </div>
        <?php }}
        }?>
    
    </div>

    <div class="footer">
        
    </div>
    

</body>
</html>