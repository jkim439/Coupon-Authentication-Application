<html>
<head>
<title>���������ý��� - ������������� (�����׽�Ʈ����)</title>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">

</head>
</html>

<?

// �� ��������
$no = $_GET['no'];
$cno1 = $_POST['cno1'];
$cno2 = $_POST['cno2'];
$cno3 = $_POST['cno3'];
$cno4 = $_POST['cno4'];
$password = $_POST['password'];

// ������ȣ �ռ�
$cno = "$cno1$cno2$cno3$cno4";

// ������ ��й�ȣ Ȯ��
if ($password=="8137") {

// DB ����
include "account.php";

// DB ����
$dbconn = mysql_connect("$Host","$User","$Passwd") or die("�����ͺ��̽� ���ῡ �����Ͽ����ϴ�.");
$status = mysql_select_db("$DB_Name",$dbconn);

// DB ����
$member = mysql_fetch_array(mysql_query("select * from member where no='$no'",$dbconn));

// No Ȯ��
if(!$no==$member[no]) {
echo("<script>window.alert('�����ͺ��̽��� ��ϵ��� ���� ȸ���Դϴ�.  ');</script>");
exit;
}
if(!$no) {
echo("<script>window.alert('�����ͺ��̽��� ��ϵ��� ���� ȸ���Դϴ�.  ');</script>");
exit;
}

// ��¥
$today = date("Ymd", mktime());

// ��������
$coupon = mysql_fetch_array(mysql_query("select * from coupon where cno='$cno'",$dbconn));

// ���� Ȯ��
if(!$coupon[cno]) {
echo("<script>window.alert('�ùٸ��� ���� �����Դϴ�.  ');location.href='reg1.php?no=$member[no]';</script>");
exit;
}
if($coupon[state]>0) {
echo("<script>window.alert('�̹� ��ϵ� �����Դϴ�.  ');location.href='reg1.php?no=$member[no]';</script>");
exit;
}
if($coupon[date]<$today) {
echo("<script>window.alert('��ȿ�Ⱓ�� ����� �����Դϴ�.  ');location.href='reg1.php?no=$member[no]';</script>");
exit;
}

// �������

  mysql_query("update member set cash=cash+$coupon[cash] where no='$member[no]'", $dbconn);
	mysql_query("update coupon set state=1 where no='$coupon[no]'", $dbconn);
	mysql_query("update coupon set regid='$member[id]' where no='$coupon[no]'", $dbconn);
	mysql_query("update coupon set regdate=$today where no='$coupon[no]'", $dbconn);
	echo("<script>window.alert('��������� �Ϸ�Ǿ����ϴ�.  ');location.href='info.php?no=$member[no]';</script>");

}

else { 
sleep(3);
echo("<script>window.alert('�����ں�й�ȣ����  ');location.href='reg1.php?no=<?=$member[no]?>';</script>");
exit;
}

?>

