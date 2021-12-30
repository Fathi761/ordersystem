<?php
    if(ISSET($_POST['convert'])){
        $val = $_POST['val'];
        $digit = $_POST['digit'];
        $currency = $_POST['currency'];
 
 
        if($val=="LBP" && $currency=="USD"){
            $output = $digit / 20000;
            echo"<center><label class='text-success' style='font-size:25px;'>$".$output."</label></center>";
        }else if($val=="LBP" && $currency=="Euro"){
            $output = $digit * 22000;
            echo"<center><label class='text-success' style='font-size:25px;'>€".$output."</label></center>";
        }else if($val=="LBP" && $currency=="LBP"){
            $output = $digit;
            echo"<center><label class='text-success' style='font-size:25px;'>L.L".$output."</label></center>";
        }else if($val=="LBP" && $currency=="Japanese Yen"){
            $output = $digit * 10000;
            echo"<center><label class='text-success' style='font-size:25px;'>¥".$output."</label></center>";
        }else if($val=="USD" && $currency=="USD"){
            $output = $digit;
            echo"<center><label class='text-success' style='font-size:25px;'>$".$output."</label></center>";
        }else if($val=="USD" && $currency=="Euro"){
            $output = $digit*0.89;
            echo"<center><label class='text-success' style='font-size:25px;'>€".$output."</label></center>";
        }else if($val=="USD" && $currency=="LBP"){
            $output = 20000 * $digit;
            echo"<center><label class='text-success' style='font-size:25px;'>L.L".$output."</label></center>";
        }else if($val=="USD" && $currency=="Japanese Yen"){
            $output = $digit*107.72;
            echo"<center><label class='text-success' style='font-size:25px;'>¥".$output."</label></center>";
        }
    }
?>