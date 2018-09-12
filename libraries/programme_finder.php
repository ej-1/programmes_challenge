<?php

class ProgrammeClass {

  public function readProgrammesData() {
    // https://www.w3schools.com/php/php_file_open.asp
    $file = fopen("./source-data.txt", "r") or die("Unable to open file!");

    // https://www.tutorialrepublic.com/php-tutorial/php-json-parsing.php
    $string = fread($file,filesize("source-data.txt"));
    //$arr = var_dump(json_decode($data, true));
    $data = json_decode($string, true);
    return $data;
  }

  public function extractTitles($data) {
    //echo 'look here';
    // HOW TO PRINT ARRAY https://stackoverflow.com/questions/20017409/how-to-solve-php-error-notice-array-to-string-conversion-in
    //print_r($arr['atoz']['tleo_titles'][0]['slice_title']);
    $titles = $arr['atoz']['tleo_titles'];
    return $titles;
  }


  public function extractSliceTitles($titles) {
    $slice_title_lookup = array();
    $arrlength = count($titles);

    for($x = 0; $x < $arrlength; $x++) {
      // PUSH https://www.w3schools.com/php/func_array_push.asp
      //array_push($slice_title_lookup, $titles[$x]['slice_title'], $x);
      array_push($slice_title_lookup, $titles[$x]['slice_title']);
      print_r($titles[$x]['slice_title']);
        echo "<br>";
    }

    print_r($slice_title_lookup);
    return slice_title_lookup;
  }

  public function matchTitles() {
    echo "matches ";
    $matching_titles = array();
    $arrlength = count($slice_title_lookup);
    for($x = 0; $x < $arrlength; $x++) {
      // PUSH https://www.w3schools.com/php/func_array_push.asp
      //array_push($slice_title_lookup, $titles[$x]['slice_title'], $x);
      echo "<br>";
      //print_r($slice_title_lookup[$x]);
      echo "<br>";
      //echo $query;
      if (strpos($slice_title_lookup[$x], $query) !== false) { // change to true later.
        echo "IT IS TRUE";
        array_push($matching_titles, $slice_title_lookup[$x]);
      }
    }
    echo "<br>";
    echo "THE RESULT";
    print_r($matching_titles);
    echo "<br>";
    echo strpos("thearchers", "archer");
    echo "SEVENS";
    echo strpos("I love php, I love php too!","php");
    return $matching_titles;
  }

  
  public function findProgrammes($matching_titles) {
    $matching_programmes = array();
    $arrlength = count($matching_titles);
    for($x = 0; $x < $arrlength; $x++) {
      $matching_programme = findProgramme($matching_titles[$x]); // add fail gaurd later
      array_push($matching_titles, $matching_programme);
    }
    return $matching_programmes;
  }

  public function findProgramme($programmes_data, $titles) {
    $programmes = array();
    $arrlength = count($titles);
    for($x = 0; $x < $arrlength; $x++) {
      $programme = $title
      array_push($matching_titles, $programme);
    }
  }

}

?>


