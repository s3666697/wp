<?php

session_start();
$name=$_POST["cust"]["name"];
$email=$_POST["cust"]["email"];
$mobile=$_POST["cust"]["mobile"];
$card=$_POST["cust"]["card"];
$expiry=$_POST["cust"]["expiry"];
$movieid=$_POST["movie"]["id"];
$day=$_POST["movie"]["day"];
$hour=$_POST["movie"]["hour"];
$sta=$_POST["seats"]["STA"];
$stp=$_POST["seats"]["STP"];
$stc=$_POST["seats"]["STC"];
$fca=$_POST["seats"]["FCA"];
$fcp=$_POST["seats"]["FCP"];
$fcc=$_POST["seats"]["FCC"];
$totalprice='';

$nameError='';
$emailError='';
$mobileError='';
$cardError='';
$expiryError='';



// Prints data and shape/structure of data
function preShow( $arr, $returnAsString=false ) {
  $ret  = '<pre>' . print_r($arr, true) . '</pre>';
  if ($returnAsString)
    return $ret;
  else
    echo $ret;
}


//Output your current file's source code
function printMyCode() {
  $lines = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre class='mycode'><ol>";
  foreach ($lines as $line)
     echo '<li>'.rtrim(htmlentities($line)).'</li>';
  echo '</ol></pre>';
}


//A "php associative array to javascript object" function
function php2js( $arr, $arrName ) {
  $lineEnd="";
  echo "<script>\n";
  echo "  var $arrName = ".json_encode($arr, JSON_PRETTY_PRINT);
  echo "</script>\n\n";
}


//Output dynamically CSS to style the current nav link:
function styleCurrentNavLink( $css ) {
  $here = $_SERVER['SCRIPT_NAME'];
  $bits = explode('/',$here);
  $filename = $bits[count($bits)-1];
  echo "<style>nav a[href$='$filename'] { $css }</style>";
}

//Array of movie information
function movieArray(){
    $movieObject = [
        'ACT' => [
            'title' => "The Girl in the Spiders Web",
            'rating' => "MA15+",
            'description' => "Lisbeth Salander, the cult figure and title character of the acclaimed Millennium book series created by Stieg Larsson, will return to the screen in The Girl in the Spider’s Web, a first-time adaptation of the recent global bestseller. Golden Globe winner Claire Foy, the star of “The Crown,” will play the outcast vigilante defender under the direction of Fede Alvarez, the director of 2016’s breakout thriller Don’t Breathe; the screenplay adaptation is by Steven Knight and Fede Alvarez & Jay Basu.",
            'poster' => "girl_in_the_spiders_web.png",
            'trailer' => "https://www.youtube.com/embed/XKMSP9OKspQ?controls=0",
            'sessions' => [
                'wednesday' => '9PM',
                'thursday' => '9PM',
                'friday' => '9PM',
                'saturday' => '6PM',
                'sunday' => '6PM'
            ]
        ],
        'RMC' => [
            'title' => "A Star Is Born",
            'rating' => "M",
            'description' => "In this new take on the tragic love story, he plays seasoned musician Jackson Maine, who discovers—and falls in love with—struggling artist Ally (Gaga). She has just about given up on her dream to make it big as a singer... until Jack coaxes her into the spotlight. But even as Ally’s career takes off, the personal side of their relationship is breaking down, as Jack fights an ongoing battle with his own internal demons.",
            'poster' => "a_star_is_born.png",
            'trailer' => "https://www.youtube.com/embed/nSbzyEJ8X9E?controls=0",
            'sessions' => [
                'monday' => '6PM',
                'tuesday' => '6PM',
                'saturday' => '3PM',
                'sunday' => '3PM'
            ]
        ],
        'ANM' => [
            'title' => "Ralph Breaks the Internet",
            'rating' => "PG",
            'description' => "Ralph Breaks the Internet: Wreck-It Ralph 2” leaves Litwak’s video arcade behind, venturing into the uncharted, expansive and thrilling world of the internet—which may or may not survive Ralph’s wrecking. Video game bad guy Ralph (voice of John C. Reilly) and fellow misfit Vanellope von Schweetz (voice of Sarah Silverman) must risk it all by traveling to the world wide web in search of a replacement part to save Vanellope’s video game, Sugar Rush.",
            'poster' => "ralph_breaks_the_internet.png",
            'trailer' => "https://www.youtube.com/embed/_BcYBFC6zfY?controls=0",
            'sessions' => [
                'monday' => '12PM',
                'tuesday' => '12PM',
                'wednesday' => '6PM',
                'thursday' => '6PM',
                'friday' => '6PM',
                'saturday' => '12PM',
                'sunday' => '12PM'
            ]
        ],
        'AHF' => [
            'title' => "Boy Erased",
            'rating' => "MA15+",
            'description' => " “Boy Erased” tells the story of Jared (Hedges), the son of a Baptist pastor in a small American town, who is outed to his parents (Kidman and Crowe) at age 19.  Jared is faced with an ultimatum: attend a conversion therapy program – or be permanently exiled and shunned by his family, friends, and faith.  Boy Erased is the true story of one young man’s struggle to find himself while being forced to question every aspect of his identity.",
            'poster' => "boy_erased.png",
            'trailer' => "https://www.youtube.com/embed/-B71eyB_Onw?controls=0",
            'sessions' => [
                'wednesday' => '12PM',
                'thursday' => '12PM',
                'friday' => '12PM',
                'saturday' => '9PM',
                'sunday' => '9PM'
            ]
        ]
    ];
    return $movieObject;
};

