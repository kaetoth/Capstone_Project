<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Form </title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
  <nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="#"></a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->

    <ul class="right">
      <li class="has-form">
        <div class="row collapse">
          <div class="large-8 small-9 columns">
            <input type="text" placeholder="Find Stuff">
          </div>
          <div class="large-4 small-3 columns">
            <a href="#" class="alert button expand">Search</a>
          </div>
        </div>
      </li>
      <li class="active"><a href="#">Contact Page</a></li>

      <li class="has-dropdown">
        <a href="#">Menu</a>
        <ul class="dropdown">
          <li><a href="#">Homepage</a></li>
          <li class="has-dropdown"><a href="#">About</a>
              <ul class="dropdown">
                <li><a href="#">History</a></li>
                <li><a href="#">Inspiration</a></li>
                <li><a href="#">Press</a></li>
                <li><a href="#">Media</a></li>
              </ul>
          </li>
          <li><a href="#">Committees</a></li>
          <li class="has-dropdown"><a href="#">Get Involved</a>
            <ul class="dropdown">
              <li><a href="#">Students</a></li>
              <li><a href="#">Corporate</a></li>
              <li><a href="#">Families</a></li>
              <li><a href="#">Alumni</a></li>
            </ul> 
          </li>
          <li class="active"><a href="#">Contact</a></li>
          <li><a href="#">Apparel Store</a></li>

        </ul>
      </li>
    </ul>

    

  

    <!-- Left Nav Section -->
    <ul class="left">
      <li><a href="#">Home</a></li>
    </ul>
    <li class="divider"></li>
  </section>
  

</nav>   


      <!--navigation bar-->
      <div class="row">
        <div class="large-3 columns">
          <h1><img src="http://www.iudm.org/wp-content/uploads/2014/07/xIUDM-FINAL-LOGO-e1405570111613.png.pagespeed.ic.BgTpf9ZJnM.jpg&text=Logo"></h1>
        </div>



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

 <!--end navigation bar and begin registration form-->
 <!--figure out how to insert PHP without the error coming up, unsure if some sort of internet connection needs to happen or whatever-->

     <!-- <h3>Registration Form</h3>-->

      <form name="iudmform" method="post" action="iudm_reg.php">


        <div class="large-12 columns">
          <div class="has-form">
            <label>First Name:
              <input type="text" placeholder="first name" name="firstname" id="firstname" value="<?php echo htmlspecialchars($firstname);?>" required />
              <span class="error"><?php echo "&nbsp&nbsp&nbsp".$fnameErr;?></span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <label>Last Name:
              <input type="text" placeholder="last name" />
            </label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <label>Email Address:
              <input type="text" placeholder="example@domain.com" />
            </label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <label>Phone Number:
              <input type="text" placeholder="###-###-####" />
            </label>
          </div>
        </div>
         <div class="row">
          <div class="large-12 columns">
            <label>IU Username:
              <input type="text" placeholder="username" />
            </label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <label>Password:
              <input type="text" placeholder="******" />
            </label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <label> Confirm password:
              <input type="text" placeholder="******" />
            </label>
          </div>
        </div>               
        <div class="row">
          <div class="large-12 columns">
            <label>Any Lingering Comments?
              <textarea placeholder="please let us know here!"></textarea>
            </label>
          </div>
        </div>
      </form>


      <!--end form, beginfooter-->
      <footer class="row">
        <div class="large-12 columns">
          <hr/>
          <div class="row">
            <div class="large-6 columns">
              <p>© Indiana University Dance Marathon</p>
            </div>
            <div class="large-6 columns">
              <ul class="inline-list right">
                <li><a href="#">About</a></li>
                <li><a href="#">Get Involved</a></li>
                <li><a href="#">Donate</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
