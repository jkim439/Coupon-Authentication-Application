<html>
<head>
<title>쿠폰인증시스템 - 쿠폰생성페이지 (알파테스트버전)</title>
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
		if(!document.create.cno.value) {alert("쿠폰번호를 입력하여 주십시오.  "); document.create.cno.focus(); return false;}
		if(!document.create.cash.value) {alert("캐쉬금액을 입력하여 주십시오.  "); document.create.cash.focus(); return false;}
		if(!document.create.date.value) {alert("유효기간을 입력하여 주십시오..  "); document.create.date.focus(); return false;}
		if(!document.create.password.value) {alert("비밀번호를 입력하여 주십시오.  "); document.create.password.focus(); return false;}
		if(document.create.cno.value.length<16) {alert("쿠폰번호는 16자리만 가능합니다.  "); document.create.cno.focus(); return false;}
		if(document.create.cash.value.length<3) {alert("캐쉬금액은 최소 3자리입니다.  "); document.create.cash.focus(); return false;}
		if(document.create.date.value.length<8) {alert("유효기간을 올바르게 입력하세요.  "); document.create.date.focus(); return false;}
		if(document.create.password.value.length<4) {alert("비밀번호를 올바르게 입력하세요.  "); document.create.password.focus(); return false;}
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

<p><b>쿠폰인증시스템 - 쿠폰생성페이지 (알파테스트버전)</b></p>
<form name="create" action="create2.php" method="post" onsubmit="return check();">
    <p>쿠폰번호 : &nbsp;<input type="text" name="cno" maxlength="16" size="22" onKeyPress="noonly(this);" style="ime-mode:disabled;" readonly></p>
    <p>
쿠폰 캐쉬금액&nbsp;: &nbsp;<input type="text" name="cash" maxlength="10" size="18" onKeyPress="noonly(this);" style="ime-mode:disabled;">
</p>
    <p>등록 유효기간&nbsp;: &nbsp;<input type="text" name="date" maxlength="8" size="18" onKeyPress="noonly(this);" style="ime-mode:disabled;" value="20091231">
</p>
    <p>
상태 : &nbsp;<select name="state" size="1">
        <option value="0">등록가능</option>
        <option value="1">등록완료</option>
        <option value="2">등록중단</option>
</select>
</p>
    <p>
관리자비밀번호 : &nbsp;<input type="password" name="password" maxlength="4" size="10" onKeyPress="noonly(this);" style="ime-mode:disabled;">
</p>
    <p>
<input type="submit" value=" 쿠폰생성 ">&nbsp;&nbsp;<input type="button" onclick="location.href='../index.htm'" value=" 취 소 ">
</p>
</form>
<p>
&nbsp;</p>
</body>
</html>
