<html>
<head>
<title>쿠폰인증시스템 - 회원정보페이지 (알파테스트버전)</title>
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

// 등록한 쿠폰갯수
$coupon="select count(*) from coupon where regid='$member[id]'";
$camount=mysql_query($coupon,$dbconn);
$camount=mysql_fetch_row($camount);

// 쿠폰 목록
$clist=@mysql_query("select * from coupon where regid='$member[id]' order by no desc limit $camount[0]",$dbconn) or Error(mysql_error(),"");

?>

</head>
<body>

<p><b>쿠폰인증시스템 - 회원정보페이지 (알파테스트버전)</b></p>
<p>아이디 : &nbsp;<?=$member[id]?></p>
<p>이름 : &nbsp;<?=$member[name]?></p>
<p>캐쉬 : &nbsp;<?=$member[cash]?>원</p>
<p></p>
<p>쿠폰등록수 : &nbsp;<?=$camount[0]?>개</p>
<p>
등록된 쿠폰목록</p>
<table border="1" width="630" cellspacing="0" bordercolordark="white" bordercolorlight="black">
    <tr>
        <td width="215">쿠폰번호</td>
        <td width="195">충전캐쉬</td>
        <td width="195">쿠폰상태</td>
        <td width="205">등록일</td>
    </tr><?if($camount[0]==0){?>
    <tr>
        <td width="620" colspan="4">
            <p align="center">등록된 쿠폰이 없습니다.</p>
        </td>
    </tr><?}?><?if(!$camount[0]==0){?>
<?
  while($data=mysql_fetch_array($clist))
  {
    if($data[state]==0) {$state="등록가능";}
    if($data[state]==1) {$state="등록완료";}
    if($data[state]==2) {$state="등록중단";}
    $cno1 = substr($data[cno], 0, 4);
    $cno2 = substr($data[cno], 4, 4);
    $cno3 = substr($data[cno], 8, 4);
    $datea = substr($data[regdate], 0, 4);
    $dateb = substr($data[regdate], 4, 2);
    $datec = substr($data[regdate], 6, 2);
   echo"
        <tr>
           <td width='215'>$cno1-$cno2-$cno3-****</td>
           <td width='195'>$data[cash]원</td>
           <td width='195'>$state</td>
           <td width='205'>$datea 년 $dateb 월 $datec 일</td>
        </tr>
        ";
          }
?>
<?}?>
</table>
<p>
<input type="button" onclick="location.href='reg1.php?no=<?=$member[no]?>'" value=" 쿠폰등록 ">&nbsp&nbsp<input type="button" onclick="location.href='../index.htm'" value=" 취 소 "></p>
</body>

</html>
<?
mysql_close($dbconn);
?>