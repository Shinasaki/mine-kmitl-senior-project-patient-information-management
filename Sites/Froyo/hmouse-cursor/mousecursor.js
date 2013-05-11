var left=100,top=100;
var x, y,x1;
var jseyeimg="jseyeblue.gif";
var jseyesimg="jseyes.gif";
var jseyeso=null, jseye1=null, jseye2=null;
browsername = navigator.appName;
if(browsername.indexOf("Netscape")!= -1)
{
  browsername="NS";
 
}
else
{
  if(browsername.indexOf("Microsoft")!=-1)
  {
    browsername="MSIE";
    
  }
}

  function eyemove(x2,y2,a,b){
  var tanteeta,opp,adj;
  var fx,fy;
    if (jseyeso && jseye1 && jseye2 && jseyeso.style) {
      if((x2 > a) && (y2> b))
      {
       tanteeta=Math.atan((y2-b)/(x2-a));
       opp=Math.round(Math.sin(tanteeta)*35*10000)/10000;
       adj=Math.round(Math.cos(tanteeta)*35*10000)/10000;
       fx=a+adj;
       fy=b+opp;
       if((x2<fx) && (y2<fy))
       {
         fx=x2;
         fy=y2;
       }
    }
  if((x2 > a) && (y2< b))
  {
    tanteeta=Math.atan((b-y2)/(x2-a));
    opp=Math.round(Math.sin(tanteeta)*35*10000)/10000;
    adj=Math.round(Math.cos(tanteeta)*35*10000)/10000;
    fx=a+adj;
    fy=b-opp;
    if((x2<fx) && (y2>fy))
    {
     fx=x2;
     fy=y2;
    }
  }
  if((x2 < a) && (y2< b))
  {
    tanteeta=Math.atan((b-y2)/(a-x2));
    opp=Math.round(Math.sin(tanteeta)*35*10000)/10000;
    adj=Math.round(Math.cos(tanteeta)*35*10000)/10000;
    fx=a-adj;
    fy=b-opp;
    if((x2>fx) && (y2>fy))
    {
      fx=x2;
      fy=y2;
    }
  }
  if((x2 < a) && (y2> b))
  {
    tanteeta=Math.atan((y2-b)/(a-x2));
    opp=Math.round(Math.sin(tanteeta)*35*10000)/10000;
    adj=Math.round(Math.cos(tanteeta)*35*10000)/10000;
    fx=a-adj;
    fy=b+opp;
    if((x2>fx) && (y2<fy))
    {
     fx=x2;
     fy=y2;
    }
  }
  var xx=new Array();
  xx[0]=fx;
  xx[1]=fy;
  return xx;
  }
}

function jseyesmove(x2, y2) {
  var d =eyemove(x2,y2,x,y);
  jseye1.style.left=d[0]; 
  jseye1.style.top=d[1];
  var d =eyemove(x2,y2,x1,y);
  jseye2.style.left=d[0]; 
  jseye2.style.top=d[1];
}

function objects(id) {
 var x= document.getElementById(id);
 return(x);
}

function jseyes() {
  var img;
  x=left+35;
  x1=left+162;
  y=top+35;
  img= "<div id='jseyeslayer' style='position:relative; '>"+
  "<img src='"+jseyesimg+"' style='position:absolute; left:"+left+"; top:"+top+"; ' >"+
  "<div id='jseye1' style='position:absolute; left:"+x+"; top:"+y+";width:30; height:30'>"+
  "<img src='"+jseyeimg+"' width=30 height=30 >"+
  "</div>"+"<div id='jseye2' style='position:absolute; left:"+x1+"; top:"+y+";width:30; height:30'>"+
  "<img src='"+jseyeimg+"' width=30 height=30 >"+"</div>"+"</div>";
  document.write(img);
  jseyeso=objects('jseyeslayer');
  jseye1=objects('jseye1');
  jseye2=objects('jseye2');
  if(browsername=="NS")
  {
    document.captureEvents(Event.MOUSEMOVE);
    document.onmousemove=jseyesmousemoveNS;
  }
  else if(browsername=="MSIE")
  {
    document.onmousemove=jseyesmousemoveIE;
  }
}

function jseyesmousemoveNS(e) {
  jseyesmove(e.pageX, e.pageY);
}

function jseyesmousemoveIE() {
  jseyesmove(event.clientX+document.body.scrollLeft, event.clientY+document.body.scrollTop);
}
 	
jseyes();


