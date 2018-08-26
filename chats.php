<?php
session_start();

$con = mysqli_connect("localhost","root","") or die("Couldn't connect");
mysqli_select_db($con,"talkapp") or die("Couldn't Slelct DB");
$logged =$_SESSION['logged'];
$selected_User = $_GET['id'];


if(isset($_POST['submit']))
{  

   $msg = $_POST['msg'];
   $stmt= $con->prepare("INSERT INTO messages(message,receiver,sender) VALUES(?,?,?)");
   $stmt->bind_param("sss",$msg , $selected_User , $logged);
   
       if($stmt->execute()){

        echo $res ="</br>Messege Sent!";

       }else{
           $res ="</br>Messege Failed to be sent";
       
       }
}

    $sql="Select * from messages where receiver='$logged' and sender='$selected_User' or receiver='$selected_User' and sender='$logged' Order By Date";
	$result =mysqli_query($con,$sql);
    $y =0;
  
    echo "<div class='header'><h3 style='text-align:center;' id='h3'>".$selected_User."</h3></div><div id='m' class='messages' style='border: 1px solid black;'>";
	while($row = mysqli_fetch_array($result))	
	{  
        if($row["sender"]==$selected_User)
        {
            
            echo "<div class='receiver' ><span>".$row["message"]."</span></div> ";
        }
        if($row["receiver"]==$selected_User){

            
            echo "<div class='sender'><span>".$row["message"]."</span></div>";
        }
        
		
    }
    echo"</div><div class='sending'><form method='post' action='chats.php?id=".$selected_User."'>
    <textarea class='msg-txtarea' style='text' id='msg' name='msg'></textarea>
    <input type='submit' id='submit' class='btn-send' name='submit' value='Send'/>
    </form></div>";
  
?>
<!Doctype>
<html>
<head><title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.header{
    margin-left:40%;
    width:45%;
    float:right;
    font-family: "Comic Sans MS", cursive, sans-serif;

}
.msg-txtarea{
width:50%;
height:40px;
margin-top:5px;

}
.btn-send{
    width:10%;
    margin-top:0px;
    height:40px;

}
.messages{
background-color: white;
box-shadow: 4px 4px 4px gray;
width:50%;
padding: 7px;
float: right;
margin-left:40%;
overflow-y:scroll;
background-color:#003333;
height:500px;
}
.receiver{
   
    width:45%;
    padding:3px;
    font-family: "Comic Sans MS", cursive, sans-serif;
    margin-top:10px;
    padding-left:4px;
    padding:12px;
    border-radius:10%;
    position: relative;
    white-space: pre-wrap;
    word-wrap: break-word;
    background-color:#F0FFFF;
    text-align:left;
}
.sender{
    margin-left:50%;
    margin-top:10px;
    font-family: "Comic Sans MS", cursive, sans-serif;
    text-align:left;
    padding:12px;
    border-radius:10%;
    padding-right:6px;
    position: relative;
    background-color: #F5F5DC;
    white-space: pre-wrap;
    word-wrap: break-word;
    
}
.sending{

background-color: white;
box-shadow: 4px 4px 4px gray;
width:50%;
padding: 2px;
float: right;
margin-left:40%;
}
</style>
</head>
<body>
<?php
  echo"<div>";
 include('seeFriends.php');
 echo"</div>";

?>


</body>
</html>