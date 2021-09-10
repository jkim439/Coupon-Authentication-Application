<html>
<head>
<title>쿠폰인증시스템 - 쿠폰등록페이지 (알파테스트버전)</title>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">

</head>
</html>

<?

// 값 가져오기
$no = $_GET['no'];
$cno1 = $_POST['cno1'];
$cno2 = $_POST['cno2'];
$cno3 = $_POST['cno3'];
$cno4 = $_POST['cno4'];
$password = $_POST['password'];

// 쿠폰번호 합성
$cno = "$cno1$cno2$cno3$cno4";

// 관리자 비밀번호 확인
if ($password=="8137") {

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

// 날짜
$today = date("Ymd", mktime());

// 쿠폰정보
$coupon = mysql_fetch_array(mysql_query("select * from coupon where cno='$cno'",$dbconn));

// 쿠폰 확인
if(!$coupon[cno]) {
echo("<script>window.alert('올바르지 못한 쿠폰입니다.  ');location.href='reg1.php?no=$member[no]';</script>");
exit;
}
if($coupon[state]>0) {
echo("<script>window.alert('이미 등록된 쿠폰입니다.  ');location.href='reg1.php?no=$member[no]';</script>");
exit;
}
if($coupon[date]<$today) {
echo("<script>window.alert('유효기간이 만료된 쿠폰입니다.  ');location.href='reg1.php?no=$member[no]';</script>");
exit;
}

// 쿠폰등록

  mysql_query("update member set cash=cash+$coupon[cash] where no='$member[no]'", $dbconn);
	mysql_query("update coupon set state=1 where no='$coupon[no]'", $dbconn);
	mysql_query("update coupon set regid='$member[id]' where no='$coupon[no]'", $dbconn);
	mysql_query("update coupon set regdate=$today where no='$coupon[no]'", $dbconn);
	echo("<script>window.alert('쿠폰등록이 완료되었습니다.  ');location.href='info.php?no=$member[no]';</script>");

}

else { 
sleep(3);
echo("<script>window.alert('관리자비밀번호오류  ');location.href='reg1.php?no=<?=$member[no]?>';</script>");
exit;
}

?>

