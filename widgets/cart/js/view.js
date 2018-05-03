


'use strict';
define('widget-cart-view',['jquery','shop/cartAPI','shop/priceFormatter'],



function(a,b,c){
return{
init:function(){return function(){}}(),

open:function(){return function(f){
var g=this;


if(g.$el=a('#'+f),g.$el&&g.$el.attr('data-data')){



g.isMobile='true'===a('#body').attr('data-ismobile'),
g.data=JSON.parse(g.$el.attr('data-data'));
var h=!0;

g.data.isHiddenWithoutProduct&&(
h=window.cache.shop.productThisPage),


(window.constructorMode||h)&&!window.cache.shop.hideCartSpecial&&


g.addEvent()}
}}(),







repositionWidgetTop:function(){return function(f,g,h){
var i=this,
j=18;return(
'true'===a('#body').attr('data-ismobile')?void

i.$el.show():void(



!h&&(h=j),

h=h-g.scrollTop()+j,

Math.max(document.documentElement.clientHeight,window.innerHeight||0)<h&&(
h=j),

h<=j&&(h=j),

a('.ul-menu-fixed').length&&(
h+=a('.ul-menu-fixed').height()),

a('.ul-buypremium-bar').length&&(
h+=a('.ul-buypremium-bar').height()+j),


f.css({
top:h}),



i.$el.show()));
}}(),


eventClear:function(){return function(){
var f=this;
b.clear(),

a('.js-widget-cart-wrapper',f.$el).
addClass('ul-widget-cart-wrapper-isEmpty'),

window.constructorMode&&
setTimeout(function(){
a('.js-widget-cart-wrapper',f.$el).
removeClass('ul-widget-cart-wrapper-isEmpty');
},700);

}}(),


updateLoadMobileAbsWidget:function(){return function(){
var f=this;





if(window&&window.previewMode&&(f.isMobile=a('#body',window.document).attr('data-ismobile')),f.isMobile){
var g=b.get();
g.length&&
window.
top.
$(window.top.document).
trigger('mobileCartStatusChanged',{isEmpty:0<g.length});

}
}}(),


addEvent:function(){return function(){
var f=this;
f.$el.
off('.cartEvent').
on('click.cartEvent','.js-widget-cart-button-clear',f.eventClear);

var g=function(){return function(p,q){
f.updateStatusCartView(p,q);
}}();


window.wizardTemplatePreviewMode&&
a('.js-widget-cart-button-checkout',f.$el).attr('href','#');



var h=window.previewMode?window.top.$(window.top.document):document;

a(h).
off('.cartEventMobileSpecial').
on('jivoSiteLoaded.cartEventMobileSpecial',function(){
f.updateLoadMobileAbsWidget();
}).
on('liveAgentLoaded.cartEventMobileSpecial',function(){
f.updateLoadMobileAbsWidget();
}).
on('addThisShareBarLoaded.cartEventMobileSpecial',function(){
f.updateLoadMobileAbsWidget();
}),

a(document).on('backCallLoaded.cartEventMobileSpecial',function(){
f.updateLoadMobileAbsWidget();
});

var i=f.updateLoadMobileAbsWidget.bind(f);

document.removeEventListener('LiveChatLoaded',i,!1),
document.addEventListener('LiveChatLoaded',i,!1),

window.constructorMode?
require(['shop/productAPI'],function(o){
o.getDefaultProductId(function(p){
o.get(p,function(q){
g({
price:1*q.price.value,
quantity:1},
[{id:'demo_product',price:q.price.value,quantity:1}]);
});
});
}):


b.on('summaryChange',g);


var j=a(window),
k=f.$el;

window.constructorMode&&(
j=a('#ul-main'),
k=k.parent());


var l=null;

if(f.isMobile&&!window.previewMode)

return void f.$el.show();

var m=function(){return function(p,q){
var r=document.createElement('script');
r.src=p,
r.type='text/javascript',
document.getElementsByTagName('head')[0].appendChild(r),
r.onload=function(){
q();
};
}}(),
n=function(){return function(){
window.calcHeaderHeight.init(function(p){
l=p,
f.repositionWidgetTop(k,j,l);
});
}}();

window.calcHeaderHeight?




n():m('/js/ulib/calcHeaderHeight.js',function(){n()}),


f.repositionWidgetTop(k,j,l),
j.
off('.scrollRepositionCart').
on('scroll.scrollRepositionCart',function(){
f.repositionWidgetTop(k,j,l);
});
}}(),


updateStatusCartView:function(){return function(f,g){
var h=this,
i=a('.js-widget-cart-wrapper',h.$el);

g&&g.length&&(
h.updateLoadMobileAbsWidget(),

i.removeClass('ul-widget-cart-wrapper-isEmpty'),

a('.js-widget-cart-price [data-type="value"]',i).
replaceWith(c.valueToHTML(f.price)),

a('.js-widget-cart-count',i).
text(f.quantity));

}}(),


load:function(){return function(){}}(),


_isMobile:function(){return function(){}}(),


close:function(){return function(){}}()};

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
