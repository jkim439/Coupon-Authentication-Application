<html>
<head>
<title>���������ý��� - �������������� (�����׽�Ʈ����)</title>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">

<script type="text/javascript">
	function create() {
		var m=parseInt(1);
		var arr="0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z".split(",");
		var newarr=new Array(m);
		var tmp="";
		var flag=false;
		for (var i=0; i<m; i++) {
			tmp="";
			flag=false;
			for (var j=0; j<16; j++) {
				tmp+=arr[Math.floor(Math.random()*arr.length)];
			}
			for (var k=0; k<i; k++) {
				if (newarr[k]==tmp) {
					flag=true;
					i--;
					break;
				}
			}
			if (!flag) newarr[i]=tmp;
		}
		for (var i=0; i<newarr.length; i++) {
			var cno=newarr[i];
			document.create.cno.value=cno;
		}
	}
	function check() {
		if(!document.create.cno.value) {alert("������ȣ�� �Է��Ͽ� �ֽʽÿ�.  "); document.create.cno.focus(); return false;}
		if(!document.create.cash.value) {alert("ĳ���ݾ��� �Է��Ͽ� �ֽʽÿ�.  "); document.create.cash.focus(); return false;}
		if(!document.create.date.value) {alert("��ȿ�Ⱓ�� �Է��Ͽ� �ֽʽÿ�..  "); document.create.date.focus(); return false;}
		if(!document.create.password.value) {alert("��й�ȣ�� �Է��Ͽ� �ֽʽÿ�.  "); document.create.password.focus(); return false;}
		if(document.create.cno.value.length<16) {alert("������ȣ�� 16�ڸ��� �����մϴ�.  "); document.create.cno.focus(); return false;}
		if(document.create.cash.value.length<3) {alert("ĳ���ݾ��� �ּ� 3�ڸ��Դϴ�.  "); document.create.cash.focus(); return false;}
		if(document.create.date.value.length<8) {alert("��ȿ�Ⱓ�� �ùٸ��� �Է��ϼ���.  "); document.create.date.focus(); return false;}
		if(document.create.password.value.length<4) {alert("��й�ȣ�� �ùٸ��� �Է��ϼ���.  "); document.create.password.focus(); return false;}
		}
	function noonly() {
		if (event.keyCode >= 48 && event.keyCode <= 57) {
		return true;
		} else {
		event.returnValue = false;
	}
	}
</script>

</head>
<body onload="create(); document.create.cash.focus();">

<p><b>���������ý��� - �������������� (�����׽�Ʈ����)</b></p>
<form name="create" action="create2.php" method="post" onsubmit="return check();">
    <p>������ȣ : &nbsp;<input type="text" name="cno" maxlength="16" size="22" onKeyPress="noonly(this);" style="ime-mode:disabled;" readonly></p>
    <p>
���� ĳ���ݾ�&nbsp;: &nbsp;<input type="text" name="cash" maxlength="10" size="18" onKeyPress="noonly(this);" style="ime-mode:disabled;">
</p>
    <p>��� ��ȿ�Ⱓ&nbsp;: &nbsp;<input type="text" name="date" maxlength="8" size="18" onKeyPress="noonly(this);" style="ime-mode:disabled;" value="20091231">
</p>
    <p>
���� : &nbsp;<select name="state" size="1">
        <option value="0">��ϰ���</option>
        <option value="1">��ϿϷ�</option>
        <option value="2">����ߴ�</option>
</select>
</p>
    <p>
�����ں�й�ȣ : &nbsp;<input type="password" name="password" maxlength="4" size="10" onKeyPress="noonly(this);" style="ime-mode:disabled;">
</p>
    <p>
<input type="submit" value=" �������� ">&nbsp;&nbsp;<input type="button" onclick="location.href='../index.htm'" value=" �� �� ">
</p>
</form>
<p>
&nbsp;</p>
</body>
</html>
