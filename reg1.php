<html>
<head>
<title>���������ý��� - ������������� (�����׽�Ʈ����)</title>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">

<?

// �� ��������
$no = $_GET['no'];

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

?>

<script type="text/javascript">
	function check() {
		if(!document.reg.cno1.value) {alert("������ȣ�� �Է��Ͽ� �ֽʽÿ�.  "); document.reg.cno1.focus(); return false;}
		if(!document.reg.cno2.value) {alert("������ȣ�� �Է��Ͽ� �ֽʽÿ�.  "); document.reg.cno2.focus(); return false;}
		if(!document.reg.cno3.value) {alert("������ȣ�� �Է��Ͽ� �ֽʽÿ�.  "); document.reg.cno3.focus(); return false;}
		if(!document.reg.cno4.value) {alert("������ȣ�� �Է��Ͽ� �ֽʽÿ�.  "); document.reg.cno4.focus(); return false;}
		if(!document.reg.password.value) {alert("��й�ȣ�� �Է��Ͽ� �ֽʽÿ�.  "); document.reg.password.focus(); return false;}
		if(document.reg.password.value.length<4) {alert("��й�ȣ�� �ùٸ��� �Է��ϼ���.  "); document.reg.password.focus(); return false;}
		}
		function noonly1() {
		if (event.keyCode >= 48) {
		return true;
		} else {
		event.returnValue = false;
	}
	}
	function noonly2() {
		if (event.keyCode >= 48 && event.keyCode <= 57) {
		return true;
		} else {
		event.returnValue = false;
	}
	}

</script>

</head>
<body onload="document.reg.cno1.focus();">

<p><b>���������ý��� - ������������� (�����׽�Ʈ����)</b></p>
<form name="reg" action="reg2.php?no=<?=$member[no]?>" method="post" onsubmit="return check();">
    <p>������ȣ : &nbsp;<input type="text" name="cno1" maxlength="4" size="6" onKeyPress="noonly1(this);" style="ime-mode:disabled;">&nbsp;-&nbsp;<input type="text" name="cno2" maxlength="4" size="6" onKeyPress="noonly1(this);" style="ime-mode:disabled;">&nbsp;-&nbsp;<input type="text" name="cno3" maxlength="4" size="6" onKeyPress="noonly1(this);" style="ime-mode:disabled;">&nbsp;-&nbsp;<input type="text" name="cno4" maxlength="4" size="6" onKeyPress="noonly1(this);" style="ime-mode:disabled;"></p>
    <p>
    <p>
��й�ȣ : &nbsp;<input type="password" name="password" maxlength="4" size="10" onKeyPress="noonly2(this);" style="ime-mode:disabled;">
</p>
    <p>
<input type="submit" value=" ������� ">&nbsp;&nbsp;<input type="button" onclick="location.href='info.php?no=<?=$member[no]?>'" value=" �� �� ">
</p>
</form>
</body>

</html>
<?
mysql_close($dbconn);
?>