
<?php


require_once '../admin/template/layout/header.php';


$listCat = getRows("SELECT * FROM categories");

if(isPost()){

    $filterALl = filter();


// UPLOAD FILE

// Đếm số lượng file được gửi đi: Sử dụng hàm count() để đếm số file được gửi từ form và lưu vào biến $countfiles.
$countfiles = count($_FILES['imgs']['name']);



$imgs = '';

for($i = 0; $i < $countfiles; $i++){


    // Lấy tên của file từ $_FILES['imgs']['name'][$i] và lưu vào biến $filename.
    $filename = $_FILES['imgs']['name'][$i];


    // Tạo đường dẫn mới cho file dựa trên thời gian hiện tại và tên file ban đầu, và lưu vào biến $location.
    $location = './assets/post-img/'. uniqid() . $filename;




    // Lấy phần mở rộng của file (extension) bằng hàm pathinfo() và lưu vào biến $extension.
    $extension = pathinfo($location, PATHINFO_EXTENSION);


    // Chuyển đổi phần mở rộng của file thành chữ thường bằng hàm strtolower().
    $extension = strtolower($extension);


    // kiểm tra phần mở rộng có thuộc trong ds mảng này không
    $validate = array('jpg', 'jpeg', 'png', 'pdf', 'doxt');

    $respone = 0;

    if(in_array(strtolower($extension), $validate)){  // Nếu có phần mở rộng trong mảng



// di chuyển file từ thư mục tạm thời (được lưu trong $_FILES['imgs']['tmp_name'][$i])
// vào thư mục uploads và cập nhật biến $imgs với đường dẫn của file đó.
        if(move_uploaded_file($_FILES['imgs']['tmp_name'][$i],$location)){

            // Xóa dấu ';' cuối cùng
                $imgs .= $location .';';

              
        }
    }


}

$imgs =  substr($imgs, 0, -1); 



$data = [

    'title' => $filterALl['title'],
    'picture' => $imgs,
    'content' => $filterALl['content'],
    
    'categoryId' => $filterALl['categories']

];


if($data){

    $sql = insert('posts', $data);

}else{
    echo 'Insert không thành công';
}









}


?>


<div class="container-fluid">
    <h1 class="text-center mb-3">Thêm mới tin tức</h1>
    <?php
        if(isset($inser)){
            echo '<div class="alert alert-success">';
            echo 'Thêm tin tức thành công';
            echo '</div>';

        }

    ?>
    <form action="" method="post"  enctype="multipart/form-data">

        <div class="form-group">
            <label for="">Tiêu đề</label>
            <input type="text" class="form-control" name="title" id="">
        </div>

        <div class="form-group">
            <label for="">Chọn hình đại diện</label>
            <input type="file" class="form-control" name="imgs[]" id="" multiple>
        </div>
        
        <div class="form-group">
            <label for="">Nội dung</label>
            <textarea type="text" class="form-control" name="content" id=""> </textarea>
        </div>

        <div class="form-group">
            <label for="">Các mục hải sản</label>
            <select name="categories" id="" class="form-control">


                <option value="">
                    Chọn mục hải sản:
                </option>
                <?php
                    if(!empty($listCat)):
                        foreach($listCat as $item):
                    
                ?>


                <option value="<?php echo $item['id'];?>">
                            <?php echo $item['title']?>
                </option>
                <?php
                     endforeach;
                endif;
                ?>

            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Tạo mới</button>
    </form>
</div>













<?php

require_once '../admin/template/layout/footer.php';
?>