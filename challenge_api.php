<?php
// DB connection parameters 
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "majd";

// Create the DB connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check the DB connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
    //header("Content-Type:application/json");

// This query will check do we have car_id in the table car
// for the provided $id
$sql = "SELECT * FROM media";

// Perform a query on the DB
$result = mysqli_query($conn, $sql);

// Fetch the query into $row
if($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
    
 // Store values into the variables
  $title=$row['title'];
    $status=$row['fk_stID'];
    $image=$row['image'];
 $id = $row['mediaID'];
/****************************************
*######## RESTful WEB SERVICE ##########*
*                                                    *
* Client process the request VIA URL    *
* http://address.com/webservice.php?id=1*
* and gets the JSON result.             *
****************************************/



// Set Content-Type header to application/json



// Check if the id has a value
if(!empty($id)){


        // Require db_check.php file (check the id in the database and get the name and the price

        // If the name and the price are empty - id doesn't exist - book not found
        if(empty($title) && empty($stauts) & empty($image)){
                        response(200, "books not found", NULL, NULL, NULL);
        }
        // If the name and the price aren't empty - id exists - book found
        else{
                        response(200, "book found" , $title, $status,$image);
        }
}

// If the id is not set - request is not valid
else {
                        response(400, "Invalid request", NULL, NULL, NULL);
        }
}}
//
// Function for delivering a JSON response
function response($status,$status_message,$title,$data,$image){
        
        /*HTTP 1.1 provides a persistent connection 
        that allows multiple requests to be batched 
        or pipelined to an output buffer */
        header("HTTP/1.1 $status $status_message");

        // $response array
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['title']=$title;
        $response['fk_stID']=$data;
        $response['image']=$image;
        //Generating JSON from the $response array
        $json_response=json_encode($response);

        // Outputting JSON to the client
        echo $response["status"];
        echo "\n";
        echo $response["title"];
        echo "\n";
        echo $response["fk_stID"];
        echo "<img src='".$response['image']."'>\n";
        echo "<h2>hello</h2>";
        //echo $json_response;
echo"\n";
}


// Close the DB connection
mysqli_close($conn);
?>