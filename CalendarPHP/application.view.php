<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require "../Partials/header.php";
?>

<?php 
    if (isset($_GET['date'], $_GET['month'], $_GET['year'])){
        $date = urldecode($_GET['date']);
        $month = urldecode($_GET['month']);
        $year = urldecode($_GET['year']);
        $lenghtDateString = mb_strlen($date); 
        $lenghtMonthString = mb_strlen($month);
        if($lenghtDateString == 1 && $lenghtMonthString == 1) {
            $d = $year . "-0" . $month . "-0" . $date;
        } elseif ($lenghtMonthString == 1) {
            $d = $year . "-0" . $month . "-" . $date;
        } elseif ($lenghtDateString == 1) {
            $d = $year . "-" . $month . "-0" . $date;
        } else {
            $d = $year . "-" . $month . "-" . $date;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $day = $_POST['day'];
        $endDay = $_POST['endDay'];
        $time = $_POST['time'];
    
        $freeComputers = getFreeComputers($day, $endDay, $time);
    }
?>

<div class="application-container">

    <h2 class="form-title centered">Ilmoitus</h2>

    <div class="application-inputarea">

        <?php if (isset($_SESSION['message'])): ?>
            <div class="reservation-result">
                <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']); // Clear the message after displaying it
                ?>
            </div>
        <?php endif; ?>

        <form class="application-form" action="/add_application" method="post">

            <label for="day">Päivä:</label>
            <input id="day" type="date" name="day" value="<?=$d?>" oninput="updateHiddenInput()">

            <label for="time">Aika:</label>
            <select id="time" name="time" onchange="singleSelectChangeStyle()">
                <option value="aamupäivä">Aamupäivä</option>
                <option value="iltapäivä">Iltapäivä</option>
                <option value="kokopäivä">Kokopäivä</option>
                <option value="supervaraus">Period</option>
            </select><br>

            <div id="hiddenEndDay" class="hiddenEndDay">
                <label for="endDay">Lopetus päivä:</label><br>
                <input id="endDay" type="date" name="endDay" value="<?=$d?>">
            </div>

            <button class="form-button" id="sendbutton" type="submit" value="Lähetä" name="submit">Katso vapaat tietokoneet</button>           
                                  
        </form>

        <?php if (isset($freeComputers)): ?>
            <h3>Vapaat tietokoneet:</h3>
            <?php if (count($freeComputers) > 0): ?>
                <p>Ilmaisten tietokoneiden määrä: <?php echo count($freeComputers); ?></p>

                <!-- Reservation form if free computers are available -->
                <form method="POST" action="/add_application">
                    <label for="computer">Valitse tietokone:</label>
                    <select id="computer" name="computer" required>
                        <?php foreach ($freeComputers as $computer): ?>
                            <?php if($computer['päivä'] == NULL && $computer['loppuPäivä'] == NULL && $computer['varaustyyppi'] == NULL) { ?> 
                            <option value="<?php echo $computer['tietokoneID']; ?>">
                                Tietokone <?php echo $computer['numero']; ?> (<?php echo $computer['tietoja'] . $computer['tilaID'] . $computer['päivä'] . $computer['loppuPäivä'] . $computer['varaustyyppi']; ?>)
                            </option>
                        <?php } ?>
                        <?php endforeach; ?>
                    </select><br>
                    <label for="description">Selite:</label>
                <textarea name="description" id="description" required></textarea> 

                        <input type="hidden" name="day" value="<?php echo $day; ?>">
                        <input type="hidden" name="endDay" value="<?php echo $endDay; ?>">
                        <input type="hidden" name="time" value="<?php echo $time; ?>">
                    <input type="submit" value="Varata">
                </form>
            <?php else: ?>
                <p>Ilmaisia ​​tietokoneita ei ole saatavilla valitulle päivämäärälle ja kellonajalle.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<?php require "../Partials/footer.php";?>

<script>
    // show end day if the Period was chosen
    function singleSelectChangeStyle() {
        let selObj = document.getElementById("time");
        let selValue = selObj.options[selObj.selectedIndex].text;
        if(selValue == "Period") {
            document.getElementById('hiddenEndDay').classList.add('visibleEndDay');
        }
    }
    // show endDay input on click
    function updateHiddenInput() {
        let visibleValue = document.getElementById('day').value;
        document.getElementById('endDay').value = visibleValue; 
    }
    // // show computers
    // function toggleDiv() {
    //     let computers = document.getElementById('hiddenComputers');
    //     if (computers.style.display === 'none') {
    //         computers.style.display = 'block';
    //     } else {
    //         computers.style.display = 'none';
    //     }
    // }
</script>
