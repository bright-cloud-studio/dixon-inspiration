<?php

  class InspirationRunonceJobTemp extends Controller
  {
      public function __construct()
      {
          parent::__construct();
          $this->import('Files');
      }
      public function run()
      {
          
      }
  }
  
  $objInspirationRunonceJob = new GlideRunonceJobTemp();
  $objInspirationRunonceJob->run();

?>
