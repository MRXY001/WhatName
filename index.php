<?php
require 'public_module.php';
session_start();

if (!isset($_SESSION['user_id'])) {
	initUser();
} else { // 没有设置用户ID

}

function initUser($user_id = 1)
{
	$row = row("SELECT * from users ");
	if (!$row) die('无法找到用户信息') ;
	$_SESSION['user_id'] = $user_id;
	$_SESSION['username'] = $row['username'];
}

?>
<HTML>
<head>
	<title>显示页面</title>
	<link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.1/css/mdui.min.css">
	<script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.1/js/mdui.min.js"></script>
</head>
<body>
	hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh
</body>


</HTML>