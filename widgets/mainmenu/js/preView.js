'use strict';(function(){
function a(n){
if(n){
for(var o=[],p=0;p<n.length;p++)
o.push(n[p]);
return o}
}
function b(n){
var o=n.offsetWidth,
p=window.getComputedStyle(n);
return isNaN(parseInt(p.borderLeft))||(o+=parseInt(p.borderLeft)),isNaN(parseInt(p.borderRight))||(o+=parseInt(p.borderRight)),isNaN(parseInt(p.marginLeft))||(o+=parseInt(p.marginLeft)),isNaN(parseInt(p.marginRight))||(o+=parseInt(p.marginRight)),o;
}
function c(){
if(e.length)
for(var n=0;n<e.length;n++)d(e[n]);
}
function d(n){
var o=n.getElementsByClassName('ul-w-mainmenu-nav')[0];
if(!n.parentNode.classList.contains('vertical-menu')){
var p=n.querySelectorAll('.ul-w-mainmenu-toggle')[0];
if(!p||!o)return;
p.style.display='inline-block';
var q=window.innerWidth;
1024<q?(
o.classList.remove('mobile'),
o.classList.remove('htablet'),
o.classList.remove('vtablet'),
o.classList.add('desktop')):
768<q&&1024>=q?(
o.classList.remove('mobile'),
o.classList.remove('desktop'),
o.classList.remove('vtablet'),
o.classList.add('htablet')):
600<q&&768>=q?(
o.classList.remove('mobile'),
o.classList.remove('desktop'),
o.classList.remove('htablet'),
o.classList.add('vtablet')):(
o.classList.remove('desktop'),
o.classList.remove('htablet'),
o.classList.remove('vtablet'),
o.classList.add('mobile'));
var r;
if(n.getElementsByClassName('ul-w-mainmenu-toggle-button')[0])
r=window.getComputedStyle(
n.getElementsByClassName('ul-w-mainmenu-toggle-button')[0]).
display;else
return;
for(var s=n.querySelectorAll('.ul-w-mainmenu-nav .ul-w-mainmenu-item'),t=0;t<s.length;t++)
s[t].style.display='inline-block';
var u=a(n.querySelectorAll('.ul-w-mainmenu-nav > .ul-w-mainmenu-item')),
v=b(o),
w=n.querySelectorAll('.ul-w-mainmenu-toggle-nasted')[0];
u.reverse().forEach(function(F){
w&&(
w.firstChild?
w.insertBefore(F,w.firstChild):
w.appendChild(F));
});
for(var A,x=b(p),y=a(n.querySelectorAll('.ul-w-mainmenu-toggle-nasted > .ul-w-mainmenu-item')),z=0;z<y.length;z++){A=
y[z],
o.insertBefore(A,p);
var B=b(A);
if(v>x+B)
x+=B;else
{
w.insertBefore(A,w.firstChild);
break;
}
}
for(var C=0;C<s.length;C++)
s[C].style.display='';
var D=a(n.querySelectorAll('.ul-w-mainmenu-toggle-nasted > .ul-w-mainmenu-item')).length;
if(p.style.display='block','none'==r&&(D?p.style.display='block':p.style.display='none'),w&&w.querySelector&&w.querySelector('.ul-w-mainmenu-active-item')){
var E=n.querySelector('.ul-w-mainmenu-toggle');
E&&
E.classList.add('ul-w-mainmenu-active-item');
}
}
o.style.opacity='';
}for(var e=document.getElementsByClassName('ul-w-mainmenu'),f=0;f<e.length;f++)e[f].getElementsByClassName('ul-w-mainmenu-toggle-nasted')[0].classList.add('ul-w-mainmenu-toggle-nested');var g=!1,h=!1;window.setTimeout(function(){if(!g){for(var n=0;n<e.length;n++)d(e[n]);g=!0,!h&&window.addEventListener&&(window.addEventListener('resize',c),h=!0)}},3e3);var l=JSON.stringify(window.getComputedStyle(a(e[0].querySelectorAll('#body .ul-w-mainmenu-nav .ul-w-mainmenu-item a'))[0]).fontFamily),m=new FontFaceObserver(l,{});m.check(null,1e4).then(function(){window.setTimeout(function(){for(var n=0;n<e.length;n++)d(e[n])},10),g=!0,!h&&window.addEventListener&&(window.addEventListener('resize',c),h=!0)},function(){window.addEventListener('load',function(){window.loaded=!0}),function(){function n(){if(window.loaded)for(var o=0;o<e.length;o++)d(e[o]);else window.setTimeout(n,50)}return n}()()});
})();