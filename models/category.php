
<!-- Quản lí chuyên mục -->

<?php
class Category
{
  public $id;
  public $title;
  

  function __construct($id, $title)
  {
    $this->id = $id;
    $this->title = $title;
   
  }


  // Lấy hết dữ liệu
  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM categories');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Category($item['id'], $item['title']);
    }

    return $list; // Trả về tất cả loại(catogory) trong csdl
  }


  // Lấy 1 dòng dữ liệu
  static function get($id){
    $db = DB:: getInstance();
    $req = $db-> query("SELECT * FROM categories WHERE id =". $id);
    foreach($req-> fetchAll() as $item){
      return new Category($item['id'], $item['title']);
    }
  }
}

