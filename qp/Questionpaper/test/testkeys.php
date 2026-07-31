<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Transitional//EN” “http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns=”http://www.w3.org/1999/xhtml">
<head>
<title>disable keys</title>
<script>
  let log = console.log;
 document.addEventListener('DOMContentLoaded',init);
 
 function init(){
     let txt= document.getElementById('txt');
     txt.addEventListener('keydown', anyKey);
     document.body.addEventListener('keydown',anyKey);
     document.addEventListener('keydown',anyKey);
 }
 function anyKey(ev){
    // log( ev.type , ev.target);
    let target = ev.currentTarget;
    let tag = target.tagName;
    let char = ev.char || ev.charCode || ev.which;
    log(char,target);
   
    ev.preventDefault();
    
 }
</script>
<style type="text/css" media="print">
.noprint {
display: none;
}
</style>
</head>
<body>
 <input type="text" id="txt">
</body>
</html>