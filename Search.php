<?php

require_once("PagesFolder/include/DB.php");

if (isset($_GET["searchButton"])) {
        
    global $connectingDb;
    $search=$_GET["Search"];
    $sql="SELECT * FROM users WHERE name=:searcH OR email=:searcH";

    $stmt=$connectingDb->prepare($sql);
    $stmt->bindValue(':searcH',$search);
    $stmt->execute();

    while ($Data=$stmt->fetch()) {
        
        $id=$Data["id"];
        $name=$Data["name"];
        $email=$Data["email"];    
        $dob=$Data["dob"]; 
        $department=$Data["department"];

        ?>
<style>

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
 <table>

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
            
            
        </tr>
    </thead>
    <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $dob; ?></td>                
            <td><?php echo $department; ?></td>
            <td><a href="index.php?pageName=Contact">Go Back</a></td>
            
            
    </tr>
 
 </table>


  <?php  } //Ending of while loop


}//Ending of submit button


?>