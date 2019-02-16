<?php
    require_once("tools.php");
?>

<?php
    php2js(priceArray(), 'priceArrayJS');
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
//            console.clear();
            let navlinks = document.getElementsByTagName("nav")[0].children;
            let sections = document.getElementsByTagName("main")[0].children;
            last = sections[sections.length - 1].getBoundingClientRect().top;
            if (last <=0) {
//                console.log('last');
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
//                    console.log(log);
                }
            }
        }

        function hideAllSynopsis(){
            var allMovieSynopsis = document.getElementsByClassName('Synopsis');
                for (var movie=0; movie < allMovieSynopsis.length ;movie++) {
                    allMovieSynopsis[movie].style.display = "none";
                }
        }

        function displaySynopsis(movieID) {
            var movieSynopsis = document.getElementById(movieID);
            if (movieSynopsis.style.display === "none") {
                hideAllSynopsis();
                movieSynopsis.style.display = "block";
            } else {
                hideAllSynopsis();
            }
        }

        function setHiddenFields(movieID, movieTitle, day, hour){
            console.log(movieID, movieTitle, day, hour);
            document.getElementById('movie[id]').value = movieID;
            document.getElementById('movie[day]').value = day;
            document.getElementById('movie[hour]').value = hour;
            document.getElementById('SelectedMovie').innerHTML = movieTitle;

        }

        function calculatePrice(){

            var totalPrice = 0.00;
            var discount = null;
            var day = document.getElementById('movie[day]').value;
            var hour = document.getElementById('movie[hour]').value;
            var seatType = document.getElementById('movie[id]').value;

            if(day == 'SAT' || day == 'SUN'){
                discount = 'FullPrice';
            }
            else if(day != 'SAT' && hour == '12:00' || day != 'SUN' && hour == '12:00' ){
                discount = 'DiscountPrice';
            }
            else if(day == 'MON' || day == 'WED'){
                discount = 'DiscountPrice';
            }
            else {
                discount = 'FullPrice';
            }

            totalPrice = totalPrice + (priceArrayJS["STA"][discount] * document.getElementById('seats[STA]').value);
            totalPrice = totalPrice + (priceArrayJS["STP"][discount] * document.getElementById('seats[STP]').value);
            totalPrice = totalPrice + (priceArrayJS["STC"][discount] * document.getElementById('seats[STC]').value);
            totalPrice = totalPrice + (priceArrayJS["FCA"][discount] * document.getElementById('seats[FCA]').value);
            totalPrice = totalPrice + (priceArrayJS["FCP"][discount] * document.getElementById('seats[FCP]').value);
            totalPrice = totalPrice + (priceArrayJS["FCC"][discount] * document.getElementById('seats[FCC]').value);
            document.getElementById('TotalPrice').innerHTML = totalPrice.toFixed(2);

            console.log(seatType);
            console.log(day);
            console.log(hour);
            console.log(totalPrice);
            console.log(discount);
        }

        function validateForm(){
            <?php
            validateForm();
            ?>
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
                <div class='SectionContent'>
                    <?php
                        printMoviesShowing();
                    ?>

                    <?php
                        printMovieSynopsis();
                    ?>
                </div>
            </section>

            <section id='Booking'>
                <div class='SectionHeading'>Booking</div>
                <div class='SectionContent'>
                    <p>Please complete the following information to complete your booking at Lunardo Cinema.</p>
                    <form class='MakeBookingForm' name='MakeBookingForm' action='index.php' method='post' target="_blank" onsubmit="validateForm()" oninput="calculatePrice()">
                        <input type='hidden' name='movie[id]' id='movie[id]' value='' required/>
                        <input type='hidden' name='movie[day]' id='movie[day]' value='' required/>
                        <input type='hidden' name='movie[hour]' id='movie[hour]' value='' required/>
                        <div class=form>
                        <div class='FormHeading'>Standard Adult:</div>
                        <select name='seats[STA]' id='seats[STA]'>
                            <option value='0' selected>Please Select</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                                <option value='9'>9</option>
                                <option value='10'>10</option>
                        </select>
                        <span class='error' id='seats[STA]'></span>
                        <br>
                        <div class='FormHeading'>Standard Concession:</div>
                        <select name='seats[STP]' id='seats[STP]' >
                            <option value='0' selected>Please Select</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                                <option value='9'>9</option>
                                <option value='10'>10</option>
                        </select>
                        <span class='error' id='seats[STP]'></span>
                        <br>
                        <div class='FormHeading'>Standard Child:</div>
                        <select name='seats[STC]' id='seats[STC]'>
                            <option value='0' selected>Please Select</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                                <option value='9'>9</option>
                                <option value='10'>10</option>
                        </select>
                        <span class='error' id='seats[STC]'></span>
                        <br>
                        <div class='FormHeading'>First Class Adult:</div>
                        <select name='seats[FCA]' id='seats[FCA]'>
                            <option value='0' selected>Please Select</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                                <option value='9'>9</option>
                                <option value='10'>10</option>
                        </select>
                        <span class='error' id='seats[FCA]'></span>
                        <br>
                        <div class='FormHeading'>First Class Concession:</div>
                        <select name='seats[FCP]' id='seats[FCP]'>
                            <option value='0' selected>Please Select</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                                <option value='9'>9</option>
                                <option value='10'>10</option>
                        </select>
                        <span class='error' id='seats[FCP]'></span>
                        <br>
                        <div class='FormHeading'>First Class Child:</div>
                        <select name='seats[FCC]' id='seats[FCC]'>
                            <option value='0' selected>Please Select</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                                <option value='9'>9</option>
                                <option value='10'>10</option>
                        </select>
                        <span class='error' id='seats[FCC]'></span>
                        <br>
                        </div>
                        <div class=form>
                            <div class='FormHeading'>Name: </div>
                            <!--<input type='text' name='cust[name]' value='' pattern="^[a-zA-Z \-.']{1,100}$" title='First name and last name are required.' required/><br>-->
                            <input type='text' name='cust[name]' value=''/><br>
                            <span class='error' id='cust[name]'><?php echo $nameError ?></span>
                            <div class='FormHeading'>Email: </div>
                            <!--<input type='email' name='cust[email]' value='' required/><br>-->
                            <input type='email' name='cust[email]' value=''/><br>
                            <span class='error' id='cust[email]'><?php echo $emailError ?></span>
                            <div class='FormHeading'>Mobile: </div>
                            <input type='tel' name='cust[mobile]' value='' pattern="^(\(04\)|04|\+614)( ?\d){8}$" required/><br>
                            <span class='error' id='cust[mobile]'><?php echo $mobileError ?></span>
                            <div class='FormHeading'>Credit Card: </div>
                            <input type='text' name='cust[card]' value='' pattern="^(\d{4}[- ])(\d{4}[- ])(\d{4}[- ])(\d{4})|\d{16}$" required/><br>
                            <span class='error' id='cust[card]'><?php echo $cardError ?></span>
                            <div class='FormHeading'>Expiry: </div>
                            <input type='month' name='cust[expiry]' value='' required/><br>
                            <span class='error' id='cust[expiry]'><?php echo $expiryError ?></span>
                            <div class='FormHeading'>Movie Selected: <span id='SelectedMovie'></span></div>
                            <div class='FormHeading'>Total Price: $<span id='TotalPrice'></span></div>
                            <br>
                            <input type='submit' name='order' value='Order'/><br>
                            <span class='error' id='movieError'></span>
                        </div>
                    </form>
                    <button type="button" id="Calculate" onClick="validateForm()">Click Me!</button>
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
//       printMovieArray();
    ?>
    <br><br>
    <?php
//        printPriceArray();
    ?>

    <span>Debug Info:
    </span>
    <?php
        preShow($_POST); // ie echo a string
    ?>
</div>
</html>
