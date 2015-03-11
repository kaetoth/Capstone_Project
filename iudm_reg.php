<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>IUDM Registration Form</title>
<?php  
 //form validation  
 // define variables and set to empty values  
 $firstname = $lastname = $email = $phone = $username = "";  
 @$pass = @$confirmpass = "";  
 if ($_SERVER["REQUEST_METHOD"] == "POST")  
 {  
  $firstname = test_input($_POST["firstname"]);  
  $lastname = test_input($_POST["lastname"]);  
  $email = test_input($_POST["email"]);  
  $phone = test_input($_POST["phone"]);    
  $username = test_input($_POST["username"]);  
  @$pass = test_input($_POST["pass"]);
  @$confirmpass = test_input($_POST["confirmpass"]);
 }  
 function test_input($data)  
 {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
 }  
 ?>
 <?php  
 // define variables and initialize with empty values  
 $fnameErr = $lnameErr = $emailErr = $phoneErr = $unameErr = $passErr = $confirmpassErr = "";  
 $fname1 = $lname1 = $email1 = $phone1 = $uname1 = $pass1 = $confirmpass1 = "";  
 if ($_SERVER["REQUEST_METHOD"] == "POST") {  
  $valid = true;  
      if(empty($_POST["firstname"])) {  
     $fnameErr = "Missing Firstname";  
     $valid =false;  
      }  
   else {  
     $fname1 = test_input($_POST["firstname"]);  
           // check if name only contains letters and whitespace  
   if (!preg_match("/^[a-zA-Z ]*$/",$firstname))  
    {  
    $fnameErr = "Only letters and white space allowed";  
    $valid=false;  
       }  
   }  
      if (empty($_POST["lastname"])) {  
     $lnameErr = "Missing Lastname";  
      $valid=false;  
      }  
   else {  
     $lname1 = test_input($_POST["lastname"]);  
     // check if name only contains letters and whitespace  
   if (!preg_match("/^[a-zA-Z ]*$/",$lastname))  
    {  
    $lnameErr = "Only letters and white space allowed";  
    $valid=false;  
       }  
      }  
   if (empty($_POST["email"])) {  
     $emailErr = "Missing E-mail address";  
     $valid=false;  
      }  
   else {  
     $email1 = test_input($_POST["email"]);  
           // check if e-mail address syntax is valid  
   if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))  
    {  
    $emailErr = "Invalid email format";  
    $valid=false;  
       }  
   }  
   if (empty($_POST["phone"])) {  
     $phoneErr = "Specify a phone number.";  
     $valid=false;  
      }  
   else {  
     $phone1 = test_input($_POST["phone"]);
	 if (!preg_match("/[^0-9]/", $phone))
	 {
	 $phoneErr = "Invalid phone format, must include hyphens";
	 $valid=false;
   }  
   
       }  
      if (empty($_POST["username"])) {  
     $unameErr = "specify your username";  
     $valid=false;  
      }  
   else {  
     $uname1 = test_input($_POST["username"]);  
   }  
     if (empty($_POST["pass"])) {  
     $passErr = "specify your password";  
     $valid=false;  
      }  
   else {  
     $pass1 = test_input($_POST["pass"]);  
   }
	  if (empty($_POST["confirmpass"])) {
	  $confirmpassErr = "specify your password";
	  $valid=false;
	  }
	  else {
	   $confirmpass1 = test_input($_POST["confirmpass"]);
	   if ($_POST["pass"] !== $_POST["confirmpass"]){
	   $confirmpassErr = "Your password does not match.";
	   $valid=false;
	   }
	  }
	}
 // here form validation ends        
 ?>
<?php  
 if(@$valid==true)  
       {  
 $connection= mysql_connect("silo.soic.indiana.edu:34541","bradwart","bwart"); 
 mysql_select_db("register", $connection);  
 @$a=$_POST['firstname'];  
 @$b=$_POST['lastname'];  
 @$c=$_POST['email'];  
 @$d=$_POST['phone'];   
 @$e=$_POST['username'];
 @$f=$_POST['pass'];
 @$g=$_POST['confirmpass'];
 @$h=$_POST['comment'];
 mysql_query("insert into user (firstname,lastname,email,phone,username,pass,confirmpass,comment) values('$a','$b','$c','$d','$e','$f','$g','$h')");  
 mysql_close($connection);
 echo "You have successfully registered for IUDM!"; 
       }
 ?>  
</head>
<style>
table#iudmtable {
	color: blue;
	font-family: arial;
	font-size: 20px;
	width: 75%;
	margin-left: auto;
	margin-right: auto;
	border: 5px solid blue;
	padding: 15px;
	background-image:url("http://ironiudman.net/newsite/wp-content/uploads/2011/10/IUDMSiteLogo.png");
	background-size: 750px 250px;
	background-position: center;
	background-repeat: no-repeat;
 }
 table#iudmtable td {
	text-align: left;
 }
 h1 {
	 color: blue;
	 font-family: arial;
 }
</style>
<body>
<center><h1>IUDM Registration Form</h1></center>
	<table id="iudmtable">
	<section id = "form">
		<form name="iudmform" method="post" action="iudm_reg.php">
		<tr>
		<td><br><label for="firstname"> First Name: </label>
		<br><br><input type="text" name="firstname" id="firstname" value="<?php echo htmlspecialchars($firstname);?>" required /><br>
		<span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$fnameErr;?></i></font></span>
		</td>
		</tr>
		<tr>
		<td><br><label for="lastname"> Last Name: </label>
		<br><br><input type="text" name="lastname" id="lastname" value="<?php echo htmlspecialchars($lastname);?>" required /><br>
		<span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$lnameErr;?></i></font></span>
		</td>
		</tr>
		<tr>
		<td><br><label for="email"> E-mail Address: </label>
		<br><br><input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email);?>" required /><br>
		<span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$emailErr;?></i></font></span>
		</td>
		</tr>
		<tr>
		<td><br><label for="phone"> Phone Number: </label>
		<br><br><input type="tel" name="phone" id="phone" value="<?php echo htmlspecialchars($phone);?>" required /><br>
		<span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$phoneErr;?></i></font></span>
		</td>
		</tr>
		<tr>
		<td><br><label for="username"> IU Username: </label>
		<br><br><input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username);?>" required /><br>
		<span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$usnameErr;?></i></font></span>
		</td>
		</tr>
		<tr>
		<td><br><label for="pass"> Password: </label>
		<br><br><input type="password" name="pass" id="pass" value="<?php echo htmlspecialchars($pass);?>" required /><br>
		<span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$passErr;?></i></font></span>
		</td>
		</tr>
		<tr>
		<td><br><label for="confirmpass"> Confirm Password: </label>
		<br><br><input type="password" name="confirmpass" id="confirmpass" value="<?php echo htmlspecialchars($confirmpass);?>" required /><br>
		<span class="error"><font color="red"><i><?php echo "&nbsp&nbsp&nbsp".$confirmpassErr;?></i></font></span>
		</td>
		</tr>
		<tr>
		<td><br><label for="comment"> Comments: </label>
		<br><br><textarea name="comment" id="comment" rows="6" cols ="30"></textarea><br>
		</td>
		</tr>
		<tr><td><input type="submit" value="Send">
		<input type="reset" value="Reset"></td>
		</tr>
		</form>
	</section>
	</table>
</body>
</html>
