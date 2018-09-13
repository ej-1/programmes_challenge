<?php namespace App\Classes;

class ProgrammeFinder {

  public function findProgrammes($file, $search) {
    $json = $this->readProgrammesDataFile($file);
    $programmes = $this->extractProgrammes($json);
    $titles = $this->extractSliceTitles($programmes); // => ['archersomnibusthe', 'archersthe']
    $matching_title_indexes = $this->matchTitles($titles, $search); // => [0, 7]
    $programmes = $this->findProgrammesByIndex($programmes, $matching_title_indexes);
    return $programmes;
  }

  private function readProgrammesDataFile($file) {
    $file = fopen($file, "r") or die("Unable to open file!");
    $string = fread($file,filesize("../app/Data/programme_source_data.txt"));
    $json_data = json_decode($string, true);
    return $json_data;
  }

  private function extractProgrammes($json_data) {
    $programmes = $json_data['atoz']['tleo_titles'];
    return $programmes;
  }

  private function extractSliceTitles($programmes) {
    $titles = array();
    $arrlength = count($programmes);

    for($x = 0; $x < $arrlength; $x++) {
      array_push($titles, $programmes[$x]['title']);
    }
    return $titles;
  }

  private function matchTitles($titles, $search) {
    $matching_title_indexes = array();
    $arrlength = count($titles);
    for($x = 0; $x < $arrlength; $x++) {
      if (strpos(strtolower($titles[$x]), strtolower($search)) !== false) { // change to true later.
        array_push($matching_title_indexes, $x); // HERE WE PUSH THE INDEX INSTEAD OF THE MATCHING TITLE.
      }
    }
    return $matching_title_indexes;
  }

  
  private function findProgrammesByIndex($programmes, $indexes) {
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
