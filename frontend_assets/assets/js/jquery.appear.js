/*
 * jQuery appear plugin
 *
 * Copyright (c) 2012 Andrey Sidorov
 * licensed under MIT license.
 *
 * https://github.com/morr/jquery.appear/
 *
 * Version: 0.3.6
 */
!function(f){var a=[],n=!1,o=!1,p={interval:250,force_process:!1},s=f(window),u=[];function c(){o=!1;for(var e=0,r=a.length;e<r;e++){var t=(n=a[e],f(n).filter(function(){return f(this).is(":appeared")}));if(t.trigger("appear",[t]),u[e]){var i=u[e].not(t);i.trigger("disappear",[i])}u[e]=t}var n}f.expr[":"].appeared=function(e){var r=f(e);if(!r.is(":visible"))return!1;var t=s.scrollLeft(),i=s.scrollTop(),n=r.offset(),a=n.left,o=n.top;return o+r.height()>=i&&o-(r.data("appear-top-offset")||0)<=i+s.height()&&a+r.width()>=t&&a-(r.data("appear-left-offset")||0)<=t+s.width()},f.fn.extend({appear:function(e){var r=f.extend({},p,e||{}),t=this.selector||this;if(!n){function i(){o||(o=!0,setTimeout(c,r.interval))}f(window).scroll(i).resize(i),n=!0}return r.force_process&&setTimeout(c,r.interval),function(e){a.push(e),u.push()}(t),f(t)}}),f.extend({force_appear:function(){return!!n&&(c(),!0)}})}("undefined"!=typeof module?require("jquery"):jQuery);
