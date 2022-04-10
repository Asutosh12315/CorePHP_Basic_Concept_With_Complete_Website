

<?php

require_once("PagesFolder/include/DB.php");

$searchQueryParameter= $_GET["id"];

if (isset($_POST["submit"])) {
    
    
    
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=md5($_POST["password"]);
        $dob=$_POST["dob"];
        $gender=$_POST["gender"];
        $country=$_POST["country"];
        $department=$_POST["department"];
        $comments=$_POST["comments"];
        $photo=$_POST["photo"];

        

        $sql="DELETE FROM users  WHERE id='$searchQueryParameter;'";

        $result=$connectingDb->query($sql);
        
       

        if ($result) {
            
            
            echo'<script> alert("Hey , your record has been deleted successfully !")</script>';
            echo '<script>window.open("index.php?pageName=Contact","_self")</script>';
            
        
        }
       

    
}

?>

	<h1 id="request">Edit Your User Details</h1>
<p class="req">Interested in Movie Premier at NY Cinema? Please complete and submit the following form to the Booking Office. One of our representatives will send you an information package tailored to the field(s) of Premier that interest you. Please indicate whether you would like additional information or not</p>


<style type="text/css">

.failed{

    color:red;
    font-family: Bitter,Georgia,"Times New Roman",Times,serif;
    font-size: 1.4rem; 
    font-weight:bold;
}
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
        border: 2px solid black;
        border-radius: 25px;
        padding: 10px;
        text-align:center;
        font-size: 1.5em;
    }
.success{

    color: green;
    font-family: Bitter,Georgia,"Times New Roman",Times,serif;
    font-size: 1.4rem; 
    font-weight:bold;
}

table{
            width: 100%;
            height: 100px;
            border: 2px solid black;
            background-color: white;
            

        }
        
        tr ,th,td{
            border: 2px solid black;
            text-align: center;
            padding: 5px;

        }
        a{
            text-decoration: none;
        }
</style>

<?php  

global $connectingDb;

$sql="SELECT * FROM users WHERE id='$searchQueryParameter'";

$stmt=$connectingDb->query($sql);

while ($Data=$stmt->fetch()) {
    
        $id=$Data["id"];
        $name=$Data["name"];
        $email=$Data["email"];
        $password=$Data["password"];
        $dob=$Data["dob"];
        $gender=$Data["gender"];
        $country=$Data["country"];
        $department=$Data["department"];
        $comments=$Data["comments"];
        $photo=$Data["photo"];
}



?>

<form action="Delete.php?id=<?php echo $searchQueryParameter;?>" method="post">


<legend>User Modification Form</legend>

<label for="name">Name:</label>
<input type="text" name="name" id="name" value="<?php echo $name;?>">   
<span>*</span><br><br>

<label for="email">Email:</label>
<input type="email" name="email" id="email" value="<?php echo $email;?>">
<span>*</span><br><br>

<label for="password">Password:</label>
<input type="password" name="password" id="password" value="<?php echo $password;?>">
<span>*</span><br><br>

<label for="dob">Date Of Birth:</label>
<input type="date" name="dob" id="dob" value="<?php echo $dob;?>"><br><br>

<label for="gender">Gender:</label>
<label for="male">Male:</label>
<input type="radio" id="gender" name="gender" value="male">

<label for="female">Female:</label>
<input type="radio" id="gender" name="gender" value="female">

<label for="other">Other:</label>
<input type="radio" id="gender" name="gender" value="other">
<span>*</span><br><br>

<label for="photo">Choose your photo:</label>
<input type="file" id="photo" name="photo" ><br><br>

<label for="country">Country:</label>
<input type="checkbox" name="country" id="country" value="India">India 
<input type="checkbox" name="country" id="country" value="Bangladesh">Bangladesh <br><br>

<label for="deparment">Deparment : </label>
<select name="department" id="department">   
    <option value="<?php echo $department;?>" selected><?php echo $department;?></option>         
    <option value="Cse">CSE</option>
    <option value="Ece">ECE</option>
    <option value="It">IT</option>
</select> <br><br>

<label for="comment">Comments:</label><br><br>
<textarea name="comments" id="comment" cols="30" rows="5"><?php echo $comments;?></textarea><br><br>

<input type="submit" name="submit" value="Delete">
<input type="reset" value="Reset">


</form> 
 	
	  <div class="clear"></div>
      <br><br>	  	 
