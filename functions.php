
<?php

//checks what day it is today and stores day as string in variable
function what_day_is_it(){
    $jd = cal_to_jd(CAL_GREGORIAN,date("m"),date("d"),date("Y"));
    return (jddayofweek($jd,1));
  }
  $today_is = what_day_is_it();


  //uses variable with return from function, and price of product as params, calculates price if day matches
  function check_prices($price, $day) {
    if ($day == "Monday") {
        return ($price / 2);
    } else if ($day == "Wednesday") {
        return ($price * 1.1);
    } else if ($price > 200 && $day == "Friday") {
        return ($price - 20);
    } else {
        return $price;
    }
}


  ?>