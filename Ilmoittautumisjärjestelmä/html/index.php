<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/main.css">
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
        <div class="logo">
            <img src="images/tredu-logo.png" alt="tredu">
        </div>
        <div class="main-title">
            <h1>Ilmoittautumisjärjestelmä</h1>
        </div>
        <nav>
            <ul>
                <li><button class="navbutton">Kirjaudu</button></li>
                <li><button class="navbutton">Rekisteröityä</button></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2 class="title">Info</h2>
        <p class="info">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt voluptatum amet similique ipsa sit natus voluptatibus dignissimos esse, cupiditate vel dolore reiciendis dolorem, quidem nihil optio explicabo ex id accusamus.</p>
        <h2 class="title">Varauskalenteri</h2>
        <div class="calendar">

            <?php 
                // include 'calendar.php';
                // $calendar = new Calendar();
                // echo $calendar->show();
            ?>

            <div class="month">
                <i class="fa-solid fa-chevron-left"></i>
                <h3 class="month-title">Toukokuu</h3>
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="days">
                <ul>
                    <li class="day">1</li>
                    <li class="day">2</li>
                    <li class="day">3</li>
                    <li class="day">4</li>
                    <li class="day">5</li>
                    
                </ul>
                <ul>
                    <li class="day">6</li>
                    <li class="day">7</li>
                    <li class="day">8</li>
                    <li class="day">9</li>
                    <li class="day">10</li>
                    <li class="day">11</li>
                    <li class="day">12</li>
                </ul>
                <ul>
                    <li class="day">13</li>
                    <li class="day">14</li>
                    <li class="day">15</li>
                    <li class="day">16</li>
                    <li class="day">17</li>
                    <li class="day">18</li>
                    <li class="day">19</li>
                </ul>
                <ul>
                    <li class="day">20</li>
                    <li class="day">21</li>
                    <li class="day">22</li>
                    <li class="day">23</li>
                    <li class="day">24</li>
                    <li class="day">25</li>
                    <li class="day">26</li>
                </ul>
                <ul>
                    <li class="day">27</li>
                    <li class="day">28</li>
                    <li class="day">29</li>
                    <li class="day">30</li>
                    <li class="day">31</li>
                </ul>
            </div>
        </div>
    </main>
    <footer>
        <div class="logo">
            <img src="images/tredu-logo.png" alt="tredu">
        </div>
        <div class="copyright">
            <p><span class="year">2024</span>© All rights reserved.</p>
        </div>
    </footer>
</body>
</html>