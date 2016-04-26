 
function dhtmlXContextMenuObject(width,height){
 this.menu=new dhtmlXMenuBarObject(document.body,width,height,name,1);
 this.menu.setMenuMode("popup");
 this.menu.hideBar();
 this.menu.contextMenu=this;
 this.menu.enableWindowOpenMode(false);
 this.menu.setOnClickHandler(this._innerOnClick);
}

 
dhtmlXContextMenuObject.prototype.setContextMenuHandler=function(func){
 if(typeof(func)=="function")this.onClickHandler=func;else this.onClickHandler=eval(func);
}
 
dhtmlXContextMenuObject.prototype.setOnShowMenuHandler=function(func){
 if(typeof(func)=="function")this.onShowHandler=func;else this.onShowHandler=eval(func);
}
 
 
dhtmlXContextMenuObject.prototype._innerOnClick=function(id){
 var that=document.body.contextMenu;
 if(document.body.onclick)document.body.onclick();
 if(that.onClickHandler)return that.onClickHandler(id,that.zoneId);
 return true;
}

 
dhtmlXContextMenuObject.prototype.setContextZone=function(htmlObject,zoneId){
 if(typeof(htmlObject)!="object")
 htmlObject=document.getElementById(htmlObject);
 
 htmlObject.contextOnclick=htmlObject.onmousedown;
 htmlObject.onmousedown=this._contextStart;
 htmlObject.contextMenu=this;
 htmlObject.contextMenuId=zoneId;
}
 
dhtmlXContextMenuObject.prototype._contextStart=function(e){
 if(!e)e=event;
 if(document.body.onclick)document.body.onclick();
 
 if((!e)||(e.button!=2))
{
 if(this.contextOnclick)this.contextOnclick();
 return true;
}
 else{if(this.contextMenu.onShowHandler)this.contextMenu.onShowHandler(this.contextMenuId);this.contextMenu.menu.showBar();}
 
 var a=this.contextMenu.menu.topNod;
 a.style.position="absolute";
 a.style.left=e.clientX+document.body.scrollLeft;
 a.style.top=e.clientY+document.body.scrollTop;
 
 this.contextMenu._fixMenuPosition(a);

 
 document.body.oncontextmenu=new Function("document.body.oncontextmenu=new Function('if(document.body.onclick)document.body.onclick();return false;');return false;");
 document.body.onclick=this.contextMenu._contextEnd;
 document.body.contextMenu=this.contextMenu;
 this.contextMenu.zoneId=this.contextMenuId;
 return false;
}

 
dhtmlXContextMenuObject.prototype._fixMenuPosition=function(panel,mode){
 var xs=document.body.offsetWidth-15;
 var ys=document.body.offsetHeight-15;

 if((panel.offsetWidth+parseInt(panel.style.left))>xs)
{
 var z=parseInt(panel.style.left)-panel.offsetWidth;
 if(z<0)
 z=xs-panel.offsetWidth;
 if(z<0)z=0;
 panel.style.left=z;
 if(panel.ieFix)panel.ieFix.style.left=z;
}
 
 if((panel.offsetHeight+parseInt(panel.style.top))>ys)
{
 var z=parseInt(panel.style.top)- panel.offsetHeight;
 if(z<0)
 var z=ys-panel.offsetHeight;
 if(z<0)z=0;
 panel.style.top=z;
 if(panel.ieFix)panel.ieFix.style.top=z;
}
 
 if(!mode)this._fixMenuPosition(panel,1);
}
 
 
dhtmlXContextMenuObject.prototype._contextEnd=function(e){
 var menu=this.contextMenu.menu;
 menu._closePanel(menu);
 menu.lastOpenedPanel="";
 menu.lastSelectedItem=0;
 menu.hideBar();
 document.body.onclick=null;
 return false;
}

