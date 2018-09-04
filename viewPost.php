<?php
$con = mysqli_connect("localhost","root","") or die("Couldn't connect");
mysqli_select_db($con,"talkapp") or die("Couldn't Slelct DB");

$get_ID =$_GET["id"];

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
        $stmt= $con->prepare("INSERT INTO postcomments(postID,comment,commentEmail,commenterName,commenterSurname) VALUES(?,?,?,?,?)");
                $stmt->bind_param("issss",$get_ID,$message,$email,$name,$surname);
                
                if($stmt->execute())
                {
                    $mes ="comment sent!";
                
                }else{
                    
                    $mes ="Something Went Wrong";
                }
    }else{
       

        $stmt= $con->prepare("INSERT INTO postcomments(postID,comment,commentEmail,commenterName,commenterSurname) VALUES(?,?,?,?,?)");
        $stmt->bind_param("issss",$get_ID,$message,$email,$name,$surname);
        
        if($stmt->execute())
        {
            $mes ="comment sent!";
        
        }else{
            
            $mes ="Something Went Wrong";
        }
    }
}
   
$sql="Select * from postcomments where postID='$get_ID'";
	$result =mysqli_query($con,$sql);

?>
<!Doctype>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comments</title>
    <div class="header">
         <label>Comments</label>
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
          border: 1px solid #F6D81D;
          box-shadow: 6px 6px 6px #E7DA8A  ;
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
          border: 1px solid #F6D81D;
          box-shadow: 6px 6px 6px #E7DA8A  ;
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
      
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
    </div>
   
    <?php while($row = mysqli_fetch_array($result))	
    {  if($row["Attachment"]=="./files/"){
                echo "<div class='posts1' id=".$row["ID"]." > <h3 style='text-align:center;' class='postheaders'>".$row["commenterName"]." ".$row["commenterSurname"]."</h3>
                <div class='message'><p>".$row["comment"]."</p></div><br>
                <a href='viewPost.php?id=".$row["ID"]."'><label class='filePics' style='background-image: url(msg.png);'><img style='margin-top:2px;' height='30px' width='30px' src='msg.png'/></label></a>
               <label class='postdate'>".$row["Date"]."<label>
               </div>
            ";

        }else{

            echo "<div class='posts' id=".$row["ID"]." > <h3 style='text-align:center;' class='postheaders'>".$row["commenterName"]." ".$row["commenterSurname"]."</h3>
              <div class='message'><p>".$row["comment"]."</p></div><br>
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
</body>

</html>