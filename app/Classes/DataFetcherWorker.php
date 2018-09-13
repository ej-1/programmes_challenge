<?php
  require 'vendor/autoload.php';
  require 'app/Classes/DataFileSaver.php';
  require 'app/Classes/DataFetcher.php';
  
  /*
  THIS IS HOW THE WORKER SHOULD BE CALLED. THIS SHOULD BE PUT IN APPRORIATE PLACE. SEE README.
  $url = 'https://rmp.files.bbci.co.uk/technical-test/source-data.json'; // should be further up somewhere 
  $client = new \GuzzleHttp\Client();

  $data_fetcher = new DataFetcher();
  $data_fetcher.set_client($client);
  
  $data_fetcher_worker = new DataFetcherWorker();
  $results = $data_fetcher_worker->fetchAndSave($data_fetcher, $url); // add real filepath here
  */

  class DataFetcherWorker {
    public function fetchAndSave($fetcher, $url) {
      $client = $fetcher->get_client();
      $result = $fetcher->fetch($client, $url);
      $text = $result->getBody();

      $DataFileSaver = new DataFileSaver($text, "./source-data.txt");
    }
  }
?>