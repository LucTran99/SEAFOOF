
<?php


require_once '../admin/template/layout/header.php';

$sql = getRows("SELECT posts.title as ptitle, content, picture, categories.title as ctitle FROM categories, posts WHERE posts.categoryid = categories.id");

?>

<div class="container-fluid">
    <h1 class="text-center text-uppercase mb-4">Danh sách tin tức</h1>

<!-- <div class="card shadow"> -->
<!-- <div class="card-body">
    <div class="table-responsive"> -->
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th>STT</th>
                            <th colspan="1">Tiêu đề</th>
                            <th>Ảnh đại diện</th>
                            <th>Nội dung</th>
                            <th>Chuyên mục</th>
                            <th width="5%">Sửa</th>
                            <th width="5%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count = 0;
                            foreach($sql as $item):
                            $count++;
                        ?>
                        <tr>
                            <td><?= $count; ?></td>
                            <td ><?= $item['ptitle']; ?></td>
                            <td><?=  anhdaidien( $item['picture'], '100px'); ?></td>
                            <td><?= $item['content']; ?></td>
                            <td><?= $item['ctitle']; ?></td>
                            <td><a href="" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                             <td><a href="" onclick=" return confirm('Bạn có chắc chắn muốn xóa')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>

                        <?php
                            endforeach;
                        ?>

                    </tbody>
                </table>
                
    <!-- </div> -->
<!-- </div> -->
<!-- </div> -->
    
</div>


<?php

require_once '../admin/template/layout/footer.php';

?>
