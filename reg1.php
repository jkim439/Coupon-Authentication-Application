<html>
<head>
<title>쿠폰인증시스템 - 쿠폰등록페이지 (알파테스트버전)</title>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">

<?

// 값 가져오기
$no = $_GET['no'];

// DB 연결
include "account.php";

// DB 접속
$dbconn = mysql_connect("$Host","$User","$Passwd") or die("데이터베이스 연결에 실패하였습니다.");
$status = mysql_select_db("$DB_Name",$dbconn);

// DB 선택
$member = mysql_fetch_array(mysql_query("select * from member where no='$no'",$dbconn));

// No 확인
if(!$no==$member[no]) {
echo("<script>window.alert('데이터베이스에 등록되지 않은 회원입니다.  ');</script>");
exit;
}
if(!$no) {
echo("<script>window.alert('데이터베이스에 등록되지 않은 회원입니다.  ');</script>");
exit;
}

?>

<script type="text/javascript">
	function check() {
		if(!document.reg.cno1.value) {alert("쿠폰번호를 입력하여 주십시오.  "); document.reg.cno1.focus(); return false;}
		if(!document.reg.cno2.value) {alert("쿠폰번호를 입력하여 주십시오.  "); document.reg.cno2.focus(); return false;}
		if(!document.reg.cno3.value) {alert("쿠폰번호를 입력하여 주십시오.  "); document.reg.cno3.focus(); return false;}
		if(!document.reg.cno4.value) {alert("쿠폰번호를 입력하여 주십시오.  "); document.reg.cno4.focus(); return false;}
		if(!document.reg.password.value) {alert("비밀번호를 입력하여 주십시오.  "); document.reg.password.focus(); return false;}
		if(document.reg.password.value.length<4) {alert("비밀번호를 올바르게 입력하세요.  "); document.reg.password.focus(); return false;}
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

<p><b>쿠폰인증시스템 - 쿠폰등록페이지 (알파테스트버전)</b></p>
<form name="reg" action="reg2.php?no=<?=$member[no]?>" method="post" onsubmit="return check();">
    <p>쿠폰번호 : &nbsp;<input type="text" name="cno1" maxlength="4" size="6" onKeyPress="noonly1(this);" style="ime-mode:disabled;">&nbsp;-&nbsp;<input type="text" name="cno2" maxlength="4" size="6" onKeyPress="noonly1(this);" style="ime-mode:disabled;">&nbsp;-&nbsp;<input type="text" name="cno3" maxlength="4" size="6" onKeyPress="noonly1(this);" style="ime-mode:disabled;">&nbsp;-&nbsp;<input type="text" name="cno4" maxlength="4" size="6" onKeyPress="noonly1(this);" style="ime-mode:disabled;"></p>
    <p>
    <p>
비밀번호 : &nbsp;<input type="password" name="password" maxlength="4" size="10" onKeyPress="noonly2(this);" style="ime-mode:disabled;">
</p>
    <p>
<input type="submit" value=" 쿠폰등록 ">&nbsp;&nbsp;<input type="button" onclick="location.href='info.php?no=<?=$member[no]?>'" value=" 취 소 ">
</p>
</form>
</body>

</html>
<?
mysql_close($dbconn);
?>