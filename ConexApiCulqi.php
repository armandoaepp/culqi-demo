<?php
class ConexApiCulqi
{
  private $secret_api_key;

  function __construct()
  {
    $this->secret_api_key = "sk_test_ptLxMqh1locyAIdu"; // sk_live_owBKP67R19mSTEXw /prod-dev/ sk_test_kHQSs2nOTkuAshfa
  }

  public function dev_key(){
    $key = $this->secret_api_key;
    return $key;
  }
}