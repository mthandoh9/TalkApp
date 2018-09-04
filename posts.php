<?php
$con = mysqli_connect("localhost","root","") or die("Couldn't connect");
mysqli_select_db($con,"talkapp") or die("Couldn't Slelct DB");
session_start();
$email = $_SESSION['logged'];//$_SESSION['logged'];

$sql1010="Select * from users where Email ='$email'";
    $result2 =mysqli_query($con,$sql1010);
    
    $name ="";
    $surname ="";
    while($row = mysqli_fetch_array($result2))	
    {  
        $name= $row["Name"];
        $surname= $row["Surname"];
     

    }
    
if(isset($_POST['submit'])=='Post')
{ 
    $message =$_POST['Message'];
    if(isset($_FILES["file"]["type"]))
    {
    $fileType =$_FILES["file"]["type"];
      
        
        $fnm =$_FILES['file']['tmp_name'];
        $dst ="./files/".$_FILES['file']['name'];
        move_uploaded_file($fnm,$dst);
                $likes =0;
        $stmt= $con->prepare("INSERT INTO post(postmessage,Attachment,AttachmentType,Email,Name,Surname) VALUES(?,?,?,?,?,?)");
                $stmt->bind_param("ssssss",$message,$dst,$fileType,$email,$name,$surname);
                
                if($stmt->execute())
                {
                    $mes ="Posted";
                
                }else{
                    
                    $mes ="Something Went Wrong";
                }
    }else{
       

        $stmt= $con->prepare("INSERT INTO post(postmessage,Attachment,AttachmentType,Email,Name,Surname) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$message,"./files/","",$email,$name,$surname);
        
        if($stmt->execute())
        {
            $mes ="Posted";
        
        }else{
            
            $mes ="Something Went Wrong";
        }
    }
}
$sql="Select * from post Order By date desc";
	$result =mysqli_query($con,$sql);

?>
<!Doctype>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
    <div class="header">
         <label>TalkApp</label>
    </div>
    <style>
       input[type="file"] {
         display: none;
        }
        .filePics{

            background-image: url(msg.png);
            
        }
        .header{
            background-color: white ;
           color: #F6D81D;
            text-align: center;
            font-size: 30pt;
            height:54px;
            font-family: "Comic Sans MS", cursive, sans-serif;
            border: 1px solid #F6D81D;
            
        }
        .header :hover{
            background-color:#F6D81D ;
            color: white;

        }
        .posts{
          border: 1px solid gray;
          box-shadow: 6px 6px 6px gray  ;
          width:50%;
          position: relative;
          left: 50%;
          border-radius:3%;
          padding: 10px;
          margin: 0 0 0 -25%;
          margin-top: 15px;
          padding-bottom: 10px;
          margin-bottom: 20px;
       
        }
        .fullscreen:-webkit-full-screen {
      width: auto !important;
      height: auto !important;
      margin:auto !important;
  }
     .fullscreen:-moz-full-screen {
      width: auto !important;
      height: auto !important;
      margin:auto !important;
  }
     .fullscreen:-ms-fullscreen {
      width: auto !important;
      height: auto !important;
      margin:auto !important;
  }   
        img{
            margin-bottom: 20px;
        }
        .posts1{
          border: 1px solid gray;
          box-shadow: 6px 6px 6px gray ;
          width:50%;
          position: relative;
          left: 50%;
          border-radius: 1%;
          padding: 10px;
         
          font-size: 16pt;
          font-family: "Comic Sans MS", cursive, sans-serif;
          margin: 0 0 0 -25%;
          margin-top: 15px;
       
        }
        .postdate{
         margin-right:0px;
         margin-left: 100px;
              
        }
        .likes{
    
            margin-left: 80px;

        }
        .postheaders{
   
            font-family: "Comic Sans MS", cursive, sans-serif;
        }
        .message{
          
            padding:2px;
            margin: 0 auto;
            position: relative;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .messagePosted{
          
          padding:2px;
          margin: 0 auto;
          position: relative;
          width:100%;
          white-space: pre-wrap;
          word-wrap: break-word;
      }
 @media(max-width:767px){

            .posts{
                width: 90%;
         margin-left: -165px;
            }
            .posts1{
                width: 90%;
              margin-left: -165px;
                
            }
            .header{
                width:100%;
                    
                }
                .messagePosted{

                    width:90%;
                }
 }
        </style>
       <link href="bootstrap.min.css" rel="stylesheet" />
  <link href="paper-kit.min89bf.css?v=2.2.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="demo.css" rel="stylesheet" />
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<div class="row">
    <div class="col-lg-12 col-md-6 col-sm-6 ml-auto mr-auto">
        <div class="createPost">
           <form method="post" action="" enctype="multipart/form-data">
                <div style="width:25%;">
                <table>
                <tr>
                <td><textarea class="messagePosted" placeholder="Type message..." name="Message" id="Message" ></textarea></td>
                <td><label class="filePics" style="background-image: url(picicon.png);"><img style="margin-top:2px;" height="40px" width="30px" src="picicon.png"/><input type="file" name="file" id="file" accept="image/*"/></label></td>
                </tr>
                <tr><td><input type="submit" name="submit" class="submit" id="submit" value="Post"/></td></tr>
                </table>
                </div>
            </form>
       </div>
   </div>
</div>
<?php

    while($row = mysqli_fetch_array($result))	
    {  

        $sql2="Select * from postcomments where postID='".$row["ID"]."' Order By date desc";
        $result2 =mysqli_query($con,$sql2);
        $x =0;
       while($comment = mysqli_fetch_array($result2))	
        {  
          $x++;
        }
        if($row["Attachment"]=="./files/"){
                echo "<div class='posts1' id=".$row["ID"]." > <h3 style='text-align:center;' class='postheaders'>".$row["Name"]." ".$row["Surname"]."</h3>
                <div class='message'><p>".$row["postmessage"]."</p></div><br>
                <a href='viewPost.php?id=".$row["ID"]."'><label class='filePics' style='background-image: url(msg.png);'><img style='margin-top:2px;' height='30px' width='30px' src='msg.png'/></label></a>
               <label class='postdate'>".$row["Date"]."<label>
               </div>
            ";

        }else{

            echo "<div class='posts' id=".$row["ID"]." > <h3 style='text-align:center;' class='postheaders'>".$row["Name"]." ".$row["Surname"]."</h3>
              <div class='message'><p>".$row["postmessage"]."</p></div><br>
              <img id='theImage' src=".$row["Attachment"]." width='99%' height='auto' class='fullscreen' onclick='makeFullScreen()'/><br/>
              <a href='viewPost.php?id=".$row["ID"]."'><label class='filePics' style='background-image: url(msg.png);'><img style='margin-top:2px;' height='30px' width='30px' src='msg.png'/></label></a>
              <label class='postdate'>".$row["Date"]."<label>
             </div>
             "; 
        }
       
    }
    ?>
         <script>
        function makeFullScreen() {
         var divObj = document.getElementById("theImage");
       //Use the specification method before using prefixed versions
      if (divObj.requestFullscreen) {
        divObj.requestFullscreen();
      }
      else if (divObj.msRequestFullscreen) {
        divObj.msRequestFullscreen();               
      }
      else if (divObj.mozRequestFullScreen) {
        divObj.mozRequestFullScreen();      
      }
      else if (divObj.webkitRequestFullscreen) {
        divObj.webkitRequestFullscreen();       
      } else {
        console.log("Fullscreen API is not supported");
      } 

    }
     </script>
       <script src="jquery.min.js" type="text/javascript"></script>
  <script src="popper.min.js" type="text/javascript"></script>
  <script src="bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="moment.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="bootstrap-tagsinput.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="bootstrap-selectpicker.js" type="text/javascript"></script>
  <!--	Plugin for Datetimepicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Vertical nav - dots -->
  <!--  Photoswipe files -->
  <script src="photo_swipe/photoswipe.min.js"></script>
  <script src="photo_swipe/photoswipe-ui-default.min.js"></script>
  <script src="photo_swipe/init-gallery.js"></script>
  <!--  for Jasny fileupload -->
  <script src="jasny-bootstrap.min.js"></script>
  <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-kit.min89bf.js?v=2.2.1" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!--  Plugin for presentation page - isometric cards  -->
  <script src="presentation-page/main.js"></script>
  <!-- Sharrre libray -->
  <script src="query.sharrre.js"></script>
</body>

</html>