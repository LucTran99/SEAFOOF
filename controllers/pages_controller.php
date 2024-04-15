<?php

// Pages_controller.php

require_once('controllers/base_controller.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    $data = array(
      'name' => 'Sang Beo',
      'age' => 22
    );
    $this->render('home', $data);
  }



  public function about()
  {
	  $this->render('about');
  
  }



  // Services
  public function services()
  {
	  $this->render('services');
  
  }



  public function news()
  {
	  $this->render('news');
  
  }



  public function contact()
  {
	  $this->render('contact');
  
  }









  public function error()
  {
    $this->render('error');
  }
}