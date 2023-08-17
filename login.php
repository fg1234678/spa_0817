<?php
$userId = $_POST["id"];
$pwd = $_POST["pwds"];

//變數可以自己取 localhost 本機 root 最高權限
$serverName = "localhost";
$user = "root" ; 
$password = "";
$dbName = "js_09";

$conn = new mysqli($serverName, $user, $password,$dbName);

// if (!empty($conn ->connect_error ))
// {
//     die("資料庫連線錯誤".$conn->connect_error);
// }else{
//     echo("連線成功");
// }


//設定資料庫的字元為utf8,避免中文字出現亂碼
mysqli_query($conn,'SET NAMES utf8');


//select form member where userid = 'xxx' and pwd 'yyy'
// !!下列這種寫法容易遭受SQL injection(資料隱碼)攻擊,之後要改寫!!

//$sql ="SELECT * FROM member WHERE userId = '".$userId."'AND pwd ='".$pwd."'";
//單引號是SQL資料庫查詢的意思
$sql ="SELECT * FROM member WHERE userId = '" .$userId."'";

//執行資料表查詢 (SQL語法) 查詢 將結果存在result變數中
$result = mysqli_query($conn,$sql);


//如果有資料
if($result)
{
     if(mysqli_num_rows($result)>0)
     {
        //mysqli_fetch_assoc 查詢結果以陣列方式存在參數($row)裡面
        //mysqli_fetch_assoc =mysqli_fetch_array
        $row =mysqli_fetch_assoc($result);
        //輸入密碼與member資料表密碼欄位的值不同
        if($pwd != $row["pwd"])
        {
            echo("密碼錯誤");
        }
    
}else{
    echo("查無此帳號");
}
}else{
    echo("語法執行失敗");
}

?>