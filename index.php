<!DOCTYPE html>
<html lang="en-US" class="no-js">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/app.css">
<head>

    
    <title>Event Registration</title>
    <style type="text/css">
        .errorTxt{
          min-height: 20px;
          color: #B40000;
      }
  </style>

</head>

<body data-spy="scroll" data-target="#main-nav" data-offset="200">
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <form method="POST" id="csForm" enctype="multipart/form-data" onsubmit="return ValidationEvent()">
            <?php include 'db.php';
            if(isset($_POST['register'])) {
                //print_r($_POST);
                $name4 = "";
                $email4 = "";
                $number4 = "";
                $department4 = "";
                $year4 = "";
                $college4 = "";
                extract($_POST);
                
                $sql = "SELECT * FROM `cs` WHERE `team_name`='$team'";
                $sql = $cxn->query($sql);
                if($sql->num_rows == 0) {

                        //image upload part

                    //echo $_FILES["fileToUpload"]["name"];
                    $target_dir = "assets/uploads/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
          // Check file size
                  if ($_FILES["fileToUpload"]["size"] > 500000) {
                      $uploadOk = 0;
                      $Error = '1';
                  }

          // Allow certain file formats
                  if($FileType != "txt" && $FileType != "pdf" && $FileType != "doc" && $FileType != "docx" ) {
                      echo "Sorry, only txt, pdf, doc & docx files are allowed.";
                      $Error = '1';
                      $uploadOk = 0;
                  }

          // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                      $Error = '1';
              // if everything is ok, try to upload file
                  } 
                  else {
                      $newname = $team.".".$FileType;
                      $target = $target_dir.$newname;
                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target)) {
                          //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                          $Error = '0';
                      }
                      else {
                        $Error = '1';
                    }
                }

                if($Error == '1')
                {
                  $status="Failed";
                  $_SESSION["File_Error"] = "File Not Selected";
              }
              $status = "sucess";
                    //move files to /assets
              
              if($Error == '0'){
                $filepath = $target;
                $qry = "INSERT INTO `cs` (`id`, `team_name`, `member1`, `email1`,`number1`,`department1`,`year1`, `college1`,  `member2`, `email2`,`member3`, `email3`,`member4`,  `email4`,`file_path`,`csimem`) VALUES (NULL, '$team', '$name1', '$email1', '$number1','$department1','$year1', '$college1', '$name2',  '$email2', '$name3',  '$email3','$name4', '$email4','$filepath','$csimem')";
              $qry = $cxn->query($qry); ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Submitted Successfully.
            </div>
            <?php }} elseif($Error == '1') { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                You have already submitted your application!
            </div>
            <?php }
            else{
                ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                You have already submitted your application!
            </div>
            <?php
            }
        }
        ?>
        <span class="input">
            <input class="input-field" type="text" id="team" name="team">
            <label class="input-label" for="team">
                <span class="input-label-content input__label-content--kaede">Team Name</span>
            </label>
        </span>
        Member 1 Details<br>
        <!--member 1 start-->
        <span class="input">
            <input class="input-field" type="text" id="name1" name="name1">
            <label class="input-label" for="name1">
                <span class="input-label-content input__label-content--kaede">Member 1 Name</span>
            </label>
        </span>
        <span class="input">
            <input class="input-field" type="text" id="email1" name="email1">
            <label class="input-label" for="email1">
                <span class="input-label-content input__label-content--kaede">Member 1 Email</span>
            </label>
        </span>
        <span class="input">
            <input class="input-field" type="text" id="number1" name="number1">
            <label class="input-label" for="number1">
                <span class="input-label-content input__label-content--kaede">Member 1 Phone</span>
            </label>
        </span>
        
        
        <span class="input" id="col-grp">
            <input class="input-field" type="text" id="college1" name="college1">
            <label class="input-label" for="college1">
                <span class="input-label-content input__label-content--kaede">Member1 College</span>
            </label>
        </span>
        <!--member 1 end -->
        <!--member 2 start-->
        Member 2 Details<br>
        <span class="input">
            <input class="input-field" type="text" id="name2" name="name2">
            <label class="input-label" for="name2">
                <span class="input-label-content input__label-content--kaede">Member 2 Name</span>
            </label>
        </span>
        <span class="input">
            <input class="input-field" type="text" id="email2" name="email2">
            <label class="input-label" for="email2">
                <span class="input-label-content input__label-content--kaede">Member 2 Email</span>
            </label>
        </span>
        
        Member 3 Details<br>
        <span class="input">
            <input class="input-field" type="text" id="name3" name="name3">
            <label class="input-label" for="name3">
                <span class="input-label-content input__label-content--kaede">Member 3 Name</span>
            </label>
        </span>
        <span class="input">
            <input class="input-field" type="text" id="email3" name="email3">
            <label class="input-label" for="email3">
                <span class="input-label-content input__label-content--kaede">Member 3 Email</span>
            </label>
        </span>
        
        <!--member 4 start-->
        Member 4 Details (Optional)<br>
        <span class="input">
            <input class="input-field" type="text" id="name4" name="name4">
            <label class="input-label" for="name4">
                <span class="input-label-content input__label-content--kaede">Member 4 Name</span>
            </label>
        </span>
        <span class="input">
            <input class="input-field" type="text" id="email4" name="email4">
            <label class="input-label" for="email4">
                <span class="input-label-content input__label-content--kaede">Member 4 Email</span>
            </label>
        </span>
       
    
        <span class="input" >Upload Abstract of Your Problem Statement.<br> (ONLY pdf, txt, doc or docx file)
            <input style="margin-left:auto;margin-right: auto" class="btn btn-csi" type="file" name="fileToUpload" id="fileToUpload" required>
        </span>
        <input class="btn btn-csi btn-csi-lg" type="button" value="Register" id="submit">
        <input class="btn btn-csi btn-csi-lg hide" type="submit" value="Register" name="register" id="register">
    </form>
</div>  
</div>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/additional-methods.min.js"></script>

<script type="text/javascript" src="js/custom_validation.js"></script>

</body>
</html>