<?php
include "../../login/login-system/connection.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tables.css">
    <title>Tables</title>
</head>
<body>
<marquee behavior="scroll" direction="left" style="color: #000">Techno plus POS is a software company offering high quality POS solutions for Restaurants and Retail business sector.
  Head office Shwayfat runway center next byblos bank Contact @ 03 151 150</marquee>
<a href="../home.php" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i> Back to Home</a>
<section class="tables" id="tables">
    
    <h1 class="heading"> <span> Tables </span> </h1>
    
    <ul class="controls">
        <li class="buttons button-active" data-filter="all">All Tables</li>
        <li class="buttons" data-filter="tablea">Table A</li>
        <li class="buttons" data-filter="tableb">Table B</li>
        <li class="buttons" data-filter="tablec">Table C</li>
        <li class="buttons" data-filter="tabled">Table D</li>
    </ul>
    
    <div class="image-container">
    
        <div class="image tablea">
            <a href="./tablea/table1/table1.php" class="btn btn-info">Table 1</a>
        </div>
        <div class="image tablea">
            <a href="./tablea/table2/table2.php" class="btn btn-info">Table 2</a>
        </div>
        <div class="image tablea">
            <a href="./tablea/table3/table3.php" class="btn btn-info">Table 3</a>
        </div>
    
        <div class="image tableb">
            <a href="./tableb/table11/table11.php" class="btn btn-info">Table 11</a>
        </div>
        <div class="image tableb">
            <a href="./tableb/table12/table12.php" class="btn btn-info">Table 12</a>
        </div>
        <div class="image tableb">
            <a href="./tableb/table13/table13.php" class="btn btn-info">Table 13</a>
        </div>
    
        <div class="image tablec">
            <a href="./tablec/table21/table21.php" class="btn btn-info">Table 21</a>
        </div>
        <div class="image tablec">
            <a href="./tablec/table22/table22.php" class="btn btn-info">Table 22</a>
        </div>
    
        <div class="image tablec">
            <a href="./tablec/table23/table23.php" class="btn btn-info">Table 23</a>
        </div>
    
    </div>   
</section>
    <script>
        $(document).ready(function(){
            $('.controls .buttons').click(function(){

                $(this).addClass('button-active').siblings().removeClass('button-active');

                let filter = $(this).attr('data-filter');
                if(filter == 'all'){
                    $('.tables .image').show(400);
                }else{
                    $('.tables .image').not('.'+filter).hide(200);
                    $('.tables .image').filter('.'+filter).show(400);
                }

            });

        });
    </script>
</body>
</html>