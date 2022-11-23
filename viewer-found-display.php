<?php

include 'connect_db.php';

$query = "SELECT * FROM tb_itemrecord Order By itemNo DESC" or die("Error");
$result = mysqli_query($conn, $query);

if ($result)
{
    // it return number of rows in the table.
    $row = mysqli_num_rows($result);
          
    if ($row)
       {
        echo "<p class='total-item'>Number of Found Item: $row </p>";
       }
    // close the result.

    //if table has no data
    if (mysqli_num_rows($result) == 0) {
    echo "<div class='nodata'>
            <img src='./images/nodata.png' width='120px' height='120px'>
            <p>No Data</p>
          </div>";
    }   
}

while($row=mysqli_fetch_assoc($result))
{
?>
    <div class='output-cont-child'>
        <div class="output-one output">
            <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item No: </span><?php echo $row['itemNo']; ?></p>
            <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Item Category: </span><?php echo $row['itemCategory']; ?></p>
        </div>
        <div class="output-two output">
            <p class="p-one"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Time: </span><?php echo $row['time']; ?></p>
            <p class="p-two"><span style='color:#ec9006; font-weight:700; margin-right: 20px;'>Date: </span><?php echo $row['date']; ?></p>
        </div>
    </div>
    
<?php

}
?>