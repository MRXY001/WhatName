<?php
require 'public_module.php';

// ʹ�� session
session_start();

if (!isset($_SESSION['user_id']))
{
	header("Location: index.php"); // �ض��򵽵�¼ҳ��
	exit; // ȷ�������Ĵ��벻�ᱻִ��
}

// ��ȡ����ֵ
$user_id = $_SESSION['user_id'];
$type = seize('type');
$title = seize('title');
$brief = seize('brief');
$wage = seize('wage');
$require = seize('require');
$contact = seize('contact');
$linkman = seize('linkman');
$time = time();

if ($title == '' || $brief == '')
	exit;

// ��ȡͼƬ��Ϣ����һ���У�����Ҳ��ȷ����
$photo_count = 0;
if (isset($_FILES['photo1']) && is_uploaded_file($_FILES['photo1']['tmp_name']))
{
	$photo_count++;
	$p = $_FILES['photo1'];
	$p_name = $p['name'];
	$p_type = $p['type'];
	$p_size = $p['size'];
	$p_tmp = $p['tmp_name'];

	if ($p_size > 1024 * 1024 * 10) // ��Ƭ̫����
		die('��Ƭ��С���ó���10M');
	if ($p_type == 'image/jpeg'
		|| $p_type == 'image/jpg'
		|| $p_type == 'image/png'
		|| $p_type == 'image/gif') ;
	else
		die('ֻ֧�֣�jpg/png/gif ͼƬ');
}
else
{
	$p = NULL;
}
// ���뵽���ݿ���
$sql = "INSERT INTO parttimes (user_id,type,title,brief,wage,photos,`require`,contact,linkman,create_time) values ('$user_id', '$type', '$title', '$brief', '$wage', '$photo_count','$require', '$contact', '$linkman', '$time')";
$result = query2($sql, 0);

echo "publish success!";

// ��Ƭ��ʽ��pphotos/parttime_id.postfix
if ($p != NULL)
{
	$sql = "SELECT * FROM parttimes where user_id = '$user_id' and create_time = '$time'";
	$row = row($sql);
	$parttime_id = $row['parttime_id'];
	$p_new = $parttime_id . '_' . '1';
	move_uploaded_file($p_tmp, 'pphotos/' . $p_new . '.jpg');
}