//Array of movie information
function priceArray(){
    $priceObject = [
        'STA' => [
            'SeatType' => "Standard Adult",
            'DiscountPrice' => "14.00",
            'FullPrice' => "19.80"
        ],
        'STP' => [
            'SeatType' => "Standard Concession",
            'DiscountPrice' => "12.50",
            'FullPrice' => "17.50"
        ],
        'STC' => [
            'SeatType' => "Standard Child",
            'DiscountPrice' => "11.00",
            'FullPrice' => "15.30"
        ],
        'FCA' => [
            'SeatType' => "First Class Adult",
            'DiscountPrice' => "24.00",
            'FullPrice' => "30.00"
        ],
        'FCP' => [
            'SeatType' => "First Class Concession",
            'DiscountPrice' => "22.50",
            'FullPrice' => "27.00"
        ],
        'FCC' => [
            'SeatType' => "First Class Child",
            'DiscountPrice' => "21.00",
            'FullPrice' => "24.00"
        ]
    ];
    return $priceObject;
};

function printMoviesShowing(){
    foreach ( movieArray() as $movieId => $movie ) {
        echo
"<a href='javascript:displaySynopsis(\"{$movieId}\")'>
<div class='Movie'>
    <img class='MoviePoster' src='../../media/posters/{$movie['poster']}' alt='{$movie['title']} movie poster' />
    <div class='MovieTitle'>{$movie['title']}</div>
    <div class='MovieRating'>{$movie['rating']}</div>
    <div class='MovieSessionsTitle'>Sessions Available:
        <div class='MovieSessions'>
            <ul>";
                if($movie['sessions']['monday'] !== NULL){
                    echo "<li>MON - {$movie['sessions']['monday']}</li>";
                };
                if($movie['sessions']['tuesday'] !== NULL){
                    echo "<li>TUE - {$movie['sessions']['tuesday']}</li>";
                };
                if($movie['sessions']['wednesday'] !== NULL){
                    echo "<li>WED - {$movie['sessions']['wednesday']}</li>";
                };
                if($movie['sessions']['thursday'] !== NULL){
                    echo "<li>THU - {$movie['sessions']['thursday']}</li>";
                };
                if($movie['sessions']['friday'] !== NULL){
                    echo "<li>FRI - {$movie['sessions']['friday']}</li>";
                };
                if($movie['sessions']['saturday'] !== NULL){
                    echo "<li>SAT - {$movie['sessions']['saturday']}</li>";
                };
                if($movie['sessions']['sunday'] !== NULL){
                    echo "<li>SUN - {$movie['sessions']['sunday']}</li>";
                };
            echo
            "</ul>
        </div>
    </div>
</div>
</a>
";
}
};

