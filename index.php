<?php
<<<<<<< HEAD
require "public_module.php";

/*$mysql_server_name='localhost'; //改成自己的mysql数据库服务器
$mysql_username="root"; //改成自己的mysql数据库用户名
$mysql_password="root"; //改成自己的mysql数据库密码
$mysql_database="test"; //改成自己的mysql数据库名
$conn=new mysqli($mysql_server_name,$mysql_username,$mysql_password); //连接数据库
if($conn==false) {echo "数据连接失败！<br/>"; }
else {echo "数据连接成功！<br/>"; }

$conn->select_db($mysql_database); //打开数据库*/
// $conn->query("set names 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致
/*$sql ="select * from biao"; //SQL语句
$result = $conn->query($sql); //查询成功
$data=array();

while ($tmp=$result->fetch_assoc())
{
    // $data[]=$tmp;
    echo $tmp['name'] . "<br/>";
}
*/


$sql = 'select * from biao';
var_dump(select($sql));

=======

require "public_module.php";

$sql = "INSERT INTO biao (`name`) values ('newname')";
// $sql = "SELECT * from biao";

// $con = mysqli_connect("localhost", "root", "root");
// mysqli_select_db("test", $con);

query($sql);
>>>>>>> 7db7a4967f8adffa01ee200c6dca20b3af8795c8
