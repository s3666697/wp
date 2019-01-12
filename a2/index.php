<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 2</title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.css">
    <script src='../wireframe.js'></script>

    <link href="https://fonts.googleapis.com/css?family=Quicksand|Vibur" rel="stylesheet">
  </head>

  <body>

    <header>
        <img src='../../media/avatar.png' width='200' class="logo" alt'Lunardo Cinema Logo'/>
        <div class="Title">Lunardo Cinema</div>
    </header>

    <nav>
        <a href='#AboutUs'>About Us</a>
        <a href='#SeatsPricing'>Seats &amp; Pricing</a>
        <a href='#NowShowing'>Now Showing</a>
        <a href='#Booking'>Booking</a>
    </nav>

    <main>
        <section id='AboutUs'>
            <p>Come celebrate the Lunardo Cinema grand reopening on Thursday, February 14th! We've made extensive improvements and renovations so you can now relax in our brand new standard seats or why not treat yourself in our premium First Class cinema, featuring reclining seats! You'll be so comfortable you could fall asleep if it wasn't for our upgraded 3D Dolby Vision projectors and Dolby Atmos surround sound, which provides an unparrelled sound and visually spectacular.</p>
        </section>

        <section id='SeatPricing'>
            <p>All of the seating at Lunardo Cinema has been upgraded as part of our recent renovations to ensure you have the most comfortable movie going experience than ever before! Why not treat yourself to our brand new First Class seating option, where you can experience movie blockbusters in the comfort of a full reclining seat.</p>
            <img src='../../media/standard_seat.png' width='500' alt'Standard cinema Seat'/>
            <img src='../../media/first_class_seat.png' width='500' alt'First class cinema Seat'/>
            <table class="SeatOptions">
                <tr>
                    <th>Seat Type</th>
                    <th>Seat Code</th>
                    <th>All day Monday and Wednesday AND 12pm on Weekdays</th>
                    <th>All other times</th>
                </tr>
                <tr>
                    <td>Standard Adult</td>
                    <td>STA</td>
                    <td>14.00</td>
                    <td>19.80</td>
                </tr>
                <tr>
                    <td>Standard Concession</td>
                    <td>STP</td>
                    <td>12.50</td>
                    <td>17.50</td>
                </tr>
                <tr>
                    <td>Standard Child</td>
                    <td>STC</td>
                    <td>11.00</td>
                    <td>15.30</td>
                </tr>
                <tr>
                    <td>First Class Adult</td>
                    <td>FCA</td>
                    <td>24.00</td>
                    <td>30.00</td>
                </tr>
                <tr>
                    <td>First Class Concession</td>
                    <td>FCP</td>
                    <td>22.50</td>
                    <td>27.00</td>
                </tr>
                <tr>
                    <td>First Class Child</td>
                    <td>FCC</td>
                    <td>21.00</td>
                    <td>24.00</td>
                </tr>
            </table>
        </section>

        <section id='NowShowing'>
            <div class="Movie">
                <img src='../../media/posters/a_star_is_born.png' width='500' alt 'A Star Is Born movie poster' />
                <div class="MovieTitle">A Star Is Born</div>
                <div class="MovieRating">M</div>
                <div class="MovieSessions">
                    <ul>
                        <li>Mon - 6PM</li>
                        <li>Tue - 6PM</li>
                        <li>Sat - 3PM</li>
                        <li>Sun - 3PM</li>
                    </ul>
                </div>
            </div>
            <div class="Movie">
                <img src='../../media/posters/boy_erased.png' width='500' alt 'Boy Erased movie poster' />
                <div class="MovieTitle">Boy Erased movie poster</div>
                <div class="MovieRating">MA15+</div>
                <div class="MovieSessions">
                     <ul>
                        <li>Wed - 12PM</li>
                        <li>Thu - 12PM</li>
                        <li>Fri - 12PM</li>
                        <li>Sat - 9PM</li>
                        <li>Sun - 9PM</li>
                    </ul>
                </div>
            </div>
            <div class="Movie">
                <img src='../../media/posters/girl_in_the_spiders_web.png' width='500' alt 'Girl In The Spiders Web movie poster' />
                <div class="MovieTitle">Girl In The Spiders Web</div>
                <div class="MovieRating">MA15+</div>
                <div class="MovieSessions">
                    <ul>
                        <li>Wed - 9PM</li>
                        <li>Thu - 9PM</li>
                        <li>Fri - 9PM</li>
                        <li>Sat - 6PM</li>
                        <li>Sun - 6PM</li>
                    </ul>
                </div>
            </div>
            <div class="Movie">
                <img src='../../media/posters/ralph_breaks_the_internet.png' width='500' alt 'Ralph Breaks The Internet movie poster' />
                <div class="MovieTitle">Ralph Breaks The Internet</div>
                <div class="MovieRating">PG</div>
                <div class="MovieSessions">
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
        </section>
        <section id='Synopsis'>
            <div class="MovieTitle">Girl In The Spiders Web</div>
            <div class="MovieRating">MA15+</div>
            <div class="MovieSynopsis">Lisbeth Salander, the cult figure and title character of the acclaimed Millennium book series created by Stieg Larsson, will return to the screen in The Girl in the Spider’s Web, a first-time adaptation of the recent global bestseller.  Golden Globe winner Claire Foy, the star of “The Crown,” will play the outcast vigilante defender under the direction of Fede Alvarez, the director of 2016’s breakout thriller Don’t Breathe; the screenplay adaptation is by Steven Knight and Fede Alvarez & Jay Basu.</div>
            <iframe class="MovieTrailer" width="560" height="315" src="https://www.youtube.com/embed/XKMSP9OKspQ?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="Book">Make a Booking:</div>
        </section>

        <section id='Booking'>
            <form action='https://titan.csit.rmit.edu.au/~e54061/wp/lunardo-formtest.php' method='post' target="_blank">
                <input type='hidden' name='movie[id]' value='ACT'/>
                <input type='hidden' name='movie[day]' value='MON'/>
                <input type='hidden' name='movie[hour]' value='09:00'/>
                <input type='hidden' name='movie[id]' value='1'/>
                Ticket Type:<select name='seat_list'>
                <option value=''>Please Select</option>
                    <optgroup label='Standard'>
                        <option value='seats[STA]'>Standard Adult</option>
                        <option value='seats[STA]'>Standard Concession</option>
                        <option value='seats[STC]'>Standard Child</option>
                    </optgroup>
                    <optgroup label='First Class'>
                        <option value='seats[FCA]'>First Class Adult</option>
                        <option value='seats[FCP]'>First Class Adult</option>
                        <option value='seats[FCC]'>First Class Child</option>
                    </optgroup>
                </select>
                <br>
                Name: <input type='text' name='cust[name]' value=''/><br>
                Email: <input type='email' name='cust[email]' value=''/><br>
                Mobile: <input type='tel' name='cust[mobile]' value=''/><br>
                Credit Card: <input type='text' name='cust[card]' value=''/><br>
                Expiry: <input type='month' name='cust[expiry]' value=''/><br>
                Order: <input type='submit' name='order' value='Order'/><br>
            </form>
        </section>
    </main>

    <footer>
        <div id=BusinessInfo>info@lunardocinema.com.au<br>
            1300 222 444<br>
            123 Main Street, Brisbane, Qld, 4000.<br>
        </div>
        <div>&copy;<script>
            document.write(new Date().getFullYear());
        </script>
        Christopher Bowe, S3666697, https://github.com/s3666697/wp. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
        <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
        <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>