function printMovieSynopsis(){
foreach ( movieArray() as $movieId => $movie ) {
    echo
"<div class='Synopsis' id={$movieId}>
        <div class='MovieTitle'>{$movie['title']}</div>
        <div class='MovieRating'>{$movie['rating']}</div>
        <div class='MovieSynopsis'>{$movie['description']}</div>
        <iframe id='ytplayer' type='text/html' width='640' height='360' src='{$movie['trailer']}'></iframe><br>
        <div class='MakeABooking'>Make a Booking:</div>";

        if($movie['sessions']['monday'] !== NULL){
            echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'MON', '{$movie['sessions']['monday']}')\" type='button'>MON - {$movie['sessions']['monday']}</button>";
        };
        if($movie['sessions']['tuesday'] !== NULL){
                echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'TUE', '{$movie['sessions']['tuesday']}')\" type='button'>TUE - {$movie['sessions']['tuesday']}</button>";
        };
        if($movie['sessions']['wednesday'] !== NULL){
                echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'WED', '{$movie['sessions']['wednesday']}')\" type='button'>WED - {$movie['sessions']['wednesday']}</button>";
        };
        if($movie['sessions']['thursday'] !== NULL){
                echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'THU', '{$movie['sessions']['thursday']}')\" type='button'>THU - {$movie['sessions']['thursday']}</button>";
        };
        if($movie['sessions']['friday'] !== NULL){
                echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'FRI', '{$movie['sessions']['friday']}')\" type='button'>FRI - {$movie['sessions']['friday']}</button>";
        };
        if($movie['sessions']['saturday'] !== NULL){
                echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'SAT', '{$movie['sessions']['saturday']}')\" type='button'>SAT - {$movie['sessions']['saturday']}</button>";
        };
        if($movie['sessions']['sunday'] !== NULL){
                echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'SUN', '{$movie['sessions']['sunday']}')\" type='button'>SUN - {$movie['sessions']['sunday']}</button>";
        };
    echo "</div>
    ";
}
};

function validateForm(){

    global $name;
    global $email;
    global $mobile;
    global $card;
    global $expiry;
    global $nameError;
    global $emailError;
    global $mobileError;
    global $cardError;
    global $expiryError;

    $errorCount=0;

    if (!empty($_POST))
        {
        if(empty($name) || !preg_match("/^[a-zA-Z \-.']{1,100}$/",$name)){
            $nameError="Please enter a valid name.";
            $errorCount++;
        }

        if(empty($email) && filter_var($email)){
            $emailError="Please enter a valid email.";
            $errorCount++;
        }

        if(empty($mobile) || !preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/",$mobile)){
            $mobileError="Please enter a valid mobile.";
            $errorCount++;
        }

        if(empty($card)|| !preg_match("/^(\d{4}[- ])(\d{4}[- ])(\d{4}[- ])(\d{4})|\d{16}$/",$card)){
            $cardError="Please enter a valid credit card number.";
            $errorCount++;
        }

        if(empty($expiry)){
            $expiryError="Please enter a valid credit card expiry.";
            $errorCount++;
        }
        if ($errorCount == "0"){
            calculatePrice();
            writeBookingToFile();
            header("Location: receipt.php");
        }
    }
}


function calculatePrice(){

    global $name;
    global $email;
    global $mobile;
    global $card;
    global $expiry;
    global $movieid;
    global $day;
    global $hour;
    global $sta;
    global $stp;
    global $stc;
    global $fca;
    global $fcp;
    global $fcc;
    global $totalprice;
    $discount = '';
    $priceObject = priceArray();

    if($day == 'SAT' || $day == 'SUN'){
        $discount = 'FullPrice';
    }
    else if($day != 'SAT' && $hour == '12:00' || $day != 'SUN' && $hour == '12:00' ){
        $discount = 'DiscountPrice';
    }
    else if($day == 'MON' || $day == 'WED'){
        $discount = 'DiscountPrice';
    }
    else {
        $discount = 'FullPrice';
    }

    $totalprice = $totalprice + ($priceObject['STA'][$discount] * $sta);
    $totalprice = $totalprice + ($priceObject['STP'][$discount] * $stp);
    $totalprice = $totalprice + ($priceObject['STC'][$discount] * $stc);
    $totalprice = $totalprice + ($priceObject['FCA'][$discount] * $fca);
    $totalprice = $totalprice + ($priceObject['FCP'][$discount] * $fcp);
    $totalprice = $totalprice + ($priceObject['FCC'][$discount] * $fcc);
}

function writeBookingToFile(){

    global $name;
    global $email;
    global $mobile;
    global $card;
    global $expiry;
    global $movieid;
    global $day;
    global $hour;
    global $sta;
    global $stp;
    global $stc;
    global $fca;
    global $fcp;
    global $fcc;
    global $totalprice;

    $file = fopen("bookings.txt","a");
    flock($file, LOCK_EX);
    fputcsv($file,[date('Y-m-d'),$name,$email,$mobile,$movieid,$day,$hour,$sta,$stp,$stc,$fca,$fcp,$fcc,number_format($totalprice,2)],"\t");
    flock($file,LOCK_UN);
    fclose($file);
}

?>
