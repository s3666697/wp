<?php

session_start();
$name='';
$email='';
$mobile='';
$card='';
$expiry='';
$movieid='';
$movietitle='';
$day='';
$hour='';
$sta='';
$stp='';
$stc='';
$fca='';
$fcp='';
$fcc='';
$totalprice='';

$nameError='';
$emailError='';
$mobileError='';
$cardError='';
$expiryError='';
$movieError='';



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
                if(!empty($movie['sessions']['monday'])){
                    echo "<li>MON - {$movie['sessions']['monday']}</li>";
                };
                if(!empty($movie['sessions']['tuesday'])){
                    echo "<li>TUE - {$movie['sessions']['tuesday']}</li>";
                };
                if(!empty($movie['sessions']['wednesday'])){
                    echo "<li>WED - {$movie['sessions']['wednesday']}</li>";
                };
                if(!empty($movie['sessions']['thursday'])){
                    echo "<li>THU - {$movie['sessions']['thursday']}</li>";
                };
                if(!empty($movie['sessions']['friday'])){
                    echo "<li>FRI - {$movie['sessions']['friday']}</li>";
                };
                if(!empty($movie['sessions']['saturday'])){
                    echo "<li>SAT - {$movie['sessions']['saturday']}</li>";
                };
                if(!empty($movie['sessions']['sunday'])){
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

        if(!empty($movie['sessions']['monday'])){
            echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'MON', '{$movie['sessions']['monday']}')\" type='button'>MON - {$movie['sessions']['monday']}</button>";
        };
        if(!empty($movie['sessions']['tuesday'])){
                echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'TUE', '{$movie['sessions']['tuesday']}')\" type='button'>TUE - {$movie['sessions']['tuesday']}</button>";
        };
        if(!empty($movie['sessions']['wednesday'])){
                echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'WED', '{$movie['sessions']['wednesday']}')\" type='button'>WED - {$movie['sessions']['wednesday']}</button>";
        };
        if(!empty($movie['sessions']['thursday'])){
                echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'THU', '{$movie['sessions']['thursday']}')\" type='button'>THU - {$movie['sessions']['thursday']}</button>";
        };
        if(!empty($movie['sessions']['friday'])){
                echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'FRI', '{$movie['sessions']['friday']}')\" type='button'>FRI - {$movie['sessions']['friday']}</button>";
        };
        if(!empty($movie['sessions']['saturday'])){
                echo "<button class='SessionTimesButton' onclick=\"setHiddenFields('{$movieId}','{$movie['title']}', 'SAT', '{$movie['sessions']['saturday']}')\" type='button'>SAT - {$movie['sessions']['saturday']}</button>";
        };
        if(!empty($movie['sessions']['sunday'])){
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
    global $movieid;
    global $totalprice;
    global $name;
    global $email;
    global $mobile;
    global $card;
    global $expiry;
    global $movieid;
    global $movietitle;
    global $day;
    global $hour;
    global $sta;
    global $stp;
    global $stc;
    global $fca;
    global $fcp;
    global $fcc;

    global $nameError;
    global $emailError;
    global $mobileError;
    global $cardError;
    global $expiryError;
    global $movieError;

    $errorCount=0;

    if (!empty($_POST))
        {
        $name=$_POST["cust"]["name"];
        $email=$_POST["cust"]["email"];
        $mobile=$_POST["cust"]["mobile"];
        $card=$_POST["cust"]["card"];
        $expiry=$_POST["cust"]["expiry"];
        $movieid=$_POST["movie"]["id"];
        $movietitle=$_POST["movie"]["title"];
        $day=$_POST["movie"]["day"];
        $hour=$_POST["movie"]["hour"];
        $sta=$_POST["seats"]["STA"];
        $stp=$_POST["seats"]["STP"];
        $stc=$_POST["seats"]["STC"];
        $fca=$_POST["seats"]["FCA"];
        $fcp=$_POST["seats"]["FCP"];
        $fcc=$_POST["seats"]["FCC"];

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

        if(empty($card) || !preg_match("/^(\d{4}[- ])(\d{4}[- ])(\d{4}[- ])(\d{4})|\d{16}$/",$card)){
            $cardError="Please enter a valid credit card number.";
            $errorCount++;
        }

        if(empty($expiry)) {
            $expiryError="Please enter a valid credit card expiry.";
            $errorCount++;
        }

        if(empty($movieid)) {
            $movieError="Please select a movie.";
            $errorCount++;
        }

        if ($errorCount == "0"){
            calculatePrice();
            writeBookingToFile();
            writeBookingToSession();
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

function writeBookingToSession(){

    global $name;
    global $email;
    global $mobile;
    global $card;
    global $expiry;
    global $movieid;
    global $movietitle;
    global $day;
    global $hour;
    global $sta;
    global $stp;
    global $stc;
    global $fca;
    global $fcp;
    global $fcc;
    global $totalprice;
    $num = count($_SESSION[cart]++);

    $_SESSION['cart'][$num]['cust']['name'] = $name;
    $_SESSION['cart'][$num]['cust']['email'] = $email;
    $_SESSION['cart'][$num]['cust']['mobile'] = $mobile;
    $_SESSION['cart'][$num]['movie']['id'] = $movieid;
    $_SESSION['cart'][$num]['movie']['title'] = $movietitle;
    $_SESSION['cart'][$num]['movie']['day'] = $day;
    $_SESSION['cart'][$num]['movie']['hour'] = $hour;
    $_SESSION['cart'][$num]['seats']['STA'] = $sta;
    $_SESSION['cart'][$num]['seats']['STP'] = $stp;
    $_SESSION['cart'][$num]['seats']['STC'] = $stc;
    $_SESSION['cart'][$num]['seats']['FCA'] = $fca;
    $_SESSION['cart'][$num]['seats']['FCP'] = $fcp;
    $_SESSION['cart'][$num]['seats']['FCC'] = $fcc;
    $_SESSION['cart'][$num]['totalprice'] = $totalprice;

}

function submitOrder(){
    if (!empty($_POST))
        {
    header("Location: receipt.php");
    }
}

function printCustomerDetails(){
    $customerNum = 1;
    echo "<div class='ReceiptHeading'>Customer Details</div>
    <table class='ReceiptTable'>
        <tr>
            <th>Customer Number</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Mobile</th>
        </tr>";
    foreach ($_SESSION[cart] as $cart => $item ) {
        echo "<tr>
                <td>$customerNum</td>
                <td>{$item['cust']['name']}</td>
                <td>{$item['cust']['email']}</td>
                <td>{$item['cust']['mobile']}</td>
            </tr>";
        $customerNum++;
    }

    echo "</table>";
}

function printMovieDetails(){

    $combinedtotalprice = 0;

    foreach ($_SESSION[cart] as $cart => $item ) {
        $combinedtotalprice += $item['totalprice'];
    };

    $gst = number_format($combinedtotalprice - ($combinedtotalprice / 1.10),2);

    echo "<div class='ReceiptHeading'>Movie Details</div>";
    echo "<table class='ReceiptTable'>
            <tr>
            <th>Movie Title</th>
            <th>Day</th>
            <th>Hour</th>
            <th>STA</th>
            <th>STP</th>
            <th>STC</th>
            <th>FCA</th>
            <th>FCP</th>
            <th>FCC</th>
            <th>Price</th>
            </tr>";
    foreach ($_SESSION[cart] as $cart => $item ) {
        echo "
            <tr>
                <td>{$item['movie']['title']}</td>
                <td>{$item['movie']['day']}</td>
                <td>{$item['movie']['hour']}</td>
                <td>{$item['seats']['STA']}</td>
                <td>{$item['seats']['STP']}</td>
                <td>{$item['seats']['STC']}</td>
                <td>{$item['seats']['FCA']}</td>
                <td>{$item['seats']['FCP']}</td>
                <td>{$item['seats']['FCC']}</td>
                <td>$"; echo number_format($item['totalprice'],2); echo"</td>
            </tr>
        ";
    }
    echo "<tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Total:</td>
        <td>$";echo number_format($combinedtotalprice,2); echo"</td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>GST:</td>
        <td>\${$gst}</td>
        </tr>
    </table>";
}

function printIndividualTicket(){
    echo "<div class='ReceiptHeading'></div>";
    foreach ($_SESSION[cart] as $cart => $item ) {
        foreach($item['seats'] as $seat => $ticket){
            for($i=0;$i<$ticket;$i++){
                echo "<div class='IndividualTicket'>
                    <div class='TicketType'>TICKET: ADMIT ONE</div>
                    <div class='TicketBusinessInfo'>
                    <div class='TicketBusinessName'>Lundaro Cinema</div>
                    <div class='TicketBusinessPhone'>1300 222 444</div>
                    <div class='TicketBusinessAddr'>123 Main Street, Brisbane, Qld, 4000.</div>
                    </div>
                    <div class='TicketMovieInfo'>
                    <div class='TicketMovieTitle'>{$item['movie']['title']}</div>
                    <div class='TicketMovieDay'>Day: {$item['movie']['day']}</div>
                    <div class='TicketMovieTime'>Time: {$item['movie']['hour']}</div>
                    <div class='TicketMovieSeat'>Seat: $seat</div>
                    </div>
                    </div>";
                }
        }
    }
}

function printGroupTicket(){
    echo "<div class='ReceiptHeading'></div>
            <div class='GroupTicket'>
            <div class='TicketType'>GROUP TICKET</div>
            <div class='TicketBusinessInfo'>
            <div class='TicketBusinessName'>Lundaro Cinema</div>
            <div class='TicketBusinessPhone'>1300 222 444</div>
            <div class='TicketBusinessAddr'>123 Main Street, Brisbane, Qld, 4000.</div>
            </div>
    ";
    printMovieDetails();

    echo "</div>";
}
?>
