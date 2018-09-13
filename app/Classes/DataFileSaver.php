<?php
  class DataFileSaver {
    public function fetch($text, $file) {
      $file = fopen($file, "w") or die("Unable to open file!"); // Not sure about the error handling for PHP.
      fwrite($file, $text);
      fclose($file);
    }
  }
?>