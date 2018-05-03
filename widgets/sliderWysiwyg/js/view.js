'use strict';

define('widget-sliderWysiwyg-view',['jquery','owlEdit','U'],function(a,b,c){

var d={

init:function(){return function(g,h){
var j=this;


a(window).off('.sliderWysy'),

j.initOwl(g,h);

var k=null,

l=a('.ul-image .ul-slider-item-overlay',g).map(function(){
return a(this).outerHeight(!0)+a(this).position().top-a(window).scrollTop();
});

k=Math.max.apply(null,l),







g.find('.ul-image').outerHeight(!0)<k&&
g.find('.ul-image').outerHeight(k+30),


a(window).on('colResized.sliderWysy',function(){
var m=[].slice.call(arguments,1);
setTimeout(function(){
a.each(m,function(n,o){
var p=a(o).find('.ul-slider-wysy');
p.length&&
j._responseCarousel(p);

});
},500);
}),


window.constructorMode||
g.on('click','.ul-w-btn-el',function(m){
var n=a(this),
o=c.orderFormUrl.check(a(this).attr('href'));
null!=o&&(
require(['orderForm'],function(p){
p.open(o,j.getOrderFormData(n));
}),
m.preventDefault());


});

}}(),

_responseCarousel:function(){return function(g){

g==void 0?
a('.ul-slider-wysy').each(function(){
a(this).data('owlCarousel').reinit();
}):

g.data('owlCarousel')!=void 0&&
g.data('owlCarousel').reinit();




}}(),





initOwl:function(){return function(g,h){

var j=!1;j=
!g.data('edit')&&h.autoPlay&&!!
h.autoPlay&&1e3*h.autoPlayTime;








var k=function(){return function(){
var o=0;

a('.ul-control-panel .ul-owl-page',g).each(function(q,r){
o+=a(r).outerWidth(!0);
});

o+=a('.ul-control-panel .ul-add-image',g).outerWidth(!0),
a('.ul-control-panel .ul-owl-pagination',g).width(o+5);
}}(),

l=function(){return function(o){


g.data('edit')&&(
a('.ul-control-panel',g).show(),

k(o,this),

g.data('edit')&&(
a('.ul-control-panel .ul-owl-page',g).eq(h.active).addClass('active'),
g.find('.ul-slider-wysy').trigger('owl.jumpTo',h.active)),


a('.ul-control-panel .ul-sliderWysy-slide-thumb-left',g).click(function(){

var p=parseInt(a('.ul-control-panel .ul-owl-pagination',g).css('margin-left'));
a('.ul-control-panel .ul-owl-pagination',g).animate({
marginLeft:0>=p+a('.ul-owl-controls',g).width()?p+a('.ul-owl-controls',g).width():0},
200);
}),


a('.ul-control-panel .ul-sliderWysy-slide-thumb-right',g).click(function(){
var p=parseInt(a('.ul-control-panel .ul-owl-pagination',g).css('margin-left')),
q=a('.ul-control-panel .ul-owl-controls',g).width()+-1*p>=a('.ul-control-panel .ul-owl-pagination',g).width()?p:-1*a('.ul-owl-controls',g).width()+p+168;

a('.ul-control-panel .ul-owl-pagination',g).animate({
marginLeft:q},
200);

}),

a('.ul-control-panel .ul-owl-page',g).click(function(){
a('.active',a(this).parent()).removeClass('active'),
a(this).addClass('active'),
g.find('.ul-slider-wysy').data('owlCarousel').goTo(a(this).index());
})),



'click'==h.controls&&(
a('.owl-buttons .owl-next',g).addClass('click'),
a('.owl-buttons .owl-prev',g).addClass('click'),
a('.ul-image',g).addClass('ul-click'),




a('.owl-buttons .owl-next',g).css('pointer-events','none'),
a('.owl-buttons .owl-prev',g).css('pointer-events','none'),
a('.ul-image',g).on('click',function(p){

g.data('edit')?
!g.data('activeEdit')&&
!a(p.target).hasClass('ul-slider-item-overlay')&&!a(p.target).closest('.ul-slider-item-overlay').length&&(
a('.ul-control-panel .ul-owl-page.active ',g).removeClass('active'),
p.offsetX<a(this).width()/2?
a('.owl-buttons .owl-prev',g).trigger('touchend'):

a('.owl-buttons .owl-next',g).trigger('touchend')):




!a(p.target).hasClass('ul-slider-item-overlay')&&!a(p.target).closest('.ul-slider-item-overlay').length&&(
p.offsetX<a(this).width()/2?
a('.owl-buttons .owl-prev',g).trigger('touchend'):

a('.owl-buttons .owl-next',g).trigger('touchend'));



}));


}}(),

m=g.find('.ul-slider-wysy');
m&&
g.find('.ul-slider-wysy').owlCarousel({
controlsClick:!('click'!=h.controls),
items:h.count,
autoPlay:j,
singleItem:!(1<h.count),
slideSpeed:500,
responsive:!0,
responsiveRefreshRate:100,
mouseDrag:!1,
navigation:!0,
dragBeforeAnimFinish:!0,
touchDrag:!1,
pagination:h.pagination,
navigationText:!1,
lazyLoad:!0,

scrollPerPage:!0,
itemsScaleUp:!0,
addClassActive:!0,
rewindNav:!0,

transitionStyle:h.animation,
afterMove:function(){return function(o){
if(g.data('edit')){
a('.ul-control-panel .ul-owl-page',g).removeClass('active');
var p=o.find('.owl-wrapper .active').index();



if(a('.ul-control-panel .ul-owl-page',g).eq(p).addClass('active'),a(window).trigger('slideMove',p),a('.ul-control-panel .active',g).length){
var q=a('.ul-control-panel .active',g).position(),
r=a('.ul-control-panel .active',g).outerWidth(!0);


q.left+r+50>a('.ul-control-panel .ul-owl-controls',g).width()&&
a('.ul-control-panel .ul-sliderWysy-slide-thumb-right',g).trigger('click'),

150>q.left+r&&
a('.ul-control-panel .ul-sliderWysy-slide-thumb-left',g).trigger('click');

}

}

}}(),
afterUpdate:k,
afterInit:l});


}}(),




setSlide:function(){return function(g,h){
g.find('.ul-slider-wysy').data('owlCarousel').jumpTo(h);

}}(),




autoScrollStop:function(){return function(g){
g.find('.ul-slider-wysy').data('owlCarousel').stop();
}}(),




autoScrollStart:function(){return function(g){
g.find('.ul-slider-wysy').data('owlCarousel').play();
}}(),





open:function(){return function(g){
var h=this,
j=a('#'+g);

if(!j.length)

return void console.log('Widget with id "'+g+'" not exists!');

var k=j.data('options');
h.init(j,k);

}}(),
destroy:function(){return function(g){
var h=a('#'+g);
a('.ul-owl-controls .ul-owl-pagination',h).hasClass('ui-sortable')&&
a('.ul-owl-controls .ul-owl-pagination',h).sortable('destroy'),

a(window).off('.sliderWysy');

}}(),
getOrderFormData:function(){return function(){












return'';

}}()};


return d;

});
//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map
