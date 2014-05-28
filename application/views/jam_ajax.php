<script language = "javascript">
var XMLHttpRequestObject = false;
if (window.XMLHttpRequest) {
    XMLHttpRequestObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
    XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}

function getJam(sumberdata, divID) {
  if(XMLHttpRequestObject) {
    var obj = document.getElementById(divID);
    XMLHttpRequestObject.open("GET",sumberdata);
    XMLHttpRequestObject.onreadystatechange = function() {
      if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) {
        obj.innerHTML = XMLHttpRequestObject.responseText;
        setTimeout("getJam('<?=base_url();?>index.php/cakru/jam','divjam')",750); 
      } 
    }
  XMLHttpRequestObject.send(null);
  }
}

window.onload=function(){
setTimeout("getJam('<?=base_url();?>index.php/Cakru/jam','divjam')",750); 
}
</script>
<div id="divjam" style="color:green"></div>

