<html>
<head>
<title>���������ý��� - �������������� (�����׽�Ʈ����)</title>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">

</head>
</html>

<?

// �� ��������
$cno = $_POST['cno'];
$cash = $_POST['cash'];
$date = $_POST['date'];
$state = $_POST['state'];
$password = $_POST['password'];

// ������ ��й�ȣ Ȯ��
if ($password=="8137") {

// DB ����
include "account.php";

// DB ����
$dbconn = mysql_connect("$Host","$User","$Passwd") or die("�����ͺ��̽� ���ῡ �����Ͽ����ϴ�.");
$status = mysql_select_db("$DB_Name",$dbconn);

// �ߺ��˻�
$query = "select count(no) from coupon where cno='".$cno."'";
$result = mysql_query($query, $dbconn);
$col = mysql_fetch_row($result);

// �ߺ���ȣ�� �ƴ϶�� DB�� ���� 
if ($col[0]==0) {
	$query = "insert into coupon VALUES ('', '".$cno."' , '".$cash."' , '".$date."' , '".$state."' ,'0' ,'')"; 
	$result = mysql_query($query, $dbconn);
	echo("<script>window.alert('���������� �Ϸ�Ǿ����ϴ�.  ');location.href='create1.php';</script>");
exit;

 }

 // �ߺ���ȣ��� �ٽ�

else {
	echo("<script>window.alert('�ߺ��� ������ȣ�Դϴ�.  ');location.href='create1.php';</script>");
exit;

 }
 
}

else { 
sleep(3);
echo("<script>window.alert('�����ں�й�ȣ����  ');location.href='create1.php';</script>");
exit;
}

?>

