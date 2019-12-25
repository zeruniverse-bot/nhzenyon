var speed=30
document.getElementById('tjpic2').innerHTML=document.getElementById('tjpic1').innerHTML
function Marquee(){
if(document.getElementById('tjpic2').offsetTop-tjpic.scrollTop<=0)
document.getElementById('tjpic').scrollTop-=document.getElementById('tjpic1').offsetHeight
else{
document.getElementById('tjpic').scrollTop++
}
}
var MyMar=setInterval(Marquee,speed)
document.getElementById('tjpic').onmouseover=function() {clearInterval(MyMar)}
document.getElementById('tjpic').onmouseout=function() {MyMar=setInterval(Marquee,speed)}