!function(t,e,o){"use strict";t.HoverDir=function(e,o){this.$el=t(o),this._init(e)},t.HoverDir.defaults={speed:300,easing:"ease",hoverDelay:0,hoverElement:".info",inverse:!1},t.HoverDir.prototype={_init:function(o){this.options=t.extend(!0,{},t.HoverDir.defaults,o),this.transitionProp="all "+this.options.speed+"ms "+this.options.easing,this.support=!!e.Modernizr&&Modernizr.csstransitions,this._loadEvents()},_loadEvents:function(){var e=this;this.$el.on("mouseenter.hoverdir, mouseleave.hoverdir",function(o){var i=t(this),n=i.find(e.options.hoverElement),s=e._getDir(i,{x:o.pageX,y:o.pageY}),r=e._getStyle(s);"mouseenter"===o.type?(n.hide().css(r.from),clearTimeout(e.tmhover),e.tmhover=setTimeout(function(){n.show(0,function(){var o=t(this);e.support&&o.css("transition",e.transitionProp),e._applyAnimation(o,r.to,e.options.speed)})},e.options.hoverDelay)):(e.support&&n.css("transition",e.transitionProp),clearTimeout(e.tmhover),e._applyAnimation(n,r.from,e.options.speed))})},_getDir:function(t,e){var o=t.width(),i=t.height(),n=(e.x-t.offset().left-o/2)*(o>i?i/o:1),s=(e.y-t.offset().top-i/2)*(i>o?o/i:1);return Math.round((Math.atan2(s,n)*(180/Math.PI)+180)/90+3)%4},_getStyle:function(t){var e,o,i={left:"0px",top:"-100%"},n={left:"0px",top:"100%"},s={left:"-100%",top:"0px"},r={left:"100%",top:"0px"},a={top:"0px"},p={left:"0px"};switch(t){case 0:e=this.options.inverse?n:i,o=a;break;case 1:e=this.options.inverse?s:r,o=p;break;case 2:e=this.options.inverse?i:n,o=a;break;case 3:e=this.options.inverse?r:s,o=p}return{from:e,to:o}},_applyAnimation:function(e,o,i){t.fn.applyStyle=this.support?t.fn.css:t.fn.animate,e.stop().applyStyle(o,t.extend(!0,[],{duration:i+"ms"}))}};var i=function(t){e.console&&e.console.error(t)};t.fn.hoverdir=function(e){var o=t.data(this,"hoverdir");if("string"==typeof e){var n=Array.prototype.slice.call(arguments,1);this.each(function(){o?t.isFunction(o[e])&&"_"!==e.charAt(0)?o[e].apply(o,n):i("no such method '"+e+"' for hoverdir instance"):i("cannot call methods on hoverdir prior to initialization; attempted to call method '"+e+"'")})}else this.each(function(){o?o._init():o=t.data(this,"hoverdir",new t.HoverDir(e,this))});return o}}(jQuery,window);