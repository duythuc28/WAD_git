<!--
   StudentID: 101767225
   Student name: Duy Thuc Pham
   This file uses to create a Request page in which the user can create a new delivery request
-->
<?php
/**
 * This Utils class uses as helper class
 */
  class Utils {
    /**
     * This method uses to check the validation of date time
     * @param  integer  $day   The selection day
     * @param  integer  $month The selection month
     * @param  integer  $year  The selection year
     * @return boolean        true if valid
     */
    static function isValidDate($day, $month, $year) {
        $number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        return $day <=$number;
    }

    /**
     * This method uses to calculate the cost based on the package weight
     * @param  int $weight The weigh of package
     * @return double      The cost value
     */
    static function getCost($weight) {
      $cost = 10;
      // if ($weight !== "0-2") {
      //   $cost = (($weight - 2) * 2) + $cost;
      // }
      return (($weight - 2) * 2) + $cost;
    }

/**
 * This method uses to check if prefered is valid
 * @param  int  $hour   the prefered hour
 * @param  int  $minute the prefered time
 * @return boolean         true if time is valid in range 7:30 - 20:30
 */
    static function isValidPreferedTime($hour, $minute) {
      if ($hour == 7 && $minute <= 30) {
        return false;
      }
      if ($hour == 20 && $minute >= 30) {
        return false;
      }
      return true;
    }

/**
 * This method uses to generate random number
 * @return int random number
 */
    static function generate_number() {
        return rand(1000000,9999999);
    }

/**
 * This method uses to generate date time
 * @param  int $day     The day of
 * @param  [type] $month   [description]
 * @param  [type] $year    [description]
 * @param  [type] $hour    [description]
 * @param  [type] $minutes [description]
 * @return [type]          [description]
 */
    static function makeDateTime($day,$month, $year, $hour, $minutes) {
      return new DateTime("{$year}-{$month}-{$day} {$hour}:{$minutes}:00");
    }
  }
?>
