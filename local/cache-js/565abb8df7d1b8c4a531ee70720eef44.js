/* compact [
	../prive/javascript/jquery.js
	../prive/javascript/jquery.form.js
	../prive/javascript/ajaxCallback.js
	../prive/javascript/layer.js
	../prive/javascript/presentation.js
	../prive/javascript/gadgets.js
	../plugins/contact100312/javascript/contact_sortable.js
] 65.6% */

/* ../prive/javascript/jquery.js */
(function(){
var _jQuery=window.jQuery,
_$=window.$;
var jQuery=window.jQuery=window.$=function(selector,context){
return new jQuery.fn.init(selector,context)};
var quickExpr=/^[^<]*(<(.|\s)+>)[^>]*$|^#(\w+)$/,
isSimple=/^.[^:#\[\.]*$/,
undefined;
jQuery.fn=jQuery.prototype={
init:function(selector,context){
selector=selector||document;
if(selector.nodeType){
this[0]=selector;
this.length=1;
return this}
if(typeof selector=="string"){
var match=quickExpr.exec(selector);
if(match&&(match[1]||!context)){
if(match[1])
selector=jQuery.clean([match[1]],context);
else{
var elem=document.getElementById(match[3]);
if(elem){
if(elem.id!=match[3])
return jQuery().find(selector);
return jQuery(elem)}
selector=[]}
}else
return jQuery(context).find(selector)}else if(jQuery.isFunction(selector))
return jQuery(document)[jQuery.fn.ready?"ready":"load"](selector);
return this.setArray(jQuery.makeArray(selector))},
jquery:"1.2.6",
size:function(){
return this.length},
length:0,
get:function(num){
return num==undefined?
jQuery.makeArray(this):
this[num]},
pushStack:function(elems){
var ret=jQuery(elems);
ret.prevObject=this;
return ret},
setArray:function(elems){
this.length=0;
Array.prototype.push.apply(this,elems);
return this},
each:function(callback,args){
return jQuery.each(this,callback,args)},
index:function(elem){
var ret=-1;
return jQuery.inArray(
elem&&elem.jquery?elem[0]:elem
,this)},
attr:function(name,value,type){
var options=name;
if(name.constructor==String)
if(value===undefined)
return this[0]&&jQuery[type||"attr"](this[0],name);
else{
options={};
options[name]=value}
return this.each(function(i){
for(name in options)
jQuery.attr(
type?
this.style:
this,
name,jQuery.prop(this,options[name],type,i,name)
)})},
css:function(key,value){
if((key=='width'||key=='height')&&parseFloat(value)<0)
value=undefined;
return this.attr(key,value,"curCSS")},
text:function(text){
if(typeof text!="object"&&text!=null)
return this.empty().append((this[0]&&this[0].ownerDocument||document).createTextNode(text));
var ret="";
jQuery.each(text||this,function(){
jQuery.each(this.childNodes,function(){
if(this.nodeType!=8)
ret+=this.nodeType!=1?
this.nodeValue:
jQuery.fn.text([this])})});
return ret},
wrapAll:function(html){
if(this[0])
jQuery(html,this[0].ownerDocument)
.clone()
.insertBefore(this[0])
.map(function(){
var elem=this;
while(elem.firstChild)
elem=elem.firstChild;
return elem})
.append(this);
return this},
wrapInner:function(html){
return this.each(function(){
jQuery(this).contents().wrapAll(html)})},
wrap:function(html){
return this.each(function(){
jQuery(this).wrapAll(html)})},
append:function(){
return this.domManip(arguments,true,false,function(elem){
if(this.nodeType==1)
this.appendChild(elem)})},
prepend:function(){
return this.domManip(arguments,true,true,function(elem){
if(this.nodeType==1)
this.insertBefore(elem,this.firstChild)})},
before:function(){
return this.domManip(arguments,false,false,function(elem){
this.parentNode.insertBefore(elem,this)})},
after:function(){
return this.domManip(arguments,false,true,function(elem){
this.parentNode.insertBefore(elem,this.nextSibling)})},
end:function(){
return this.prevObject||jQuery([])},
find:function(selector){
var elems=jQuery.map(this,function(elem){
return jQuery.find(selector,elem)});
return this.pushStack(/[^+>] [^+>]/.test(selector)||selector.indexOf("..")>-1?
jQuery.unique(elems):
elems)},
clone:function(events){
var ret=this.map(function(){
if(jQuery.browser.msie&&!jQuery.isXMLDoc(this)){
var clone=this.cloneNode(true),
container=document.createElement("div");
container.appendChild(clone);
return jQuery.clean([container.innerHTML])[0]}else
return this.cloneNode(true)});
var clone=ret.find("*").andSelf().each(function(){
if(this[expando]!=undefined)
this[expando]=null});
if(events===true)
this.find("*").andSelf().each(function(i){
if(this.nodeType==3)
return;
var events=jQuery.data(this,"events");
for(var type in events)
for(var handler in events[type])
jQuery.event.add(clone[i],type,events[type][handler],events[type][handler].data)});
return ret},
filter:function(selector){
return this.pushStack(
jQuery.isFunction(selector)&&
jQuery.grep(this,function(elem,i){
return selector.call(elem,i)})||
jQuery.multiFilter(selector,this))},
not:function(selector){
if(selector.constructor==String)
if(isSimple.test(selector))
return this.pushStack(jQuery.multiFilter(selector,this,true));
else
selector=jQuery.multiFilter(selector,this);
var isArrayLike=selector.length&&selector[selector.length-1]!==undefined&&!selector.nodeType;
return this.filter(function(){
return isArrayLike?jQuery.inArray(this,selector)<0:this!=selector})},
add:function(selector){
return this.pushStack(jQuery.unique(jQuery.merge(
this.get(),
typeof selector=='string'?
jQuery(selector):
jQuery.makeArray(selector)
)))},
is:function(selector){
return!!selector&&jQuery.multiFilter(selector,this).length>0},
hasClass:function(selector){
return this.is("."+selector)},
val:function(value){
if(value==undefined){
if(this.length){
var elem=this[0];
if(jQuery.nodeName(elem,"select")){
var index=elem.selectedIndex,
values=[],
options=elem.options,
one=elem.type=="select-one";
if(index<0)
return null;
for(var i=one?index:0,max=one?index+1:options.length;i<max;i++){
var option=options[i];
if(option.selected){
value=jQuery.browser.msie&&!option.attributes.value.specified?option.text:option.value;
if(one)
return value;
values.push(value)}
}
return values}else
return(this[0].value||"").replace(/\r/g,"")}
return undefined}
if(value.constructor==Number)
value+='';
return this.each(function(){
if(this.nodeType!=1)
return;
if(value.constructor==Array&&/radio|checkbox/.test(this.type))
this.checked=(jQuery.inArray(this.value,value)>=0||
jQuery.inArray(this.name,value)>=0);
else if(jQuery.nodeName(this,"select")){
var values=jQuery.makeArray(value);
jQuery("option",this).each(function(){
this.selected=(jQuery.inArray(this.value,values)>=0||
jQuery.inArray(this.text,values)>=0)});
if(!values.length)
this.selectedIndex=-1}else
this.value=value})},
html:function(value){
return value==undefined?
(this[0]?
this[0].innerHTML:
null):
this.empty().append(value)},
replaceWith:function(value){
return this.after(value).remove()},
eq:function(i){
return this.slice(i,i+1)},
slice:function(){
return this.pushStack(Array.prototype.slice.apply(this,arguments))},
map:function(callback){
return this.pushStack(jQuery.map(this,function(elem,i){
return callback.call(elem,i,elem)}))},
andSelf:function(){
return this.add(this.prevObject)},
data:function(key,value){
var parts=key.split(".");
parts[1]=parts[1]?"."+parts[1]:"";
if(value===undefined){
var data=this.triggerHandler("getData"+parts[1]+"!",[parts[0]]);
if(data===undefined&&this.length)
data=jQuery.data(this[0],key);
return data===undefined&&parts[1]?
this.data(parts[0]):
data}else
return this.trigger("setData"+parts[1]+"!",[parts[0],value]).each(function(){
jQuery.data(this,key,value)})},
removeData:function(key){
return this.each(function(){
jQuery.removeData(this,key)})},
domManip:function(args,table,reverse,callback){
var clone=this.length>1,elems;
return this.each(function(){
if(!elems){
elems=jQuery.clean(args,this.ownerDocument);
if(reverse)
elems.reverse()}
var obj=this;
if(table&&jQuery.nodeName(this,"table")&&jQuery.nodeName(elems[0],"tr"))
obj=this.getElementsByTagName("tbody")[0]||this.appendChild(this.ownerDocument.createElement("tbody"));
var scripts=jQuery([]);
jQuery.each(elems,function(){
var elem=clone?
jQuery(this).clone(true)[0]:
this;
if(jQuery.nodeName(elem,"script"))
scripts=scripts.add(elem);
else{
if(elem.nodeType==1)
scripts=scripts.add(jQuery("script",elem).remove());
callback.call(obj,elem)}
});
scripts.each(evalScript)})}
};
jQuery.fn.init.prototype=jQuery.fn;
function evalScript(i,elem){
if(elem.src)
jQuery.ajax({
url:elem.src,
async:false,
dataType:"script"
});
else
jQuery.globalEval(elem.text||elem.textContent||elem.innerHTML||"");
if(elem.parentNode)
elem.parentNode.removeChild(elem)}
function now(){
return+new Date}
jQuery.extend=jQuery.fn.extend=function(){
var target=arguments[0]||{},i=1,length=arguments.length,deep=false,options;
if(target.constructor==Boolean){
deep=target;
target=arguments[1]||{};
i=2}
if(typeof target!="object"&&typeof target!="function")
target={};
if(length==i){
target=this;
--i}
for(;i<length;i++)
if((options=arguments[i])!=null)
for(var name in options){
var src=target[name],copy=options[name];
if(target===copy)
continue;
if(deep&&copy&&typeof copy=="object"&&!copy.nodeType)
target[name]=jQuery.extend(deep,
src||(copy.length!=null?[]:{})
,copy);
else if(copy!==undefined)
target[name]=copy}
return target};
var expando="jQuery"+now(),uuid=0,windowData={},
exclude=/z-?index|font-?weight|opacity|zoom|line-?height/i,
defaultView=document.defaultView||{};
jQuery.extend({
noConflict:function(deep){
window.$=_$;
if(deep)
window.jQuery=_jQuery;
return jQuery},
isFunction:function(fn){
return!!fn&&typeof fn!="string"&&!fn.nodeName&&
fn.constructor!=Array&&/^[\s[]?function/.test(fn+"")},
isXMLDoc:function(elem){
return elem.documentElement&&!elem.body||
elem.tagName&&elem.ownerDocument&&!elem.ownerDocument.body},
globalEval:function(data){
data=jQuery.trim(data);
if(data){
var head=document.getElementsByTagName("head")[0]||document.documentElement,
script=document.createElement("script");
script.type="text/javascript";
if(jQuery.browser.msie)
script.text=data;
else
script.appendChild(document.createTextNode(data));
head.insertBefore(script,head.firstChild);
head.removeChild(script)}
},
nodeName:function(elem,name){
return elem.nodeName&&elem.nodeName.toUpperCase()==name.toUpperCase()},
cache:{},
data:function(elem,name,data){
elem=elem==window?
windowData:
elem;
var id=elem[expando];
if(!id)
id=elem[expando]=++uuid;
if(name&&!jQuery.cache[id])
jQuery.cache[id]={};
if(data!==undefined)
jQuery.cache[id][name]=data;
return name?
jQuery.cache[id][name]:
id},
removeData:function(elem,name){
elem=elem==window?
windowData:
elem;
var id=elem[expando];
if(name){
if(jQuery.cache[id]){
delete jQuery.cache[id][name];
name="";
for(name in jQuery.cache[id])
break;
if(!name)
jQuery.removeData(elem)}
}else{
try{
delete elem[expando]}catch(e){
if(elem.removeAttribute)
elem.removeAttribute(expando)}
delete jQuery.cache[id]}
},
each:function(object,callback,args){
var name,i=0,length=object.length;
if(args){
if(length==undefined){
for(name in object)
if(callback.apply(object[name],args)===false)
break}else
for(;i<length;)
if(callback.apply(object[i++],args)===false)
break}else{
if(length==undefined){
for(name in object)
if(callback.call(object[name],name,object[name])===false)
break}else
for(var value=object[0];
i<length&&callback.call(value,i,value)!==false;value=object[++i]){}
}
return object},
prop:function(elem,value,type,i,name){
if(jQuery.isFunction(value))
value=value.call(elem,i);
return value&&value.constructor==Number&&type=="curCSS"&&!exclude.test(name)?
value+"px":
value},
className:{
add:function(elem,classNames){
jQuery.each((classNames||"").split(/\s+/),function(i,className){
if(elem.nodeType==1&&!jQuery.className.has(elem.className,className))
elem.className+=(elem.className?" ":"")+className})},
remove:function(elem,classNames){
if(elem.nodeType==1)
elem.className=classNames!=undefined?
jQuery.grep(elem.className.split(/\s+/),function(className){
return!jQuery.className.has(classNames,className)}).join(" "):
""},
has:function(elem,className){
return jQuery.inArray(className,(elem.className||elem).toString().split(/\s+/))>-1}
},
swap:function(elem,options,callback){
var old={};
for(var name in options){
old[name]=elem.style[name];
elem.style[name]=options[name]}
callback.call(elem);
for(var name in options)
elem.style[name]=old[name]},
css:function(elem,name,force){
if(name=="width"||name=="height"){
var val,props={position:"absolute",visibility:"hidden",display:"block"},which=name=="width"?["Left","Right"]:["Top","Bottom"];
function getWH(){
val=name=="width"?elem.offsetWidth:elem.offsetHeight;
var padding=0,border=0;
jQuery.each(which,function(){
padding+=parseFloat(jQuery.curCSS(elem,"padding"+this,true))||0;
border+=parseFloat(jQuery.curCSS(elem,"border"+this+"Width",true))||0});
val-=Math.round(padding+border)}
if(jQuery(elem).is(":visible"))
getWH();
else
jQuery.swap(elem,props,getWH);
return Math.max(0,val)}
return jQuery.curCSS(elem,name,force)},
curCSS:function(elem,name,force){
var ret,style=elem.style;
function color(elem){
if(!jQuery.browser.safari)
return false;
var ret=defaultView.getComputedStyle(elem,null);
return!ret||ret.getPropertyValue("color")==""}
if(name=="opacity"&&jQuery.browser.msie){
ret=jQuery.attr(style,"opacity");
return ret==""?
"1":
ret}
if(jQuery.browser.opera&&name=="display"){
var save=style.outline;
style.outline="0 solid black";
style.outline=save}
if(name.match(/float/i))
name=styleFloat;
if(!force&&style&&style[name])
ret=style[name];
else if(defaultView.getComputedStyle){
if(name.match(/float/i))
name="float";
name=name.replace(/([A-Z])/g,"-$1").toLowerCase();
var computedStyle=defaultView.getComputedStyle(elem,null);
if(computedStyle&&!color(elem))
ret=computedStyle.getPropertyValue(name);
else{
var swap=[],stack=[],a=elem,i=0;
for(;a&&color(a);a=a.parentNode)
stack.unshift(a);
for(;i<stack.length;i++)
if(color(stack[i])){
swap[i]=stack[i].style.display;
stack[i].style.display="block"}
ret=name=="display"&&swap[stack.length-1]!=null?
"none":
(computedStyle&&computedStyle.getPropertyValue(name))||"";
for(i=0;i<swap.length;i++)
if(swap[i]!=null)
stack[i].style.display=swap[i]}
if(name=="opacity"&&ret=="")
ret="1"}else if(elem.currentStyle){
var camelCase=name.replace(/\-(\w)/g,function(all,letter){
return letter.toUpperCase()});
ret=elem.currentStyle[name]||elem.currentStyle[camelCase];
if(!/^\d+(px)?$/i.test(ret)&&/^\d/.test(ret)){
var left=style.left,rsLeft=elem.runtimeStyle.left;
elem.runtimeStyle.left=elem.currentStyle.left;
style.left=ret||0;
ret=style.pixelLeft+"px";
style.left=left;
elem.runtimeStyle.left=rsLeft}
}
return ret},
clean:function(elems,context){
var ret=[];
context=context||document;
if(typeof context.createElement=='undefined')
context=context.ownerDocument||context[0]&&context[0].ownerDocument||document;
jQuery.each(elems,function(i,elem){
if(!elem)
return;
if(elem.constructor==Number)
elem+='';
if(typeof elem=="string"){
elem=elem.replace(/(<(\w+)[^>]*?)\/>/g,function(all,front,tag){
return tag.match(/^(abbr|br|col|img|input|link|meta|param|hr|area|embed)$/i)?
all:
front+"></"+tag+">"});
var tags=jQuery.trim(elem).toLowerCase(),div=context.createElement("div");
var wrap=
!tags.indexOf("<opt")&&
[1,"<select multiple='multiple'>","</select>"]||
!tags.indexOf("<leg")&&
[1,"<fieldset>","</fieldset>"]||
tags.match(/^<(thead|tbody|tfoot|colg|cap)/)&&
[1,"<table>","</table>"]||
!tags.indexOf("<tr")&&
[2,"<table><tbody>","</tbody></table>"]||
(!tags.indexOf("<td")||!tags.indexOf("<th"))&&
[3,"<table><tbody><tr>","</tr></tbody></table>"]||
!tags.indexOf("<col")&&
[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"]||
jQuery.browser.msie&&
[1,"div<div>","</div>"]||
[0,"",""];
div.innerHTML=wrap[1]+elem+wrap[2];
while(wrap[0]--)
div=div.lastChild;
if(jQuery.browser.msie){
var tbody=!tags.indexOf("<table")&&tags.indexOf("<tbody")<0?
div.firstChild&&div.firstChild.childNodes:
wrap[1]=="<table>"&&tags.indexOf("<tbody")<0?
div.childNodes:
[];
for(var j=tbody.length-1;j>=0;--j)
if(jQuery.nodeName(tbody[j],"tbody")&&!tbody[j].childNodes.length)
tbody[j].parentNode.removeChild(tbody[j]);
if(/^\s/.test(elem))
div.insertBefore(context.createTextNode(elem.match(/^\s*/)[0]),div.firstChild)}
elem=jQuery.makeArray(div.childNodes)}
if(elem.length===0&&(!jQuery.nodeName(elem,"form")&&!jQuery.nodeName(elem,"select")))
return;
if(elem[0]==undefined||jQuery.nodeName(elem,"form")||elem.options)
ret.push(elem);
else
ret=jQuery.merge(ret,elem)});
return ret},
attr:function(elem,name,value){
if(!elem||elem.nodeType==3||elem.nodeType==8)
return undefined;
var notxml=!jQuery.isXMLDoc(elem),
set=value!==undefined,
msie=jQuery.browser.msie;
name=notxml&&jQuery.props[name]||name;
if(elem.tagName){
var special=/href|src|style/.test(name);
if(name=="selected"&&jQuery.browser.safari)
elem.parentNode.selectedIndex;
if(name in elem&&notxml&&!special){
if(set){
if(name=="type"&&jQuery.nodeName(elem,"input")&&elem.parentNode)
throw"type property can't be changed";
if(jQuery.nodeName(elem,"form")&&elem.getAttributeNode(name))
elem.setAttribute(name,""+value);
else
elem[name]=value}
if(jQuery.nodeName(elem,"form")&&elem.getAttributeNode(name))
return elem.getAttributeNode(name).nodeValue;
return elem[name]}
if(msie&&notxml&&name=="style")
return jQuery.attr(elem.style,"cssText",value);
if(set)
elem.setAttribute(name,""+value);
var attr=msie&&notxml&&special
?elem.getAttribute(name,2)
:elem.getAttribute(name);
return attr===null?undefined:attr}
if(msie&&name=="opacity"){
if(set){
elem.zoom=1;
elem.filter=(elem.filter||"").replace(/alpha\([^)]*\)/,"")+
(parseInt(value)+''=="NaN"?"":"alpha(opacity="+value*100+")")}
return elem.filter&&elem.filter.indexOf("opacity=")>=0?
(parseFloat(elem.filter.match(/opacity=([^)]*)/)[1])/100)+'':
""}
name=name.replace(/-([a-z])/ig,function(all,letter){
return letter.toUpperCase()});
if(set)
elem[name]=value;
return elem[name]},
trim:function(text){
return(text||"").replace(/^\s+|\s+$/g,"")},
makeArray:function(array){
var ret=[];
if(array!=null){
var i=array.length;
if(i==null||array.split||array.setInterval||array.call)
ret[0]=array;
else
while(i)
ret[--i]=array[i]}
return ret},
inArray:function(elem,array){
for(var i=0,length=array.length;i<length;i++)
if(array[i]===elem)
return i;
return-1},
merge:function(first,second){
var i=0,elem,pos=first.length;
if(jQuery.browser.msie){
while(elem=second[i++])
if(elem.nodeType!=8)
first[pos++]=elem}else
while(elem=second[i++])
first[pos++]=elem;
return first},
unique:function(array){
var ret=[],done={};
try{
for(var i=0,length=array.length;i<length;i++){
var id=jQuery.data(array[i]);
if(!done[id]){
done[id]=true;
ret.push(array[i])}
}
}catch(e){
ret=array}
return ret},
grep:function(elems,callback,inv){
var ret=[];
for(var i=0,length=elems.length;i<length;i++)
if(!inv!=!callback(elems[i],i))
ret.push(elems[i]);
return ret},
map:function(elems,callback){
var ret=[];
for(var i=0,length=elems.length;i<length;i++){
var value=callback(elems[i],i);
if(value!=null)
ret[ret.length]=value}
return ret.concat.apply([],ret)}
});
var userAgent=navigator.userAgent.toLowerCase();
jQuery.browser={
version:(userAgent.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/)||[])[1],
safari:/webkit/.test(userAgent),
opera:/opera/.test(userAgent),
msie:/msie/.test(userAgent)&&!/opera/.test(userAgent),
mozilla:/mozilla/.test(userAgent)&&!/(compatible|webkit)/.test(userAgent)
};
var styleFloat=jQuery.browser.msie?
"styleFloat":
"cssFloat";
jQuery.extend({
boxModel:!jQuery.browser.msie||document.compatMode=="CSS1Compat",
props:{
"for":"htmlFor",
"class":"className",
"float":styleFloat,
cssFloat:styleFloat,
styleFloat:styleFloat,
readonly:"readOnly",
maxlength:"maxLength",
cellspacing:"cellSpacing"
}
});
jQuery.each({
parent:function(elem){return elem.parentNode},
parents:function(elem){return jQuery.dir(elem,"parentNode")},
next:function(elem){return jQuery.nth(elem,2,"nextSibling")},
prev:function(elem){return jQuery.nth(elem,2,"previousSibling")},
nextAll:function(elem){return jQuery.dir(elem,"nextSibling")},
prevAll:function(elem){return jQuery.dir(elem,"previousSibling")},
siblings:function(elem){return jQuery.sibling(elem.parentNode.firstChild,elem)},
children:function(elem){return jQuery.sibling(elem.firstChild)},
contents:function(elem){return jQuery.nodeName(elem,"iframe")?elem.contentDocument||elem.contentWindow.document:jQuery.makeArray(elem.childNodes)}
},function(name,fn){
jQuery.fn[name]=function(selector){
var ret=jQuery.map(this,fn);
if(selector&&typeof selector=="string")
ret=jQuery.multiFilter(selector,ret);
return this.pushStack(jQuery.unique(ret))}});
jQuery.each({
appendTo:"append",
prependTo:"prepend",
insertBefore:"before",
insertAfter:"after",
replaceAll:"replaceWith"
},function(name,original){
jQuery.fn[name]=function(){
var args=arguments;
return this.each(function(){
for(var i=0,length=args.length;i<length;i++)
jQuery(args[i])[original](this)})}});
jQuery.each({
removeAttr:function(name){
jQuery.attr(this,name,"");
if(this.nodeType==1)
this.removeAttribute(name)},
addClass:function(classNames){
jQuery.className.add(this,classNames)},
removeClass:function(classNames){
jQuery.className.remove(this,classNames)},
toggleClass:function(classNames){
jQuery.className[jQuery.className.has(this,classNames)?"remove":"add"](this,classNames)},
remove:function(selector){
if(!selector||jQuery.filter(selector,[this]).r.length){
jQuery("*",this).add(this).each(function(){
jQuery.event.remove(this);
jQuery.removeData(this)});
if(this.parentNode)
this.parentNode.removeChild(this)}
},
empty:function(){
jQuery(">*",this).remove();
while(this.firstChild)
this.removeChild(this.firstChild)}
},function(name,fn){
jQuery.fn[name]=function(){
return this.each(fn,arguments)}});
jQuery.each(["Height","Width"],function(i,name){
var type=name.toLowerCase();
jQuery.fn[type]=function(size){
return this[0]==window?
jQuery.browser.opera&&document.body["client"+name]||
jQuery.browser.safari&&window["inner"+name]||
document.compatMode=="CSS1Compat"&&document.documentElement["client"+name]||document.body["client"+name]:
this[0]==document?
Math.max(
Math.max(document.body["scroll"+name],document.documentElement["scroll"+name]),
Math.max(document.body["offset"+name],document.documentElement["offset"+name])
):
size==undefined?
(this.length?jQuery.css(this[0],type):null):
this.css(type,size.constructor==String?size:size+"px")}});
function num(elem,prop){
return elem[0]&&parseInt(jQuery.curCSS(elem[0],prop,true),10)||0}var chars=jQuery.browser.safari&&parseInt(jQuery.browser.version)<417?
"(?:[\\w*_-]|\\\\.)":
"(?:[\\w\u0128-\uFFFF*_-]|\\\\.)",
quickChild=new RegExp("^>\\s*("+chars+"+)"),
quickID=new RegExp("^("+chars+"+)(#)("+chars+"+)"),
quickClass=new RegExp("^([#.]?)("+chars+"*)");
jQuery.extend({
expr:{
"":function(a,i,m){return m[2]=="*"||jQuery.nodeName(a,m[2])},
"#":function(a,i,m){return a.getAttribute("id")==m[2]},
":":{
lt:function(a,i,m){return i<m[3]-0},
gt:function(a,i,m){return i>m[3]-0},
nth:function(a,i,m){return m[3]-0==i},
eq:function(a,i,m){return m[3]-0==i},
first:function(a,i){return i==0},
last:function(a,i,m,r){return i==r.length-1},
even:function(a,i){return i%2==0},
odd:function(a,i){return i%2},
"first-child":function(a){return a.parentNode.getElementsByTagName("*")[0]==a},
"last-child":function(a){return jQuery.nth(a.parentNode.lastChild,1,"previousSibling")==a},
"only-child":function(a){return!jQuery.nth(a.parentNode.lastChild,2,"previousSibling")},
parent:function(a){return a.firstChild},
empty:function(a){return!a.firstChild},
contains:function(a,i,m){return(a.textContent||a.innerText||jQuery(a).text()||"").indexOf(m[3])>=0},
visible:function(a){return"hidden"!=a.type&&jQuery.css(a,"display")!="none"&&jQuery.css(a,"visibility")!="hidden"},
hidden:function(a){return"hidden"==a.type||jQuery.css(a,"display")=="none"||jQuery.css(a,"visibility")=="hidden"},
enabled:function(a){return!a.disabled},
disabled:function(a){return a.disabled},
checked:function(a){return a.checked},
selected:function(a){return a.selected||jQuery.attr(a,"selected")},
text:function(a){return"text"==a.type},
radio:function(a){return"radio"==a.type},
checkbox:function(a){return"checkbox"==a.type},
file:function(a){return"file"==a.type},
password:function(a){return"password"==a.type},
submit:function(a){return"submit"==a.type},
image:function(a){return"image"==a.type},
reset:function(a){return"reset"==a.type},
button:function(a){return"button"==a.type||jQuery.nodeName(a,"button")},
input:function(a){return/input|select|textarea|button/i.test(a.nodeName)},
has:function(a,i,m){return jQuery.find(m[3],a).length},
header:function(a){return/h\d/i.test(a.nodeName)},
animated:function(a){return jQuery.grep(jQuery.timers,function(fn){return a==fn.elem}).length}
}
},
parse:[/^(\[) *@?([\w-]+) *([!*$^~=]*) *('?"?)(.*?)\4 *\]/,/^(:)([\w-]+)\("?'?(.*?(\(.*?\))?[^(]*?)"?'?\)/,
new RegExp("^([:.#]*)("+chars+"+)")
],
multiFilter:function(expr,elems,not){
var old,cur=[];
while(expr&&expr!=old){
old=expr;
var f=jQuery.filter(expr,elems,not);
expr=f.t.replace(/^\s*,\s*/,"");
cur=not?elems=f.r:jQuery.merge(cur,f.r)}
return cur},
find:function(t,context){
if(typeof t!="string")
return[t];
if(context&&context.nodeType!=1&&context.nodeType!=9)
return[];
context=context||document;
var ret=[context],done=[],last,nodeName;
while(t&&last!=t){
var r=[];
last=t;
t=jQuery.trim(t);
var foundToken=false,
re=quickChild,
m=re.exec(t);
if(m){
nodeName=m[1].toUpperCase();
for(var i=0;ret[i];i++)
for(var c=ret[i].firstChild;c;c=c.nextSibling)
if(c.nodeType==1&&(nodeName=="*"||c.nodeName.toUpperCase()==nodeName))
r.push(c);
ret=r;
t=t.replace(re,"");
if(t.indexOf(" ")==0)continue;
foundToken=true}else{
re=/^([>+~])\s*(\w*)/i;
if((m=re.exec(t))!=null){
r=[];
var merge={};
nodeName=m[2].toUpperCase();
m=m[1];
for(var j=0,rl=ret.length;j<rl;j++){
var n=m=="~"||m=="+"?ret[j].nextSibling:ret[j].firstChild;
for(;n;n=n.nextSibling)
if(n.nodeType==1){
var id=jQuery.data(n);
if(m=="~"&&merge[id])break;
if(!nodeName||n.nodeName.toUpperCase()==nodeName){
if(m=="~")merge[id]=true;
r.push(n)}
if(m=="+")break}
}
ret=r;
t=jQuery.trim(t.replace(re,""));
foundToken=true}
}
if(t&&!foundToken){
if(!t.indexOf(",")){
if(context==ret[0])ret.shift();
done=jQuery.merge(done,ret);
r=ret=[context];
t=" "+t.substr(1,t.length)}else{
var re2=quickID;
var m=re2.exec(t);
if(m){
m=[0,m[2],m[3],m[1]]}else{
re2=quickClass;
m=re2.exec(t)}
m[2]=m[2].replace(/\\/g,"");
var elem=ret[ret.length-1];
if(m[1]=="#"&&elem&&elem.getElementById&&!jQuery.isXMLDoc(elem)){
var oid=elem.getElementById(m[2]);
if((jQuery.browser.msie||jQuery.browser.opera)&&oid&&typeof oid.id=="string"&&oid.id!=m[2])
oid=jQuery('[@id="'+m[2]+'"]',elem)[0];
ret=r=oid&&(!m[3]||jQuery.nodeName(oid,m[3]))?[oid]:[]}else{
for(var i=0;ret[i];i++){
var tag=m[1]=="#"&&m[3]?m[3]:m[1]!=""||m[0]==""?"*":m[2];
if(tag=="*"&&ret[i].nodeName.toLowerCase()=="object")
tag="param";
r=jQuery.merge(r,ret[i].getElementsByTagName(tag))}
if(m[1]==".")
r=jQuery.classFilter(r,m[2]);
if(m[1]=="#"){
var tmp=[];
for(var i=0;r[i];i++)
if(r[i].getAttribute("id")==m[2]){
tmp=[r[i]];
break}
r=tmp}
ret=r}
t=t.replace(re2,"")}
}
if(t){
var val=jQuery.filter(t,r);
ret=r=val.r;
t=jQuery.trim(val.t)}
}
if(t)
ret=[];
if(ret&&context==ret[0])
ret.shift();
done=jQuery.merge(done,ret);
return done},
classFilter:function(r,m,not){
m=" "+m+" ";
var tmp=[];
for(var i=0;r[i];i++){
var pass=(" "+r[i].className+" ").indexOf(m)>=0;
if(!not&&pass||not&&!pass)
tmp.push(r[i])}
return tmp},
filter:function(t,r,not){
var last;
while(t&&t!=last){
last=t;
var p=jQuery.parse,m;
for(var i=0;p[i];i++){
m=p[i].exec(t);
if(m){
t=t.substring(m[0].length);
m[2]=m[2].replace(/\\/g,"");
break}
}
if(!m)
break;
if(m[1]==":"&&m[2]=="not")
r=isSimple.test(m[3])?
jQuery.filter(m[3],r,true).r:
jQuery(r).not(m[3]);
else if(m[1]==".")
r=jQuery.classFilter(r,m[2],not);
else if(m[1]=="["){
var tmp=[],type=m[3];
for(var i=0,rl=r.length;i<rl;i++){
var a=r[i],z=a[jQuery.props[m[2]]||m[2]];
if(z==null||/href|src|selected/.test(m[2]))
z=jQuery.attr(a,m[2])||'';
if((type==""&&!!z||
type=="="&&z==m[5]||
type=="!="&&z!=m[5]||
type=="^="&&z&&!z.indexOf(m[5])||
type=="$="&&z.substr(z.length-m[5].length)==m[5]||
(type=="*="||type=="~=")&&z.indexOf(m[5])>=0)^not)
tmp.push(a)}
r=tmp}else if(m[1]==":"&&m[2]=="nth-child"){
var merge={},tmp=[],
test=/(-?)(\d*)n((?:\+|-)?\d*)/.exec(
m[3]=="even"&&"2n"||m[3]=="odd"&&"2n+1"||
!/\D/.test(m[3])&&"0n+"+m[3]||m[3]),
first=(test[1]+(test[2]||1))-0,last=test[3]-0;
for(var i=0,rl=r.length;i<rl;i++){
var node=r[i],parentNode=node.parentNode,id=jQuery.data(parentNode);
if(!merge[id]){
var c=1;
for(var n=parentNode.firstChild;n;n=n.nextSibling)
if(n.nodeType==1)
n.nodeIndex=c++;
merge[id]=true}
var add=false;
if(first==0){
if(node.nodeIndex==last)
add=true}else if((node.nodeIndex-last)%first==0&&(node.nodeIndex-last)/first>=0)
add=true;
if(add^not)
tmp.push(node)}
r=tmp}else{
var fn=jQuery.expr[m[1]];
if(typeof fn=="object")
fn=fn[m[2]];
if(typeof fn=="string")
fn=eval("false||function(a,i){return "+fn+";}");
r=jQuery.grep(r,function(elem,i){
return fn(elem,i,m,r)},not)}
}
return{r:r,t:t}},
dir:function(elem,dir){
var matched=[],
cur=elem[dir];
while(cur&&cur!=document){
if(cur.nodeType==1)
matched.push(cur);
cur=cur[dir]}
return matched},
nth:function(cur,result,dir,elem){
result=result||1;
var num=0;
for(;cur;cur=cur[dir])
if(cur.nodeType==1&&++num==result)
break;
return cur},
sibling:function(n,elem){
var r=[];
for(;n;n=n.nextSibling){
if(n.nodeType==1&&n!=elem)
r.push(n)}
return r}
});
jQuery.event={
add:function(elem,types,handler,data){
if(elem.nodeType==3||elem.nodeType==8)
return;
if(jQuery.browser.msie&&elem.setInterval)
elem=window;
if(!handler.guid)
handler.guid=this.guid++;
if(data!=undefined){
var fn=handler;
handler=this.proxy(fn,function(){
return fn.apply(this,arguments)});
handler.data=data}
var events=jQuery.data(elem,"events")||jQuery.data(elem,"events",{}),
handle=jQuery.data(elem,"handle")||jQuery.data(elem,"handle",function(){
if(typeof jQuery!="undefined"&&!jQuery.event.triggered)
return jQuery.event.handle.apply(arguments.callee.elem,arguments)});
handle.elem=elem;
jQuery.each(types.split(/\s+/),function(index,type){
var parts=type.split(".");
type=parts[0];
handler.type=parts[1];
var handlers=events[type];
if(!handlers){
handlers=events[type]={};
if(!jQuery.event.special[type]||jQuery.event.special[type].setup.call(elem)===false){
if(elem.addEventListener)
elem.addEventListener(type,handle,false);
else if(elem.attachEvent)
elem.attachEvent("on"+type,handle)}
}
handlers[handler.guid]=handler;
jQuery.event.global[type]=true});
elem=null},
guid:1,
global:{},
remove:function(elem,types,handler){
if(elem.nodeType==3||elem.nodeType==8)
return;
var events=jQuery.data(elem,"events"),ret,index;
if(events){
if(types==undefined||(typeof types=="string"&&types.charAt(0)=="."))
for(var type in events)
this.remove(elem,type+(types||""));
else{
if(types.type){
handler=types.handler;
types=types.type}
jQuery.each(types.split(/\s+/),function(index,type){
var parts=type.split(".");
type=parts[0];
if(events[type]){
if(handler)
delete events[type][handler.guid];
else
for(handler in events[type])
if(!parts[1]||events[type][handler].type==parts[1])
delete events[type][handler];
for(ret in events[type])break;
if(!ret){
if(!jQuery.event.special[type]||jQuery.event.special[type].teardown.call(elem)===false){
if(elem.removeEventListener)
elem.removeEventListener(type,jQuery.data(elem,"handle"),false);
else if(elem.detachEvent)
elem.detachEvent("on"+type,jQuery.data(elem,"handle"))}
ret=null;
delete events[type]}
}
})}
for(ret in events)break;
if(!ret){
var handle=jQuery.data(elem,"handle");
if(handle)handle.elem=null;
jQuery.removeData(elem,"events");
jQuery.removeData(elem,"handle")}
}
},
trigger:function(type,data,elem,donative,extra){
data=jQuery.makeArray(data);
if(type.indexOf("!")>=0){
type=type.slice(0,-1);
var exclusive=true}
if(!elem){
if(this.global[type])
jQuery("*").add([window,document]).trigger(type,data)}else{
if(elem.nodeType==3||elem.nodeType==8)
return undefined;
var val,ret,fn=jQuery.isFunction(elem[type]||null),
event=!data[0]||!data[0].preventDefault;
if(event){
data.unshift({
type:type,
target:elem,
preventDefault:function(){},
stopPropagation:function(){},
timeStamp:now()
});
data[0][expando]=true}
data[0].type=type;
if(exclusive)
data[0].exclusive=true;
var handle=jQuery.data(elem,"handle");
if(handle)
val=handle.apply(elem,data);
if((!fn||(jQuery.nodeName(elem,'a')&&type=="click"))&&elem["on"+type]&&elem["on"+type].apply(elem,data)===false)
val=false;
if(event)
data.shift();
if(extra&&jQuery.isFunction(extra)){
ret=extra.apply(elem,val==null?data:data.concat(val));
if(ret!==undefined)
val=ret}
if(fn&&donative!==false&&val!==false&&!(jQuery.nodeName(elem,'a')&&type=="click")){
this.triggered=true;
try{
elem[type]()}catch(e){}
}
this.triggered=false}
return val},
handle:function(event){
var val,ret,namespace,all,handlers;
event=arguments[0]=jQuery.event.fix(event||window.event);
namespace=event.type.split(".");
event.type=namespace[0];
namespace=namespace[1];
all=!namespace&&!event.exclusive;
handlers=(jQuery.data(this,"events")||{})[event.type];
for(var j in handlers){
var handler=handlers[j];
if(all||handler.type==namespace){
event.handler=handler;
event.data=handler.data;
ret=handler.apply(this,arguments);
if(val!==false)
val=ret;
if(ret===false){
event.preventDefault();
event.stopPropagation()}
}
}
return val},
fix:function(event){
if(event[expando]==true)
return event;
var originalEvent=event;
event={originalEvent:originalEvent};
var props="altKey attrChange attrName bubbles button cancelable charCode clientX clientY ctrlKey currentTarget data detail eventPhase fromElement handler keyCode metaKey newValue originalTarget pageX pageY prevValue relatedNode relatedTarget screenX screenY shiftKey srcElement target timeStamp toElement type view wheelDelta which".split(" ");
for(var i=props.length;i;i--)
event[props[i]]=originalEvent[props[i]];
event[expando]=true;
event.preventDefault=function(){
if(originalEvent.preventDefault)
originalEvent.preventDefault();
originalEvent.returnValue=false};
event.stopPropagation=function(){
if(originalEvent.stopPropagation)
originalEvent.stopPropagation();
originalEvent.cancelBubble=true};
event.timeStamp=event.timeStamp||now();
if(!event.target)
event.target=event.srcElement||document;
if(event.target.nodeType==3)
event.target=event.target.parentNode;
if(!event.relatedTarget&&event.fromElement)
event.relatedTarget=event.fromElement==event.target?event.toElement:event.fromElement;
if(event.pageX==null&&event.clientX!=null){
var doc=document.documentElement,body=document.body;
event.pageX=event.clientX+(doc&&doc.scrollLeft||body&&body.scrollLeft||0)-(doc.clientLeft||0);
event.pageY=event.clientY+(doc&&doc.scrollTop||body&&body.scrollTop||0)-(doc.clientTop||0)}
if(!event.which&&((event.charCode||event.charCode===0)?event.charCode:event.keyCode))
event.which=event.charCode||event.keyCode;
if(!event.metaKey&&event.ctrlKey)
event.metaKey=event.ctrlKey;
if(!event.which&&event.button)
event.which=(event.button&1?1:(event.button&2?3:(event.button&4?2:0)));
return event},
proxy:function(fn,proxy){
proxy.guid=fn.guid=fn.guid||proxy.guid||this.guid++;
return proxy},
special:{
ready:{
setup:function(){
bindReady();
return},
teardown:function(){return}
},
mouseenter:{
setup:function(){
if(jQuery.browser.msie)return false;
jQuery(this).bind("mouseover",jQuery.event.special.mouseenter.handler);
return true},
teardown:function(){
if(jQuery.browser.msie)return false;
jQuery(this).unbind("mouseover",jQuery.event.special.mouseenter.handler);
return true},
handler:function(event){
if(withinElement(event,this))return true;
event.type="mouseenter";
return jQuery.event.handle.apply(this,arguments)}
},
mouseleave:{
setup:function(){
if(jQuery.browser.msie)return false;
jQuery(this).bind("mouseout",jQuery.event.special.mouseleave.handler);
return true},
teardown:function(){
if(jQuery.browser.msie)return false;
jQuery(this).unbind("mouseout",jQuery.event.special.mouseleave.handler);
return true},
handler:function(event){
if(withinElement(event,this))return true;
event.type="mouseleave";
return jQuery.event.handle.apply(this,arguments)}
}
}
};
jQuery.fn.extend({
bind:function(type,data,fn){
return type=="unload"?this.one(type,data,fn):this.each(function(){
jQuery.event.add(this,type,fn||data,fn&&data)})},
one:function(type,data,fn){
var one=jQuery.event.proxy(fn||data,function(event){
jQuery(this).unbind(event,one);
return(fn||data).apply(this,arguments)});
return this.each(function(){
jQuery.event.add(this,type,one,fn&&data)})},
unbind:function(type,fn){
return this.each(function(){
jQuery.event.remove(this,type,fn)})},
trigger:function(type,data,fn){
return this.each(function(){
jQuery.event.trigger(type,data,this,true,fn)})},
triggerHandler:function(type,data,fn){
return this[0]&&jQuery.event.trigger(type,data,this[0],false,fn)},
toggle:function(fn){
var args=arguments,i=1;
while(i<args.length)
jQuery.event.proxy(fn,args[i++]);
return this.click(jQuery.event.proxy(fn,function(event){
this.lastToggle=(this.lastToggle||0)%i;
event.preventDefault();
return args[this.lastToggle++].apply(this,arguments)||false}))},
hover:function(fnOver,fnOut){
return this.bind('mouseenter',fnOver).bind('mouseleave',fnOut)},
ready:function(fn){
bindReady();
if(jQuery.isReady)
fn.call(document,jQuery);
else
jQuery.readyList.push(function(){return fn.call(this,jQuery)});
return this}
});
jQuery.extend({
isReady:false,
readyList:[],
ready:function(){
if(!jQuery.isReady){
jQuery.isReady=true;
if(jQuery.readyList){
jQuery.each(jQuery.readyList,function(){
this.call(document)});
jQuery.readyList=null}
jQuery(document).triggerHandler("ready")}
}
});
var readyBound=false;
function bindReady(){
if(readyBound)return;
readyBound=true;
if(document.addEventListener&&!jQuery.browser.opera)
document.addEventListener("DOMContentLoaded",jQuery.ready,false);
if(jQuery.browser.msie&&window==top)(function(){
if(jQuery.isReady)return;
try{
document.documentElement.doScroll("left")}catch(error){
setTimeout(arguments.callee,0);
return}
jQuery.ready()})();
if(jQuery.browser.opera)
document.addEventListener("DOMContentLoaded",function(){
if(jQuery.isReady)return;
for(var i=0;i<document.styleSheets.length;i++)
if(document.styleSheets[i].disabled){
setTimeout(arguments.callee,0);
return}
jQuery.ready()},false);
if(jQuery.browser.safari){
var numStyles;
(function(){
if(jQuery.isReady)return;
if(document.readyState!="loaded"&&document.readyState!="complete"){
setTimeout(arguments.callee,0);
return}
if(numStyles===undefined)
numStyles=jQuery("style, link[rel=stylesheet]").length;
if(document.styleSheets.length!=numStyles){
setTimeout(arguments.callee,0);
return}
jQuery.ready()})()}
jQuery.event.add(window,"load",jQuery.ready)}
jQuery.each(("blur,focus,load,resize,scroll,unload,click,dblclick,"+
"mousedown,mouseup,mousemove,mouseover,mouseout,change,select,"+
"submit,keydown,keypress,keyup,error").split(","),function(i,name){
jQuery.fn[name]=function(fn){
return fn?this.bind(name,fn):this.trigger(name)}});
var withinElement=function(event,elem){
var parent=event.relatedTarget;
while(parent&&parent!=elem)try{parent=parent.parentNode}catch(error){parent=elem}
return parent==elem};
jQuery(window).bind("unload",function(){
jQuery("*").add(document).unbind()});
jQuery.fn.extend({
_load:jQuery.fn.load,
load:function(url,params,callback){
if(typeof url!='string')
return this._load(url);
var off=url.indexOf(" ");
if(off>=0){
var selector=url.slice(off,url.length);
url=url.slice(0,off)}
callback=callback||function(){};
var type="GET";
if(params)
if(jQuery.isFunction(params)){
callback=params;
params=null}else{
params=jQuery.param(params);
type="POST"}
var self=this;
jQuery.ajax({
url:url,
type:type,
dataType:"html",
data:params,
complete:function(res,status){
if(status=="success"||status=="notmodified")
self.html(selector?
jQuery("<div/>")
.append(res.responseText.replace(/<script(.|\s)*?\/script>/g,""))
.find(selector):
res.responseText);
self.each(callback,[res.responseText,status,res])}
});
return this},
serialize:function(){
return jQuery.param(this.serializeArray())},
serializeArray:function(){
return this.map(function(){
return jQuery.nodeName(this,"form")?
jQuery.makeArray(this.elements):this})
.filter(function(){
return this.name&&!this.disabled&&
(this.checked||/select|textarea/i.test(this.nodeName)||/text|hidden|password/i.test(this.type))})
.map(function(i,elem){
var val=jQuery(this).val();
return val==null?null:
val.constructor==Array?
jQuery.map(val,function(val,i){
return{name:elem.name,value:val}}):
{name:elem.name,value:val}}).get()}
});
jQuery.each("ajaxStart,ajaxStop,ajaxComplete,ajaxError,ajaxSuccess,ajaxSend".split(","),function(i,o){
jQuery.fn[o]=function(f){
return this.bind(o,f)}});
var jsc=now();
jQuery.extend({
get:function(url,data,callback,type){
if(jQuery.isFunction(data)){
callback=data;
data=null}
return jQuery.ajax({
type:"GET",
url:url,
data:data,
success:callback,
dataType:type
})},
getScript:function(url,callback){
return jQuery.get(url,null,callback,"script")},
getJSON:function(url,data,callback){
return jQuery.get(url,data,callback,"json")},
post:function(url,data,callback,type){
if(jQuery.isFunction(data)){
callback=data;
data={}}
return jQuery.ajax({
type:"POST",
url:url,
data:data,
success:callback,
dataType:type
})},
ajaxSetup:function(settings){
jQuery.extend(jQuery.ajaxSettings,settings)},
ajaxSettings:{
url:location.href,
global:true,
type:"GET",
timeout:0,
contentType:"application/x-www-form-urlencoded",
processData:true,
async:true,
data:null,
username:null,
password:null,
accepts:{
xml:"application/xml, text/xml",
html:"text/html",
script:"text/javascript, application/javascript",
json:"application/json, text/javascript",
text:"text/plain",
_default:"*/*"
}
},
lastModified:{},
ajax:function(s){
s=jQuery.extend(true,s,jQuery.extend(true,{},jQuery.ajaxSettings,s));
var jsonp,jsre=/=\?(&|$)/g,status,data,
type=s.type.toUpperCase();
if(s.data&&s.processData&&typeof s.data!="string")
s.data=jQuery.param(s.data);
if(s.dataType=="jsonp"){
if(type=="GET"){
if(!s.url.match(jsre))
s.url+=(s.url.match(/\?/)?"&":"?")+(s.jsonp||"callback")+"=?"}else if(!s.data||!s.data.match(jsre))
s.data=(s.data?s.data+"&":"")+(s.jsonp||"callback")+"=?";
s.dataType="json"}
if(s.dataType=="json"&&(s.data&&s.data.match(jsre)||s.url.match(jsre))){
jsonp="jsonp"+jsc++;
if(s.data)
s.data=(s.data+"").replace(jsre,"="+jsonp+"$1");
s.url=s.url.replace(jsre,"="+jsonp+"$1");
s.dataType="script";
window[jsonp]=function(tmp){
data=tmp;
success();
complete();
window[jsonp]=undefined;
try{delete window[jsonp]}catch(e){}
if(head)
head.removeChild(script)}}
if(s.dataType=="script"&&s.cache==null)
s.cache=false;
if(s.cache===false&&type=="GET"){
var ts=now();
var ret=s.url.replace(/(\?|&)_=.*?(&|$)/,"$1_="+ts+"$2");
s.url=ret+((ret==s.url)?(s.url.match(/\?/)?"&":"?")+"_="+ts:"")}
if(s.data&&type=="GET"){
s.url+=(s.url.match(/\?/)?"&":"?")+s.data;
s.data=null}
if(s.global&&!jQuery.active++)
jQuery.event.trigger("ajaxStart");
var remote=/^(?:\w+:)?\/\/([^\/?#]+)/;
if(s.dataType=="script"&&type=="GET"
&&remote.test(s.url)&&remote.exec(s.url)[1]!=location.host){
var head=document.getElementsByTagName("head")[0];
var script=document.createElement("script");
script.src=s.url;
if(s.scriptCharset)
script.charset=s.scriptCharset;
if(!jsonp){
var done=false;
script.onload=script.onreadystatechange=function(){
if(!done&&(!this.readyState||
this.readyState=="loaded"||this.readyState=="complete")){
done=true;
success();
complete();
head.removeChild(script)}
}}
head.appendChild(script);
return undefined}
var requestDone=false;
var xhr=window.ActiveXObject?new ActiveXObject("Microsoft.XMLHTTP"):new XMLHttpRequest();
if(s.username)
xhr.open(type,s.url,s.async,s.username,s.password);
else
xhr.open(type,s.url,s.async);
try{
if(s.data)
xhr.setRequestHeader("Content-Type",s.contentType);
if(s.ifModified)
xhr.setRequestHeader("If-Modified-Since",
jQuery.lastModified[s.url]||"Thu, 01 Jan 1970 00:00:00 GMT");
xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");
xhr.setRequestHeader("Accept",s.dataType&&s.accepts[s.dataType]?
s.accepts[s.dataType]+", */*":
s.accepts._default)}catch(e){}
if(s.beforeSend&&s.beforeSend(xhr,s)===false){
s.global&&jQuery.active--;
xhr.abort();
return false}
if(s.global)
jQuery.event.trigger("ajaxSend",[xhr,s]);
var onreadystatechange=function(isTimeout){
if(!requestDone&&xhr&&(xhr.readyState==4||isTimeout=="timeout")){
requestDone=true;
if(ival){
clearInterval(ival);
ival=null}
status=isTimeout=="timeout"&&"timeout"||
!jQuery.httpSuccess(xhr)&&"error"||
s.ifModified&&jQuery.httpNotModified(xhr,s.url)&&"notmodified"||
"success";
if(status=="success"){
try{
data=jQuery.httpData(xhr,s.dataType,s.dataFilter)}catch(e){
status="parsererror"}
}
if(status=="success"){
var modRes;
try{
modRes=xhr.getResponseHeader("Last-Modified")}catch(e){}
if(s.ifModified&&modRes)
jQuery.lastModified[s.url]=modRes;
if(!jsonp)
success()}else
jQuery.handleError(s,xhr,status);
complete();
if(s.async)
xhr=null}
};
if(s.async){
var ival=setInterval(onreadystatechange,13);
if(s.timeout>0)
setTimeout(function(){
if(xhr){
xhr.abort();
if(!requestDone)
onreadystatechange("timeout")}
},s.timeout)}
try{
xhr.send(s.data)}catch(e){
jQuery.handleError(s,xhr,null,e)}
if(!s.async)
onreadystatechange();
function success(){
if(s.success)
s.success(data,status);
if(s.global)
jQuery.event.trigger("ajaxSuccess",[xhr,s])}
function complete(){
if(s.complete)
s.complete(xhr,status);
if(s.global)
jQuery.event.trigger("ajaxComplete",[xhr,s]);
if(s.global&&!--jQuery.active)
jQuery.event.trigger("ajaxStop")}
return xhr},
handleError:function(s,xhr,status,e){
if(s.error)s.error(xhr,status,e);
if(s.global)
jQuery.event.trigger("ajaxError",[xhr,s,e])},
active:0,
httpSuccess:function(xhr){
try{
return!xhr.status&&location.protocol=="file:"||
(xhr.status>=200&&xhr.status<300)||xhr.status==304||xhr.status==1223||
jQuery.browser.safari&&xhr.status==undefined}catch(e){}
return false},
httpNotModified:function(xhr,url){
try{
var xhrRes=xhr.getResponseHeader("Last-Modified");
return xhr.status==304||xhrRes==jQuery.lastModified[url]||
jQuery.browser.safari&&xhr.status==undefined}catch(e){}
return false},
httpData:function(xhr,type,filter){
var ct=xhr.getResponseHeader("content-type"),
xml=type=="xml"||!type&&ct&&ct.indexOf("xml")>=0,
data=xml?xhr.responseXML:xhr.responseText;
if(xml&&data.documentElement.tagName=="parsererror")
throw"parsererror";
if(filter)
data=filter(data,type);
if(type=="script")
jQuery.globalEval(data);
if(type=="json")
data=eval("("+data+")");
return data},
param:function(a){
var s=[];
if(a.constructor==Array||a.jquery)
jQuery.each(a,function(){
s.push(encodeURIComponent(this.name)+"="+encodeURIComponent(this.value))});
else
for(var j in a)
if(a[j]&&a[j].constructor==Array)
jQuery.each(a[j],function(){
s.push(encodeURIComponent(j)+"="+encodeURIComponent(this))});
else
s.push(encodeURIComponent(j)+"="+encodeURIComponent(jQuery.isFunction(a[j])?a[j]():a[j]));
return s.join("&").replace(/%20/g,"+")}
});
jQuery.fn.extend({
show:function(speed,callback){
return speed?
this.animate({
height:"show",width:"show",opacity:"show"
},speed,callback):
this.filter(":hidden").each(function(){
this.style.display=this.oldblock||"";
if(jQuery.css(this,"display")=="none"){
var elem=jQuery("<"+this.tagName+" />").appendTo("body");
this.style.display=elem.css("display");
if(this.style.display=="none")
this.style.display="block";
elem.remove()}
}).end()},
hide:function(speed,callback){
return speed?
this.animate({
height:"hide",width:"hide",opacity:"hide"
},speed,callback):
this.filter(":visible").each(function(){
this.oldblock=this.oldblock||jQuery.css(this,"display");
this.style.display="none"}).end()},
_toggle:jQuery.fn.toggle,
toggle:function(fn,fn2){
return jQuery.isFunction(fn)&&jQuery.isFunction(fn2)?
this._toggle.apply(this,arguments):
fn?
this.animate({
height:"toggle",width:"toggle",opacity:"toggle"
},fn,fn2):
this.each(function(){
jQuery(this)[jQuery(this).is(":hidden")?"show":"hide"]()})},
slideDown:function(speed,callback){
return this.animate({height:"show"},speed,callback)},
slideUp:function(speed,callback){
return this.animate({height:"hide"},speed,callback)},
slideToggle:function(speed,callback){
return this.animate({height:"toggle"},speed,callback)},
fadeIn:function(speed,callback){
return this.animate({opacity:"show"},speed,callback)},
fadeOut:function(speed,callback){
return this.animate({opacity:"hide"},speed,callback)},
fadeTo:function(speed,to,callback){
return this.animate({opacity:to},speed,callback)},
animate:function(prop,speed,easing,callback){
var optall=jQuery.speed(speed,easing,callback);
return this[optall.queue===false?"each":"queue"](function(){
if(this.nodeType!=1)
return false;
var opt=jQuery.extend({},optall),p,
hidden=jQuery(this).is(":hidden"),self=this;
for(p in prop){
if(prop[p]=="hide"&&hidden||prop[p]=="show"&&!hidden)
return opt.complete.call(this);
if(p=="height"||p=="width"){
opt.display=jQuery.css(this,"display");
opt.overflow=this.style.overflow}
}
if(opt.overflow!=null)
this.style.overflow="hidden";
opt.curAnim=jQuery.extend({},prop);
jQuery.each(prop,function(name,val){
var e=new jQuery.fx(self,opt,name);
if(/toggle|show|hide/.test(val))
e[val=="toggle"?hidden?"show":"hide":val](prop);
else{
var parts=val.toString().match(/^([+-]=)?([\d+-.]+)(.*)$/),
start=e.cur(true)||0;
if(parts){
var end=parseFloat(parts[2]),
unit=parts[3]||"px";
if(unit!="px"){
self.style[name]=(end||1)+unit;
start=((end||1)/e.cur(true))*start;
self.style[name]=start+unit}
if(parts[1])
end=((parts[1]=="-="?-1:1)*end)+start;
e.custom(start,end,unit)}else
e.custom(start,val,"")}
});
return true})},
queue:function(type,fn){
if(jQuery.isFunction(type)||(type&&type.constructor==Array)){
fn=type;
type="fx"}
if(!type||(typeof type=="string"&&!fn))
return queue(this[0],type);
return this.each(function(){
if(fn.constructor==Array)
queue(this,type,fn);
else{
queue(this,type).push(fn);
if(queue(this,type).length==1)
fn.call(this)}
})},
stop:function(clearQueue,gotoEnd){
var timers=jQuery.timers;
if(clearQueue)
this.queue([]);
this.each(function(){
for(var i=timers.length-1;i>=0;i--)
if(timers[i].elem==this){
if(gotoEnd)
timers[i](true);
timers.splice(i,1)}
});
if(!gotoEnd)
this.dequeue();
return this}
});
var queue=function(elem,type,array){
if(elem){
type=type||"fx";
var q=jQuery.data(elem,type+"queue");
if(!q||array)
q=jQuery.data(elem,type+"queue",jQuery.makeArray(array))}
return q};
jQuery.fn.dequeue=function(type){
type=type||"fx";
return this.each(function(){
var q=queue(this,type);
q.shift();
if(q.length)
q[0].call(this)})};
jQuery.extend({
speed:function(speed,easing,fn){
var opt=speed&&speed.constructor==Object?speed:{
complete:fn||!fn&&easing||
jQuery.isFunction(speed)&&speed,
duration:speed,
easing:fn&&easing||easing&&easing.constructor!=Function&&easing
};
opt.duration=(opt.duration&&opt.duration.constructor==Number?
opt.duration:
jQuery.fx.speeds[opt.duration])||jQuery.fx.speeds.def;
opt.old=opt.complete;
opt.complete=function(){
if(opt.queue!==false)
jQuery(this).dequeue();
if(jQuery.isFunction(opt.old))
opt.old.call(this)};
return opt},
easing:{
linear:function(p,n,firstNum,diff){
return firstNum+diff*p},
swing:function(p,n,firstNum,diff){
return((-Math.cos(p*Math.PI)/2)+0.5)*diff+firstNum}
},
timers:[],
timerId:null,
fx:function(elem,options,prop){
this.options=options;
this.elem=elem;
this.prop=prop;
if(!options.orig)
options.orig={}}
});
jQuery.fx.prototype={
update:function(){
if(this.options.step)
this.options.step.call(this.elem,this.now,this);
(jQuery.fx.step[this.prop]||jQuery.fx.step._default)(this);
if(this.prop=="height"||this.prop=="width")
this.elem.style.display="block"},
cur:function(force){
if(this.elem[this.prop]!=null&&this.elem.style[this.prop]==null)
return this.elem[this.prop];
var r=parseFloat(jQuery.css(this.elem,this.prop,force));
return r&&r>-10000?r:parseFloat(jQuery.curCSS(this.elem,this.prop))||0},
custom:function(from,to,unit){
this.startTime=now();
this.start=from;
this.end=to;
this.unit=unit||this.unit||"px";
this.now=this.start;
this.pos=this.state=0;
this.update();
var self=this;
function t(gotoEnd){
return self.step(gotoEnd)}
t.elem=this.elem;
jQuery.timers.push(t);
if(jQuery.timerId==null){
jQuery.timerId=setInterval(function(){
var timers=jQuery.timers;
for(var i=0;i<timers.length;i++)
if(!timers[i]())
timers.splice(i--,1);
if(!timers.length){
clearInterval(jQuery.timerId);
jQuery.timerId=null}
},13)}
},
show:function(){
this.options.orig[this.prop]=jQuery.attr(this.elem.style,this.prop);
this.options.show=true;
this.custom(0,this.cur());
if(this.prop=="width"||this.prop=="height")
this.elem.style[this.prop]="1px";
jQuery(this.elem).show()},
hide:function(){
this.options.orig[this.prop]=jQuery.attr(this.elem.style,this.prop);
this.options.hide=true;
this.custom(this.cur(),0)},
step:function(gotoEnd){
var t=now();
if(gotoEnd||t>this.options.duration+this.startTime){
this.now=this.end;
this.pos=this.state=1;
this.update();
this.options.curAnim[this.prop]=true;
var done=true;
for(var i in this.options.curAnim)
if(this.options.curAnim[i]!==true)
done=false;
if(done){
if(this.options.display!=null){
this.elem.style.overflow=this.options.overflow;
this.elem.style.display=this.options.display;
if(jQuery.css(this.elem,"display")=="none")
this.elem.style.display="block"}
if(this.options.hide)
this.elem.style.display="none";
if(this.options.hide||this.options.show)
for(var p in this.options.curAnim)
jQuery.attr(this.elem.style,p,this.options.orig[p])}
if(done)
this.options.complete.call(this.elem);
return false}else{
var n=t-this.startTime;
this.state=n/this.options.duration;
this.pos=jQuery.easing[this.options.easing||(jQuery.easing.swing?"swing":"linear")](this.state,n,0,1,this.options.duration);
this.now=this.start+((this.end-this.start)*this.pos);
this.update()}
return true}
};
jQuery.extend(jQuery.fx,{
speeds:{
slow:600,
fast:200,
def:400
},
step:{
scrollLeft:function(fx){
fx.elem.scrollLeft=fx.now},
scrollTop:function(fx){
fx.elem.scrollTop=fx.now},
opacity:function(fx){
jQuery.attr(fx.elem.style,"opacity",fx.now)},
_default:function(fx){
fx.elem.style[fx.prop]=fx.now+fx.unit}
}
});
jQuery.fn.offset=function(){
var left=0,top=0,elem=this[0],results;
if(elem)with(jQuery.browser){
var parent=elem.parentNode,
offsetChild=elem,
offsetParent=elem.offsetParent,
doc=elem.ownerDocument,
safari2=safari&&parseInt(version)<522&&!/adobeair/i.test(userAgent),
css=jQuery.curCSS,
fixed=css(elem,"position")=="fixed";
if(elem.getBoundingClientRect){
var box=elem.getBoundingClientRect();
add(box.left+Math.max(doc.documentElement.scrollLeft,doc.body.scrollLeft),
box.top+Math.max(doc.documentElement.scrollTop,doc.body.scrollTop));
add(-doc.documentElement.clientLeft,-doc.documentElement.clientTop)}else{
add(elem.offsetLeft,elem.offsetTop);
while(offsetParent){
add(offsetParent.offsetLeft,offsetParent.offsetTop);
if(mozilla&&!/^t(able|d|h)$/i.test(offsetParent.tagName)||safari&&!safari2)
border(offsetParent);
if(!fixed&&css(offsetParent,"position")=="fixed")
fixed=true;
offsetChild=/^body$/i.test(offsetParent.tagName)?offsetChild:offsetParent;
offsetParent=offsetParent.offsetParent}
while(parent&&parent.tagName&&!/^body|html$/i.test(parent.tagName)){
if(!/^inline|table.*$/i.test(css(parent,"display")))
add(-parent.scrollLeft,-parent.scrollTop);
if(mozilla&&css(parent,"overflow")!="visible")
border(parent);
parent=parent.parentNode}
if((safari2&&(fixed||css(offsetChild,"position")=="absolute"))||
(mozilla&&css(offsetChild,"position")!="absolute"))
add(-doc.body.offsetLeft,-doc.body.offsetTop);
if(fixed)
add(Math.max(doc.documentElement.scrollLeft,doc.body.scrollLeft),
Math.max(doc.documentElement.scrollTop,doc.body.scrollTop))}
results={top:top,left:left}}
function border(elem){
add(jQuery.curCSS(elem,"borderLeftWidth",true),jQuery.curCSS(elem,"borderTopWidth",true))}
function add(l,t){
left+=parseInt(l,10)||0;
top+=parseInt(t,10)||0}
return results};
jQuery.fn.extend({
position:function(){
var left=0,top=0,results;
if(this[0]){
var offsetParent=this.offsetParent(),
offset=this.offset(),
parentOffset=/^body|html$/i.test(offsetParent[0].tagName)?{top:0,left:0}:offsetParent.offset();
offset.top-=num(this,'marginTop');
offset.left-=num(this,'marginLeft');
parentOffset.top+=num(offsetParent,'borderTopWidth');
parentOffset.left+=num(offsetParent,'borderLeftWidth');
results={
top:offset.top-parentOffset.top,
left:offset.left-parentOffset.left
}}
return results},
offsetParent:function(){
var offsetParent=this[0].offsetParent;
while(offsetParent&&(!/^body|html$/i.test(offsetParent.tagName)&&jQuery.css(offsetParent,'position')=='static'))
offsetParent=offsetParent.offsetParent;
return jQuery(offsetParent)}
});
jQuery.each(['Left','Top'],function(i,name){
var method='scroll'+name;
jQuery.fn[method]=function(val){
if(!this[0])return;
return val!=undefined?
this.each(function(){
this==window||this==document?
window.scrollTo(
!i?val:jQuery(window).scrollLeft(),
i?val:jQuery(window).scrollTop()
):
this[method]=val}):
this[0]==window||this[0]==document?
self[i?'pageYOffset':'pageXOffset']||
jQuery.boxModel&&document.documentElement[method]||
document.body[method]:
this[0][method]}});
jQuery.each(["Height","Width"],function(i,name){
var tl=i?"Left":"Top",br=i?"Right":"Bottom";
jQuery.fn["inner"+name]=function(){
return this[name.toLowerCase()]()+
num(this,"padding"+tl)+
num(this,"padding"+br)};
jQuery.fn["outer"+name]=function(margin){
return this["inner"+name]()+
num(this,"border"+tl+"Width")+
num(this,"border"+br+"Width")+
(margin?
num(this,"margin"+tl)+num(this,"margin"+br):0)}})})();


/* ../prive/javascript/jquery.form.js */

;(function($){
$.fn.ajaxSubmit=function(options){
if(!this.length){
log('ajaxSubmit: skipping submit process - no element selected');
return this}
if(typeof options=='function')
options={success:options};
var url=this.attr('action')||window.location.href;
url=(url.match(/^([^#]+)/)||[])[1];
url=url||window.location.href;
url=(url.match(/^([^#]+)/)||[])[1];
url=url||'';
options=$.extend({
url:url,
type:this.attr('method')||'GET'
},options||{});
var veto={};
this.trigger('form-pre-serialize',[this,options,veto]);
if(veto.veto){
log('ajaxSubmit: submit vetoed via form-pre-serialize trigger');
return this}
if(options.beforeSerialize&&options.beforeSerialize(this,options)===false){
log('ajaxSubmit: submit aborted via beforeSerialize callback');
return this}
var a=this.formToArray(options.semantic);
if(options.data){
options.extraData=options.data;
for(var n in options.data){
if(options.data[n]instanceof Array){
for(var k in options.data[n])
a.push({name:n,value:options.data[n][k]})}
else
a.push({name:n,value:options.data[n]})}
}
if(options.beforeSubmit&&options.beforeSubmit(a,this,options)===false){
log('ajaxSubmit: submit aborted via beforeSubmit callback');
return this}
this.trigger('form-submit-validate',[a,this,options,veto]);
if(veto.veto){
log('ajaxSubmit: submit vetoed via form-submit-validate trigger');
return this}
var q=$.param(a);
if(options.type.toUpperCase()=='GET'){
options.url+=(options.url.indexOf('?')>=0?'&':'?')+q;
options.data=null}
else
options.data=q;
var $form=this,callbacks=[];
if(options.resetForm)callbacks.push(function(){$form.resetForm()});
if(options.clearForm)callbacks.push(function(){$form.clearForm()});
if(!options.dataType&&options.target){
var oldSuccess=options.success||function(){};
callbacks.push(function(data){
$(options.target).html(data).each(oldSuccess,arguments)})}
else if(options.success)
callbacks.push(options.success);
options.success=function(data,status){
for(var i=0,max=callbacks.length;i<max;i++)
callbacks[i].apply(options,[data,status,$form])};
var files=$('input:file',this).fieldValue();
var found=false;
for(var j=0;j<files.length;j++)
if(files[j])
found=true;
if(options.iframe||found){
if(options.closeKeepAlive)
$.get(options.closeKeepAlive,fileUpload);
else
fileUpload()}
else
$.ajax(options);
this.trigger('form-submit-notify',[this,options]);
return this;
function fileUpload(){
var form=$form[0];
if($(':input[name=submit]',form).length){
alert('Error: Form elements must not be named "submit".');
return}
var opts=$.extend({},$.ajaxSettings,options);
var s=$.extend(true,{},$.extend(true,{},$.ajaxSettings),opts);
var id='jqFormIO'+(new Date().getTime());
var $io=$('<iframe id="'+id+'" name="'+id+'" src="about:blank" />');
var io=$io[0];
$io.css({position:'absolute',top:'-1000px',left:'-1000px'});
var xhr={
aborted:0,
responseText:null,
responseXML:null,
status:0,
statusText:'n/a',
getAllResponseHeaders:function(){},
getResponseHeader:function(){},
setRequestHeader:function(){},
abort:function(){
this.aborted=1;
$io.attr('src','about:blank')}
};
var g=opts.global;
if(g&&!$.active++)$.event.trigger("ajaxStart");
if(g)$.event.trigger("ajaxSend",[xhr,opts]);
if(s.beforeSend&&s.beforeSend(xhr,s)===false){
s.global&&$.active--;
return}
if(xhr.aborted)
return;
var cbInvoked=0;
var timedOut=0;
var sub=form.clk;
if(sub){
var n=sub.name;
if(n&&!sub.disabled){
options.extraData=options.extraData||{};
options.extraData[n]=sub.value;
if(sub.type=="image"){
options.extraData[name+'.x']=form.clk_x;
options.extraData[name+'.y']=form.clk_y}
}
}
setTimeout(function(){
var t=$form.attr('target'),a=$form.attr('action');
form.setAttribute('target',id);
if(form.getAttribute('method')!='POST')
form.setAttribute('method','POST');
if(form.getAttribute('action')!=opts.url)
form.setAttribute('action',opts.url);
if(!options.skipEncodingOverride){
$form.attr({
encoding:'multipart/form-data',
enctype:'multipart/form-data'
})}
if(opts.timeout)
setTimeout(function(){timedOut=true;cb()},opts.timeout);
var extraInputs=[];
try{
if(options.extraData)
for(var n in options.extraData)
extraInputs.push(
$('<input type="hidden" name="'+n+'" value="'+options.extraData[n]+'" />')
.appendTo(form)[0]);
$io.appendTo('body');
io.attachEvent?io.attachEvent('onload',cb):io.addEventListener('load',cb,false);
form.submit()}
finally{
form.setAttribute('action',a);
t?form.setAttribute('target',t):$form.removeAttr('target');
$(extraInputs).remove()}
},10);
var nullCheckFlag=0;
function cb(){
if(cbInvoked++)return;
io.detachEvent?io.detachEvent('onload',cb):io.removeEventListener('load',cb,false);
var ok=true;
try{
if(timedOut)throw'timeout';
var data,doc;
doc=io.contentWindow?io.contentWindow.document:io.contentDocument?io.contentDocument:io.document;
if((doc.body==null||doc.body.innerHTML=='')&&!nullCheckFlag){
nullCheckFlag=1;
cbInvoked--;
setTimeout(cb,100);
return}
xhr.responseText=doc.body?doc.body.innerHTML:null;
xhr.responseXML=doc.XMLDocument?doc.XMLDocument:doc;
xhr.getResponseHeader=function(header){
var headers={'content-type':opts.dataType};
return headers[header]};
if(opts.dataType=='json'||opts.dataType=='script'){
var ta=doc.getElementsByTagName('textarea')[0];
xhr.responseText=ta?ta.value:xhr.responseText}
else if(opts.dataType=='xml'&&!xhr.responseXML&&xhr.responseText!=null){
xhr.responseXML=toXml(xhr.responseText)}
data=$.httpData(xhr,opts.dataType)}
catch(e){
ok=false;
$.handleError(opts,xhr,'error',e)}
if(ok){
opts.success(data,'success');
if(g)$.event.trigger("ajaxSuccess",[xhr,opts])}
if(g)$.event.trigger("ajaxComplete",[xhr,opts]);
if(g&&!--$.active)$.event.trigger("ajaxStop");
if(opts.complete)opts.complete(xhr,ok?'success':'error');
setTimeout(function(){
$io.remove();
xhr.responseXML=null},100)};
function toXml(s,doc){
if(window.ActiveXObject){
doc=new ActiveXObject('Microsoft.XMLDOM');
doc.async='false';
doc.loadXML(s)}
else
doc=(new DOMParser()).parseFromString(s,'text/xml');
return(doc&&doc.documentElement&&doc.documentElement.tagName!='parsererror')?doc:null}}};
$.fn.ajaxForm=function(options){
return this.ajaxFormUnbind().bind('submit.form-plugin',function(){
$(this).ajaxSubmit(options);
return false}).each(function(){
$(":submit,input:image",this).bind('click.form-plugin',function(e){
var form=this.form;
form.clk=this;
if(this.type=='image'){
if(e.offsetX!=undefined){
form.clk_x=e.offsetX;
form.clk_y=e.offsetY}else if(typeof $.fn.offset=='function'){
var offset=$(this).offset();
form.clk_x=e.pageX-offset.left;
form.clk_y=e.pageY-offset.top}else{
form.clk_x=e.pageX-this.offsetLeft;
form.clk_y=e.pageY-this.offsetTop}
}
setTimeout(function(){form.clk=form.clk_x=form.clk_y=null},10)})})};
$.fn.ajaxFormUnbind=function(){
this.unbind('submit.form-plugin');
return this.each(function(){
$(":submit,input:image",this).unbind('click.form-plugin')})};
$.fn.formToArray=function(semantic){
var a=[];
if(this.length==0)return a;
var form=this[0];
var els=semantic?form.getElementsByTagName('*'):form.elements;
if(!els)return a;
for(var i=0,max=els.length;i<max;i++){
var el=els[i];
var n=el.name;
if(!n)continue;
if(semantic&&form.clk&&el.type=="image"){
if(!el.disabled&&form.clk==el)
a.push({name:n+'.x',value:form.clk_x},{name:n+'.y',value:form.clk_y});
continue}
var v=$.fieldValue(el,true);
if(v&&v.constructor==Array){
for(var j=0,jmax=v.length;j<jmax;j++)
a.push({name:n,value:v[j]})}
else if(v!==null&&typeof v!='undefined')
a.push({name:n,value:v})}
if(!semantic&&form.clk){
var inputs=form.getElementsByTagName("input");
for(var i=0,max=inputs.length;i<max;i++){
var input=inputs[i];
var n=input.name;
if(n&&!input.disabled&&input.type=="image"&&form.clk==input)
a.push({name:n+'.x',value:form.clk_x},{name:n+'.y',value:form.clk_y})}
}
return a};
$.fn.formSerialize=function(semantic){
return $.param(this.formToArray(semantic))};
$.fn.fieldSerialize=function(successful){
var a=[];
this.each(function(){
var n=this.name;
if(!n)return;
var v=$.fieldValue(this,successful);
if(v&&v.constructor==Array){
for(var i=0,max=v.length;i<max;i++)
a.push({name:n,value:v[i]})}
else if(v!==null&&typeof v!='undefined')
a.push({name:this.name,value:v})});
return $.param(a)};
$.fn.fieldValue=function(successful){
for(var val=[],i=0,max=this.length;i<max;i++){
var el=this[i];
var v=$.fieldValue(el,successful);
if(v===null||typeof v=='undefined'||(v.constructor==Array&&!v.length))
continue;
v.constructor==Array?$.merge(val,v):val.push(v)}
return val};
$.fieldValue=function(el,successful){
var n=el.name,t=el.type,tag=el.tagName.toLowerCase();
if(typeof successful=='undefined')successful=true;
if(successful&&(!n||el.disabled||t=='reset'||t=='button'||
(t=='checkbox'||t=='radio')&&!el.checked||
(t=='submit'||t=='image')&&el.form&&el.form.clk!=el||
tag=='select'&&el.selectedIndex==-1))
return null;
if(tag=='select'){
var index=el.selectedIndex;
if(index<0)return null;
var a=[],ops=el.options;
var one=(t=='select-one');
var max=(one?index+1:ops.length);
for(var i=(one?index:0);i<max;i++){
var op=ops[i];
if(op.selected){
var v=op.value;
if(!v)
v=(op.attributes&&op.attributes['value']&&!(op.attributes['value'].specified))?op.text:op.value;
if(one)return v;
a.push(v)}
}
return a}
return el.value};
$.fn.clearForm=function(){
return this.each(function(){
$('input,select,textarea',this).clearFields()})};
$.fn.clearFields=$.fn.clearInputs=function(){
return this.each(function(){
var t=this.type,tag=this.tagName.toLowerCase();
if(t=='text'||t=='password'||tag=='textarea')
this.value='';
else if(t=='checkbox'||t=='radio')
this.checked=false;
else if(tag=='select')
this.selectedIndex=-1})};
$.fn.resetForm=function(){
return this.each(function(){
if(typeof this.reset=='function'||(typeof this.reset=='object'&&!this.reset.nodeType))
this.reset()})};
$.fn.enable=function(b){
if(b==undefined)b=true;
return this.each(function(){
this.disabled=!b})};
$.fn.selected=function(select){
if(select==undefined)select=true;
return this.each(function(){
var t=this.type;
if(t=='checkbox'||t=='radio')
this.checked=select;
else if(this.tagName.toLowerCase()=='option'){
var $sel=$(this).parent('select');
if(select&&$sel[0]&&$sel[0].type=='select-one'){
$sel.find('option').selected(false)}
this.selected=select}
})};
function log(){
if($.fn.ajaxSubmit.debug&&window.console&&window.console.log)
window.console.log('[jquery.form] '+Array.prototype.join.call(arguments,''))}})(jQuery);


/* ../prive/javascript/ajaxCallback.js */
if(!jQuery.load_handlers){
jQuery.load_handlers=new Array();
function onAjaxLoad(f){
jQuery.load_handlers.push(f)};
function triggerAjaxLoad(root){
for(var i=0;i<jQuery.load_handlers.length;i++)
jQuery.load_handlers[i].apply(root)};
jQuery.fn._ACBload=jQuery.fn.load;
jQuery.fn.load=function(url,params,callback){
callback=callback||function(){};
if(params){
if(params.constructor==Function){
callback=params;
params=null}
}
var callback2=function(res,status){triggerAjaxLoad(this);callback(res,status)};
return this._ACBload(url,params,callback2)};
jQuery._ACBajax=jQuery.ajax;
jQuery.ajax=function(type){
if(jQuery.ajax.caller==jQuery.fn._load)return jQuery._ACBajax(type);
var orig_complete=type.complete||function(){};
type.complete=function(res,status){
var dataType=type.dataType;
var ct=(res&&(typeof res.getResponseHeader=='function'))
?res.getResponseHeader("content-type"):'';
var xml=!dataType&&ct&&ct.indexOf("xml")>=0;
orig_complete(res,status);
if(!dataType&&!xml||dataType=="html")triggerAjaxLoad(document)};
return jQuery._ACBajax(type)}}
jQuery.fn.animeajax=function(end){
this.children().css('opacity',0.5);
if(typeof ajax_image_searching!='undefined'){
var i=(this).find('.image_loading');
if(i.length)i.eq(0).html(ajax_image_searching);
else this.prepend('<span class="image_loading">'+ajax_image_searching+'</span>')}
return this}
jQuery.fn.positionner=function(force){
var offset=jQuery(this).offset({'scroll':false});
var hauteur=parseInt(jQuery(this).css('height'));
var scrolltop=self['pageYOffset']||
jQuery.boxModel&&document.documentElement['scrollTop']||
document.body['scrollTop'];
var h=jQuery(window).height();
var scroll=0;
if(force||offset['top']-5<=scrolltop)
scroll=offset['top']-5;
else if(offset['top']+hauteur-h+5>scrolltop)
scroll=Math.min(offset['top']-5,offset['top']+hauteur-h+15);
if(scroll)
jQuery('html,body')
.animate({scrollTop:scroll},300);
jQuery(jQuery('*',this).filter('input[type=text],textarea')[0]).focus();
return this}
var virtualbuffer_id='spip_virtualbufferupdate';
function initReaderBuffer(){
if(jQuery('#'+virtualbuffer_id).length)return;
jQuery('body').append('<p style="float:left;width:0;height:0;position:absolute;left:-5000;top:-5000;"><input type="hidden" name="'+virtualbuffer_id+'" id="'+virtualbuffer_id+'" value="0" /></p>')}
function updateReaderBuffer(){
var i=jQuery('#'+virtualbuffer_id);
if(!i.length)return;
i.attr('value',parseInt(i.attr('value'))+1)}
jQuery.fn.formulaire_dyn_ajax=function(target){
if(this.length)
initReaderBuffer();
return this.each(function(){
var cible=target||this;
jQuery('form:not(.noajax,.bouton_action_post)',this).each(function(){
var leform=this;
var leclk,leclk_x,leclk_y;
jQuery(this).prepend("<input type='hidden' name='var_ajax' value='form' />")
.ajaxForm({
beforeSubmit:function(){
leclk=leform.clk;
if(leclk){
var n=leclk.name;
if(n&&!leclk.disabled&&leclk.type=="image"){
leclk_x=leform.clk_x;
leclk_y=leform.clk_y}
}
jQuery(cible).addClass('loading').animeajax()},
success:function(c){
if(c=='noajax'){
jQuery("input[name=var_ajax]",leform).remove();
if(leclk){
var n=leclk.name;
if(n&&!leclk.disabled){
jQuery(leform).prepend("<input type='hidden' name='"+n+"' value='"+leclk.value+"' />");
if(leclk.type=="image"){
jQuery(leform).prepend("<input type='hidden' name='"+n+".x' value='"+leform.clk_x+"' />");
jQuery(leform).prepend("<input type='hidden' name='"+n+".y' value='"+leform.clk_y+"' />")}
}
}
jQuery(leform).ajaxFormUnbind().submit()}
else{
var recu=jQuery('<div><\/div>').html(c);
var d=jQuery('div.ajax',recu);
if(d.length)
c=d.html();
jQuery(cible)
.removeClass('loading')
.html(c);
var a=jQuery('a:first',recu).eq(0);
if(a.length&&a.is('a[name=ajax_ancre]')){
a=a.attr('href');
setTimeout(function(){
jQuery(a,cible).positionner(true)},10)}
else{
jQuery(cible).positionner(false);
if(a.length&&a.is('a[name=ajax_redirect]')){
a=a.attr('href');
jQuery(cible).addClass('loading').animeajax();
setTimeout(function(){
document.location.replace(a)},10)}
}
triggerAjaxLoad(cible);
updateReaderBuffer()}
},
iframe:jQuery.browser.msie
})
.addClass('noajax')})})}
var ajax_confirm=true;
var ajax_confirm_date=0;
var spip_confirm=window.confirm;
function _confirm(message){
ajax_confirm=spip_confirm(message);
if(!ajax_confirm){
var d=new Date();
ajax_confirm_date=d.getTime()}
return ajax_confirm}
window.confirm=_confirm;
var preloaded_urls={};
var ajaxbloc_selecteur;
jQuery.fn.ajaxbloc=function(){
if(this.length)
initReaderBuffer();
return this.each(function(){
jQuery('div.ajaxbloc',this).ajaxbloc();var blocfrag=jQuery(this);
var on_pagination=function(c){
jQuery(blocfrag)
.html(c)
.removeClass('loading');
var a=jQuery('a:first',jQuery(blocfrag)).eq(0);
if(a.length&&a.is('a[name=ajax_ancre]')
){
a=a.attr('href');
setTimeout(function(){
jQuery(a,blocfrag).positionner(true)},10)}
else{
jQuery(blocfrag).positionner(false)}
updateReaderBuffer()}
var ajax_env=(""+blocfrag.attr('class')).match(/env-([^ ]+)/);
if(!ajax_env||ajax_env==undefined)return;
ajax_env=ajax_env[1];
if(ajaxbloc_selecteur==undefined)
ajaxbloc_selecteur='.pagination a,a.ajax';
jQuery(ajaxbloc_selecteur,this).not('.noajax').each(function(){
var url=this.href.split('#');
url[0]+=(url[0].indexOf("?")>0?'&':'?')+'var_ajax=1&var_ajax_env='+encodeURIComponent(ajax_env);
if(url[1])
url[0]+="&var_ajax_ancre="+url[1];
if(jQuery(this).is('.preload')&&!preloaded_urls[url[0]]){
jQuery.ajax({"url":url[0],"success":function(r){preloaded_urls[url[0]]=r}})}
jQuery(this).click(function(){
if(!ajax_confirm){
ajax_confirm=true;
var d=new Date();
if((d.getTime()-ajax_confirm_date)<=2)
return false}
jQuery(blocfrag)
.animeajax()
.addClass('loading');
if(preloaded_urls[url[0]]){
on_pagination(preloaded_urls[url[0]]);
triggerAjaxLoad(document)}else{
jQuery.ajax({
url:url[0],
success:function(c){
on_pagination(c);
preloaded_urls[url[0]]=c}
})}
return false})}).addClass('noajax');jQuery('form.bouton_action_post.ajax:not(.noajax)',this).each(function(){
var leform=this;
var url=jQuery(this).attr('action').split('#');
jQuery(this)
.prepend("<input type='hidden' name='var_ajax' value='1' /><input type='hidden' name='var_ajax_env' value='"+(ajax_env)+"' />"+(url[1]?"<input type='hidden' name='var_ajax_ancre' value='"+url[1]+"' />":""))
.ajaxForm({
beforeSubmit:function(){
jQuery(blocfrag).addClass('loading').animeajax()},
success:function(c){
on_pagination(c);
preloaded_urls={};jQuery(blocfrag)
.ajaxbloc()},
iframe:jQuery.browser.msie
})
.addClass('noajax')})})};
jQuery(function(){
jQuery('form:not(.bouton_action_post)').parents('div.ajax')
.formulaire_dyn_ajax();
jQuery('div.ajaxbloc').ajaxbloc()});
onAjaxLoad(function(){
if(jQuery){
jQuery('form:not(.bouton_action_post)',this).parents('div.ajax')
.formulaire_dyn_ajax();
jQuery('div.ajaxbloc',this)
.ajaxbloc()}
});


/* ../prive/javascript/layer.js */
var memo_obj=new Array();
var url_chargee=new Array();
var xhr_actifs={};
function findObj_test_forcer(n,forcer){
var p,i,x;
if(memo_obj[n]&&!forcer){
return memo_obj[n]}
var d=document;
if((p=n.indexOf("?"))>0&&parent.frames.length){
d=parent.frames[n.substring(p+1)].document;
n=n.substring(0,p)}
if(!(x=d[n])&&d.all){
x=d.all[n]}
for(i=0;!x&&i<d.forms.length;i++){
x=d.forms[i][n]}
for(i=0;!x&&d.layers&&i<d.layers.length;i++)x=findObj(n,d.layers[i].document);
if(!x&&document.getElementById)x=document.getElementById(n);
if(!forcer)memo_obj[n]=x;
return x}
function findObj(n){
return findObj_test_forcer(n,false)}
function findObj_forcer(n){
return findObj_test_forcer(n,true)}
function hide_obj(obj){
var element;
if(element=findObj(obj)){
jQuery(element).css("visibility","hidden")}
}
jQuery.fn.showother=function(cible){
var me=this;
if(me.is('.replie')){
me.addClass('deplie').removeClass('replie');
jQuery(cible)
.slideDown('fast',
function(){
jQuery(me)
.addClass('blocdeplie')
.removeClass('blocreplie')
.removeClass('togglewait')}
)}
return this}
jQuery.fn.hideother=function(cible){
var me=this;
if(!me.is('.replie')){
me.addClass('replie').removeClass('deplie');
jQuery(cible)
.slideUp('fast',
function(){
jQuery(me)
.addClass('blocreplie')
.removeClass('blocdeplie')
.removeClass('togglewait')}
)}
return this}
jQuery.fn.toggleother=function(cible){
if(this.is('.deplie'))
return this.hideother(cible);
else
return this.showother(cible)}
jQuery.fn.depliant=function(cible){
if(!this.is('.depliant')){
var time=400;
var me=this;
this
.addClass('depliant');
if(!me.is('.deplie')){
me.addClass('hover')
.addClass('togglewait');
var t=setTimeout(function(){
me.toggleother(cible);
t=null},time)}
me
.hover(function(e){
me
.addClass('hover');
if(!me.is('.deplie')){
me.addClass('togglewait');
if(t){clearTimeout(t);t=null}
t=setTimeout(function(){
me.toggleother(cible);
t=null},time)}
}
,function(e){
if(t){clearTimeout(t);t=null}
me
.removeClass('hover')})
.end()}
return this}
jQuery.fn.depliant_clicancre=function(cible){
var me=this.parent();
if(me.is('.togglewait'))return false;
me.toggleother(cible);
return false}
function slide_horizontal(couche,slide,align,depart,etape){
var obj=findObj_forcer(couche);
if(!obj)return;
if(!etape){
if(align=='left')depart=obj.scrollLeft;
else depart=obj.firstChild.offsetWidth-obj.scrollLeft;
etape=0}
etape=Math.round(etape)+1;
pos=Math.round(depart)+Math.round(((slide-depart)/10)*etape);
if(align=='left')obj.scrollLeft=pos;
else obj.scrollLeft=obj.firstChild.offsetWidth-pos;
if(etape<10)setTimeout("slide_horizontal('"+couche+"', '"+slide+"', '"+align+"', '"+depart+"', '"+etape+"')",60)}
function changerhighlight(couche){
jQuery(couche)
.removeClass('off')
.siblings()
.not(couche)
.addClass('off')}
function aff_selection(arg,idom,url,event){
noeud=findObj_forcer(idom);
if(noeud){
noeud.style.display="none";
charger_node_url(url+arg,noeud,'','',event)}
return false}
function aff_selection_titre(titre,id,idom,nid)
{
t=findObj_forcer('titreparent');
t.value=titre;
t=findObj_forcer(nid);
t.value=id;
jQuery(t).trigger('change');t=findObj_forcer(idom);
t.style.display='none';
p=$(t).parents('form');
if(p.is('.submit_plongeur'))p.get(p.length-1).submit()}
function admin_tech_selection_titre(titre,id,idom,nid)
{
nom=titre.replace(/\W+/g,'_');
findObj_forcer("znom_sauvegarde").value=nom;
findObj_forcer("nom_sauvegarde").value=nom;
aff_selection_titre(titre,id,idom,nid)}
function aff_selection_provisoire(id,racine,url,col,sens,informer,event)
{
charger_id_url(url.href,
racine+'_col_'+(col+1),
function(){
slide_horizontal(racine+'_principal',((col-1)*150),sens);
aff_selection(id,racine+"_selection",informer)},
event);
return false}
function onkey_rechercher(valeur,rac,url,img,nid,init){
var Field=findObj_forcer(rac);
if(!valeur.length){
init=findObj_forcer(init);
if(init&&init.href){charger_node_url(init.href,Field)}
}else{
charger_node_url(url+valeur,
Field,
function(){
var n=Field.childNodes.length-1;
if((n==1)){
noeud=Field.childNodes[n].firstChild;
if(noeud.title)
aff_selection_titre(noeud.firstChild.nodeValue,noeud.title,rac,nid)}
},
img)}
return false}
function verifForm(racine){
if(!jQuery.browser.mozilla)return;
jQuery("input.forml,input.formo,textarea.forml,textarea.formo",racine||document)
.each(function(){
var jField=jQuery(this);
var w=jField.css('width');
if(!w||w=='100%'){
jField.css('width','95%')}else{
w=parseInt(w)-
(parseInt(jField.css("borderLeftWidth"))+
parseInt(jField.css("borderRightWidth"))+
parseInt(jField.css("paddingLeft"))+
parseInt(jField.css("paddingRight")
));
jField.width(w+'px')}
});
jQuery('form',racine||document)
.keypress(function(e){
if(
(e.ctrlKey&&(
((e.charCode||e.keyCode)==115)||((e.charCode||e.keyCode)==83))
||(e.charCode==19&&e.keyCode==19)
)||(!e.charCode&&e.keyCode==119)
){
jQuery(this).find('input[type=submit]')
.click();
return false}
})}
function AjaxSqueeze(trig,id,callback,event)
{
var target=jQuery('#'+id);
if(!target.size()){return true}
return!AjaxSqueezeNode(trig,target,callback,event)}
function AjaxSqueezeNode(trig,target,f,event)
{
var i,callback;
if(!f){
callback=function(){verifForm(this)}
}
else{
callback=function(res,status){
f.apply(this,[res,status]);
verifForm(this)}
}
valid=false;
if(typeof(window['_OUTILS_DEVELOPPEURS'])!='undefined'){
if(!(navigator.userAgent.toLowerCase().indexOf("firefox/1.0")))
valid=(typeof event=='object')&&(event.altKey||event.metaKey)}
if(typeof(trig)=='string'){
if(valid){
window.open(trig+'&transformer_xml=valider_xml')}else{
jQuery(target).animeajax()}
res=jQuery.ajax({
"url":trig,
"complete":function(r,s){
AjaxRet(r,s,target,callback)}
});
return res}
if(valid){
var doc=window.open("","valider").document;
doc.open();
doc.close();
target=doc.body}
else{
jQuery(target).animeajax()}
jQuery(trig).ajaxSubmit({
"target":target,
"success":function(res,status){
if(status=='error')return this.html('Erreur HTTP');
callback.apply(this,[res,status])},
"beforeSubmit":function(vars){
if(valid)
vars.push({"name":"transformer_xml","value":"valider_xml"});
return true}
});
return true}
function AjaxNamedSubmit(input){
jQuery('<input type="hidden" />')
.attr('name',input.name)
.attr('value',input.value)
.insertAfter(input);
return true}
function AjaxRet(res,status,target,callback){
if(res.aborted)return;
if(status=='error')return jQuery(target).html('HTTP Error');
jQuery(target)
.html(res.responseText)
.each(callback,[res.responseText,status])}
function charger_id_url(myUrl,myField,jjscript,event)
{
var Field=findObj_forcer(myField);
if(!Field)return true;
if(!myUrl){
jQuery(Field).empty();
retour_id_url(Field,jjscript);
return true}else return charger_node_url(myUrl,Field,jjscript,findObj_forcer('img_'+myField),event)}
function charger_node_url(myUrl,Field,jjscript,img,event)
{
if(url_chargee[myUrl]){
var el=jQuery(Field).html(url_chargee[myUrl])[0];
retour_id_url(el,jjscript);
triggerAjaxLoad(el);
return false}else{
if(img)img.style.visibility="visible";
if(xhr_actifs[Field]){xhr_actifs[Field].aborted=true;xhr_actifs[Field].abort()}
xhr_actifs[Field]=AjaxSqueezeNode(myUrl,
Field,
function(r){
xhr_actifs[Field]=undefined;
if(img)img.style.visibility="hidden";
url_chargee[myUrl]=r;
retour_id_url(Field,jjscript);
slide_horizontal($(Field).children().attr("id")+'_principal',$(Field).width(),$(Field).css("text-align"))},
event);
return false}
}
function retour_id_url(Field,jjscript)
{
jQuery(Field).css({'visibility':'visible','display':'block'});
if(jjscript)jjscript()}
function charger_node_url_si_vide(url,noeud,gifanime,jjscript,event){
if(noeud.style.display!='none'){
noeud.style.display='none'}
else{
if(noeud.innerHTML!=""){
noeud.style.visibility="visible";
noeud.style.display="block"}else{
charger_node_url(url,noeud,'',gifanime,event)}
}
return false}
function charger_id_url_si_vide(myUrl,myField,jjscript,event){
var Field=findObj_forcer(myField);if(!Field)return;
if(Field.innerHTML==""){
charger_id_url(myUrl,myField,jjscript,event)
}
else{
Field.style.visibility="visible";
Field.style.display="block"}
}


/* ../prive/javascript/presentation.js */

$.fn.hoverClass=function(c){
return this.each(function(){
$(this).hover(
function(){$(this).addClass(c)},
function(){$(this).removeClass(c)}
)})};
var bandeau_elements=false;
var dir_page=$("html").attr("dir");
function getBiDiOffset(el){
var offset=el.offsetLeft;
if(dir_page=="rtl")
offset=(window.innerWidth||el.offsetParent.clientWidth)-(offset+el.offsetWidth);
return offset}
function decaleSousMenu(){
var sousMenu=$("div.bandeau_sec",this).css({visibility:'hidden',display:'block'});
if(!sousMenu.length)return;
var left;
if($.browser.msie){
if(sousMenu.bgIframe)sousMenu.bgIframe();
left=getBiDiOffset(sousMenu[0].parentNode)+getBiDiOffset($("#bandeau-principal div")[0])}else left=getBiDiOffset(sousMenu[0]);
if(left>0){
var demilargeur=Math.floor(sousMenu[0].offsetWidth/2);
var gauche=left-demilargeur
+Math.floor(largeur_icone/2);
if(gauche<0)gauche=0;
sousMenu.css(dir_page=="rtl"?"right":"left",gauche+"px")}
sousMenu.css({display:'',visibility:''})}
function changestyle(id_couche,element,style){
if(!bandeau_elements){
bandeau_elements=$('#haut-page div.bandeau')}
var select=$(bandeau_elements).not('#'+id_couche);
if(id_couche=='garder-recherche')select.not('#bandeaurecherche');
select.css({'visibility':'hidden','display':'none'});
if(element)
$('#'+id_couche).css({element:style});
else
$('#'+id_couche).css({'visibility':'visible','display':'block'})}
var accepter_change_statut=false;
function selec_statut(id,type,decal,puce,script){
node=findObj('imgstatut'+type+id);
if(!accepter_change_statut)
accepter_change_statut=confirm(confirm_changer_statut);
if(!accepter_change_statut||!node)return;
$('#statutdecal'+type+id)
.css('marginLeft',decal+'px')
.removeClass('on');
$.get(script,function(c){
if(!c)
node.src=puce;
else{
r=window.open();
r.document.write(c);
r.document.close()}
})}
function prepare_selec_statut(nom,type,id,action)
{
$('#'+nom+type+id)
.hoverClass('on')
.addClass('on')
.load(action+'&type='+type+'&id='+id)}
function changeclass(objet,myClass){
objet.className=myClass}
function hauteurFrame(nbCol){
hauteur=$(window).height()-40;
hauteur=hauteur-$('#haut-page').height();
if(findObj('brouteur_hierarchie'))
hauteur=hauteur-$('#brouteur_hierarchie').height();
for(i=0;i<nbCol;i++){
$('#iframe'+i)
.height(hauteur+'px')}
}
function changeVisible(input,id,select,nonselect){
if(input){
element=findObj_forcer(id);
if(element.style.display!=select)element.style.display=select}else{
element=findObj_forcer(id);
if(element.style.display!=nonselect)element.style.display=nonselect}
}
var antifocus=false;
var antifocus_mots=new Array();
function puce_statut(selection){
if(selection=="publie"){
return"puce-verte.gif"}
if(selection=="prepa"){
return"puce-blanche.gif"}
if(selection=="prop"){
return"puce-orange.gif"}
if(selection=="refuse"){
return"puce-rouge.gif"}
if(selection=="poubelle"){
return"puce-poubelle.gif"}
}


/* ../prive/javascript/gadgets.js */
function init_gadgets(url_toutsite,url_navrapide,url_agenda,html_messagerie){
jQuery('#boutonbandeautoutsite')
.one('mouseover',function(event){
if((typeof(window['_OUTILS_DEVELOPPEURS'])=='undefined')||((event.altKey||event.metaKey)!=true)){
changestyle('bandeautoutsite');
jQuery('#gadget-rubriques')
.load(url_toutsite)}else{window.open(url_toutsite+'&transformer_xml=valider_xml')}
})
.one('focus',function(){jQuery(this).mouseover()});
jQuery('#boutonbandeaunavrapide')
.one('mouseover',function(event){
if((typeof(window['_OUTILS_DEVELOPPEURS'])=='undefined')||((event.altKey||event.metaKey)!=true)){
changestyle('bandeaunavrapide');
jQuery('#gadget-navigation')
.load(url_navrapide)}else{window.open(url_navrapide+'&transformer_xml=valider_xml')}
})
.one('focus',function(){jQuery(this).mouseover()});
jQuery('#boutonbandeauagenda')
.one('mouseover',function(event){
if((typeof(window['_OUTILS_DEVELOPPEURS'])=='undefined')||((event.altKey||event.metaKey)!=true)){
changestyle('bandeauagenda');
jQuery('#gadget-agenda')
.load(url_agenda)}else{window.open(url_agenda+'&transformer_xml=valider_xml')}
})
.one('focus',function(){jQuery(this).mouseover()});
jQuery('#gadget-messagerie')
.html(html_messagerie);
jQuery('#form_recherche')
.one('click',function(){this.value=''})}


/* ../plugins/contact100312/javascript/contact_sortable.js */
;(function(C){C.ui={plugin:{add:function(E,F,H){var G=C.ui[E].prototype;for(var D in H){G.plugins[D]=G.plugins[D]||[];G.plugins[D].push([F,H[D]])}},call:function(D,F,E){var H=D.plugins[F];if(!H){return}for(var G=0;G<H.length;G++){if(D.options[H[G][0]]){H[G][1].apply(D.element,E)}}}},cssCache:{},css:function(D){if(C.ui.cssCache[D]){return C.ui.cssCache[D]}var E=C('<div class="ui-gen">').addClass(D).css({position:"absolute",top:"-5000px",left:"-5000px",display:"block"}).appendTo("body");C.ui.cssCache[D]=!!((!(/auto|default/).test(E.css("cursor"))||(/^[1-9]/).test(E.css("height"))||(/^[1-9]/).test(E.css("width"))||!(/none/).test(E.css("backgroundImage"))||!(/transparent|rgba\(0, 0, 0, 0\)/).test(E.css("backgroundColor"))));try{C("body").get(0).removeChild(E.get(0))}catch(F){}return C.ui.cssCache[D]},disableSelection:function(D){C(D).attr("unselectable","on").css("MozUserSelect","none")},enableSelection:function(D){C(D).attr("unselectable","off").css("MozUserSelect","")},hasScroll:function(G,E){var D=/top/.test(E||"top")?"scrollTop":"scrollLeft",F=false;if(G[D]>0){return true}G[D]=1;F=G[D]>0?true:false;G[D]=0;return F}};var B=C.fn.remove;C.fn.remove=function(){C("*",this).add(this).triggerHandler("remove");return B.apply(this,arguments)};function A(E,F,G){var D=C[E][F].getter||[];D=(typeof D=="string"?D.split(/,?\s+/):D);return(C.inArray(G,D)!=-1)}C.widget=function(E,D){var F=E.split(".")[0];E=E.split(".")[1];C.fn[E]=function(J){var H=(typeof J=="string"),I=Array.prototype.slice.call(arguments,1);if(H&&A(F,E,J)){var G=C.data(this[0],E);return(G?G[J].apply(G,I):undefined)}return this.each(function(){var K=C.data(this,E);if(H&&K&&C.isFunction(K[J])){K[J].apply(K,I)}else{if(!H){C.data(this,E,new C[F][E](this,J))}}})};C[F][E]=function(I,H){var G=this;this.widgetName=E;this.widgetBaseClass=F+"-"+E;this.options=C.extend({},C.widget.defaults,C[F][E].defaults,H);this.element=C(I).bind("setData."+E,function(L,J,K){return G.setData(J,K)}).bind("getData."+E,function(K,J){return G.getData(J)}).bind("remove",function(){return G.destroy()});this.init()};C[F][E].prototype=C.extend({},C.widget.prototype,D)};C.widget.prototype={init:function(){},destroy:function(){this.element.removeData(this.widgetName)},getData:function(D){return this.options[D]},setData:function(D,E){this.options[D]=E;if(D=="disabled"){this.element[E?"addClass":"removeClass"](this.widgetBaseClass+"-disabled")}},enable:function(){this.setData("disabled",false)},disable:function(){this.setData("disabled",true)}};C.widget.defaults={disabled:false};C.ui.mouse={mouseInit:function(){var D=this;this.element.bind("mousedown."+this.widgetName,function(E){return D.mouseDown(E)});if(C.browser.msie){this._mouseUnselectable=this.element.attr("unselectable");this.element.attr("unselectable","on")}this.started=false},mouseDestroy:function(){this.element.unbind("."+this.widgetName);(C.browser.msie&&this.element.attr("unselectable",this._mouseUnselectable))},mouseDown:function(F){(this._mouseStarted&&this.mouseUp(F));this._mouseDownEvent=F;var E=this,G=(F.which==1),D=(typeof this.options.cancel=="string"?C(F.target).parents().add(F.target).filter(this.options.cancel).length:false);if(!G||D||!this.mouseCapture(F)){return true}this._mouseDelayMet=!this.options.delay;if(!this._mouseDelayMet){this._mouseDelayTimer=setTimeout(function(){E._mouseDelayMet=true},this.options.delay)}if(this.mouseDistanceMet(F)&&this.mouseDelayMet(F)){this._mouseStarted=(this.mouseStart(F)!==false);if(!this._mouseStarted){F.preventDefault();return true}}this._mouseMoveDelegate=function(H){return E.mouseMove(H)};this._mouseUpDelegate=function(H){return E.mouseUp(H)};C(document).bind("mousemove."+this.widgetName,this._mouseMoveDelegate).bind("mouseup."+this.widgetName,this._mouseUpDelegate);return false},mouseMove:function(D){if(C.browser.msie&&!D.button){return this.mouseUp(D)}if(this._mouseStarted){this.mouseDrag(D);return false}if(this.mouseDistanceMet(D)&&this.mouseDelayMet(D)){this._mouseStarted=(this.mouseStart(this._mouseDownEvent,D)!==false);(this._mouseStarted?this.mouseDrag(D):this.mouseUp(D))}return!this._mouseStarted},mouseUp:function(D){C(document).unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate);if(this._mouseStarted){this._mouseStarted=false;this.mouseStop(D)}return false},mouseDistanceMet:function(D){return(Math.max(Math.abs(this._mouseDownEvent.pageX-D.pageX),Math.abs(this._mouseDownEvent.pageY-D.pageY))>=this.options.distance)},mouseDelayMet:function(D){return this._mouseDelayMet},mouseStart:function(D){},mouseDrag:function(D){},mouseStop:function(D){},mouseCapture:function(D){return true}};C.ui.mouse.defaults={cancel:null,distance:1,delay:0}})(jQuery);(function(A){A.widget("ui.draggable",A.extend({},A.ui.mouse,{init:function(){var B=this.options;if(B.helper=="original"&&!(/(relative|absolute|fixed)/).test(this.element.css("position"))){this.element.css("position","relative")}this.element.addClass("ui-draggable");(B.disabled&&this.element.addClass("ui-draggable-disabled"));this.mouseInit()},mouseStart:function(F){var H=this.options;if(this.helper||H.disabled||A(F.target).is(".ui-resizable-handle")){return false}var C=!this.options.handle||!A(this.options.handle,this.element).length?true:false;A(this.options.handle,this.element).find("*").andSelf().each(function(){if(this==F.target){C=true}});if(!C){return false}if(A.ui.ddmanager){A.ui.ddmanager.current=this}this.helper=A.isFunction(H.helper)?A(H.helper.apply(this.element[0],[F])):(H.helper=="clone"?this.element.clone():this.element);if(!this.helper.parents("body").length){this.helper.appendTo((H.appendTo=="parent"?this.element[0].parentNode:H.appendTo))}if(this.helper[0]!=this.element[0]&&!(/(fixed|absolute)/).test(this.helper.css("position"))){this.helper.css("position","absolute")}this.margins={left:(parseInt(this.element.css("marginLeft"),10)||0),top:(parseInt(this.element.css("marginTop"),10)||0)};this.cssPosition=this.helper.css("position");this.offset=this.element.offset();this.offset={top:this.offset.top-this.margins.top,left:this.offset.left-this.margins.left};this.offset.click={left:F.pageX-this.offset.left,top:F.pageY-this.offset.top};this.offsetParent=this.helper.offsetParent();var B=this.offsetParent.offset();if(this.offsetParent[0]==document.body&&A.browser.mozilla){B={top:0,left:0}}this.offset.parent={top:B.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:B.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)};var E=this.element.position();this.offset.relative=this.cssPosition=="relative"?{top:E.top-(parseInt(this.helper.css("top"),10)||0)+this.offsetParent[0].scrollTop,left:E.left-(parseInt(this.helper.css("left"),10)||0)+this.offsetParent[0].scrollLeft}:{top:0,left:0};this.originalPosition=this.generatePosition(F);this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()};if(H.cursorAt){if(H.cursorAt.left!=undefined){this.offset.click.left=H.cursorAt.left+this.margins.left}if(H.cursorAt.right!=undefined){this.offset.click.left=this.helperProportions.width-H.cursorAt.right+this.margins.left}if(H.cursorAt.top!=undefined){this.offset.click.top=H.cursorAt.top+this.margins.top}if(H.cursorAt.bottom!=undefined){this.offset.click.top=this.helperProportions.height-H.cursorAt.bottom+this.margins.top}}if(H.containment){if(H.containment=="parent"){H.containment=this.helper[0].parentNode}if(H.containment=="document"||H.containment=="window"){this.containment=[0-this.offset.relative.left-this.offset.parent.left,0-this.offset.relative.top-this.offset.parent.top,A(H.containment=="document"?document:window).width()-this.offset.relative.left-this.offset.parent.left-this.helperProportions.width-this.margins.left-(parseInt(this.element.css("marginRight"),10)||0),(A(H.containment=="document"?document:window).height()||document.body.parentNode.scrollHeight)-this.offset.relative.top-this.offset.parent.top-this.helperProportions.height-this.margins.top-(parseInt(this.element.css("marginBottom"),10)||0)]}if(!(/^(document|window|parent)$/).test(H.containment)){var D=A(H.containment)[0];var G=A(H.containment).offset();this.containment=[G.left+(parseInt(A(D).css("borderLeftWidth"),10)||0)-this.offset.relative.left-this.offset.parent.left,G.top+(parseInt(A(D).css("borderTopWidth"),10)||0)-this.offset.relative.top-this.offset.parent.top,G.left+Math.max(D.scrollWidth,D.offsetWidth)-(parseInt(A(D).css("borderLeftWidth"),10)||0)-this.offset.relative.left-this.offset.parent.left-this.helperProportions.width-this.margins.left-(parseInt(this.element.css("marginRight"),10)||0),G.top+Math.max(D.scrollHeight,D.offsetHeight)-(parseInt(A(D).css("borderTopWidth"),10)||0)-this.offset.relative.top-this.offset.parent.top-this.helperProportions.height-this.margins.top-(parseInt(this.element.css("marginBottom"),10)||0)]}}this.propagate("start",F);this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()};if(A.ui.ddmanager&&!H.dropBehaviour){A.ui.ddmanager.prepareOffsets(this,F)}this.helper.addClass("ui-draggable-dragging");this.mouseDrag(F);return true},convertPositionTo:function(C,D){if(!D){D=this.position}var B=C=="absolute"?1:-1;return{top:(D.top+this.offset.relative.top*B+this.offset.parent.top*B-(this.cssPosition=="fixed"||(this.cssPosition=="absolute"&&this.offsetParent[0]==document.body)?0:this.offsetParent[0].scrollTop)*B+(this.cssPosition=="fixed"?A(document).scrollTop():0)*B+this.margins.top*B),left:(D.left+this.offset.relative.left*B+this.offset.parent.left*B-(this.cssPosition=="fixed"||(this.cssPosition=="absolute"&&this.offsetParent[0]==document.body)?0:this.offsetParent[0].scrollLeft)*B+(this.cssPosition=="fixed"?A(document).scrollLeft():0)*B+this.margins.left*B)}},generatePosition:function(E){var F=this.options;var B={top:(E.pageY-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+(this.cssPosition=="fixed"||(this.cssPosition=="absolute"&&this.offsetParent[0]==document.body)?0:this.offsetParent[0].scrollTop)-(this.cssPosition=="fixed"?A(document).scrollTop():0)),left:(E.pageX-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+(this.cssPosition=="fixed"||(this.cssPosition=="absolute"&&this.offsetParent[0]==document.body)?0:this.offsetParent[0].scrollLeft)-(this.cssPosition=="fixed"?A(document).scrollLeft():0))};if(!this.originalPosition){return B}if(this.containment){if(B.left<this.containment[0]){B.left=this.containment[0]}if(B.top<this.containment[1]){B.top=this.containment[1]}if(B.left>this.containment[2]){B.left=this.containment[2]}if(B.top>this.containment[3]){B.top=this.containment[3]}}if(F.grid){var D=this.originalPosition.top+Math.round((B.top-this.originalPosition.top)/F.grid[1])*F.grid[1];B.top=this.containment?(!(D<this.containment[1]||D>this.containment[3])?D:(!(D<this.containment[1])?D-F.grid[1]:D+F.grid[1])):D;var C=this.originalPosition.left+Math.round((B.left-this.originalPosition.left)/F.grid[0])*F.grid[0];B.left=this.containment?(!(C<this.containment[0]||C>this.containment[2])?C:(!(C<this.containment[0])?C-F.grid[0]:C+F.grid[0])):C}return B},mouseDrag:function(B){this.position=this.generatePosition(B);this.positionAbs=this.convertPositionTo("absolute");this.position=this.propagate("drag",B)||this.position;if(!this.options.axis||this.options.axis!="y"){this.helper[0].style.left=this.position.left+"px"}if(!this.options.axis||this.options.axis!="x"){this.helper[0].style.top=this.position.top+"px"}if(A.ui.ddmanager){A.ui.ddmanager.drag(this,B)}return false},mouseStop:function(C){var D=false;if(A.ui.ddmanager&&!this.options.dropBehaviour){var D=A.ui.ddmanager.drop(this,C)}if((this.options.revert=="invalid"&&!D)||(this.options.revert=="valid"&&D)||this.options.revert===true){var B=this;A(this.helper).animate(this.originalPosition,parseInt(this.options.revert,10)||500,function(){B.propagate("stop",C);B.clear()})}else{this.propagate("stop",C);this.clear()}return false},clear:function(){this.helper.removeClass("ui-draggable-dragging");if(this.options.helper!="original"&&!this.cancelHelperRemoval){this.helper.remove()}this.helper=null;this.cancelHelperRemoval=false},plugins:{},uiHash:function(B){return{helper:this.helper,position:this.position,absolutePosition:this.positionAbs,options:this.options}},propagate:function(C,B){A.ui.plugin.call(this,C,[B,this.uiHash()]);if(C=="drag"){this.positionAbs=this.convertPositionTo("absolute")}return this.element.triggerHandler(C=="drag"?C:"drag"+C,[B,this.uiHash()],this.options[C])},destroy:function(){if(!this.element.data("draggable")){return}this.element.removeData("draggable").unbind(".draggable").removeClass("ui-draggable");this.mouseDestroy()}}));A.extend(A.ui.draggable,{defaults:{appendTo:"parent",axis:false,cancel:":input",delay:0,distance:1,helper:"original"}});A.ui.plugin.add("draggable","cursor",{start:function(D,C){var B=A("body");if(B.css("cursor")){C.options._cursor=B.css("cursor")}B.css("cursor",C.options.cursor)},stop:function(C,B){if(B.options._cursor){A("body").css("cursor",B.options._cursor)}}});A.ui.plugin.add("draggable","zIndex",{start:function(D,C){var B=A(C.helper);if(B.css("zIndex")){C.options._zIndex=B.css("zIndex")}B.css("zIndex",C.options.zIndex)},stop:function(C,B){if(B.options._zIndex){A(B.helper).css("zIndex",B.options._zIndex)}}});A.ui.plugin.add("draggable","opacity",{start:function(D,C){var B=A(C.helper);if(B.css("opacity")){C.options._opacity=B.css("opacity")}B.css("opacity",C.options.opacity)},stop:function(C,B){if(B.options._opacity){A(B.helper).css("opacity",B.options._opacity)}}});A.ui.plugin.add("draggable","iframeFix",{start:function(C,B){A(B.options.iframeFix===true?"iframe":B.options.iframeFix).each(function(){A('<div class="ui-draggable-iframeFix" style="background: #fff;"></div>').css({width:this.offsetWidth+"px",height:this.offsetHeight+"px",position:"absolute",opacity:"0.001",zIndex:1000}).css(A(this).offset()).appendTo("body")})},stop:function(C,B){A("div.DragDropIframeFix").each(function(){this.parentNode.removeChild(this)})}});A.ui.plugin.add("draggable","scroll",{start:function(D,C){var E=C.options;var B=A(this).data("draggable");E.scrollSensitivity=E.scrollSensitivity||20;E.scrollSpeed=E.scrollSpeed||20;B.overflowY=function(F){do{if(/auto|scroll/.test(F.css("overflow"))||(/auto|scroll/).test(F.css("overflow-y"))){return F}F=F.parent()}while(F[0].parentNode);return A(document)}(this);B.overflowX=function(F){do{if(/auto|scroll/.test(F.css("overflow"))||(/auto|scroll/).test(F.css("overflow-x"))){return F}F=F.parent()}while(F[0].parentNode);return A(document)}(this);if(B.overflowY[0]!=document&&B.overflowY[0].tagName!="HTML"){B.overflowYOffset=B.overflowY.offset()}if(B.overflowX[0]!=document&&B.overflowX[0].tagName!="HTML"){B.overflowXOffset=B.overflowX.offset()}},drag:function(D,C){var E=C.options;var B=A(this).data("draggable");if(B.overflowY[0]!=document&&B.overflowY[0].tagName!="HTML"){if((B.overflowYOffset.top+B.overflowY[0].offsetHeight)-D.pageY<E.scrollSensitivity){B.overflowY[0].scrollTop=B.overflowY[0].scrollTop+E.scrollSpeed}if(D.pageY-B.overflowYOffset.top<E.scrollSensitivity){B.overflowY[0].scrollTop=B.overflowY[0].scrollTop-E.scrollSpeed}}else{if(D.pageY-A(document).scrollTop()<E.scrollSensitivity){A(document).scrollTop(A(document).scrollTop()-E.scrollSpeed)}if(A(window).height()-(D.pageY-A(document).scrollTop())<E.scrollSensitivity){A(document).scrollTop(A(document).scrollTop()+E.scrollSpeed)}}if(B.overflowX[0]!=document&&B.overflowX[0].tagName!="HTML"){if((B.overflowXOffset.left+B.overflowX[0].offsetWidth)-D.pageX<E.scrollSensitivity){B.overflowX[0].scrollLeft=B.overflowX[0].scrollLeft+E.scrollSpeed}if(D.pageX-B.overflowXOffset.left<E.scrollSensitivity){B.overflowX[0].scrollLeft=B.overflowX[0].scrollLeft-E.scrollSpeed}}else{if(D.pageX-A(document).scrollLeft()<E.scrollSensitivity){A(document).scrollLeft(A(document).scrollLeft()-E.scrollSpeed)}if(A(window).width()-(D.pageX-A(document).scrollLeft())<E.scrollSensitivity){A(document).scrollLeft(A(document).scrollLeft()+E.scrollSpeed)}}}});A.ui.plugin.add("draggable","snap",{start:function(D,C){var B=A(this).data("draggable");B.snapElements=[];A(C.options.snap===true?".ui-draggable":C.options.snap).each(function(){var F=A(this);var E=F.offset();if(this!=B.element[0]){B.snapElements.push({item:this,width:F.outerWidth(),height:F.outerHeight(),top:E.top,left:E.left})}})},drag:function(J,N){var I=A(this).data("draggable");var L=N.options.snapTolerance||20;var D=N.absolutePosition.left,C=D+I.helperProportions.width,P=N.absolutePosition.top,O=P+I.helperProportions.height;for(var H=I.snapElements.length-1;H>=0;H--){var E=I.snapElements[H].left,B=E+I.snapElements[H].width,R=I.snapElements[H].top,M=R+I.snapElements[H].height;if(!((E-L<D&&D<B+L&&R-L<P&&P<M+L)||(E-L<D&&D<B+L&&R-L<O&&O<M+L)||(E-L<C&&C<B+L&&R-L<P&&P<M+L)||(E-L<C&&C<B+L&&R-L<O&&O<M+L))){continue}if(N.options.snapMode!="inner"){var K=Math.abs(R-O)<=20;var Q=Math.abs(M-P)<=20;var G=Math.abs(E-C)<=20;var F=Math.abs(B-D)<=20;if(K){N.position.top=I.convertPositionTo("relative",{top:R-I.helperProportions.height,left:0}).top}if(Q){N.position.top=I.convertPositionTo("relative",{top:M,left:0}).top}if(G){N.position.left=I.convertPositionTo("relative",{top:0,left:E-I.helperProportions.width}).left}if(F){N.position.left=I.convertPositionTo("relative",{top:0,left:B}).left}}if(N.options.snapMode!="outer"){var K=Math.abs(R-P)<=20;var Q=Math.abs(M-O)<=20;var G=Math.abs(E-D)<=20;var F=Math.abs(B-C)<=20;if(K){N.position.top=I.convertPositionTo("relative",{top:R,left:0}).top}if(Q){N.position.top=I.convertPositionTo("relative",{top:M-I.helperProportions.height,left:0}).top}if(G){N.position.left=I.convertPositionTo("relative",{top:0,left:E}).left}if(F){N.position.left=I.convertPositionTo("relative",{top:0,left:B-I.helperProportions.width}).left}}}}});A.ui.plugin.add("draggable","connectToSortable",{start:function(D,C){var B=A(this).data("draggable");B.sortables=[];A(C.options.connectToSortable).each(function(){if(A.data(this,"sortable")){var E=A.data(this,"sortable");B.sortables.push({instance:E,shouldRevert:E.options.revert});E.refreshItems();E.propagate("activate",D,B)}})},stop:function(D,C){var B=A(this).data("draggable");A.each(B.sortables,function(){if(this.instance.isOver){this.instance.isOver=0;B.cancelHelperRemoval=true;this.instance.cancelHelperRemoval=false;if(this.shouldRevert){this.instance.options.revert=true}this.instance.mouseStop(D);this.instance.element.triggerHandler("sortreceive",[D,A.extend(this.instance.ui(),{sender:B.element})],this.instance.options["receive"]);this.instance.options.helper=this.instance.options._helper}else{this.instance.propagate("deactivate",D,B)}})},drag:function(F,E){var D=A(this).data("draggable"),B=this;var C=function(K){var H=K.left,J=H+K.width,I=K.top,G=I+K.height;return(H<(this.positionAbs.left+this.offset.click.left)&&(this.positionAbs.left+this.offset.click.left)<J&&I<(this.positionAbs.top+this.offset.click.top)&&(this.positionAbs.top+this.offset.click.top)<G)};A.each(D.sortables,function(G){if(C.call(D,this.instance.containerCache)){if(!this.instance.isOver){this.instance.isOver=1;this.instance.currentItem=A(B).clone().appendTo(this.instance.element).data("sortable-item",true);this.instance.options._helper=this.instance.options.helper;this.instance.options.helper=function(){return E.helper[0]};F.target=this.instance.currentItem[0];this.instance.mouseCapture(F,true);this.instance.mouseStart(F,true,true);this.instance.offset.click.top=D.offset.click.top;this.instance.offset.click.left=D.offset.click.left;this.instance.offset.parent.left-=D.offset.parent.left-this.instance.offset.parent.left;this.instance.offset.parent.top-=D.offset.parent.top-this.instance.offset.parent.top;D.propagate("toSortable",F)}if(this.instance.currentItem){this.instance.mouseDrag(F)}}else{if(this.instance.isOver){this.instance.isOver=0;this.instance.cancelHelperRemoval=true;this.instance.options.revert=false;this.instance.mouseStop(F,true);this.instance.options.helper=this.instance.options._helper;this.instance.currentItem.remove();if(this.instance.placeholder){this.instance.placeholder.remove()}D.propagate("fromSortable",F)}}})}});A.ui.plugin.add("draggable","stack",{start:function(D,B){var C=A.makeArray(A(B.options.stack.group)).sort(function(F,E){return(parseInt(A(F).css("zIndex"),10)||B.options.stack.min)-(parseInt(A(E).css("zIndex"),10)||B.options.stack.min)});A(C).each(function(E){this.style.zIndex=B.options.stack.min+E});this[0].style.zIndex=B.options.stack.min+C.length}})})(jQuery);(function(B){function A(E,D){var C=B.browser.safari&&B.browser.version<522;if(E.contains&&!C){return E.contains(D)}if(E.compareDocumentPosition){return!!(E.compareDocumentPosition(D)&16)}while(D=D.parentNode){if(D==E){return true}}return false}B.widget("ui.sortable",B.extend({},B.ui.mouse,{init:function(){var C=this.options;this.containerCache={};this.element.addClass("ui-sortable");this.refresh();this.floating=this.items.length?(/left|right/).test(this.items[0].item.css("float")):false;if(!(/(relative|absolute|fixed)/).test(this.element.css("position"))){this.element.css("position","relative")}this.offset=this.element.offset();this.mouseInit()},plugins:{},ui:function(C){return{helper:(C||this)["helper"],placeholder:(C||this)["placeholder"]||B([]),position:(C||this)["position"],absolutePosition:(C||this)["positionAbs"],options:this.options,element:this.element,item:(C||this)["currentItem"],sender:C?C.element:null}},propagate:function(F,E,C,D){B.ui.plugin.call(this,F,[E,this.ui(C)]);if(!D){this.element.triggerHandler(F=="sort"?F:"sort"+F,[E,this.ui(C)],this.options[F])}},serialize:function(E){var C=(B.isFunction(this.options.items)?this.options.items.call(this.element):B(this.options.items,this.element)).not(".ui-sortable-helper");var D=[];E=E||{};C.each(function(){var F=(B(this).attr(E.attribute||"id")||"").match(E.expression||(/(.+)[-=_](.+)/));if(F){D.push((E.key||F[1])+"[]="+(E.key&&E.expression?F[1]:F[2]))}});return D.join("&")},toArray:function(C){var D=(B.isFunction(this.options.items)?this.options.items.call(this.element):B(this.options.items,this.element)).not(".ui-sortable-helper");var E=[];D.each(function(){E.push(B(this).attr(C||"id"))});return E},intersectsWith:function(J){var E=this.positionAbs.left,D=E+this.helperProportions.width,I=this.positionAbs.top,H=I+this.helperProportions.height;var F=J.left,C=F+J.width,K=J.top,G=K+J.height;if(this.options.tolerance=="pointer"||this.options.forcePointerForContainers||(this.options.tolerance=="guess"&&this.helperProportions[this.floating?"width":"height"]>J[this.floating?"width":"height"])){return(I+this.offset.click.top>K&&I+this.offset.click.top<G&&E+this.offset.click.left>F&&E+this.offset.click.left<C)}else{return(F<E+(this.helperProportions.width/2)&&D-(this.helperProportions.width/2)<C&&K<I+(this.helperProportions.height/2)&&H-(this.helperProportions.height/2)<G)}},intersectsWithEdge:function(J){var E=this.positionAbs.left,D=E+this.helperProportions.width,I=this.positionAbs.top,H=I+this.helperProportions.height;var F=J.left,C=F+J.width,K=J.top,G=K+J.height;if(this.options.tolerance=="pointer"||(this.options.tolerance=="guess"&&this.helperProportions[this.floating?"width":"height"]>J[this.floating?"width":"height"])){if(!(I+this.offset.click.top>K&&I+this.offset.click.top<G&&E+this.offset.click.left>F&&E+this.offset.click.left<C)){return false}if(this.floating){if(E+this.offset.click.left>F&&E+this.offset.click.left<F+J.width/2){return 2}if(E+this.offset.click.left>F+J.width/2&&E+this.offset.click.left<C){return 1}}else{if(I+this.offset.click.top>K&&I+this.offset.click.top<K+J.height/2){return 2}if(I+this.offset.click.top>K+J.height/2&&I+this.offset.click.top<G){return 1}}}else{if(!(F<E+(this.helperProportions.width/2)&&D-(this.helperProportions.width/2)<C&&K<I+(this.helperProportions.height/2)&&H-(this.helperProportions.height/2)<G)){return false}if(this.floating){if(D>F&&E<F){return 2}if(E<C&&D>C){return 1}}else{if(H>K&&I<K){return 1}if(I<G&&H>G){return 2}}}return false},refresh:function(){this.refreshItems();this.refreshPositions()},refreshItems:function(){this.items=[];this.containers=[this];var D=this.items;var C=this;var F=[[B.isFunction(this.options.items)?this.options.items.call(this.element,null,{options:this.options,item:this.currentItem}):B(this.options.items,this.element),this]];if(this.options.connectWith){for(var G=this.options.connectWith.length-1;G>=0;G--){var I=B(this.options.connectWith[G]);for(var E=I.length-1;E>=0;E--){var H=B.data(I[E],"sortable");if(H&&!H.options.disabled){F.push([B.isFunction(H.options.items)?H.options.items.call(H.element):B(H.options.items,H.element),H]);this.containers.push(H)}}}}for(var G=F.length-1;G>=0;G--){F[G][0].each(function(){B.data(this,"sortable-item",F[G][1]);D.push({item:B(this),instance:F[G][1],width:0,height:0,left:0,top:0})})}},refreshPositions:function(D){if(this.offsetParent){var C=this.offsetParent.offset();this.offset.parent={top:C.top+this.offsetParentBorders.top,left:C.left+this.offsetParentBorders.left}}for(var F=this.items.length-1;F>=0;F--){if(this.items[F].instance!=this.currentContainer&&this.currentContainer&&this.items[F].item[0]!=this.currentItem[0]){continue}var E=this.options.toleranceElement?B(this.options.toleranceElement,this.items[F].item):this.items[F].item;if(!D){this.items[F].width=E[0].offsetWidth;this.items[F].height=E[0].offsetHeight}var G=E.offset();this.items[F].left=G.left;this.items[F].top=G.top}if(this.options.custom&&this.options.custom.refreshContainers){this.options.custom.refreshContainers.call(this)}else{for(var F=this.containers.length-1;F>=0;F--){var G=this.containers[F].element.offset();this.containers[F].containerCache.left=G.left;this.containers[F].containerCache.top=G.top;this.containers[F].containerCache.width=this.containers[F].element.outerWidth();this.containers[F].containerCache.height=this.containers[F].element.outerHeight()}}},destroy:function(){this.element.removeClass("ui-sortable ui-sortable-disabled").removeData("sortable").unbind(".sortable");this.mouseDestroy();for(var C=this.items.length-1;C>=0;C--){this.items[C].item.removeData("sortable-item")}},createPlaceholder:function(E){var C=E||this,F=C.options;if(F.placeholder.constructor==String){var D=F.placeholder;F.placeholder={element:function(){return B("<div></div>").addClass(D)[0]},update:function(G,H){H.css(G.offset()).css({width:G.outerWidth(),height:G.outerHeight()})}}}C.placeholder=B(F.placeholder.element.call(C.element,C.currentItem)).appendTo("body").css({position:"absolute"});F.placeholder.update.call(C.element,C.currentItem,C.placeholder)},contactContainers:function(F){for(var D=this.containers.length-1;D>=0;D--){if(this.intersectsWith(this.containers[D].containerCache)){if(!this.containers[D].containerCache.over){if(this.currentContainer!=this.containers[D]){var I=10000;var H=null;var E=this.positionAbs[this.containers[D].floating?"left":"top"];for(var C=this.items.length-1;C>=0;C--){if(!A(this.containers[D].element[0],this.items[C].item[0])){continue}var G=this.items[C][this.containers[D].floating?"left":"top"];if(Math.abs(G-E)<I){I=Math.abs(G-E);H=this.items[C]}}if(!H&&!this.options.dropOnEmpty){continue}if(this.placeholder){this.placeholder.remove()}if(this.containers[D].options.placeholder){this.containers[D].createPlaceholder(this)}else{this.placeholder=null}this.currentContainer=this.containers[D];H?this.rearrange(F,H,null,true):this.rearrange(F,null,this.containers[D].element,true);this.propagate("change",F);this.containers[D].propagate("change",F,this)}this.containers[D].propagate("over",F,this);this.containers[D].containerCache.over=1}}else{if(this.containers[D].containerCache.over){this.containers[D].propagate("out",F,this);this.containers[D].containerCache.over=0}}}},mouseCapture:function(G,F){if(this.options.disabled||this.options.type=="static"){return false}this.refreshItems();var E=null,D=this,C=B(G.target).parents().each(function(){if(B.data(this,"sortable-item")==D){E=B(this);return false}});if(B.data(G.target,"sortable-item")==D){E=B(G.target)}if(!E){return false}if(this.options.handle&&!F){var H=false;B(this.options.handle,E).find("*").andSelf().each(function(){if(this==G.target){H=true}});if(!H){return false}}this.currentItem=E;return true},mouseStart:function(H,F,C){var J=this.options;this.currentContainer=this;this.refreshPositions();this.helper=typeof J.helper=="function"?B(J.helper.apply(this.element[0],[H,this.currentItem])):this.currentItem.clone();if(!this.helper.parents("body").length){B(J.appendTo!="parent"?J.appendTo:this.currentItem[0].parentNode)[0].appendChild(this.helper[0])}this.helper.css({position:"absolute",clear:"both"}).addClass("ui-sortable-helper");this.margins={left:(parseInt(this.currentItem.css("marginLeft"),10)||0),top:(parseInt(this.currentItem.css("marginTop"),10)||0)};this.offset=this.currentItem.offset();this.offset={top:this.offset.top-this.margins.top,left:this.offset.left-this.margins.left};this.offset.click={left:H.pageX-this.offset.left,top:H.pageY-this.offset.top};this.offsetParent=this.helper.offsetParent();var D=this.offsetParent.offset();this.offsetParentBorders={top:(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)};this.offset.parent={top:D.top+this.offsetParentBorders.top,left:D.left+this.offsetParentBorders.left};this.originalPosition=this.generatePosition(H);this.domPosition={prev:this.currentItem.prev()[0],parent:this.currentItem.parent()[0]};this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()};if(J.placeholder){this.createPlaceholder()}this.propagate("start",H);this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()};if(J.cursorAt){if(J.cursorAt.left!=undefined){this.offset.click.left=J.cursorAt.left}if(J.cursorAt.right!=undefined){this.offset.click.left=this.helperProportions.width-J.cursorAt.right}if(J.cursorAt.top!=undefined){this.offset.click.top=J.cursorAt.top}if(J.cursorAt.bottom!=undefined){this.offset.click.top=this.helperProportions.height-J.cursorAt.bottom}}if(J.containment){if(J.containment=="parent"){J.containment=this.helper[0].parentNode}if(J.containment=="document"||J.containment=="window"){this.containment=[0-this.offset.parent.left,0-this.offset.parent.top,B(J.containment=="document"?document:window).width()-this.offset.parent.left-this.helperProportions.width-this.margins.left-(parseInt(this.element.css("marginRight"),10)||0),(B(J.containment=="document"?document:window).height()||document.body.parentNode.scrollHeight)-this.offset.parent.top-this.helperProportions.height-this.margins.top-(parseInt(this.element.css("marginBottom"),10)||0)]}if(!(/^(document|window|parent)$/).test(J.containment)){var G=B(J.containment)[0];var I=B(J.containment).offset();this.containment=[I.left+(parseInt(B(G).css("borderLeftWidth"),10)||0)-this.offset.parent.left,I.top+(parseInt(B(G).css("borderTopWidth"),10)||0)-this.offset.parent.top,I.left+Math.max(G.scrollWidth,G.offsetWidth)-(parseInt(B(G).css("borderLeftWidth"),10)||0)-this.offset.parent.left-this.helperProportions.width-this.margins.left-(parseInt(this.currentItem.css("marginRight"),10)||0),I.top+Math.max(G.scrollHeight,G.offsetHeight)-(parseInt(B(G).css("borderTopWidth"),10)||0)-this.offset.parent.top-this.helperProportions.height-this.margins.top-(parseInt(this.currentItem.css("marginBottom"),10)||0)]}}if(this.options.placeholder!="clone"){this.currentItem.css("visibility","hidden")}if(!C){for(var E=this.containers.length-1;E>=0;E--){this.containers[E].propagate("activate",H,this)}}if(B.ui.ddmanager){B.ui.ddmanager.current=this}if(B.ui.ddmanager&&!J.dropBehaviour){B.ui.ddmanager.prepareOffsets(this,H)}this.dragging=true;this.mouseDrag(H);return true},convertPositionTo:function(D,E){if(!E){E=this.position}var C=D=="absolute"?1:-1;return{top:(E.top+this.offset.parent.top*C-(this.offsetParent[0]==document.body?0:this.offsetParent[0].scrollTop)*C+this.margins.top*C),left:(E.left+this.offset.parent.left*C-(this.offsetParent[0]==document.body?0:this.offsetParent[0].scrollLeft)*C+this.margins.left*C)}},generatePosition:function(F){var G=this.options;var C={top:(F.pageY-this.offset.click.top-this.offset.parent.top+(this.offsetParent[0]==document.body?0:this.offsetParent[0].scrollTop)),left:(F.pageX-this.offset.click.left-this.offset.parent.left+(this.offsetParent[0]==document.body?0:this.offsetParent[0].scrollLeft))};if(!this.originalPosition){return C}if(this.containment){if(C.left<this.containment[0]){C.left=this.containment[0]}if(C.top<this.containment[1]){C.top=this.containment[1]}if(C.left>this.containment[2]){C.left=this.containment[2]}if(C.top>this.containment[3]){C.top=this.containment[3]}}if(G.grid){var E=this.originalPosition.top+Math.round((C.top-this.originalPosition.top)/G.grid[1])*G.grid[1];C.top=this.containment?(!(E<this.containment[1]||E>this.containment[3])?E:(!(E<this.containment[1])?E-G.grid[1]:E+G.grid[1])):E;var D=this.originalPosition.left+Math.round((C.left-this.originalPosition.left)/G.grid[0])*G.grid[0];C.left=this.containment?(!(D<this.containment[0]||D>this.containment[2])?D:(!(D<this.containment[0])?D-G.grid[0]:D+G.grid[0])):D}return C},mouseDrag:function(D){this.position=this.generatePosition(D);this.positionAbs=this.convertPositionTo("absolute");B.ui.plugin.call(this,"sort",[D,this.ui()]);this.positionAbs=this.convertPositionTo("absolute");this.helper[0].style.left=this.position.left+"px";this.helper[0].style.top=this.position.top+"px";for(var C=this.items.length-1;C>=0;C--){var E=this.intersectsWithEdge(this.items[C]);if(!E){continue}if(this.items[C].item[0]!=this.currentItem[0]&&this.currentItem[E==1?"next":"prev"]()[0]!=this.items[C].item[0]&&!A(this.currentItem[0],this.items[C].item[0])&&(this.options.type=="semi-dynamic"?!A(this.element[0],this.items[C].item[0]):true)){this.direction=E==1?"down":"up";this.rearrange(D,this.items[C]);this.propagate("change",D);break}}this.contactContainers(D);if(B.ui.ddmanager){B.ui.ddmanager.drag(this,D)}this.element.triggerHandler("sort",[D,this.ui()],this.options["sort"]);return false},rearrange:function(H,G,D,F){D?D[0].appendChild(this.currentItem[0]):G.item[0].parentNode.insertBefore(this.currentItem[0],(this.direction=="down"?G.item[0]:G.item[0].nextSibling));this.counter=this.counter?++this.counter:1;var E=this,C=this.counter;window.setTimeout(function(){if(C==E.counter){E.refreshPositions(!F)}},0);if(this.options.placeholder){this.options.placeholder.update.call(this.element,this.currentItem,this.placeholder)}},mouseStop:function(E,D){if(B.ui.ddmanager&&!this.options.dropBehaviour){B.ui.ddmanager.drop(this,E)}if(this.options.revert){var C=this;var F=C.currentItem.offset();if(C.placeholder){C.placeholder.animate({opacity:"hide"},(parseInt(this.options.revert,10)||500)-50)}B(this.helper).animate({left:F.left-this.offset.parent.left-C.margins.left+(this.offsetParent[0]==document.body?0:this.offsetParent[0].scrollLeft),top:F.top-this.offset.parent.top-C.margins.top+(this.offsetParent[0]==document.body?0:this.offsetParent[0].scrollTop)},parseInt(this.options.revert,10)||500,function(){C.clear(E)})}else{this.clear(E,D)}return false},clear:function(E,D){if(this.domPosition.prev!=this.currentItem.prev().not(".ui-sortable-helper")[0]||this.domPosition.parent!=this.currentItem.parent()[0]){this.propagate("update",E,null,D)}if(!A(this.element[0],this.currentItem[0])){this.propagate("remove",E,null,D);for(var C=this.containers.length-1;C>=0;C--){if(A(this.containers[C].element[0],this.currentItem[0])){this.containers[C].propagate("update",E,this,D);this.containers[C].propagate("receive",E,this,D)}}}for(var C=this.containers.length-1;C>=0;C--){this.containers[C].propagate("deactivate",E,this,D);if(this.containers[C].containerCache.over){this.containers[C].propagate("out",E,this);this.containers[C].containerCache.over=0}}this.dragging=false;if(this.cancelHelperRemoval){this.propagate("stop",E,null,D);return false}B(this.currentItem).css("visibility","");if(this.placeholder){this.placeholder.remove()}this.helper.remove();this.helper=null;this.propagate("stop",E,null,D);return true}}));B.extend(B.ui.sortable,{getter:"serialize toArray",defaults:{helper:"clone",tolerance:"guess",distance:1,delay:0,scroll:true,scrollSensitivity:20,scrollSpeed:20,cancel:":input",items:"> *",zIndex:1000,dropOnEmpty:true,appendTo:"parent"}});B.ui.plugin.add("sortable","cursor",{start:function(E,D){var C=B("body");if(C.css("cursor")){D.options._cursor=C.css("cursor")}C.css("cursor",D.options.cursor)},stop:function(D,C){if(C.options._cursor){B("body").css("cursor",C.options._cursor)}}});B.ui.plugin.add("sortable","zIndex",{start:function(E,D){var C=D.helper;if(C.css("zIndex")){D.options._zIndex=C.css("zIndex")}C.css("zIndex",D.options.zIndex)},stop:function(D,C){if(C.options._zIndex){B(C.helper).css("zIndex",C.options._zIndex)}}});B.ui.plugin.add("sortable","opacity",{start:function(E,D){var C=D.helper;if(C.css("opacity")){D.options._opacity=C.css("opacity")}C.css("opacity",D.options.opacity)},stop:function(D,C){if(C.options._opacity){B(C.helper).css("opacity",C.options._opacity)}}});B.ui.plugin.add("sortable","scroll",{start:function(E,D){var F=D.options;var C=B(this).data("sortable");C.overflowY=function(G){do{if(/auto|scroll/.test(G.css("overflow"))||(/auto|scroll/).test(G.css("overflow-y"))){return G}G=G.parent()}while(G[0].parentNode);return B(document)}(C.currentItem);C.overflowX=function(G){do{if(/auto|scroll/.test(G.css("overflow"))||(/auto|scroll/).test(G.css("overflow-x"))){return G}G=G.parent()}while(G[0].parentNode);return B(document)}(C.currentItem);if(C.overflowY[0]!=document&&C.overflowY[0].tagName!="HTML"){C.overflowYOffset=C.overflowY.offset()}if(C.overflowX[0]!=document&&C.overflowX[0].tagName!="HTML"){C.overflowXOffset=C.overflowX.offset()}},sort:function(E,D){var F=D.options;var C=B(this).data("sortable");if(C.overflowY[0]!=document&&C.overflowY[0].tagName!="HTML"){if((C.overflowYOffset.top+C.overflowY[0].offsetHeight)-E.pageY<F.scrollSensitivity){C.overflowY[0].scrollTop=C.overflowY[0].scrollTop+F.scrollSpeed}if(E.pageY-C.overflowYOffset.top<F.scrollSensitivity){C.overflowY[0].scrollTop=C.overflowY[0].scrollTop-F.scrollSpeed}}else{if(E.pageY-B(document).scrollTop()<F.scrollSensitivity){B(document).scrollTop(B(document).scrollTop()-F.scrollSpeed)}if(B(window).height()-(E.pageY-B(document).scrollTop())<F.scrollSensitivity){B(document).scrollTop(B(document).scrollTop()+F.scrollSpeed)}}if(C.overflowX[0]!=document&&C.overflowX[0].tagName!="HTML"){if((C.overflowXOffset.left+C.overflowX[0].offsetWidth)-E.pageX<F.scrollSensitivity){C.overflowX[0].scrollLeft=C.overflowX[0].scrollLeft+F.scrollSpeed}if(E.pageX-C.overflowXOffset.left<F.scrollSensitivity){C.overflowX[0].scrollLeft=C.overflowX[0].scrollLeft-F.scrollSpeed}}else{if(E.pageX-B(document).scrollLeft()<F.scrollSensitivity){B(document).scrollLeft(B(document).scrollLeft()-F.scrollSpeed)}if(B(window).width()-(E.pageX-B(document).scrollLeft())<F.scrollSensitivity){B(document).scrollLeft(B(document).scrollLeft()+F.scrollSpeed)}}}});B.ui.plugin.add("sortable","axis",{sort:function(E,D){var C=B(this).data("sortable");if(D.options.axis=="y"){C.position.left=C.originalPosition.left}if(D.options.axis=="x"){C.position.top=C.originalPosition.top}}})})(jQuery);


