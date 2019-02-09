<?php
require_once("tools.php");
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 3</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.css">
    <script src='../wireframe.js'></script>

    <link href="https://fonts.googleapis.com/css?family=Quicksand|Vibur" rel="stylesheet">
      
    <script>
        window.onscroll = function () {
            console.clear();
            let navlinks = document.getElementsByTagName("nav")[0].children;
            let sections = document.getElementsByTagName("main")[0].children;
            last = sections[sections.length - 1].getBoundingClientRect().top;
            if (last <=0) {
                console.log('last');
                navlinks[navlinks.length - 1].classList.add("active");
                for (j = 0; j < navlinks.length - 1; j++)
                    navlinks[j].classList.remove("active");
            } else {
                navlinks[sections.length - 1].classList.remove("active");
                for (i = 1; i < sections.length; i++){
                    prev = sections[i - 1].getBoundingClientRect().top;
                    next = sections[i].getBoundingClientRect().top;
                    log = prev + ' ' + next;
                    if (prev <=0 && next > 0) {
                        log += ' <------' + (i - 1);
                        navlinks[i - 1].classList.add("active");
                    } else {
                        log += ' xxx ';
                        navlinks[i - 1].classList.remove("active");
                    }
                    console.log(log);
                }
            }
        }
    </script>
  </head>

  <body>
    <div class='grid-container'>
        <header>
            <!--Image sourced from: https://www.designevo.com/apps/logo/?name=black-and-white-projector-->
            <img class='logo' src='../../media/lunardo-cinema-logo.png' width='200'  alt='Lunardo Cinema Logo'/>
            <div class='Title'>Lunardo Cinema</div>
        </header>

        <nav>
            <a href='#AboutUs' class='active'>About Us</a>
            <a href='#SeatPricing'>Seats &amp; Pricing</a>
            <a href='#NowShowing'>Now Showing</a>
            <a href='#Booking'>Booking</a>
        </nav>

        <main>
            <section id='AboutUs'>
                <div class='SectionHeading'>About Us</div>
                <div class='SectionContent'>
                    <p>Come celebrate the Lunardo Cinema grand reopening on Thursday, February 14th! We've made extensive improvements and renovations so you can now relax in our brand new standard seats or why not treat yourself in our premium First Class cinema, featuring reclining seats! You'll be so comfortable you could fall asleep if it wasn't for our upgraded 3D Dolby Vision projectors and Dolby Atmos surround sound, which provides an unparrelled sound and visually spectacular.</p>
                    <!--Image sourced from: http://thepoppingpost.com/what-mr-popcorn-is-saying-when-you-dont-behave-at-the-cinema/-->
                    <img class='CinemaImages' src='../../media/cinema/eating-popcorn.png' width='400' alt='Lady eating popcorn while watching a movie in a cinema.'/>
                    <!--Image sourced from: https://www.filmink.com.au/new-years-cinematic-resolutions/-->
                    <img class='CinemaImages' src='../../media/cinema/cinema-candybar.png' width='400' alt='Cinema candybar.'/>
                    <!--Image sourced from: https://www.google.com/maps-->
                    <img class='CinemaMap' src='../../media/cinema/lunardo-map.png' width='800' alt='Cinema location on a map.'/>
                </div>
            </section>

            <section id='SeatPricing'>
                <div class='SectionHeading'>Seating and Pricing</div>
                <div class='SectionContent'>
                    <p>All of the seating at Lunardo Cinema has been upgraded as part of our recent renovations to ensure you have the most comfortable movie going experience than ever before! Why not treat yourself to our brand new First Class seating option, where you can experience movie blockbusters in the comfort of a full reclining seat.</p>
                    <!--Image sourced from: http://www.profurn.com.au/portfolio-item/538/-->
                    <img src='../../media/standard_seat.png' width='500' alt='Standard cinema seat.'/>
                    <!--Image sourced from: http://www.profurn.com.au/portfolio-item/verona-single-zero-wall/-->
                    <img src='../../media/first_class_seat.png' width='500' alt='First class cinema seat.'/>
                    <table class='SeatOptions'>
                        <tr>
                            <th class='SeatType'>Seat Type</th>
                            <th class='SeatCode'>Seat Code</th>
                            <th class='DiscountPricing'>All day Monday and Wednesday AND 12pm on Weekdays</th>
                            <th class='StandardPricing'>All other times</th>
                        </tr>
                        <tr>
                            <td class='SeatType'>Standard Adult</td>
                            <td class='SeatCode'>STA</td>
                            <td class='DiscountPricing'>14.00</td>
                            <td class='StandardPricing'>19.80</td>
                        </tr>
                        <tr>
                            <td class='SeatType'>Standard Concession</td>
                            <td class='SeatCode'>STP</td>
                            <td class='DiscountPricing'>12.50</td>
                            <td class='StandardPricing'>17.50</td>
                        </tr>
                        <tr>
                            <td class='SeatType'>Standard Child</td>
                            <td class='SeatCode'>STC</td>
                            <td class='DiscountPricing'>11.00</td>
                            <td class='StandardPricing'>15.30</td>
                        </tr>
                        <tr>
                            <td class='SeatType'>First Class Adult</td>
                            <td class='SeatCode'>FCA</td>
                            <td class='DiscountPricing'>24.00</td>
                            <td class='StandardPricing'>30.00</td>
                        </tr>
                        <tr>
                            <td class='SeatType'>First Class Concession</td>
                            <td class='SeatCode'>FCP</td>
                            <td class='DiscountPricing'>22.50</td>
                            <td class='StandardPricing'>27.00</td>
                        </tr>
                        <tr>
                            <td class='SeatType'>First Class Child</td>
                            <td class='SeatCode'>FCC</td>
                            <td class='DiscountPricing'>21.00</td>
                            <td class='StandardPricing'>24.00</td>
                        </tr>
                    </table>
                </div>
            </section>

            <section id='NowShowing'>
                <div class='SectionHeading'>Now Showing</div>
                <div class='SecitonContent'>
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
                    <div class='Movie'>
                        <!--Image sourced from: https://www.cinematerial.com/movies/boy-erased-i7008872/p/5f6nyxbj-->
                        <img class='MoviePoster' src='../../media/posters/boy_erased.png' alt 'Boy Erased movie poster' />
                        <div class='MovieTitle'>Boy Erased movie poster</div>
                        <div class='MovieRating'>MA15+</div>
                        <div class='MovieSessionsTitle'>Sessions Available:
                            <div class='MovieSessions'>
                                 <ul>
                                    <li>Wed - 12PM</li>
                                    <li>Thu - 12PM</li>
                                    <li>Fri - 12PM</li>
                                    <li>Sat - 9PM</li>
                                    <li>Sun - 9PM</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class='Movie'>
                        <!--Image sourced from: https://www.cinematerial.com/movies/the-girl-in-the-spiders-web-i5177088/p/hdqkcier-->
                        <img class='MoviePoster' src='../../media/posters/girl_in_the_spiders_web.png' alt 'Girl In The Spiders Web movie poster' />
                        <div class='MovieTitle'>Girl In The Spiders Web</div>
                        <div class='MovieRating'>MA15+</div>
                        <div class='MovieSessionsTitle'>Sessions Available:
                            <div class='MovieSessions'>
                                <ul>
                                    <li>Wed - 9PM</li>
                                    <li>Thu - 9PM</li>
                                    <li>Fri - 9PM</li>
                                    <li>Sat - 6PM</li>
                                    <li>Sun - 6PM</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class='Movie'>
                        <!--Image sourced from: https://www.cinematerial.com/movies/ralph-breaks-the-internet-i5848272/p/iitivkt5-->
                        <img class='MoviePoster' src='../../media/posters/ralph_breaks_the_internet.png' alt 'Ralph Breaks The Internet movie poster' />
                        <div class='MovieTitle'>Ralph Breaks The Internet</div>
                        <div class='MovieRating'>PG</div>
                        <div class='MovieSessionsTitle'>Sessions Available:
                            <div class='MovieSessions'>
                                 <ul>
                                    <li>Mon - 12PM</li>
                                    <li>Tue - 12PM</li>
                                    <li>Wed - 6PM</li>
                                    <li>Thu - 6PM</li>
                                    <li>Fri - 6PM</li>
                                    <li>Sat - 12PM</li>
                                    <li>Sun - 12PM</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php
                    printMoviesShowing();
                    ?>

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

                <?php
                    printMovieInformation();
                ?>

                </div>
            </section>

            <section id='Booking'>
                <div class='SectionHeading'>Booking</div>
                <div class='SectionContent'>
                    <p>Please complete the following information to complete your booking at Lunardo Cinema.</p>
                    <form class='MakeBookingForm'action='index.php' method='post' target="_blank">
                        <input type='hidden' name='movie[id]' value='ACT'/>
                        <input type='hidden' name='movie[day]' value='MON'/>
                        <input type='hidden' name='movie[hour]' value='09:00'/>
                        <input type='hidden' name='movie[id]' value='1'/>
                        <div class='FormHeading'>Ticket Type:</div>
                        <select>
                            <option value='' selected>Please Select</option>
                                <optgroup label='Standard'>
                                    <option name='seats[STA]' value='1'>Standard Adult</option>
                                    <option name='seats[STP]' value='2'>Standard Concession</option>
                                    <option name='seats[STC]' value='3'>Standard Child</option>
                                </optgroup>
                                <optgroup label='First Class'>
                                    <option name='seats[FCA]' value='4'>First Class Adult</option>
                                    <option name='seats[FCP]' value='5'>First Class Concession</option>
                                    <option name='seats[FCC]' value='6'>First Class Child</option>
                                </optgroup>
                        </select>
                        <br>
                        <div class='FormHeading'>Name: </div>
                        <input type='text' name='cust[name]' value=''/><br>
                        <div class='FormHeading'>Email: </div>
                        <input type='email' name='cust[email]' value=''/><br>
                        <div class='FormHeading'>Mobile: </div>
                        <input type='tel' name='cust[mobile]' value=''/><br>
                        <div class='FormHeading'>Credit Card: </div>
                        <input type='text' name='cust[card]' value=''/><br>
                        <div class='FormHeading'>Expiry: </div>
                        <input type='month' name='cust[expiry]' value=''/><br>
                        <input type='submit' name='order' value='Order'/><br>
                    </form>
                </div>
            </section>
        </main>

        <footer>
            <div id=BusinessInfo>
                <a href="mailto:info@lunardocinema.com.au?Subject=Website%20Enquiry" target="_top">info@lunardocinema.com.au</a><br>
                1300 222 444<br>
                123 Main Street, Brisbane, Qld, 4000.<br>
            </div>
            <div class='StudentInfo'>
                &copy;<script>document.write(new Date().getFullYear());</script>
                Christopher Bowe, S3666697, <a href="https://github.com/s3666697/wp" target="_blank">https://github.com/s3666697/wp</a>. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.
            </div>
            <div id='Disclaimer'>
                Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.
            </div>
            <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
        </footer>
    </div>
  </body>

<div id=debug>
    <?php
    printMovieArray();
    ?>
    <br>
    <span>Debug Info:
    </span>
    <?php
        preShow($_POST); // ie echo a string
    ?>
</div>
</html>
