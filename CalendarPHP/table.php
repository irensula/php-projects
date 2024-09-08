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
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM varaus";
            $result = $connection->query($sql);

            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . row["tietokoneID"] . "</td>
                        <td>" . row["päivä"] . "</td>
                        
                    </tr>";
            }

            
            ?>
        </tbody>
    </table>
</body>
</html>