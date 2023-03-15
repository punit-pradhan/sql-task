<?php
 
//Include the connection script
Include ("dbconnection.php");
 
//Execute the query to read all records from emplyees table
 
$result = $connect->query("select * from ipl_team");
echo "<br>";
if ($result->num_rows > 0) {
    // Read the records
    while($row = $result->fetch_assoc()) {
        echo "<br>Venue of match". " : ".$row["Venue_of_match"]. "<br>Date of match"." : ". $row["Date_of_match"]."<br>Team 1 name"." : ". $row["Team_1_name"]."<br>Team 2 name"." : ". $row["Team_2_name"]."<br>Captain of team 1"." : ". $row["Captain_of_team_1"]."<br>Captain of team 2"." : ". $row["Captain_of_team_2"]."<br>Toss won by"." : ". $row["Toss_won_by"]."<br>Match won by"." : ". $row["Match_won_by"]. "<br/></hr><br/>";
    }
}
else
    echo "No record found";
 
$conn->close();
 
?>
