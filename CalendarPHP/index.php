<?php
// function connect(){
//     $servername = "projekti23b.treok.io";
//     $username = "projekti23b_user";
//     $password = "Ilmoita123!";
//     //$port = 1045;
//     $dbname = "projekti23b_ilmoittautumis";
//     try {
//         $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         return $conn;
//     }catch(PDOException $e){
//         echo "Yhdistys epäonnistui: " .$e->getMessage();
//         die();
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
</head>
<body>
    <h1>Table</h1>
    <table>
        <thead>
            
        <?php 
            $days_of_week = ['Ma', 'Ti', 'Ke', 'To', 'Pe'];
            $time_of_day = ['aamupäivä', 'iltapäivä'];
            echo "<tr>";
            foreach ($days_of_week as $day_of_week) {
                echo "<th>" . $day_of_week . "</th>";
            }
            echo "</tr>"; 
            echo "<tr>";  
            foreach ($days_of_week as $day_of_week) {
                foreach ($time_of_day as $time) {
                    echo "<th>" . $time . "</th>";
                }    
            }
            echo "</tr>";

            echo "<tr>";
            foreach ($days_of_week as $day_of_week) {
                echo "<td>Activity AM</td>";
                echo "<td>Activity PM</td>";
            }
            echo "</tr>";
        ?>
        
            </tr>
        </thead>
        <tbody>
            <?php
            // $connect = connect();
            // $sql = "SELECT * FROM table";
            // $result = $connect->query($sql);
            

            // while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            //     echo "<tr>
            //             <td>" . $row["id"] . "</td>
            //             <td>" . $row["name"] . "</td>
            //             <td>" . $row["name"] . "</td>
            //             <td>" . $row["name"] . "</td>
            //             <td>" . $row["name"] . "</td>
            //         </tr>";
            //}

            
            ?>
        </tbody>
    </table>

</body>
</html>