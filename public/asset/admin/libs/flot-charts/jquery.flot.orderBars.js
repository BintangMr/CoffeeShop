!function(r){jQuery.plot.plugins.push({init:function(r){var n,t,a,e,o=1,i=!1,s={};function u(r,n){for(var t=new Array,a=0;a<r.length;a++)t[0]=r[a].data[0]?r[a].data[0][n]:null,t[1]=r[a].data[r[a].data.length-1]?r[a].data[r[a].data.length-1][n]:null;return t}function l(r,n){var t=r.bars.order,a=n.bars.order;return t<a?-1:t>a?1:0}function d(r,n,t){for(var a=0,o=n;o<=t;o++)a+=r[o].bars.barWidth+2*e;return a}r.hooks.processDatapoints.push(function(r,h,f){var b,c=null;if(function(r){return null!=r.bars&&r.bars.show&&null!=r.bars.order}(h)&&(function(r){r.bars.horizontal&&(i=!0)}(h),function(r){var n=i?r.getPlaceholder().innerHeight():r.getPlaceholder().innerWidth(),t=u(r.getData(),i?1:0),a=t[1]-t[0];o=a/n}(r),function(r){n=function(r){for(var n=new Array,t=[],a=0;a<r.length;a++)null!=r[a].bars.order&&r[a].bars.show&&t.indexOf(r[a].bars.order)<0&&(t.push(r[a].bars.order),n.push(r[a]));return n.sort(l)}(r.getData()),t=n.length}(r),function(r){a=void 0!==r.bars.lineWidth?r.bars.lineWidth:2,e=a*o}(h),t>=2)){var g=function(r){for(var t=0,a=0;a<n.length;++a)if(r==n[a]){t=a;break}return t+1}(h),v=(b=0,t%2!=0&&(b=n[Math.ceil(t/2)].bars.barWidth/2),b);void 0===s[h.bars.order]&&(function(r){return r<=Math.ceil(t/2)}(g)?s[h.bars.order]=-1*d(n,g-1,Math.floor(t/2)-1)-v:s[h.bars.order]=d(n,Math.ceil(t/2),g-2)+v+2*e),c=function(r,n,t){for(var a=r.pointsize,e=r.points,o=0,s=i?1:0;s<e.length;s+=a)e[s]+=t,n.data[o][3]=e[s],o++;return e}(f,h,s[h.bars.order]),f.points=c}return c})},options:{series:{bars:{order:null}}},name:"orderBars",version:"0.2"})}();