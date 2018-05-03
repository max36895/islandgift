'use strict';

define('widget-mainmenu-view-old',['jquery'],function(a){
return{
isOpen:!1,

init:function(){return function(c){
var d=this;
d.$viewEl=c,

a(document).on('click.mainmenu',function(f){
var g=a(f.target);

a(f.target).hasClass('ul-w-mainmenu-toggle-more')?
g.closest('.ul-w-mainmenu-toggle').toggleClass('active'):

g.closest('.ul-w-mainmenu-toggle').removeClass('active'),


0<a(f.target).closest('.ul-w-mainmenu-toggle-button').length?
g.closest('.ul-w-mainmenu').toggleClass('ul-w-mainmenu-collapse-in'):

g.closest('.ul-w-mainmenu').removeClass('ul-w-mainmenu-collapse-in');

});

}}(),

destroy:function(){return function(){
a(document).off('.mainmenu');
}}(),

open:function(){return function(c){
this.isOpen||(
this.isOpen=!0,
this.init(a('#'+c)));

}}()};

});
//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map

//# sourceMappingURL=view_old.js.map
