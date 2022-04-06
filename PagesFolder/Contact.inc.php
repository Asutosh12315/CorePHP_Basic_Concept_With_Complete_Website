<?php

require_once('include/DB.php');

/* custom validation starts here */

$nameError= "";
$emailError= " ";
$passwordError= " ";
$genderError= " ";



if (isset($_POST['submit'])) {
    
    //if not blank

    if(!empty($_POST['name']) && !empty($_POST['email']) && 

    !empty($_POST['password']) && !empty($_POST['dob']) &&

    !empty($_POST['gender'])&& !empty($_POST['country']) &&

    !empty($_POST['deparment'])&& !empty($_POST['comment']) && !empty($_POST['photo'])
    ){



        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $country=$_POST['country'];
        $deparment=$_POST['deparment'];
        $comment=$_POST['comment'];
        $photo=$_POST['photo'];
        
        $connectingDb;
        $sql="INSERT INTO users(name,email,password,dob,gender,country,deparment,comment,photo)
        VALUES(:Name,:Email,:Password,:Dob,:Gender,:Country,:Deparment,:Comment,:Photo)";

        $stmt=$connectingDb->prepare($sql);
        $stmt->bindValue('Name',$name);
        $stmt->bindValue('Email',$email);
        $stmt->bindValue('Password',$password);
        $stmt->bindValue('Dob',$dob);
        $stmt->bindValue('Gender',$gender);
        $stmt->bindValue('Country',$country);
        $stmt->bindValue('Deparment',$deparment);
        $stmt->bindValue('Comment',$comment);
        $stmt->bindValue('Photo',$photo);

        $result=$stmt->execute();

        if ($result) {
            
            echo '<span class="success">Data inserted successfully</span>';
        }

    }else {

        //if blank
    if(empty($_POST['name']) && empty($_POST['email']) && 

    empty($_POST['password'])  &&  empty($_POST['gender'])){
    

       $nameError="Name is required";
       $emailError="Email is required";
       $passwordError="Password is required";
       $genderError="Gender is required";

    }
    // else {

    //     $Name=Test_User_Input($_POST['name']);
    //     $Email=Test_User_Input($_POST['email']);
    //     $Password=Test_User_Input($_POST['password']);
    //     $Gender=Test_User_Input($_POST['gender']);
    // }

    }

    
}

//  function Test_User_Input($Data)
// {
//     return $Data;
// }

/* custom validation ends here */



?>
  

	<h1 id="request">Movie Premier Booking Form</h1>
<p class="req">Interested in Movie Premier at NY Cinema? Please complete and submit the following form to the Booking Office. One of our representatives will send you an information package tailored to the field(s) of Premier that interest you. Please indicate whether you would like additional information or not</p>


<style type="text/css">
form {
        width: 400px;
        height: auto;
        border: 2px solid black;
        padding: 20px;
    }


span{
        color:red;
    }

    legend{

        margin-bottom: 20px;
        border: 2px solid yellow;
        border-radius: 25px;
        padding: 10px;
    }
.success{

    color: green;
    font-family: Bitter,Georgia,"Times New Roman",Times,serif;
    font-size: 1.4rem; 
    font-weight:bold;
}
</style>

<?php ?>

<form action="" method="POST" enctype="multipart/form-data">


<legend>User Registration Form</legend>

<label for="name">Name:</label>
<input type="text" name="name" id="name">   
<span>*<?php echo $nameError; ?></span><br><br>

<label for="email">Email:</label>
<input type="email" name="email" id="email" >
<span>*<?php echo $emailError; ?></span><br><br>

<label for="password">Password:</label>
<input type="password" name="password" id="password">
<span>*<?php echo $passwordError; ?></span><br><br>

<label for="dob">Date Of Birth:</label>
<input type="date" name="dob" id="dob"><br><br>

<label for="gender">Gender:</label>
<label for="male">Male:</label>
<input type="radio" id="gender" name="gender" value="male">

<label for="female">Female:</label>
<input type="radio" id="gender" name="gender" value="female">

<label for="other">Other:</label>
<input type="radio" id="gender" name="gender" value="other">
<span>*<?php echo $genderError; ?></span><br><br>

<label for="photo">Choose your photo:</label>
<input type="file" id="photo" name="photo"><br><br>

<label for="country">Country:</label>
<input type="checkbox" name="country" id="country" value="India">India 
<input type="checkbox" name="country" id="country" value="Bangladesh">Bangladesh <br><br>

<label for="deparment">Deparment : </label>
<select name="deparment" id="deparment">            
    <option value="cse">CSE</option>
    <option value="ece">ECE</option>
    <option value="it">IT</option>
</select> <br><br>

<label for="comment">Comments:</label><br><br>
<textarea name="comment" id="comment" cols="30" rows="5"></textarea><br><br>

<input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset">


</form> 
 	
	  <div class="clear"></div>	  	 

	    