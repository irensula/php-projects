<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="styles.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Ilmoittautumisjärjestelmä</title>
</head>
<body>
    <header>
        
        <div class="header-container">
            <div class="logo">
                <a href="/"><i class="fa-solid fa-computer"></i></a>
            </div>
            <div class="main-title">
                <h1>Ilmoittautumisjärjestelmä</h1>
            </div>
            <nav>
                <ul>
                
                    <li><a href="/profile"><button class="navbutton">Profiili</button></a></li>
                    <li><a href="/login"><button class="navbutton">Kirjaudu</button></a></li>
                    <li><a href="/register"><button class="navbutton">Rekisteröityä</button></a></li>
                    <li></li><i class="fa-solid fa-bars"></i></li>
                </ul>
            </nav>
        </div>
    </header>

<!-- main part -->
	<main>
		<div class="container">
			<h2 class="title">Info</h2>
		<p class="info">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt voluptatum amet similique ipsa sit natus voluptatibus dignissimos esse, cupiditate vel dolore reiciendis dolorem, quidem nihil optio explicabo ex id accusamus.</p>
		<h2 class="title">Varauskalenteri</h2>
		</div>

            <?php
    // Get the current month and year
    if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = $_GET['month'];
        $year = $_GET['year'];
    } else {
        $month = date('m');
        $year = date('Y');
    }
    
    // Calculate the previous and next month
    $prev_month = $month - 1;
    $next_month = $month + 1;
    $prev_year = $year;
    $next_year = $year;

    if ($prev_month < 1) {
        $prev_month = 12;
        $prev_year--;
    }

    if ($next_month > 12) {
        $next_month = 1;
        $next_year++;
    }

    // Generate the calendar
    function generate_calendar($month, $year) {
        // Array containing the names of the days of the week
        $days_of_week = array('Ma', 'Ti', 'Ke', 'To', 'Pe', 'La', 'Su');

        // Number of days in the month
        $number_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        // Get the first day of the month
        setlocale(LC_TIME, 'fi-FI');
        $date_info = getdate(mktime(0, 0, 0, $month, 1, $year));
        
        // Index value 0-6 of the first day of the month
        // $first_day = $date_info['wday'];
        $first_day = ($date_info['wday'] + 6) % 7;
        
        // Create the calendar HTML
        $calendar = "<table class='calendar'>";
        $calendar .= "<tr>";

        // Create the calendar headers
        foreach ($days_of_week as $day) {
            $calendar .= "<th class='days-of-week'>$day</th>";
        }

        $calendar .= "</tr><tr>";

        // Fill in the blanks before the first day of the month
        if ($first_day > 0) {
            $calendar .= str_repeat("<td></td>", $first_day);
        }

        $current_day = 1;
        
        // Fill the calendar with the days of the month
        while ($current_day <= $number_days) {
            // Start a new row each week
            if ($first_day == 7) {
                $first_day = 0;
                $calendar .= "</tr><tr>";
            }

              
            if ($first_day >= 5 ) { 
                $calendar .= "<td class='day'>$current_day</td>";
            } else {
                $calendar .= "<td class='day'><a href='https://github.com/'>$current_day</a></td>";
            }
            "</td>";
          
            $current_day++;
            $first_day++;
        }

        // Complete the last row with empty cells
        if ($first_day != 7) {
            $remaining_days = 7 - $first_day;
            $calendar .= str_repeat("<td></td>", $remaining_days);
        }

        $calendar .= "</tr>";
        $calendar .= "</table>";

        return $calendar;
    }
    // months in finnish
    $months = [
        1 => 'tammikuu',
        2 => 'helmikuu',
        3 => 'maaliskuu',
        4 => 'huhtikuu',
        5 => 'toukokuu',
        6 => 'kesäkuu',
        7 => 'heinäkuu',
        8 => 'elokuu',
        9 => 'syyskuu',
        10 => 'lokakuu',
        11 => 'marraskuu',
        12 => 'joulukuu'
    ];
?>

<div class="month">
    <a href="?month=<?php echo $prev_month; ?>&year=<?php echo $prev_year; ?>"><i class="fa-solid fa-chevron-left"></i></a>
    <!--origin date: echo date('F Y', strtotime("$year-$month-01")); -->
    <h2 class="month-title"><?php echo ucfirst($months[(int)$month]) . " " . $year; ?></h2>
    <a href="?month=<?php echo $next_month; ?>&year=<?php echo $next_year; ?>"><i class="fa-solid fa-chevron-right"></i></a>
</div>

<?php
    // Display the calendar
    echo generate_calendar($month, $year);
?>

<!-- footer -->
</main>
<footer>
        <div class="logo">
        <a href="/"><i class="fa-solid fa-computer"></i></a>
        </div>
        <div class="copyright">
            <p><span class="year">2024</span>© All rights reserved.</p>
        </div>
    </footer>
</body>
</body>
</html>