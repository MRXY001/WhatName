<?php
require 'public_module.php';
session_start();

if (!isset($_SESSION['user_id']))
{
	header("Location: index.php"); // �ض��򵽵�¼ҳ��
	exit; // ȷ�������Ĵ��벻�ᱻִ��
}
$user_id = $_SESSION['user_id'];
$type = seize('type');
$brief = seize('brief');
$wage = seize('wage');
$require = seize('require');
$contact = seize('contact');
$linkman = seize('linkman');

$sql = "INSERT INTO parttimes (user_id,type,brief,wage,`require`,contact,linkman) values ('$user_id', '$type', '$brief', '$wage', '$require', '$contact', '$linkman')";
$result = query2($sql, 0);

echo "��ӳɹ�";


