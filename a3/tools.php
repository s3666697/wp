<?php
  session_start();


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
            'title' => "The Girl in the Spider's Web",
            'rating' => "MA15+",
            'description' => "Lisbeth Salander, the cult figure and title character of the acclaimed Millennium book series created by Stieg Larsson, will return to the screen in The Girl in the Spider’s Web, a first-time adaptation of the recent global bestseller. Golden Globe winner Claire Foy, the star of “The Crown,” will play the outcast vigilante defender under the direction of Fede Alvarez, the director of 2016’s breakout thriller Don’t Breathe; the screenplay adaptation is by Steven Knight and Fede Alvarez & Jay Basu.",
            'poster' => "girl_in_the_spiders_web.png",
            'trailer' => "https://www.youtube.com/embed/XKMSP9OKspQ?controls=0",
            'sessions' => [
                'wednesdaySession' => '9PM',
                'thursdaySession' => '9PM',
                'fridaySession' => '9PM',
                'saturdaySession' => '6PM',
                'sundaySession' => '6PM'
            ]
        ],
        'RMC' => [
            'title' => "A Star Is Born",
            'rating' => "M",
            'description' => "In this new take on the tragic love story, he plays seasoned musician Jackson Maine, who discovers—and falls in love with—struggling artist Ally (Gaga). She has just about given up on her dream to make it big as a singer... until Jack coaxes her into the spotlight. But even as Ally’s career takes off, the personal side of their relationship is breaking down, as Jack fights an ongoing battle with his own internal demons.",
            'poster' => "a_star_is_born.png",
            'trailer' => "https://www.youtube.com/embed/nSbzyEJ8X9E?controls=0",
            'sessions' => [
                'mondaySession' => '6PM',
                'tuesdaySession' => '6PM',
                'saturdaySession' => '3PM',
                'sundaySession' => '3PM'
            ]
        ]
    ];
    return $movieObject;
};

function printMovieArray(){
   print_r(movieArray());
};

function printMoviesShowing(){
    foreach ( movieArray() as $movieId => $movie ) {
        echo "<div class='Movie'>
        <img class='MoviePoster' src='../../media/posters/{$movie['poster']}' alt '{$movie['title']} movie poster' />
        <div class='MovieTitle'>{$movie['title']}</div>
        <div class='MovieRating'>{$movie['rating']}</div>
        <div class='MovieSessionsTitle'>Sessions Available:
            <div class='MovieSessions'>
                <ul>
                    <li>MON - {$movie['sessions']['mondaySession']}</li>
                    <li>TUE - {$movie['sessions']['tuesdaySession']}</li>
                    <li>WED - {$movie['sessions']['wednesdaySession']}</li>
                    <li>THU - {$movie['sessions']['thursdaySession']}</li>
                    <li>FRI - {$movie['sessions']['fridaySession']}</li>
                    <li>SAT - {$movie['sessions']['saturdaySession']}</li>
                    <li>SUN - {$movie['sessions']['sundaySession']}</li>
                </ul>
            </div>
        </div>
        </div>
        ";
    }
};

/*
<div class='Movie'>
                        <!--Image sourced from: https://www.cinematerial.com/movies/a-star-is-born-i1517451/p/zhwahyuv-->
                        <img class='MoviePoster' src='../../media/posters/a_star_is_born.png' alt 'A Star Is Born movie poster' />
                        <div class='MovieTitle'>A Star Is Born</div>
                        <div class='MovieRating'>M</div>
                        <div class='MovieSessionsTitle'>Sessions Available:
                            <div class='MovieSessions'>
                                <ul>
                                    <li>Mon - 6PM</li>
                                    <li>Tue - 6PM</li>
                                    <li>Sat - 3PM</li>
                                    <li>Sun - 3PM</li>
                                </ul>
                            </div>
                        </div>
                    </div>
*/

function printMovieInformation(){
foreach ( movieArray() as $movieId => $movie ) {
    echo "<section class='Synopsis'>
    <div class='MovieTitle'>{$movie['title']}</div>
    <div class='MovieRating'>{$movie['rating']}</div>
    <div class='MovieSynopsis'>{$movie['description']}</div>
    {$movie['trailer']}<br><br>
    <div class='MakeABooking'>Make a Booking:</div>
    <button class='SessionTimesButton' type='button'>MON - {$movie['sessions']['mondaySession']}</button>
    <button class='SessionTimesButton' type='button'>TUE - {$movie['sessions']['tuesdaySession']}</button>
    <button class='SessionTimesButton' type='button'>WED - {$movie['sessions']['wednesdaySession']}</button>
    <button class='SessionTimesButton' type='button'>THU - {$movie['sessions']['thursdaySession']}</button>
    <button class='SessionTimesButton' type='button'>FRI - {$movie['sessions']['fridaySession']}</button>
    <button class='SessionTimesButton' type='button'>SAT - {$movie['sessions']['saturdaySession']}</button>
    <button class='SessionTimesButton' type='button'>SUN - {$movie['sessions']['sundaySession']}</button>
    </section>
    ";
    }
};


/*
                <section class='Synopsis'>
                    <div class='MovieTitle'>Girl In The Spiders Web</div>
                    <div class='MovieRating'>MA15+</div>
                    <!--Synopsis sourced from: https://www.youtube.com/watch?v=XKMSP9OKspQ-->
                    <div class='MovieSynopsis'>Lisbeth Salander, the cult figure and title character of the acclaimed Millennium book series created by Stieg Larsson, will return to the screen in The Girl in the Spider’s Web, a first-time adaptation of the recent global bestseller.  Golden Globe winner Claire Foy, the star of “The Crown,” will play the outcast vigilante defender under the direction of Fede Alvarez, the director of 2016’s breakout thriller Don’t Breathe; the screenplay adaptation is by Steven Knight and Fede Alvarez &amp; Jay Basu.</div>
                    <iframe class='MovieTrailer' width="560" height="315" src="https://www.youtube.com/embed/XKMSP9OKspQ?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    <div class='MakeABooking'>Make a Booking:</div>
                    <button class='SessionTimesButton' type="button">Wed - 9PM</button>
                    <button class='SessionTimesButton' type="button">Thu - 9PM</button>
                    <button class='SessionTimesButton' type="button">Fri - 9PM</button>
                    <button class='SessionTimesButton' type="button">Sat - 6PM</button>
                    <button class='SessionTimesButton' type="button">Sun - 6PM</button>
                </section>
*/
?>
