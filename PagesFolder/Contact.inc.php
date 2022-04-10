

<?php

require_once("include/DB.php");

if (isset($_POST["submit"])) {
    
    if (!empty($_POST["name"])&&!empty($_POST["email"])) {
    
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=md5($_POST["password"]);
        $dob=$_POST["dob"];
        $gender=$_POST["gender"];
        $country=$_POST["country"];
        $department=$_POST["department"];
        $comments=$_POST["comments"];
        $photo=$_POST["photo"];

        global $connectingDb;

        $sql="INSERT INTO users(name,email,password,dob,gender,country,department,comments,photo)
        VALUES(:Xname,:Xemail,:Xpassword,:Xdob,:Xgender,:Xcountry,:Xdepartment,:Xcomment,:photo)";

        $stmt=$connectingDb->prepare($sql);
        $stmt->bindValue(':Xname',$name);
        $stmt->bindValue(':Xemail',$email);
        $stmt->bindValue(':Xpassword',$password);
        $stmt->bindValue(':Xdob',$dob);
        $stmt->bindValue(':Xgender',$gender);
        $stmt->bindValue(':Xcountry',$country);
        $stmt->bindValue(':Xdepartment',$department);
        $stmt->bindValue(':Xcomment',$comments);
        $stmt->bindValue(':photo',$photo);
        $result=$stmt->execute();

        if ($result) {
            
            echo '<span class="success">Great ! Your Qurey Has Been Submitted</span>';
        
        }
        







    }else {

        echo '<span class="failed">Oops ! Something went wrong</span>';
    }
}

?>

	<h1 id="request">Movie Premier Booking Form</h1>
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



<form action="" method="post">


<legend>User Registration Form</legend>

<label for="name">Name:</label>
<input type="text" name="name" id="name">   
<span>*</span><br><br>

<label for="email">Email:</label>
<input type="email" name="email" id="email" >
<span>*</span><br><br>

<label for="password">Password:</label>
<input type="password" name="password" id="password">
<span>*</span><br><br>

<label for="dob">Date Of Birth:</label>
<input type="date" name="dob" id="dob"><br><br>

<label for="gender">Gender:</label>
<label for="male">Male:</label>
<input type="radio" id="gender" name="gender" value="male">

<label for="female">Female:</label>
<input type="radio" id="gender" name="gender" value="female">

<label for="other">Other:</label>
<input type="radio" id="gender" name="gender" value="other">
<span>*</span><br><br>

<label for="photo">Choose your photo:</label>
<input type="file" id="photo" name="photo"><br><br>

<label for="country">Country:</label>
<input type="checkbox" name="country" id="country" value="India">India 
<input type="checkbox" name="country" id="country" value="Bangladesh">Bangladesh <br><br>

<label for="deparment">Deparment : </label>
<select name="department" id="deparment">            
    <option value="cse">CSE</option>
    <option value="ece">ECE</option>
    <option value="it">IT</option>
</select> <br><br>

<label for="comment">Comments:</label><br><br>
<textarea name="comments" id="comment" cols="30" rows="5"></textarea><br><br>

<input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset">


</form> 
 	
	  <div class="clear"></div>
      <br><br>	  	 
<hr>
<table>
        <legend>User Records</legend>
        <thead>
            <tr>
                <th>
                    ID
                </th>
                
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                
                <th>
                    DOB
                </th>
                
                <th>
                    Deparment
                </th>
                <th>
                    Action
                </th>
                <th>
                    Another Action
                </th>
                
            </tr>
        </thead>
        <tbody>

    <?php  
    
   global $connectingDb;
   $sql="SELECT * FROM users";

   $stmt=$connectingDb->query($sql);

   while ($Data=$stmt->fetch()) {
    
    $id=$Data["id"];
    $name=$Data["name"];
    $email=$Data["email"];    
    $dob=$Data["dob"]; 
    $department=$Data["department"];
    

   
    
    
    ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $dob; ?></td>                
                <td><?php echo $department; ?></td>
                <td><a href="Update.php?id=<?php echo $id; ?>">Edit</a></td>
                <td><a href="Delete.php?id=<?php echo $id; ?>">Delete</a></td>
                
            </tr>
            

    <?php } ?>
        </tbody>
    </table>

    <hr>
    <br><br><br>

    <div>
        <legend>Search Your User</legend>
        <br>
        <fieldset>
            <form action="" method="post">
                <input type="text" name="search" placeholder="search by name or email">
                <input type="submit" name="search" value="Search">

            </form>
        </fieldset>
    </div>