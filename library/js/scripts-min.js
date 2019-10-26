/*!
 * Retina.js v1.4.0
 *
 * Copyright 2016 Imulus, LLC
 * Released under the MIT license
 *
 * Retina.js is an open source script that makes it easy to serve
 * high-resolution images to devices with retina displays.
 *
 * Note: 1.4.0 is the last "simple" version that just works using the
 * old "@2x" syntax with no extra steps. The 2.0  and later versions
 * made things lots more complex without any good reason. This version
 * still works like a charm.
 *
 * Just add a @2x image at twice the resolution in the same directory
 * as your original file and this will swap it out automagically.
 *
 * Example: myimage.jpg (300x300px), myimage@2x.jpg (600x600px).
 *
 * With srcset/retina image support built-in to WordPress, why would
 * you need this? WP srcset/retina support misses any image(s) you don't 
 * upload through the Media Library like images from your theme. And 
 * some plugins don't support it: Soliloquy, I'm looking at you.
 * 
 * Commented out by default. If you don't need/want this, remove it.
 */
function updateViewportDimensions(){var e=window,i=document,o=i.documentElement,t=i.getElementsByTagName("body")[0],n,r;return{width:e.innerWidth||o.clientWidth||t.clientWidth,height:e.innerHeight||o.clientHeight||t.clientHeight}}function loadGravatars(){(viewport=updateViewportDimensions()).width>=768&&jQuery(".comment img[data-gravatar]").each((function(){jQuery(this).attr("src",jQuery(this).attr("data-gravatar"))}))}var cssua=function(e,i,o){var t=/\s*([\-\w ]+)[\s\/\:]([\d_]+\b(?:[\-\._\/]\w+)*)/,n=/([\w\-\.]+[\s\/][v]?[\d_]+\b(?:[\-\._\/]\w+)*)/g,r=/\b(?:(blackberry\w*|bb10)|(rim tablet os))(?:\/(\d+\.\d+(?:\.\w+)*))?/,a=/\bsilk-accelerated=true\b/,s=/\bfluidapp\b/,l=/(\bwindows\b|\bmacintosh\b|\blinux\b|\bunix\b)/,b=/(\bandroid\b|\bipad\b|\bipod\b|\bwindows phone\b|\bwpdesktop\b|\bxblwp7\b|\bzunewp7\b|\bwindows ce\b|\bblackberry\w*|\bbb10\b|\brim tablet os\b|\bmeego|\bwebos\b|\bpalm|\bsymbian|\bj2me\b|\bdocomo\b|\bpda\b|\bchtml\b|\bmidp\b|\bcldc\b|\w*?mobile\w*?|\w*?phone\w*?)/,p=/(\bxbox\b|\bplaystation\b|\bnintendo\s+\w+)/,d={parse:function(e,i){var o={};if(i&&(o.standalone=i),!(e=(""+e).toLowerCase()))return o;for(var d,c,u=e.split(/[()]/),m=0,w=u.length;m<w;m++)if(m%2){var f=u[m].split(";");for(d=0,c=f.length;d<c;d++)if(t.exec(f[d])){var h=RegExp.$1.split(" ").join("_"),_=RegExp.$2;(!o[h]||parseFloat(o[h])<parseFloat(_))&&(o[h]=_)}}else if(f=u[m].match(n))for(d=0,c=f.length;d<c;d++)(h=f[d].split(/[\/\s]+/)).length&&"mozilla"!==h[0]&&(o[h[0].split(" ").join("_")]=h.slice(1).join("-"));return b.exec(e)?(o.mobile=RegExp.$1,r.exec(e)&&(delete o[o.mobile],o.blackberry=o.version||RegExp.$3||RegExp.$2||RegExp.$1,RegExp.$1?o.mobile="blackberry":"0.0.1"===o.version&&(o.blackberry="7.1.0.0"))):p.exec(e)?(o.game=RegExp.$1,d=o.game.split(" ").join("_"),o.version&&!o[d]&&(o[d]=o.version)):l.exec(e)&&(o.desktop=RegExp.$1),o.intel_mac_os_x?(o.mac_os_x=o.intel_mac_os_x.split("_").join("."),delete o.intel_mac_os_x):o.cpu_iphone_os?(o.ios=o.cpu_iphone_os.split("_").join("."),delete o.cpu_iphone_os):o.cpu_os?(o.ios=o.cpu_os.split("_").join("."),delete o.cpu_os):"iphone"!==o.mobile||o.ios||(o.ios="1"),o.opera&&o.version?(o.opera=o.version,delete o.blackberry):a.exec(e)?o.silk_accelerated=!0:s.exec(e)&&(o.fluidapp=o.version),o.edge&&(delete o.applewebkit,delete o.safari,delete o.chrome,delete o.android),o.applewebkit?(o.webkit=o.applewebkit,delete o.applewebkit,o.opr&&(o.opera=o.opr,delete o.opr,delete o.chrome),o.safari&&(o.chrome||o.crios||o.fxios||o.opera||o.silk||o.fluidapp||o.phantomjs||o.mobile&&!o.ios?(delete o.safari,o.vivaldi&&delete o.chrome):o.safari=o.version&&!o.rim_tablet_os?o.version:{419:"2.0.4",417:"2.0.3",416:"2.0.2",412:"2.0",312:"1.3",125:"1.2",85:"1.0"}[parseInt(o.safari,10)]||o.safari)):o.msie||o.trident?(o.opera||(o.ie=o.msie||o.rv),delete o.msie,delete o.android,o.windows_phone_os?(o.windows_phone=o.windows_phone_os,delete o.windows_phone_os):"wpdesktop"!==o.mobile&&"xblwp7"!==o.mobile&&"zunewp7"!==o.mobile||(o.mobile="windows desktop",o.windows_phone=9>+o.ie?"7.0":10>+o.ie?"7.5":"8.0",delete o.windows_nt)):(o.gecko||o.firefox)&&(o.gecko=o.rv),o.rv&&delete o.rv,o.version&&delete o.version,o},format:function(e){var i="",o;for(o in e)if(o&&e.hasOwnProperty(o)){var t=o,n=e[o],t,r=" ua-"+(t=t.split(".").join("-"));if("string"==typeof n){for(var n,a=(n=n.split(" ").join("_").split(".").join("-")).indexOf("-");0<a;)r+=" ua-"+t+"-"+n.substring(0,a),a=n.indexOf("-",a+1);r+=" ua-"+t+"-"+n}i+=r}return i},encode:function(e){var i="",o;for(o in e)o&&e.hasOwnProperty(o)&&(i&&(i+="&"),i+=encodeURIComponent(o)+"="+encodeURIComponent(e[o]));return i}};return d.userAgent=d.ua=d.parse(i,o),i=d.format(d.ua)+" js",e.className=e.className?e.className.replace(/\bno-js\b/g,"")+i:i.substr(1),d}(document.documentElement,navigator.userAgent,navigator.standalone);
/*!------------------------------------------------------
 * jQuery nearest v1.0.3
 * http://github.com/jjenzz/jQuery.nearest
 * ------------------------------------------------------
 * Copyright (c) 2012 J. Smith (@jjenzz)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * Have you ever tried to find the nearest element down in
 * the DOM that wasn't a child? Then jQuery nearest is for you.
 * And it works traversing both up and down, finding...wait
 * for it...the nearest element. 
 * 
 * Like this: jQuery(this).nearest('.overlay');
 */!function(e,i){e.fn.nearest=function(o){function t(i){r=r?r.add(i):e(i)}var n,r,a,s,l,b=i.querySelectorAll;return this.each((function(){n=this,e.each(o.split(","),(function(){if((s=e.trim(this)).indexOf("#"))for(l=n.parentNode;l;){if((a=b?l.querySelectorAll(s):e(l).find(s)).length){t(a);break}l=l.parentNode}else t(b?i.querySelectorAll(s):e(s))}))})),r||e()}}(jQuery,document);var viewport=updateViewportDimensions(),waitForFinalEvent=function(){var e={};return function(i,o,t){t||(t="Don't call this twice without a uniqueId"),e[t]&&clearTimeout(e[t]),e[t]=setTimeout(i,o)}}(),timeToWaitForLast=100;jQuery(document).ready((function(e){loadGravatars(),(viewport=updateViewportDimensions()).width}));