
<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","includes/search.php?q="+str,true);
  xmlhttp.send();
}

function fromResult(from,to,vehicleType) {
		document.getElementById("date-to").innerHTML =to;

		document.getElementById("date-from").innerHTML =from;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("searchResult").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","includes/fetch_parking.php?vehicleType="+vehicleType+"&from="+from+"&to="+to,true);
        xmlhttp.send();
}
</script>
