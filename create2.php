<html>
<head>
<title>쿠폰인증시스템 - 쿠폰생성페이지 (알파테스트버전)</title>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">

</head>
</html>

<?

// 값 가져오기
$cno = $_POST['cno'];
$cash = $_POST['cash'];
$date = $_POST['date'];
$state = $_POST['state'];
$password = $_POST['password'];

// 관리자 비밀번호 확인
if ($password=="8137") {

// DB 연결
include "account.php";

// DB 접속
$dbconn = mysql_connect("$Host","$User","$Passwd") or die("데이터베이스 연결에 실패하였습니다.");
$status = mysql_select_db("$DB_Name",$dbconn);

// 중복검사
$query = "select count(no) from coupon where cno='".$cno."'";
$result = mysql_query($query, $dbconn);
$col = mysql_fetch_row($result);

// 중복번호가 아니라면 DB에 넣음 
if ($col[0]==0) {
	$query = "insert into coupon VALUES ('', '".$cno."' , '".$cash."' , '".$date."' , '".$state."' ,'0' ,'')"; 
	$result = mysql_query($query, $dbconn);
	echo("<script>window.alert('쿠폰생성이 완료되었습니다.  ');location.href='create1.php';</script>");
exit;

 }

 // 중복번호라면 다시

else {
	echo("<script>window.alert('중복된 쿠폰번호입니다.  ');location.href='create1.php';</script>");
exit;

 }
 
}

else { 
sleep(3);
echo("<script>window.alert('관리자비밀번호오류  ');location.href='create1.php';</script>");
exit;
}

?>

