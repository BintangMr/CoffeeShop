function initRevSlider(){"use strict";jQuery(window).on("load",function(){var e=function(e){var t="";return data={},data.action="revslider_ajax_call_front",data.client_action="get_slider_html",data.token="1d909e2cfa",data.type=e.type,data.id=e.id,data.aspectratio=e.aspectratio,jQuery.ajax({type:"post",url:"",dataType:"json",data:data,async:!1,success:function(e,o,n){!0===e.success&&(t=e.data)},error:function(e){console.log(e)}}),t},t=function(e){return jQuery(e.selector+" .rev_slider").revkill()},o=setInterval(function(){null!=jQuery.fn.tpessential&&(clearInterval(o),void 0!==jQuery.fn.tpessential.defaults&&jQuery.fn.tpessential.defaults.ajaxTypes.push({type:"revslider",func:e,killfunc:t,openAnimationSpeed:.3}))},30)});var e=".tp-caption.Hotcoffee-style-1,.Hotcoffee-style-1{color:rgba(66,57,48,1.00);font-size:85px;line-height:90px;font-weight:400;font-style:normal;font-family:Grand Hotel;padding:0px 0px 0px 0px;text-decoration:none;text-align:left;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0px 0px 0px 0px;letter-spacing:2px;padding:0 8px}.tp-caption.Hotcoffee-style-2,.Hotcoffee-style-2{color:rgba(66,57,48,1.00);font-size:92px;line-height:98px;font-weight:400;font-style:normal;font-family:Grand Hotel;padding:0px 0px 0px 0px;text-decoration:none;text-align:left;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0px 0px 0px 0px;letter-spacing:2px;padding:0 8px}.tp-caption.Hotcoffee-style-3,.Hotcoffee-style-3{color:rgba(66,57,48,1.00);font-size:141px;line-height:150px;font-weight:700;font-style:normal;font-family:Droid Serif;padding:0px 0px 0px 0px;text-decoration:none;text-align:left;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0px 0px 0px 0px;letter-spacing:2px;padding:0 8px}.tp-caption.Hotcoffee-style-4,.Hotcoffee-style-4{color:rgba(66,57,48,1.00);font-size:65px;line-height:72px;font-weight:700;font-style:normal;font-family:Droid Serif;padding:0px 0px 0px 0px;text-decoration:none;text-align:left;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0px 0px 0px 0px;letter-spacing:0.5px;padding:0 8px}.tp-caption.Hotcoffee-style-5,.Hotcoffee-style-5{color:rgba(66,57,48,1.00);font-size:90px;line-height:98px;font-weight:700;font-style:normal;font-family:Droid Serif;padding:0px 0px 0px 0px;text-decoration:none;text-align:left;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0px 0px 0px 0px;letter-spacing:2px;padding:0 8px}.tp-caption.Hotcoffee-style-6,.Hotcoffee-style-6{color:rgba(66,57,48,1.00);font-size:104px;line-height:112px;font-weight:400;font-style:normal;font-family:Grand Hotel;padding:0px 0px 0px 0px;text-decoration:none;text-align:left;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0px 0px 0px 0px;letter-spacing:2px;padding:0 8px}";(n=document.getElementById("rs-plugin-settings-inline-css"))?n.innerHTML=n.innerHTML+e:((n=document.createElement("div")).innerHTML="<style>"+e+"</style>",document.getElementsByTagName("head")[0].appendChild(n.childNodes[0]));function t(e){var t="Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";t+="<br> This includes make eliminates the revolution slider libraries, and make it not work.",t+="<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.",t="<span style='font-size:16px;color:#BC0C06;'>"+(t+="<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.")+"</span>",jQuery(e).show().html(t)}(function(){try{var e,t=new Object,o=jQuery(window).width(),n=9999,i=0,a=0,r=0,l=0,s=0;if(t.c=jQuery("#rev_slider_1_1"),t.gridwidth=[1240],t.gridheight=[868],t.sliderLayout="auto",t.responsiveLevels&&(jQuery.each(t.responsiveLevels,function(e,t){t>o&&(n=i=t,r=e),o>t&&t>i&&(i=t,a=e)}),n>i&&(r=a)),l=t.gridheight[r]||t.gridheight[0]||t.gridheight,e=t.gridwidth[r]||t.gridwidth[0]||t.gridwidth,s=(s=o/e)>1?1:s,l=Math.round(s*l),"fullscreen"===t.sliderLayout){var d=(t.c.width(),jQuery(window).height());if(null!=t.fullScreenOffsetContainer){var p=t.fullScreenOffsetContainer.split(",");p&&(jQuery.each(p,function(e,t){d=jQuery(t).length>0?d-jQuery(t).outerHeight(!0):d}),t.fullScreenOffset.split("%").length>1&&null!=t.fullScreenOffset&&t.fullScreenOffset.length>0?d-=jQuery(window).height()*parseInt(t.fullScreenOffset,0)/100:null!=t.fullScreenOffset&&t.fullScreenOffset.length>0&&(d-=parseInt(t.fullScreenOffset,0)))}l=d}else null!=t.minHeight&&l<t.minHeight&&(l=t.minHeight);t.c.closest(".rev_slider_wrapper").css({height:l})}catch(e){console.log("Failure at Presize of Slider:"+e)}})();var o=(i=jQuery)("#rev_slider_1_1");i(window).on("load",function(){void 0===o.revolution?t("#rev_slider_1_1"):o.show().revolution({sliderType:"standard",jsFileLocation:"//hotcoffee.themerex.net/wp-content/plugins/revslider/public/assets/js/",sliderLayout:"auto",dottedOverlay:"none",delay:9e3,navigation:{keyboardNavigation:"off",keyboard_direction:"horizontal",mouseScrollNavigation:"off",onHoverStop:"off",touch:{touchenabled:"on",swipe_threshold:75,swipe_min_touches:50,swipe_direction:"horizontal",drag_block_vertical:!1}},visibilityLevels:[1240,1024,778,480],gridwidth:1240,gridheight:868,lazyType:"none",parallax:{type:"mouse",origo:"enterpoint",speed:400,levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55],type:"mouse"},shadow:0,spinner:"spinner0",stopLoop:"off",stopAfterLoops:-1,stopAtSlide:-1,shuffle:"off",autoHeight:"off",hideThumbsOnMobile:"off",hideSliderAtLimit:0,hideCaptionAtLimit:0,hideAllCaptionAtLilmit:0,debugMode:!1,fallbacks:{simplifyAll:"off",nextSlideOnWindowFocus:"off",disableFocusListener:!1}})});var n;e=".tp-caption.Hotcoffee-style-7,.Hotcoffee-style-7{color:rgba(255,255,255,1.00);font-size:89px;line-height:98px;font-weight:400;font-style:normal;font-family:Droid Serif;padding:0px 0px 0px 0px;text-decoration:none;text-align:left;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0px 0px 0px 0px;letter-spacing:2px;padding:0 8px}.tp-caption.Hotcoffee-style-8,.Hotcoffee-style-8{color:rgba(255,255,255,1.00);font-size:26px;line-height:32px;font-weight:400;font-style:normal;font-family:Droid Serif;padding:0px 0px 0px 0px;text-decoration:none;text-align:left;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0px 0px 0px 0px;letter-spacing:2px;padding:0 8px}.tp-caption.Hotcoffee-style-9,.Hotcoffee-style-9{color:rgba(255,255,255,1.00);font-size:16px;line-height:22px;font-weight:400;font-style:normal;font-family:Droid Serif;padding:0px 0px 0px 0px;text-decoration:none;text-align:left;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0px 0px 0px 0px;letter-spacing:0.1px;padding:0 8px;font-family:Source Sans Pro}.tp-caption.no-style,.no-style{color:rgba(0,0,0,1.00);font-size:18px;line-height:18px;font-weight:900;font-style:normal;font-family:Raleway;padding:0px 0px 0px 0px;text-decoration:none;text-align:left;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0px 0px 0px 0px;letter-spacing:inherit;background-color:transparent;border-color:inherit;border-radius:0 0 0 0;border-width:0;color:inherit;font-family:inherit;font-size:inherit;font-style:inherit;font-weight:inherit;line-height:inherit;padding:inherit}";(n=document.getElementById("rs-plugin-settings-inline-css"))?n.innerHTML=n.innerHTML+e:((n=document.createElement("div")).innerHTML="<style>"+e+"</style>",document.getElementsByTagName("head")[0].appendChild(n.childNodes[0]));function t(e){var t="Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";t+="<br> This includes make eliminates the revolution slider libraries, and make it not work.",t+="<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.",t="<span style='font-size:16px;color:#BC0C06;'>"+(t+="<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.")+"</span>",jQuery(e).show().html(t)}(function(){try{var e,t=new Object,o=jQuery(window).width(),n=9999,i=0,a=0,r=0,l=0,s=0;if(t.c=jQuery("#rev_slider_2_2"),t.gridwidth=[1240],t.gridheight=[840],t.sliderLayout="auto",t.responsiveLevels&&(jQuery.each(t.responsiveLevels,function(e,t){t>o&&(n=i=t,r=e),o>t&&t>i&&(i=t,a=e)}),n>i&&(r=a)),l=t.gridheight[r]||t.gridheight[0]||t.gridheight,e=t.gridwidth[r]||t.gridwidth[0]||t.gridwidth,s=(s=o/e)>1?1:s,l=Math.round(s*l),"fullscreen"==t.sliderLayout){var d=(t.c.width(),jQuery(window).height());if(null!=t.fullScreenOffsetContainer){var p=t.fullScreenOffsetContainer.split(",");p&&(jQuery.each(p,function(e,t){d=jQuery(t).length>0?d-jQuery(t).outerHeight(!0):d}),t.fullScreenOffset.split("%").length>1&&null!=t.fullScreenOffset&&t.fullScreenOffset.length>0?d-=jQuery(window).height()*parseInt(t.fullScreenOffset,0)/100:null!=t.fullScreenOffset&&t.fullScreenOffset.length>0&&(d-=parseInt(t.fullScreenOffset,0)))}l=d}else null!=t.minHeight&&l<t.minHeight&&(l=t.minHeight);t.c.closest(".rev_slider_wrapper").css({height:l})}catch(e){console.log("Failure at Presize of Slider:"+e)}})();var i,a=(i=jQuery)("#rev_slider_2_2");i(window).on("load",function(){void 0===a.revolution?t("#rev_slider_2_2"):a.show().revolution({sliderType:"standard",jsFileLocation:"//hotcoffee.themerex.net/wp-content/plugins/revslider/public/assets/js/",sliderLayout:"auto",dottedOverlay:"none",delay:9e3,navigation:{keyboardNavigation:"off",keyboard_direction:"horizontal",mouseScrollNavigation:"off",onHoverStop:"off",touch:{touchenabled:"on",swipe_threshold:75,swipe_min_touches:50,swipe_direction:"horizontal",drag_block_vertical:!1},bullets:{enable:!0,hide_onmobile:!0,hide_under:600,style:"",hide_onleave:!1,direction:"horizontal",h_align:"center",v_align:"bottom",h_offset:0,v_offset:70,space:16,tmp:'<span class="tp-bullet-image"></span><span class="tp-bullet-title"></span>'}},visibilityLevels:[1240,1024,778,480],gridwidth:1240,gridheight:840,lazyType:"none",shadow:0,spinner:"spinner0",stopLoop:"off",stopAfterLoops:-1,stopAtSlide:-1,shuffle:"off",autoHeight:"off",disableProgressBar:"on",hideThumbsOnMobile:"off",hideSliderAtLimit:0,hideCaptionAtLimit:0,hideAllCaptionAtLilmit:0,debugMode:!1,fallbacks:{simplifyAll:"off",nextSlideOnWindowFocus:"off",disableFocusListener:!1}})})}function initEssentialGrid(){"use strict";function e(e,t){var o=e,n=0,i=9999,a=0,r=0,l=0,s=0,d=0,p=[{width:1400,amount:3},{width:1170,amount:3},{width:1024,amount:3},{width:960,amount:3},{width:778,amount:3},{width:640,amount:3},{width:480,amount:1}];null!=p&&p.length>0&&jQuery.each(p,function(e,t){var p=null!=t.width?t.width:0,c=null!=t.amount?t.amount:0;i>p&&(i=p,r=c,d=e),a<p&&(a=p,lamount=c),p>n&&p<=o&&(n=p,l=c,s=e)}),i>e&&(l=r,s=d);var c=new Object;return c.index=s,c.column=l,"id"===t?c:l}var t=jQuery("#esg-grid-3-1");function e(e,t){var o=e,n=0,i=9999,a=0,r=0,l=0,s=0,d=0,p=[{width:1400,amount:3},{width:1170,amount:3},{width:1024,amount:3},{width:960,amount:3},{width:778,amount:3},{width:640,amount:3},{width:480,amount:1}];null!=p&&p.length>0&&jQuery.each(p,function(e,t){var p=null!=t.width?t.width:0,c=null!=t.amount?t.amount:0;i>p&&(i=p,r=c,d=e),a<p&&(a=p,lamount=c),p>n&&p<=o&&(n=p,l=c,s=e)}),i>e&&(l=r,s=d);var c=new Object;return c.index=s,c.column=l,"id"===t?c:l}function e(e,t){var o=e,n=0,i=9999,a=0,r=0,l=0,s=0,d=0,p=[{width:1400,amount:3},{width:1170,amount:3},{width:1024,amount:3},{width:960,amount:3},{width:778,amount:3},{width:640,amount:3},{width:480,amount:1}];null!=p&&p.length>0&&jQuery.each(p,function(e,t){var p=null!=t.width?t.width:0,c=null!=t.amount?t.amount:0;i>p&&(i=p,r=c,d=e),a<p&&(a=p,lamount=c),p>n&&p<=o&&(n=p,l=c,s=e)}),i>e&&(l=r,s=d);var c=new Object;return c.index=s,c.column=l,"id"===t?c:l}jQuery(window).on("load",function(){t.tpessential({gridID:3,layout:"cobbles",forceFullWidth:"off",lazyLoad:"off",row:3,loadMoreAjaxToken:"0c69fd013a",loadMoreAjaxUrl:"",loadMoreAjaxAction:"Essential_Grid_Front_request_ajax",ajaxContentTarget:"ess-grid-ajax-container-",ajaxScrollToOffset:"0",ajaxCloseButton:"off",ajaxContentSliding:"on",ajaxScrollToOnLoad:"on",ajaxNavButton:"off",ajaxCloseType:"type1",ajaxCloseInner:"false",ajaxCloseStyle:"light",ajaxClosePosition:"tr",space:10,pageAnimation:"fade",paginationScrollToTop:"off",spinner:"spinner0",lightBoxMode:"all",animSpeed:1e3,delayBasic:1,mainhoverdelay:1,filterType:"single",showDropFilter:"hover",filterGroupClass:"esg-fgc-3",googleFonts:["Open+Sans:300,400,600,700,800","Raleway:100,200,300,400,500,600,700,800,900","Droid+Serif:400,700"],aspectratio:"4:3",responsiveEntries:[{width:1400,amount:3},{width:1170,amount:3},{width:1024,amount:3},{width:960,amount:3},{width:778,amount:3},{width:640,amount:3},{width:480,amount:1}]});try{jQuery("#esg-grid-3-1 .esgbox").esgbox({padding:[0,0,0,0],afterLoad:function(){if(this.element.hasClass("esgboxhtml5")){var e=this.element.data("mp4"),t=this.element.data("ogv"),o=this.element.data("webm");this.content='<div style="width:100%;height:100%;"><video autoplay="true" loop="" class="rowbgimage" poster="" width="100%" height="auto"><source src="'+e+'" type="video/mp4"><source src="'+o+'" type="video/webm"><source src="'+t+'" type="video/ogg"></video></div>';var n=setInterval(function(){jQuery(window).trigger("resize")},100);setTimeout(function(){clearInterval(n)},2500)}},beforeShow:function(){this.title=jQuery(this.element).attr("lgtitle"),this.title&&(this.title="",this.title='<div style="padding:0px 0px 0px 0px">'+this.title+"</div>")},afterShow:function(){},openEffect:"fade",closeEffect:"fade",nextEffect:"fade",prevEffect:"fade",openSpeed:"normal",closeSpeed:"normal",nextSpeed:"normal",prevSpeed:"normal",helpers:{media:{},title:{type:""}}})}catch(e){}}),jQuery(window).on("load",function(){t.tpessential({gridID:3,layout:"cobbles",forceFullWidth:"off",lazyLoad:"off",row:3,loadMoreAjaxToken:"0c69fd013a",loadMoreAjaxUrl:"",loadMoreAjaxAction:"Essential_Grid_Front_request_ajax",ajaxContentTarget:"ess-grid-ajax-container-",ajaxScrollToOffset:"0",ajaxCloseButton:"off",ajaxContentSliding:"on",ajaxScrollToOnLoad:"on",ajaxNavButton:"off",ajaxCloseType:"type1",ajaxCloseInner:"false",ajaxCloseStyle:"light",ajaxClosePosition:"tr",space:10,pageAnimation:"fade",paginationScrollToTop:"off",spinner:"spinner0",lightBoxMode:"all",animSpeed:1e3,delayBasic:1,mainhoverdelay:1,filterType:"single",showDropFilter:"hover",filterGroupClass:"esg-fgc-3",googleFonts:["Open+Sans:300,400,600,700,800","Raleway:100,200,300,400,500,600,700,800,900","Droid+Serif:400,700"],aspectratio:"4:3",responsiveEntries:[{width:1400,amount:3},{width:1170,amount:3},{width:1024,amount:3},{width:960,amount:3},{width:778,amount:3},{width:640,amount:3},{width:480,amount:1}]});try{jQuery("#esg-grid-3-1 .esgbox").esgbox({padding:[0,0,0,0],afterLoad:function(){if(this.element.hasClass("esgboxhtml5")){var e=this.element.data("mp4"),t=this.element.data("ogv"),o=this.element.data("webm");this.content='<div style="width:100%;height:100%;"><video autoplay="true" loop="" class="rowbgimage" poster="" width="100%" height="auto"><source src="'+e+'" type="video/mp4"><source src="'+o+'" type="video/webm"><source src="'+t+'" type="video/ogg"></video></div>';var n=setInterval(function(){jQuery(window).trigger("resize")},100);setTimeout(function(){clearInterval(n)},2500)}},beforeShow:function(){this.title=jQuery(this.element).attr("lgtitle"),this.title&&(this.title="",this.title='<div style="padding:0px 0px 0px 0px">'+this.title+"</div>")},afterShow:function(){},openEffect:"fade",closeEffect:"fade",nextEffect:"fade",prevEffect:"fade",openSpeed:"normal",closeSpeed:"normal",nextSpeed:"normal",prevSpeed:"normal",helpers:{media:{},title:{type:""}}})}catch(e){}});var o=jQuery("#esg-grid-1-1"),n=0,i=(s=o).width(),a="4:3",r=e(jQuery(window).width(),"id"),l=3;function e(e,t){var o=e,n=0,i=9999,a=0,r=0,l=0,s=0,d=0,p=[{width:1400,amount:3},{width:1170,amount:3},{width:1024,amount:3},{width:960,amount:3},{width:778,amount:3},{width:640,amount:3},{width:480,amount:1}];null!=p&&p.length>0&&jQuery.each(p,function(e,t){var p=null!=t.width?t.width:0,c=null!=t.amount?t.amount:0;i>p&&(i=p,r=c,d=e),a<p&&(a=p),p>n&&p<=o&&(n=p,l=c,s=e)}),i>e&&(l=r,s=d);var c=new Object;return c.index=s,c.column=l,"id"===t?c:l}a=a.split(":"),n=(n=i/(parseInt(a[0],0)/parseInt(a[1],0)))/r.column*l,s.find("ul").first().css({display:"block",height:n+"px"}),jQuery(window).on("load",function(){o.tpessential({gridID:1,layout:"even",forceFullWidth:"off",lazyLoad:"off",row:3,loadMoreAjaxToken:"0c69fd013a",loadMoreAjaxUrl:"",loadMoreAjaxAction:"Essential_Grid_Front_request_ajax",ajaxContentTarget:"ess-grid-ajax-container-",ajaxScrollToOffset:"0",ajaxCloseButton:"off",ajaxContentSliding:"on",ajaxScrollToOnLoad:"on",ajaxNavButton:"off",ajaxCloseType:"type1",ajaxCloseInner:"false",ajaxCloseStyle:"light",ajaxClosePosition:"tr",space:10,pageAnimation:"fade",paginationScrollToTop:"off",spinner:"spinner0",evenGridMasonrySkinPusher:"off",lightBoxMode:"all",animSpeed:1e3,delayBasic:1,mainhoverdelay:1,filterType:"single",showDropFilter:"hover",filterGroupClass:"esg-fgc-1",googleFonts:["Open+Sans:300,400,600,700,800","Raleway:100,200,300,400,500,600,700,800,900","Droid+Serif:400,700"],aspectratio:"4:3",responsiveEntries:[{width:1400,amount:3},{width:1170,amount:3},{width:1024,amount:3},{width:960,amount:3},{width:778,amount:3},{width:640,amount:3},{width:480,amount:1}]});try{jQuery("#esg-grid-1-1 .esgbox").esgbox({padding:[0,0,0,0],afterLoad:function(){if(this.element.hasClass("esgboxhtml5")){var e=this.element.data("mp4"),t=this.element.data("ogv"),o=this.element.data("webm");this.content='<div style="width:100%;height:100%;"><video autoplay="true" loop="" class="rowbgimage" poster="" width="100%" height="auto"><source src="'+e+'" type="video/mp4"><source src="'+o+'" type="video/webm"><source src="'+t+'" type="video/ogg"></video></div>';var n=setInterval(function(){jQuery(window).trigger("resize")},100);setTimeout(function(){clearInterval(n)},2500)}},beforeShow:function(){this.title=jQuery(this.element).attr("lgtitle"),this.title&&(this.title="",this.title='<div style="padding:0px 0px 0px 0px">'+this.title+"</div>")},afterShow:function(){},openEffect:"fade",closeEffect:"fade",nextEffect:"fade",prevEffect:"fade",openSpeed:"normal",closeSpeed:"normal",nextSpeed:"normal",prevSpeed:"normal",helpers:{media:{},title:{type:""}}})}catch(e){}});var s,d=jQuery("#esg-grid-2-1");jQuery(window).on("load",function(){d.tpessential({gridID:2,layout:"masonry",forceFullWidth:"off",lazyLoad:"off",row:3,loadMoreAjaxToken:"0c69fd013a",loadMoreAjaxUrl:"",loadMoreAjaxAction:"Essential_Grid_Front_request_ajax",ajaxContentTarget:"ess-grid-ajax-container-",ajaxScrollToOffset:"0",ajaxCloseButton:"off",ajaxContentSliding:"on",ajaxScrollToOnLoad:"on",ajaxNavButton:"off",ajaxCloseType:"type1",ajaxCloseInner:"false",ajaxCloseStyle:"light",ajaxClosePosition:"tr",space:10,pageAnimation:"fade",paginationScrollToTop:"off",spinner:"spinner0",lightBoxMode:"all",animSpeed:1e3,delayBasic:1,mainhoverdelay:1,filterType:"single",showDropFilter:"hover",filterGroupClass:"esg-fgc-2",googleFonts:["Open+Sans:300,400,600,700,800","Raleway:100,200,300,400,500,600,700,800,900","Droid+Serif:400,700"],responsiveEntries:[{width:1400,amount:3},{width:1170,amount:3},{width:1024,amount:3},{width:960,amount:3},{width:778,amount:3},{width:640,amount:3},{width:480,amount:1}]});try{jQuery("#esg-grid-2-1 .esgbox").esgbox({padding:[0,0,0,0],afterLoad:function(){if(this.element.hasClass("esgboxhtml5")){var e=this.element.data("mp4"),t=this.element.data("ogv"),o=this.element.data("webm");this.content='<div style="width:100%;height:100%;"><video autoplay="true" loop="" class="rowbgimage" poster="" width="100%" height="auto"><source src="'+e+'" type="video/mp4"><source src="'+o+'" type="video/webm"><source src="'+t+'" type="video/ogg"></video></div>';var n=setInterval(function(){jQuery(window).trigger("resize")},100);setTimeout(function(){clearInterval(n)},2500)}},beforeShow:function(){this.title=jQuery(this.element).attr("lgtitle"),this.title&&(this.title="",this.title='<div style="padding:0px 0px 0px 0px">'+this.title+"</div>")},afterShow:function(){},openEffect:"fade",closeEffect:"fade",nextEffect:"fade",prevEffect:"fade",openSpeed:"normal",closeSpeed:"normal",nextSpeed:"normal",prevSpeed:"normal",helpers:{media:{},title:{type:""}}})}catch(e){}})}function initDatepicker(){"use strict";jQuery.datepicker.setDefaults({closeText:"Close",currentText:"Today",monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],monthNamesShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],nextText:"Next",prevText:"Previous",dayNames:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],dayNamesShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],dayNamesMin:["S","M","T","W","T","F","S"],dateFormat:"MM d, yy",firstDay:1,isRTL:!1})}jQuery(document).on("ready",function(){"use strict";jQuery(".rev_slider").length>0&&initRevSlider(),jQuery(".esg-grid").length>0&&initEssentialGrid(),jQuery(".booked-calendar").length>0&&initDatepicker()}),window._wpemojiSettings={baseUrl:"https://s.w.org/images/core/emoji/2.2.1/72x72/",ext:".png",svgUrl:"https://s.w.org/images/core/emoji/2.2.1/svg/",svgExt:".svg",source:{concatemoji:"http://hotcoffee.themerex.net/wp-includes/js/wp-emoji-release.min.js?ver=4.7.5"}},function(e,t,o){"use strict";function n(e){var t,o,n=String.fromCharCode;if(!p||!p.fillText)return!1;switch(p.clearRect(0,0,d.width,d.height),p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return p.fillText(n(55356,56826,55356,56819),0,0),!(d.toDataURL().length<3e3)&&(p.clearRect(0,0,d.width,d.height),p.fillText(n(55356,57331,65039,8205,55356,57096),0,0),t=d.toDataURL(),p.clearRect(0,0,d.width,d.height),p.fillText(n(55356,57331,55356,57096),0,0),t!==d.toDataURL());case"emoji4":return p.fillText(n(55357,56425,55356,57341,8205,55357,56507),0,0),o=d.toDataURL(),p.clearRect(0,0,d.width,d.height),p.fillText(n(55357,56425,55356,57341,55357,56507),0,0),o!==d.toDataURL()}return!1}function i(e){var o=t.createElement("script");o.src=e,o.defer=o.type="text/javascript",t.getElementsByTagName("head")[0].appendChild(o)}var a,r,l,s,d=t.createElement("canvas"),p=d.getContext&&d.getContext("2d");for(s=Array("flag","emoji4"),o.supports={everything:!0,everythingExceptFlag:!0},l=0;l<s.length;l++)o.supports[s[l]]=n(s[l]),o.supports.everything=o.supports.everything&&o.supports[s[l]],"flag"!==s[l]&&(o.supports.everythingExceptFlag=o.supports.everythingExceptFlag&&o.supports[s[l]]);o.supports.everythingExceptFlag=o.supports.everythingExceptFlag&&!o.supports.flag,o.DOMReady=!1,o.readyCallback=function(){o.DOMReady=!0},o.supports.everything||(r=function(){o.readyCallback()},t.addEventListener?(t.addEventListener("DOMContentLoaded",r,!1),e.addEventListener("load",r,!1)):(e.attachEvent("onload",r),t.attachEvent("onreadystatechange",function(){"complete"===t.readyState&&o.readyCallback()})),(a=o.source||{}).concatemoji?i(a.concatemoji):a.wpemoji&&a.twemoji&&(i(a.twemoji),i(a.wpemoji)))}(window,document,window._wpemojiSettings),function(){"use strict"}();var HOTCOFFEE_STORAGE=getStorage();function getStorage(){"use strict";if(void 0===(e={}))var e={};if(""===e.theme_font&&(e.theme_font="Source Sans Pro"),e.theme_skin_color="",e.theme_skin_bg_color="",void 0===e)e={};if(e.strings={ajax_error:"Invalid server answer",bookmark_add:"Add the bookmark",bookmark_added:"Current page has been successfully added to the bookmarks. You can see it in the right panel on the tab &#039;Bookmarks&#039;",bookmark_del:"Delete this bookmark",bookmark_title:"Enter bookmark title",bookmark_exists:"Current page already exists in the bookmarks list",search_error:"Error occurs in AJAX search! Please, type your query and press search icon for the traditional search way.",email_confirm:"On the e-mail address &quot;%s&quot; we sent a confirmation email. Please, open it and click on the link.",reviews_vote:"Thanks for your vote! New average rating is:",reviews_error:"Error saving your vote! Please, try again later.",error_like:"Error saving your like! Please, try again later.",error_global:"Global error text",name_empty:"The name can&#039;t be empty",name_long:"Too long name",email_empty:"Too short (or empty) email address",email_long:"Too long email address",email_not_valid:"Invalid email address",subject_empty:"The subject can&#039;t be empty",subject_long:"Too long subject",text_empty:"The message text can&#039;t be empty",text_long:"Too long message text",send_complete:"Send message complete!",send_error:"Transmit failed!",login_empty:"The Login field can&#039;t be empty",login_long:"Too long login field",login_success:"Login success! The page will be reloaded in 3 sec.",login_failed:"Login failed!",password_empty:"The password can&#039;t be empty and shorter then 4 characters",password_long:"Too long password",password_not_equal:"The passwords in both fields are not equal",registration_success:"Registration success! Please log in!",registration_failed:"Registration failed!",geocode_error:"Geocode was not successful for the following reason:",googlemap_not_avail:"Google map API not available!",editor_save_success:"Post content saved!",editor_save_error:"Error saving post data!",editor_delete_post:"You really want to delete the current post?",editor_delete_post_header:"Delete post",editor_delete_success:"Post deleted!",editor_delete_error:"Error deleting post!",editor_caption_cancel:"Cancel",editor_caption_close:"Close"},void 0===e)e={};return e.ajax_url="",e.ajax_nonce="8d4007e6be",e.site_url="",e.vc_edit_mode=!1,e.theme_font="Source Sans Pro",e.theme_skin="no_less",e.theme_skin_color="",e.theme_skin_bg_color="",e.slider_height=100,e.system_message={message:"",status:"",header:""},e.user_logged_in=!1,e.toc_menu="float",e.toc_menu_home=!0,e.toc_menu_top=!0,e.menu_fixed=!0,e.menu_mobile=1023,e.menu_slider=!0,e.menu_cache=!1,e.demo_time=0,e.media_elements_enabled=!0,e.ajax_search_enabled=!0,e.ajax_search_min_length=3,e.ajax_search_delay=200,e.css_animation=!0,e.menu_animation_in="fadeIn",e.menu_animation_out="fadeOutDown",e.popup_engine="magnific",e.email_mask="^([a-zA-Z0-9_-]+.)*[a-zA-Z0-9_-]+@[a-z0-9_-]+(.[a-z0-9_-]+)*.[a-z]{2,6}$",e.contacts_maxlength=1e3,e.comments_maxlength=1e3,e.remember_visitors_settings=!1,e.admin_mode=!1,e.isotope_resize_delta=.3,e.error_message_box=null,e.viewmore_busy=!1,e.video_resize_inited=!1,e.top_panel_height=0,e}