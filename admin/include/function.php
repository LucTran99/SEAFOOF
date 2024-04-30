<?php




function anhdaidien ($arrStr, $height){
    $arr = explode( ';',$arrStr);
    return "<img src='$arr[0]' height='$height'/>";
}


// ../assets/post-img/


function isPost(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        return true;
    }
    return false;
}
function isGet(){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        return true;
    }
    return false;
}




function filter(){


    $filterArr = [];

    if(isGet()){

    

        if(!empty($_GET)){  // Nếu request là GET và không rỗng

            foreach($_GET as $key => $value){

              
                $key = strip_tags($key);
                
                if(is_array($value)){
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);  
                }else{
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);  
                }

                // để lấy giá trị của mỗi tham số GET, lọc nó với các bộ lọc FILTER_SANITIZE_SPECIAL_CHARS

            }
        }
    }
    // Như phương thức Get
    if(isPost()){

    

        if(!empty($_POST)){  // Nếu request là GET và không rỗng

            foreach($_POST as $key => $value){

              
                $key = strip_tags($key);
                
                if(is_array($value)){
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);  
                }else{
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);  
                }

                // để lấy giá trị của mỗi tham số GET, lọc nó với các bộ lọc FILTER_SANITIZE_SPECIAL_CHARS

            }
        }
    }

    return $filterArr;


}
