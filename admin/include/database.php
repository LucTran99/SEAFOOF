

<?php


function query($sql, $data = [], $check = false){
    global $connect;
    $kq = false;
    try{

        $statement = $connect -> prepare($sql);

        if(!empty($data)){

          $kq =  $statement -> execute($data);

        }else{

            $kq = $statement -> execute();
        }



    }catch(Exception $ex){
        echo $ex -> getMessage(). '<br>';
        echo $ex -> getFile(). '<br>';
        echo $ex -> getLine();
        die();
    }


    if($check){
        return  $statement;
    }

return $kq;

}


function insert($table, $data){
    $arrayKeys = array_keys($data);

    $truong = implode(',', $arrayKeys);

    // ds Value

    $values  = ':'. implode(',:', $arrayKeys);


     // Inser into vào bảng nào, trường nào
     $sql = 'INSERT INTO '. $table . '('.$truong.')'.'VALUES('.$values.')';

     $kq =  query($sql, $data);
      return $kq;


}

// $sql = 'UPDATE sinhvien SET fullname = :fullname, age = :age WHERE id = :id';
function update($table, $data, $condition= ''){
    $update = '';

    foreach($data as $key => $values){
        $update .= $key . '= :' . $key . ',';
    }
    $update = trim($update, ',');

    if(!empty($condition)){
        $sql = "UPDATE " . $table  . " SET " . $update . " WHERE " . $condition;
    }else{
        $sql = "UPDATE " . $table  . " SET " . $update;
    }


    $kq =  query($sql, $data);
    return  $kq; 
}


function delete ($table, $condition = ''){

    if(!empty($condition)){
        $sql = "DELETE FROM " . $table . " WHERE " . $condition;
    }
    else{
        $sql = "DELETE FROM " . $table;
    }

    $kq =  query($sql);
    return  $kq; 
}


// Lấy nhiều dòng
function getRows($sql){
    $getRow = query($sql, '', true);

    if(is_object($getRow)){
     $stament =  $getRow -> fetchAll(PDO::FETCH_ASSOC);
    }

    return $stament;
}


// lấy 1 dòng
function oneRow($sql){
    $getRow = query($sql, '', true);

    if(is_object($getRow)){
     $stament =  $getRow -> fetch(PDO::FETCH_ASSOC);
    }

    return $stament;
}



  // Đếm số dòng dữ liệu
  function countRow($sql){
    $kq = query($sql, '', true);
      if(!empty($kq)){
       return $kq -> rowCount();
      }
   
      
  }