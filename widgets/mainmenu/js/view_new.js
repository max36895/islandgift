'use strict';

define('widget-mainmenu-view-new',['jquery','U'],function(a,b){
return{
isOpen:!1,
isAbsolute:!1,
headerHeight:a('header').outerHeight(!0),
menuHeight:a('.ul-w-mainmenu').outerHeight(!0),
$menuParent:a('header .ul-w-mainmenu').parent(),
isFirstTime:!0,
open:function(){return function(d){
var f=this;

f.menuHeight=a('.ul-w-mainmenu').outerHeight(!0),
f.headerHeight=a('header').outerHeight(!0);



var g=window.location.hash;






if(0>g.search(/[А-яЁё\/=\.\,\:\;]/)&&null===b.orderFormUrl.check(g)){
var h=a(g),
i=0;

h.length&&(i=
768<a(window).width()&&'true'===a('header .ul-w-mainmenu').attr('data-fixed')?
a(h).offset().top-f.menuHeight:

a(h).offset().top,

a('html, body').animate({scrollTop:i},100));

}

a('header .ul-w-mainmenu').parent().hasClass('ul-menu-fixed-container-inside')||(
f.$menuParent=a('header .ul-w-mainmenu').parent()),


f.$viewEl=a('#'+d),
this.isOpen||(
this.isOpen=!0,
this.init(a('#'+d)));


}}(),


destroy:function(){return function(){
a(document).off('.mainmenu'),
a('#ul-main').off('.mainmenu');
}}(),


init:function(){return function(){
var d=this,



f='.vertical-menu:not(.not-prevent) .ul-w-mainmenu > .ul-w-mainmenu-nav',
g='.ul-w-mainmenu-nested',
h='.ul-w-mainmenu-item.ul-w-mainmenu-have-nested',
i='.js-w-mainmenu',
j='.ul-w-mainmenu-toggle',




n=f+' > '+h+' > '+g+' > '+h+', '+f+' > '+j+' > '+h+' > '+g+' > '+h;



a(f+' > '+h+' > '+i+', '+f+' > '+j+' '+h+' > '+i).on('click.mainmenu',function(){
var o=a(this).parent();return(
a(f+' > '+h+', '+f+' > '+j+' '+h).each(function(){
this!=o.get(0)&&a(this).hasClass('opened')&&
a(this).removeClass('opened');

}),
a(n).each(function(){
a(this).parent().parent().hasClass('opened')||
a(this).removeClass('opened');

}),
a(this).parent().hasClass('opened')?void




a(this).parent().removeClass('opened'):(o.addClass('opened'),!1));

}),


a(f+' > '+h+' > '+g+' > '+h+' > '+i+', '+f+' > '+j+' '+h+' > '+g+' > '+h+' > '+i).on('click.mainmenu',function(){
var o=a(this).parent();





if(a(n).each(function(){this!=o.get(0)&&a(this).hasClass('opened')&&a(this).removeClass('opened')}),!o.hasClass('opened'))

return o.addClass('opened'),!1;

}),


a(document).on('click.mainmenu',function(o){
var p=a(o.target);
a(o.target).hasClass('ul-w-mainmenu-toggle-more')?
p.closest('.ul-w-mainmenu-toggle').toggleClass('active'):

p.closest('.ul-w-mainmenu-toggle').removeClass('active'),


0<a(o.target).parents().closest('.vertical-menu').length?(
0<a(o.target).closest('.ul-w-mainmenu-showButton').length&&(
p.siblings('.ul-w-mainmenu-nav').toggleClass('show-menu'),
p.toggleClass('show-menu')),

0<a(o.target).closest('.ul-w-mainmenu-toggle-button').length&&(
p.closest('.ul-w-mainmenu-nav').removeClass('show-menu'),
p.parent().siblings('.ul-w-mainmenu-showButton').removeClass('show-menu'))):(



0<a(o.target).closest('.ul-w-mainmenu-toggle-button').length?
p.closest('.ul-w-mainmenu').toggleClass('ul-w-mainmenu-collapse-in'):

p.closest('.ul-w-mainmenu').removeClass('ul-w-mainmenu-collapse-in'),

0<a(o.target).closest('.ul-w-mainmenu-showButton').length?
p.siblings('.ul-w-mainmenu-nav').toggleClass('show-menu'):

p.siblings('.ul-w-mainmenu-nav').removeClass('show-menu'));


}),

window.constructorMode||(
'true'===a('header .ul-w-mainmenu').attr('data-fixed')&&(
d.isAbsolute=d.checkPosPub({
isAbsolute:d.isAbsolute,
$menu:a('header .ul-w-mainmenu'),
top:a(document).scrollTop(),
headerHeight:d.headerHeight,
menuHeight:d.menuHeight,
$menuParent:d.$menuParent,
bgcolor:a('header .ul-w-mainmenu').attr('data-bgcolor'),
bgtransparent:a('header .ul-w-mainmenu').attr('data-bgtransparent')})),





a('.js-w-mainmenu').click(function(){
var o=a(this).attr('href').split('#');
if(768<a(window).width()){
if(o[1]&&(
o[0]===location.pathname.replace(/^\/preview\/(.*?)(\/index|\/|$)/i,'/')||
o[0]===location.pathname.replace(/^\/site_import\/interactive_preview\/(.*?)(\/index|\/|$)/i,'/')))
{
var p=o[1];


if(0<=p.search(/[А-яЁё\/]/))
return;


var q=window.document.getElementById(p);

if(!q)
return;

var r=0;















return r=a('header .ul-menu-fixed').length&&a('header .ul-w-mainmenu').attr('data-fixed')?a(q).offset().top-d.menuHeight:!a('header .ul-menu-fixed').length&&a('header .ul-w-mainmenu').attr('data-fixed')?a(q).offset().top-2*d.menuHeight:a(q).offset().top,r!=a(document).scrollTop()&&(a('html, body').animate({scrollTop:r},500),d.selectMenuItemByHash(a(this).attr('href'))),!1;
}
if(o[0]===location.pathname.replace(/^\/preview\/(.*?)(\/index|\/|$)/i,'/'))




return 0!==a(document).scrollTop()&&(a('html, body').animate({scrollTop:0},500),d.selectMenuItemByHash(a(this).attr('href'))),!1;

}else

if(o[1]&&o[0]===location.pathname.replace(/^\/preview\/(.*?)(\/index|\/|$)/i,'/')){
var q=window.document.getElementById(o[1]);

if(!q)
return;



d.selectMenuItemByHash(a(this).attr('href'));
}else
o[0]===location.pathname.replace(/^\/preview\/(.*?)(\/index|\/|$)/i,'/')&&
d.selectMenuItemByHash(a(this).attr('href'));


}),

a(document).
on('scroll.mainmenu',function(){
'true'===a('header .ul-w-mainmenu').attr('data-fixed')&&(
d.isAbsolute=d.checkPosPub({
isAbsolute:d.isAbsolute,
$menu:a('header .ul-w-mainmenu'),
top:a(document).scrollTop(),
headerHeight:d.headerHeight,
menuHeight:d.menuHeight,
$menuParent:d.$menuParent,
bgcolor:a('header .ul-w-mainmenu').attr('data-bgcolor'),
bgtransparent:a('header .ul-w-mainmenu').attr('data-bgtransparent')}));


}).
on('resize.mainmenu',function(){
d.menuHeight=a('.ul-w-mainmenu').outerHeight(!0),
d.headerHeight=a('header').outerHeight(!0);
}),

d.selectMenuItemByHash(a(this).attr('href'))),

d.fireResize();
}}(),


checkPosPub:function(){return function(d){
var f=d.isAbsolute;
if(!(d.headerHeight-d.top<=d.menuHeight&&!f&&768<window.innerWidth))













d.top<d.headerHeight-d.menuHeight&&(
this.removeFixedContainer(d),
a('header .ul-w-mainmenu').length||(
d.$menu.appendTo(d.$menuParent),
d.$menuParent.css('height','')),

f&&
this.fireResize(),

f=!1);else if(1<=a('.iframe-preview-content').length&&768<a('.iframe-preview-content').width()||0===a('.iframe-preview-content').length){var g=this.addFixedContainer(d);this.fixedContainerColors(d),g.css('left','0'),g.css('width','100%'),d.$menuParent.css('height',d.menuHeight),f=!0,this.fireResize()}












return 768>a(window).width()&&1<=a('.ul-menu-fixed').length&&(!a('header .ul-w-mainmenu').length&&d.$menu.appendTo(d.$menuParent),this.removeFixedContainer(d),f&&this.fireResize(),f=!1),f;
}}(),


checkPosStop:function(){return function(d){
if('false'===d.isFixed&&d.headerHeight-d.top<=d.menuHeight&&a('.ul-menu-fixed').length)

this.removeFixedContainer(d),
a('header .ul-w-mainmenu').length||(
d.$menu.appendTo(d.$menuParent),
d.$menuParent.css('height','')),

this.fireResize();else

if('true'===d.isFixed&&d.headerHeight-d.top<=d.menuHeight&&!a('.ul-menu-fixed').length){
var f=this.addFixedContainer(d);
this.fixedContainerColors(d),
f.css({left:'280px',width:'calc(100% - 280px)'}),



d.$menuParent.css('height',''),
this.fireResize();
}

return d.isAbsolute;
}}(),


addFixedContainer:function(){return function(d){
var f=a('<div class="ul-menu-fixed hide"></div>'),
g=a('<div class="ul-menu-fixed-container"></div>'),
h=a('<div class="ul-menu-fixed-container-inside"></div>');

























return f.appendTo(d.$menuParent),g.appendTo(f),h.appendTo(g),d.$menu.appendTo(h),f.css({position:'fixed',top:'0',"z-index":'300',height:d.$menu.height}),a('header .ul-w-mainmenu-nav').css({"margin-top":0,"margin-bottom":0}),h.css({"max-width":1170,"min-width":768,margin:'auto',padding:'0 15px'}),f.animate({opacity:'show'},400),f.removeClass('hide'),f;
}}(),


fixedContainerColors:function(){return function(d){
d.headerHeight-d.top<=d.menuHeight&&(
0==d.bgcolor&&
a('.ul-menu-fixed').css('background','rgba(245,245,245,'+d.bgtransparent/100+')'),

1==d.bgcolor&&
a('.ul-menu-fixed').css('background','rgba(168,168,168,'+d.bgtransparent/100+')'),

2==d.bgcolor&&
a('.ul-menu-fixed').css('background','rgba(68,68,68,'+d.bgtransparent/100+')'),

3==d.bgcolor&&
a('.ul-menu-fixed').css('background','rgba(15,15,15,'+d.bgtransparent/100+')'));


}}(),


removeFixedContainer:function(){return function(d){
a('header .ul-w-mainmenu-nav').css({"margin-top":'',"margin-bottom":''}),



d.$menuParent.css('height',''),
d.$menu.appendTo(d.$menuParent),
a('.ul-menu-fixed').remove();
}}(),


removeFixedContainerEXP:function(){return function(d){
a('header .ul-w-mainmenu-nav').css({"margin-top":'',"margin-bottom":''}),



d.$menuParent.css('height',''),
d.$menu.appendTo(d.$menuParent),
setTimeout(function(){
a('.ul-menu-fixed').remove();
},100);
}}(),










selectMenuItemByHash:function(){return function(d){
var f=d?d.replace(/^.*?(\/.*?#.*)/,'$1'):window.location.pathname.replace(/^\/preview\/(.*?)(\/index|\/|$)/i,'/')+window.location.hash,

g=a('.js-w-mainmenu[href="'+f+'"]');
g.length&&(

a('.ul-w-mainmenu-item').removeClass('ul-w-mainmenu-active-item'),
g.closest('.ul-w-mainmenu-item').addClass('ul-w-mainmenu-active-item'),

g.parents().hasClass('ul-w-mainmenu-have-nested')&&
g.parents().closest('.ul-w-mainmenu-have-nested').addClass('ul-w-mainmenu-active-item'));

}}(),


triggerEvent:function(){return function(d,f){
var g;








if(document.createEvent?(g=document.createEvent('HTMLEvents'),g.initEvent(f,!0,!0)):(g=document.createEventObject(),g.eventType=f),g.eventName=f,document.createEvent)
d.dispatchEvent(g);else


if('resize'===f){
var h=document.documentElement.style.width;
document.documentElement.style.width='99.999999%',
setTimeout(function(){document.documentElement.style.width=h},50);
}else
d.fireEvent('on'+g.eventType,g);

}}(),


fireResize:function(){return function(){
this.triggerEvent(window,'resize');
}}()};

});
//# sourceMappingURL=view_new.js.map
