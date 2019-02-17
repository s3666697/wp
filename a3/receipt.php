<?php
    require_once("tools.php");
?>
<!DOCTYPE html>
<html lang='en' class='Receipt'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 3</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.css">
    <script src='../wireframe.js'></script>
  </head>

    <body class='Receipt'>
        <section class='Receipt' id='ReceiptHeader'>
            <!--Image sourced from: https://www.designevo.com/apps/logo/?name=black-and-white-projector-->
            <img class='logo' src='../../media/lunardo-cinema-logo.png' width='100'  alt='Lunardo Cinema Logo'/>
            <div class='ReceiptLetterhead'>
                Lundaro Cinema<br>
                ABN: 00 123 456 789<br>
                <a href="mailto:info@lunardocinema.com.au?Subject=Website%20Enquiry" target="_top">info@lunardocinema.com.au</a><br>
                1300 222 444<br>
                123 Main Street, Brisbane, Qld, 4000.<br>
                <br>
            </div>
        </section>

        <section class='Receipt' id='ReceiptCustomers'>
            <?php
                printCustomerDetails();
            ?>
        </section>

        <section class='Receipt' id='ReceiptMovies'>
            <?php
                printMovieDetails();
            ?>
        </section>

        <section class='Receipt' id='ReceiptTicketsIndividual'>
            <?php
                printIndividualTicket();
            ?>
        </section>

        <section class='Receipt' id='ReceiptTicketsGroup'>
            <?php
                printGroupTicket();
            ?>
        </section>
    <br><br>
    </body>
</html>
