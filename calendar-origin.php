<!-- only a table in php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calendar</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .nav {
            display: flex;
            justify-content: space-between;
        }
        .nav a {
            padding: 10px 20px;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>

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
        $days_of_week = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');

        // Number of days in the month
        $number_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        // Get the first day of the month
        $date_info = getdate(mktime(0, 0, 0, $month, 1, $year));

        // Index value 0-6 of the first day of the month
        $first_day = $date_info['wday'];

        // Create the calendar HTML
        $calendar = "<table>";
        $calendar .= "<tr>";

        // Create the calendar headers
        foreach ($days_of_week as $day) {
            $calendar .= "<th>$day</th>";
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

            $calendar .= "<td>$current_day</td>";

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
?>

<div class="nav">
    <a href="?month=<?php echo $prev_month; ?>&year=<?php echo $prev_year; ?>">Previous Month</a>
    <h2><?php echo date('F Y', strtotime("$year-$month-01")); ?></h2>
    <a href="?month=<?php echo $next_month; ?>&year=<?php echo $next_year; ?>">Next Month</a>
</div>

<?php
    // Display the calendar
    echo generate_calendar($month, $year);
?>

</body>
</html>
