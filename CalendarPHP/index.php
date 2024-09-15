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
            $day = date("Y/m/d");
            $prevday = $day--;
            $nextday = $day++;
            echo $day;
            echo $prevday;
            echo $nextday;
            
            $days_of_week = ['Ma', 'Ti', 'Ke', 'To', 'Pe'];
            $time_of_day = ['aamupäivä', 'iltapäivä'];
            $computers = ['Tietokone 1', 'Tietokone 2','Tietokone 3','Tietokone 4','Tietokone 5','Tietokone 6','Tietokone 7','Tietokone 8','Tietokone 9','Tietokone 10','Tietokone 11'];
            $other_columns_data = [
                ['Data 1A', 'Data 1B'],
                ['Data 2A', 'Data 2B'],
                ['Data 3A', 'Data 3B'],
                ['Data 4A', 'Data 4B'],
                ['Data 5A', 'Data 5B'],
            ];
            
            echo "<tr>";
            echo "<th>Empty cell</th>";
            foreach ($days_of_week as $day_of_week) {
                echo "<th>" . $day_of_week . "</th>";
            }
            echo "</tr>"; 
            echo "<tr>";  
            echo "<th>Empty cell</th>";
            foreach ($days_of_week as $day_of_week) {
                foreach ($time_of_day as $time) {
                    echo "<th>" . $time . "</th>";
                }    
            }
            echo "</tr>";

            foreach ($computers as $index =>$computer) {
                echo "<tr>";
                echo "<td>" . $computer . "</td>"; // Data from the array
                // $other_columns_data[$index][0]
                echo "<td> some </td>"; // Data from other_columns_data
                // $other_columns_data[$index][0]
                echo "<td>some</td>"; // Data from other_columns_data
                echo "</tr>";
            }

            // echo "<tr>";
            // foreach ($days_of_week as $day_of_week) {
            //     echo "<td>Activity AM</td>";
            //     echo "<td>Activity PM</td>";
            // }
            // echo "</tr>";
           
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

// application.php
function getFreeComputers($date, $endDay, $time) {
    $pdo = connect();
    $sql = "SELECT  
                tietokone.tietokoneID, 
                tietokone.numero, 
                tietokone.tietoja, 
                tietokone.tilaID, 
                varaus.päivä, 
                varaus.loppuPäivä, 
                varaus.varaustyyppi
            FROM 
                tietokone
            LEFT JOIN 
                varaus 
                ON tietokone.tietokoneID = varaus.tietokoneID
                AND (
                    -- Reservation period includes the specific day
                    (varaus.päivä <= :date AND varaus.loppuPäivä >= :endDay)
                )
                AND (
                    -- Filtering by reservation type
                    varaus.varaustyyppi = :time 
                    OR varaus.varaustyyppi = 'kokopäivä' 
                    OR varaus.varaustyyppi = 'supervaraus'
                )
            INNER JOIN
                tila
                ON tietokone.tilaID = tila.tilaID
            WHERE tietokone.tilaID = 1;
            ";
    $stm = $pdo->prepare($sql);
    $stm->execute([
        ':date' => $date,
        ':endDay' => $endDay,
        ':time' => $time
    ]);
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
