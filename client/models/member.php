
<!-- Quản lí thành viên -->

<?php
class Member
{
  public $id;
  public $name;
  

  function __construct($id, $name)
  {
    $this->id = $id;
    $this->name = $name;
   
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM member');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Member($item['id'], $item['name']);
    }

    return $list; // Trả về tất cả loại(catogory) trong csdl
  }


  
  static function get($id){
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM member where id='.$id);
    $item= $req->fetch();
   return new Member($item['id'], $item['name']);
  }
}