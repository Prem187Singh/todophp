

<html lang="en">
        <head>
        <link rel="stylesheet" href="./css/style.css">

          <style>
            #form{
              margin-top: auto;
              display: flex;
              justify-content: center;
              align-items: center;
            }
            form {
              display: block;
            }
            #ujash{
              width: 100%;
              height: 50%;
              display: flex;
              align-items: center;
              justify-content: center;
            }
            #bhd{
              display: flex;
              justify-content: center;
              align-items: center;
              border: 2px solid DodgerBlue;
              box-shadow: 5px 10px #000;
              border-radius: 10px;
              
            }
            #bhd input{
              width: 90%;
              border-radius: 10px;
              text-align: center;
              margin : 20px 20px;
            }
            #bhd button{
              text-align: center;
              margin-top: 13px;
              border-radius: 10px;
              margin-bottom:  20px;
            }
          </style>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <title>Update Data</title>
        </head>
        <body>
          <div id="ujash">

            <div id="form">
              
              <form action="http://localhost/todoPhp/update.php?id=<?php echo $_GET['id'];?>" method="post">
                <div class="input-group mb-3" id="bhd">
                  <input type="text" class="form-control" id="add-todo" name="update" placeholder="Enter your Update Data"  >
                  
                  <button class="btn btn-primary" name="updbtn" id="add-todo-btn" type="submit">Update</button>
                </div>
              </form>       
            </div>   
          </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>
</html>
<?php
include 'assets/backend/db_connection.php';
if(isset($_POST['updbtn'])){

    $datas =  $_POST['update'];
    $ids =  $_GET['id'];
    date_default_timezone_set('Asia/Kolkata');
$date = date('y-m-d h:i:s');
 $update = "UPDATE `todolist` SET `tasks` = '$datas',`updated_at` = '$date'  WHERE `todolist`.`id` = $ids;";
 $d_query = mysqli_query($conn,$update);
 if($d_query){
    session_start();
    $uname = $_SESSION['uname'] ;
      echo "<script> window.location='http://localhost/todoPhp/home.php?username=$uname';</script>";
  }else{
    $uname = $_SESSION['uname'] ;
    echo "<script>alert('Something Went wrong...try again!!'); window.location='http://localhost/todoPhp/home.php?username=$uname';</script>";
  }
}
?>