<?php namespace App\Classes;

class ProgrammeFinder {

  public function findProgrammes($file, $search) {
    $json = $this->readProgrammesDataFile($file);
    $programmes = $this->extractProgrammes($json);
    $slice_titles = $this->extractSliceTitles($programmes); // => ['archersomnibusthe', 'archersthe']
    $matching_title_indexes = $this->matchTitles($slice_titles, $search); // => [0, 7]
    $programmes = $this->findProgrammesByIndex($programmes, $matching_title_indexes);
    return $programmes;
  }

  public function readProgrammesDataFile($file) {
    $file = fopen("../app/Data/programme_source_data.txt", "r") or die("Unable to open file!");
    $string = fread($file,filesize("../app/Data/programme_source_data.txt"));
    $json_data = json_decode($string, true);
    return $json_data;
  }

  public function extractProgrammes($json_data) {
    $programmes = $json_data['atoz']['tleo_titles'];
    return $programmes;
  }

  public function extractSliceTitles($programmes) {
    $slice_titles = array();
    $arrlength = count($programmes);

    for($x = 0; $x < $arrlength; $x++) {
      array_push($slice_titles, $programmes[$x]['slice_title']);
    }
    return $slice_titles;
  }

  public function matchTitles($slice_titles, $search) {
    $matching_title_indexes = array();
    $arrlength = count($slice_titles);
    for($x = 0; $x < $arrlength; $x++) {
      if (strpos($slice_titles[$x], $search) !== false) { // change to true later.
        array_push($matching_title_indexes, $x); // HERE WE PUSH THE INDEX INSTEAD OF THE MATCHING TITLE.
      }
    }
    return $matching_title_indexes;
  }

  
  public function findProgrammesByIndex($programmes, $indexes) {
    $matching_programmes = array();
    $arrlength = count($indexes);

    for($x = 0; $x < $arrlength; $x++) {
      $matching_programme = $programmes[$indexes[$x]];
      array_push($matching_programmes, $matching_programme);
    }
    return $matching_programmes;
  }
}

?>
