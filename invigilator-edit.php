<?php  
session_start();

//check if user is not logged in the follow the else way
if(!isset($_SESSION["user"])){
    header("location: login.php");
}

//check if logged in as user\hghjldkigkjg

/*  if($_SESSION["user"]["role"] == "user"){
    header("location: all-questions.php");
 } */

//header links
 require "inc/header.php"; ?>

 <div class="container">

 <?php
 //header content
 require './pages/header-home.php';
 include 'inc/process.php'; 
 //if user click edit
if(isset($_GET["edit_id"]) && !empty($_GET["edit_id"])){
    $edit_id = $_GET["edit_id"];
    //sql
    $sql = "SELECT * FROM invigilators WHERE id = '$edit_id'";
    $query = mysqli_query($connection,$sql);
    $result = mysqli_fetch_assoc($query);
}else{
    header("location: invigilator.php");

}
 ?>

 <div class="container p-3">
     <div class="row">
         <div class="col-12">
             <div class="row">
                 <div class="col-6"> 
                     <h4>ADMIN DASHBOARD</h4>  
                 </div>
                <!--  <div class="col-6">
                      <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
                 </div> -->
             </div>
         </div>

         <div class="col-3">
     <ul class="list-group">
         <li class="list-group-item" style="color:#3b7fad;">
             <a href="course.php" class="btn ">
                 <i class="fas fa-grip-vertical" style="color:gray;"></i> Courses</a>
         </li>    
         <li class="list-group-item" style="color:gray;">
            <a href="invigilator.php" class="btn text-danger">
                <i class="fas fa-boxes"  style="color:gray;"></i> Invigilators</a>
         </li>
         <li class="list-group-item" style="color:gray;">
                <a href="new-question.php" class="btn">
                    <i class="fas fa-plus"  style="color:gray;"></i> Timetable</a>
         </li>
     </ul>
 </div>

         <div class="col-9">
             <div class="container">
                 <h6 class="text-center">Edit Invigilator</h6>
                <?php 
                    if(isset($error)) {
                    ?>
                    <div class="alert alert-danger">
                        <strong><?php echo $error ?></strong>
                    </div>
                    <?php
                         }elseif (isset($success)) {
                    ?>
                    <div class="alert alert-success">
                    <strong><?php echo $success ?></strong>
                    </div>
                    <?php
                   }
                 ?>
                 <form action="" method="post">
                     <div class="form-group">
                         <label for="">Name</label>
                         <input type="text" name="name" value="<?php echo $result["name"];?> "
                         placeholder="Enter name" class="form-control" id="">
                     </div>
                     <div class="form-group">
                         <button type="submit"  name="edit_invigilator" class="btn btn-sm btn-secondary my-2">
                             Update</button>
                     </div>
                 </form>
             </div> 
         </div>
     </div>
 </div>

<?php  
//footer content
require './pages/footer-home.php'; ?>

 </div>


 <?php
 //footer script
  require "inc/footer.php";  ?>