


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
}