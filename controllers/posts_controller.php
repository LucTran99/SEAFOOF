


<!-- File này dùng để quản lí tin tức -->


<?php 
require_once('controllers/base_controller.php');
require_once('models/posts.php');

class PostsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'posts';
  }

  public function home()
  {
	$posts = Post::all();
    $data = array('posts' => $posts);
    $this->render('home', $data);
  }

  // Destination
  public function destination()
  {
	$posts = Post::all();
    $data = array('posts' => $posts);
    $this->render('destination', $data);

  }

  // travel-guides

  public function travelGuides(){
    $posts = Post::all();
    $data = array('posts' => $posts);
    $this->render('travelsGuides', $data);
  }


 public function testimonial(){
    $posts = Post::all();
    $data = array('posts' => $posts);
    $this->render('testimonial', $data);
  }

}