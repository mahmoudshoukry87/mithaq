<?php
include './../dbconnect.php'
?>
<?php
if(isset($_GET['export'])){
if($_GET['export'] == 'true'){
$query = mysqli_query($con, 'select * from voters'); 
// Get data from Database from users table
    $delimiter = ",";
    $filename = "Voters_" . date('Ymd') . ".csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     
    //set column headers
    $fields = array('ID', 'Name', 'Area', 'Date');
    fputcsv($f, $fields, $delimiter);
     
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_array()){
        
        $lineData = array($row['v_id'], $row['v_name'], $row['v_area'], $row['v_date']);
        fputcsv($f, $lineData, $delimiter);
    }
     
    //move back to beginning of file
    fseek($f, 0);
     
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    //output all remaining data on a file pointer
    fpassthru($f);
 
 }
}

?>