<?php 
class Calendar {

 // Constructor

 public function __construct() {
    $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
 }
 // Property
 private $dayLabels = array('Ma', 'Ti', 'Ke', 'To', 'Pe', 'La', 'Su');
 private $currentYear=0;
 private $currentMonth=0;
 private $currentDay=0;
 private $currentDate=null;
 private $daysInMonth=0;
 private $naviHref=null;

 // Public
 
 // print out the calendar
 public function show() {
    $year = null;
    $month = null;
    if(null==$year && isset($_GET['year'])) {
        $year = $_GET['year'];
    } elseif(null==$year) {
        $year = date('Y', time());
    }

    if(null==$month && isset($_GET['month'])) {
        $month = $_GET['month'];
    } elseif(null==$month) {
        $month = date('m', time());
    }
    $this->currentYear=$year;
    $this->currentMonth=$month;
    $this->daysInMonth=$this->_daysInMonth($month, $year);
    $content='<div id="calendar">'.'<div class="box">'.$this->_createNavi().'</div>'.'<div class="box-content">'.'<ul class="label">'.$this->_createLabels().'</ul>';
    $content.='<div class="clear"></div>';
    $content.='<ul class="dates">';
    
    $weeksInMonth = $this->_weeksInMonth($month,$year);

    // create weeks in month
    for($i=0; $i<$weeksInMonth; $i++) {
        // create days in week
        for($j=1; $j<=7; $j++) {
            $content.=$this->_showDay($i * 7 + $j);
        }
    }
    $content.='</ul>';
    $content.='<div class="clear"></div>';
    $content.='</div>';
    $content.='</div>';
    return $content;
 }
// private
// create the li element for ul


}


//https://youthsforum.com/programming/php/build-a-simple-calendar-in-website-using-php-with-source-code/