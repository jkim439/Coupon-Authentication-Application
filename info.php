<html>
<head>
<title>���������ý��� - ȸ������������ (�����׽�Ʈ����)</title>
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

// ����� ��������
$coupon="select count(*) from coupon where regid='$member[id]'";
$camount=mysql_query($coupon,$dbconn);
$camount=mysql_fetch_row($camount);

// ���� ���
$clist=@mysql_query("select * from coupon where regid='$member[id]' order by no desc limit $camount[0]",$dbconn) or Error(mysql_error(),"");

?>

</head>
<body>

<p><b>���������ý��� - ȸ������������ (�����׽�Ʈ����)</b></p>
<p>���̵� : &nbsp;<?=$member[id]?></p>
<p>�̸� : &nbsp;<?=$member[name]?></p>
<p>ĳ�� : &nbsp;<?=$member[cash]?>��</p>
<p></p>
<p>������ϼ� : &nbsp;<?=$camount[0]?>��</p>
<p>
��ϵ� �������</p>
<table border="1" width="630" cellspacing="0" bordercolordark="white" bordercolorlight="black">
    <tr>
        <td width="215">������ȣ</td>
        <td width="195">����ĳ��</td>
        <td width="195">��������</td>
        <td width="205">�����</td>
    </tr><?if($camount[0]==0){?>
    <tr>
        <td width="620" colspan="4">
            <p align="center">��ϵ� ������ �����ϴ�.</p>
        </td>
    </tr><?}?><?if(!$camount[0]==0){?>
<?
  while($data=mysql_fetch_array($clist))
  {
    if($data[state]==0) {$state="��ϰ���";}
    if($data[state]==1) {$state="��ϿϷ�";}
    if($data[state]==2) {$state="����ߴ�";}
    $cno1 = substr($data[cno], 0, 4);
    $cno2 = substr($data[cno], 4, 4);
    $cno3 = substr($data[cno], 8, 4);
    $datea = substr($data[regdate], 0, 4);
    $dateb = substr($data[regdate], 4, 2);
    $datec = substr($data[regdate], 6, 2);
   echo"
        <tr>
           <td width='215'>$cno1-$cno2-$cno3-****</td>
           <td width='195'>$data[cash]��</td>
           <td width='195'>$state</td>
           <td width='205'>$datea �� $dateb �� $datec ��</td>
        </tr>
        ";
          }
?>
<?}?>
</table>
<p>
<input type="button" onclick="location.href='reg1.php?no=<?=$member[no]?>'" value=" ������� ">&nbsp&nbsp<input type="button" onclick="location.href='../index.htm'" value=" �� �� "></p>
</body>

</html>
<?
mysql_close($dbconn);
?>