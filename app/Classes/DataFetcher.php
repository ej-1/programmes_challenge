<?php
    require 'vendor/autoload.php';

    class DataFetcher {
      var $client;

      function set_client($new_client) { // set the client to use. For, example $client = new \GuzzleHttp\Client();
        $this->client = $new_client;
      }

      function get_client() {
        return $this->client;
      }

      public function fetch($url) {
          $client = $this->client; // bit of duplication here.
          $res = $client->request('GET', $url);
          return $res;
      }
    }
?>