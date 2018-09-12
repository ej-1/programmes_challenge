<?php
  // is set - https://www.w3resource.com/php/function-reference/isset.php
  if (isset($_GET['query'])) {
      $query = $_GET['query'];
      //echo $query;

      // https://www.w3schools.com/php/php_file_open.asp
      $myfile = fopen("./source-data.txt", "r") or die("Unable to open file!");

      // https://www.tutorialrepublic.com/php-tutorial/php-json-parsing.php
      $data = fread($myfile,filesize("source-data.txt"));
      //$arr = var_dump(json_decode($data, true));
      $arr = json_decode($data, true);
      echo 'look here';
      // HOW TO PRINT ARRAY https://stackoverflow.com/questions/20017409/how-to-solve-php-error-notice-array-to-string-conversion-in
      print_r($arr['atoz']['tleo_titles'][0]['slice_title']);
      $titles = $arr['atoz']['tleo_titles'];


      
      // for autosuggests
      // extract all tleo_titles when source-data is first gotten and save to separate file.
      // the JSON should have the slice_title as key and the index in the source data array
      // as value, unless using hash some how is more efficient.
      // lets call it $slice_title_lookup

      //$slice_title_lookup = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
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

      // for each keypress send a request that iterates over $slice_title_lookup to find slice_titles containing the array.
      // use the index to find it in source data
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

      //$json[0];


      //fclose($myfile);
  } else {
      // Fallback behaviour goes here
  }
?>