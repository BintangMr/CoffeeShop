!function(t){"use strict";t.fn.spasticNav=function(e){return e=t.extend({overlap:0,speed:500,reset:50,color:"#00c6ff",easing:"swing"},e),this.each(function(){var i,o,s=t(this),n=s.find(">.current-menu-item,>.current-menu-parent,>.current-menu-ancestor");0===n.length&&(n=s.find("li").eq(0)),t('<li id="blob"></li>').css({width:n.css("width"),height:n.css("height"),left:n.position().left,top:n.position().top-e.overlap/2,backgroundColor:e.color,opacity:0}).appendTo(this),i=t("#blob",s),s.find(">li:not(#blob)").on("hover",function(){clearTimeout(o);var s=t(this).css("backgroundColor");t(this).addClass("blob_over"),i.css({backgroundColor:s}).animate({left:t(this).position().left,top:t(this).position().top-e.overlap/2,width:t(this).css("width"),height:t(this).css("height")+e.overlap,opacity:1},{duration:e.speed,easing:e.easing,queue:!1})},function(){o=setTimeout(function(){i.animate({opacity:0},e.speed)},e.reset),t(this).removeClass("blob_over")})})}}(jQuery);