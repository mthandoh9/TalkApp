<?php
session_start();
$con = mysqli_connect("localhost","root","") or die("Couldn't connect");
mysqli_select_db($con,"talkapp") or die("Couldn't Slelct DB");

 $userEmail = $_SESSION['logged'];
//$_SESSION['logged']=$userEmail;

  $sql="Select * from friend where Email1='$userEmail'";
	$result =mysqli_query($con,$sql);
    $y =0;
    echo"<table><th>Friends</th><th>Status</th>";

	while($row = mysqli_fetch_array($result))	
    {   
         $Email2=$row["Email2"];
        
        $sql1="Select * from users where Email='$Email2'";
        $result1 =mysqli_query($con,$sql1);
        $Name="";
        $Surname="";
        $status ="2";
        while($row = mysqli_fetch_array($result1))	
	   {  
           $Name=$row["Name"];
           $Surname=$row["Surname"];
           $status=$row["Status"];
            
       }
       if($status=="1"){ $status="online"; }else{ $status="offline";}
       
        echo"<tr><td><a style='text-decoration:none; color:black;' href='chats.php?id=".$Email2."'>".$Name." ".$Surname."</a></td><td>".$status."</td></tr>";
		
    }
    echo"</table>";
?>