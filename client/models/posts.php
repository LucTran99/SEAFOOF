
<!-- Quản lí tin tức -->

<?php
require_once ('../client/models/category.php');
require_once ('../client/models/member.php');


class Post
{
  public $id;
  public $title;
  public $content;
  public $picture;
  public $datecreated ;
  public $createdby;
  public $categoryid;  // Một bài viết chỉ thuộc 1 category 

  public $category;
  public $member;

  function __construct($id, $title, $content, $picture, $datecreated, $createdby, $categoryid)
  {
    $this->id = $id;
    $this->title = $title;
    $this->content = $content;
    $this-> picture =  $picture;
    $this-> datecreated = date_create($datecreated);
    $this-> createdby =  $createdby;
    $this-> categoryid =  $categoryid;
    $this -> category= Category::get($categoryid);
    $this -> member= Member::get($createdby);
    
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM posts');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Post($item['id'], $item['title'], $item['content'],
       $item['picture'], $item['datecreated'], $item['createdby'], $item['categoryid']);
    }

    return $list;
  }
}