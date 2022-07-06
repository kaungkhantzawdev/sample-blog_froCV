<?php

//common start
function alert($data, $color="danger"){
    return "<p class='alert alert-$color p-2'>$data</p>";
};

function runQuery($sql){
    $conn = conn();
    if(mysqli_query($conn, $sql)){
        return true;
    }else{
       return die("Query Failed :".mysqli_error($conn));
    }
};

function redirect($lc){
    header("location:$lc");
};

function linkTo($lc){
    echo "<script>location.href='$lc'</script>";
};

function fetch($sql){
    $query = mysqli_query(conn(),$sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
};

function fetchAll($sql){
    $query = mysqli_query(conn(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        array_push($rows, $row);
    }
    return $rows;
};

function dateTime($timestamp, $format = "d-m-Y"){
    return date($format, strtotime($timestamp));
}

function countTotal($table, $condition=1){
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
    $total = fetch($sql);
    return $total['COUNT(id)'];
}

function short($str, $length = "50"){
    $strLength = strlen($str);
    if($strLength > 50){
        return substr($str, 0, $length)."...";
    }else{
        return $str;
    };
}

function textFilter($text){
    $one = trim($text);
    $two = htmlentities($one, ENT_QUOTES);
    $three = stripcslashes($two);
    return $three;
}

//common end

//auth start
function register(){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cfPassword = $_POST['cfPassword'];


    if($password == $cfPassword){
        $securePassword = password_hash("$password", PASSWORD_DEFAULT);
        $sqlInsert = "INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$securePassword')";
        if(runQuery($sqlInsert)){
            redirect("login.php");
        }
    }else{
        return alert("Must be same password & confirm password");
    }

};

function signIn(){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlShow = "SELECT * FROM `users` WHERE email='$email'";
    $query = mysqli_query(conn(), $sqlShow);
    $row = mysqli_fetch_assoc($query);
    if(!$row){
        return alert("Email or Password don't match.");
    }else{
        if(!password_verify($password, $row['password'])){
            return alert("Email or Password don't match.");
        }else{
            session_start();
            $_SESSION['user'] = $row;
            header("location:dashboard.php");

        }
    }



}

//auth end

//user start
function user($id){
    $sql = "SELECT * FROM users WHERE id = $id";
    return fetch($sql);
}

function users(){
    $sql = "SELECT * FROM users";
    return fetchAll($sql);
}
//user end


//category start

function categoryAdd(){
    $title = textFilter($_POST['title']);
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO categories (title, user_id) VALUES ('$title', '$user_id')";
    if(runQuery($sql)){
        linkTo('category_add.php');
    }
}

function category($id){
    $sql = "SELECT * FROM categories WHERE id = $id";
    return fetch($sql);
}

function categories(){
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}

function categoryDelete($id){
    $sql = "DELETE FROM categories WHERE id = $id";
    return runQuery($sql);
}

function categoryUpdate($id){
    $title = $_POST['title'];
    $sql = "UPDATE categories SET title = '$title' WHERE id = $id";
    return runQuery($sql);
}

function categoryPin($id){
    $sql = "UPDATE categories SET ordering=null ";
    runQuery($sql);

    $sql = "UPDATE categories SET ordering='1' WHERE id=$id";
    return runQuery($sql);
}

function categoryPinOut(){
    $sql = "UPDATE categories SET ordering=null ";
    return runQuery($sql);
}

//category end

//post start
function postAdd(){
    $title = textFilter($_POST['title']);
    $category_id = $_POST['category_id'];
    $description = textFilter($_POST['description']);
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO posts (title, description, user_id, category_id) VALUES ('$title', '$description', '$user_id', '$category_id')";
    If(runQuery($sql)){
        linkTo('post_add.php');
    }
}

function post($id){
    $sql = "SELECT * FROM posts WHERE id = $id";
    return fetch($sql);
}

function posts(){
    if($_SESSION['user']['role'] == 2 ){
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id = $current_user_id";
    }else{
        $sql = "SELECT * FROM posts";
    }
    return fetchAll($sql);
}

function postDelete($id){
    $sql = "DELETE FROM posts WHERE id = $id";
    return runQuery($sql);
}

function postUpdate(){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $des = $_POST['description'];
    $category_id = $_POST['category_id'];

    $sql = "UPDATE posts SET title = '$title', description = '$des', category_id = '$category_id'  WHERE id = $id";
    return runQuery($sql);

}

//post end

//viewer start
function viewRecord($userId, $postId, $device){
    $sql = "INSERT INTO viewers (user_id, post_id, device) VALUES ('$userId', '$postId', '$device')";
    return runQuery($sql);
}

function viewCountByPost($postId){
    $sql = "SELECT * FROM viewers WHERE post_id=$postId";
    return fetchAll($sql);
}

function viewPostByUser($userId){
    $sql = "SELECT * FROM viewers WHERE user_id=$userId";
    return fetchAll($sql);
}

function viewers(){
    $sql = "SELECT * FROM viewers ORDER BY id DESC";
    return fetchAll($sql);
}

//viewer end

//frontPanel start
function fPosts($order_by="id", $sort_by="DESC"){
    $sql = "SELECT * FROM posts ORDER BY $order_by $sort_by";
    return fetchAll($sql);
}
function fCategories(){
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}

function fPostCategories($category_id, $limit="9999", $post_id = 0){
    $sql = "SELECT * FROM `posts` WHERE id!=$post_id AND category_id = $category_id LIMIT $limit";
    return fetchAll($sql);
}

function forCatFront($category_id){
    $sql = "SELECT * FROM `posts` WHERE category_id = $category_id";
    return fetchAll($sql);
}

function fSearch($searchKey){
    $sql = "SELECT * FROM `posts` WHERE title LIKE '%$searchKey%' OR description LIKE '%$searchKey%'";
    return fetchAll($sql);
}

function fSearchByDate($start, $end){
    $sql = "SELECT * FROM `posts` WHERE created_at BETWEEN '$start' AND '$end' ";

    return fetchAll($sql);
}
//frontPanel start
//ads start
function adsAdd(){
    $owner = $_SESSION['user']['name'];
    $file = $_FILES['upload'];
    $tmpFile = $file['tmp_name'];
    $dir = "store/";
    $name = $_POST['title'];
    $photo = $file['name'].uniqid() ;
    $link = $_POST['link'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    move_uploaded_file($tmpFile, $dir.$photo);
    $sql = "INSERT INTO ads (owner_name, ads_name, photo, link, start,final ) VALUES ('$owner', '$name' ,'$photo', '$link', '$start', '$end')";
    return runQuery($sql);
}

function adsAll(){
    $sql = "SELECT * FROM ads";
    return fetchAll($sql);
}

function adsOne($id){
    $sql = "SELECT * FROM ads WHERE id=$id";
    return fetch($sql);
}

function ads(){
    $date = date("Y-m-d");
    $sql = "SELECT * FROM ads WHERE start >= '$date' AND final > '$date'";
    return fetchAll($sql);
}

function adsDelete($id){
    $sql = "DELETE FROM ads WHERE id=$id";
    return runQuery($sql);
}


function adsUpdate(){
    $id = $_POST['id'];
    $tmpFile = $_FILES['upload']['tmp_name'];
    $dir = "store/";
    $name = $_POST['title'];
    $photo = $_FILES['upload']['name'].uniqid() ;
    $link = $_POST['link'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    move_uploaded_file($tmpFile, $dir.$photo);
    $sql = "UPDATE ads SET ads_name = '$name', photo = '$photo', link = '$link' , start = '$start' , final = '$end' WHERE id = $id";
    return runQuery($sql);

}
//ads end

//wallet start
function transfer(){
    $from = $_SESSION['user']['id'];
    $to = $_POST['to_user'];
    $amount = $_POST['amount'];
    $des = $_POST['des'];

   if(user($from)['money'] >= $amount){
//    for from_user (-)
       $formUserDetail = user($from)['money'] - $amount;
       $sql = "UPDATE users SET money=$formUserDetail WHERE id=$from";
       mysqli_query(conn(),$sql);

//    for to_user (+)
       $toUserDetail = user($to)['money'] + $amount;
       $sql = "UPDATE users SET money=$toUserDetail WHERE id=$to";
       mysqli_query(conn(),$sql);

       $sql = "INSERT INTO transitions (from_user, to_user, amount, des) VALUES ('$from', '$to', '$amount', '$des')";
       runQuery($sql);
   }

}

function transition($id){
    $sql = "SELECT * FROM transitions WHERE id=$id";
    return fetch($sql);
}

function transitions(){
    $id = $_SESSION['user']['id'];
    $auth = $_SESSION['user']['role'];
   if($auth == 0){
       $sql = "SELECT * FROM transitions";
       return fetchAll($sql);
   }else{
       $sql = "SELECT * FROM transitions WHERE from_user=$id OR to_user=$id";
       return fetchAll($sql);
   }
}

//dashboard start

function dashboardPosts($limit = 99999999){
    if($_SESSION['user']['role'] == 2 ){
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id = $current_user_id ORDER BY id DESC LIMIT $limit";
    }else{
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit";
    }
    return fetchAll($sql);
}
//dashboard end
//wallet end
ini_set('display_errors', "1");
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);