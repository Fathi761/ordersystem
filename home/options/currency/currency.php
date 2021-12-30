<?php

session_start();
include "../../../login/login-system/connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['name'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="currency.css">
    <title>Currency</title>
</head>
<body>
<div class="container">
          <h3>Money Converter</h3>
          <div class="col-md-3"></div>
          <div class="col-md-6">
                  <form method="POST" action="">
                      <div class="form-inline">
                          <select name="val" class="form-control">
                              <option value="LBP">LBP</option>
                              <option value="USD">USD</option>
                          </select>
                          <input class="form-control" type="number" name="digit" required/>
                      </div>	
                      <br />
                      <div class="form-inline">
                          <label>Select Currency: </label>
                          <select name="currency" required="required" class="form-control">
                              <option value="">Select an option</option>
                              <option value="USD">USD</option>
                              <option value="Euro">Euro</option>
                              <option value="LBP">LBP</option>
                              <option value="Japanese Yen">Japanese Yen</option>
                          </select>
                          <br><br>
                          <button type="submit" name="convert" class="btn" >Convert</button>
                          <br>
                          <div class="result">
                            <?php require './convert.php'?>
                          </div>
                          
                      </div>	
                      
                  </form>
              </div>
        </div>
</body>
</html>







<?php

}else{
    header("Location: ../login/login.php");
    exit();
}
?>
