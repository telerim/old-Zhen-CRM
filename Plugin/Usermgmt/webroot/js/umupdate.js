function update_fields(value) {
	var url=document.getElementById("BASE_URL").value;
	document.getElementById("updateDiv"+value).innerHTML="<img src='"+url+"usermgmt/img/loading.gif' />";
	controller=document.getElementById("controller"+value).value;
	action=document.getElementById("action"+value).value;
	groups=document.getElementById("groups").value;
	groupsArr=groups.split(',');
	qstr = 'controller='+controller+'&action='+action;
	var j=3;
	for (var i=0; i<groupsArr.length; i++) {
		if (document.getElementById(groupsArr[i]+value).checked) {
			qstr +='&'+groupsArr[i]+'=1';
		} else {
			qstr +='&'+groupsArr[i]+'=0';
		}
		j++;
	}
	var xmlHttpReq = false;
	var self = this;
	// Mozilla/Safari
	if (window.XMLHttpRequest) {
		self.xmlHttpReq = new XMLHttpRequest();
	}
	// IE
	else if (window.ActiveXObject) {
		self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
	}
	self.xmlHttpReq.open('POST', url+'update_permission', true);
	self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	self.xmlHttpReq.onreadystatechange = function() {
		if (self.xmlHttpReq.readyState == 4) {
			if (self.xmlHttpReq.responseText==1) {
				document.getElementById("updateDiv"+value).innerHTML="<font color='green'>Saved</font>";
			} else {
				document.getElementById("updateDiv"+value).innerHTML="<font color='red'>Failed</font>";
			}
		}
	}
	self.xmlHttpReq.send(qstr);
}