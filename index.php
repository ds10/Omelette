<!DOCTYPE html>
<html>
  <head>
      <title>gridster test</title>
   
      <link rel="stylesheet" type="text/css" href="lib/js/gridster.js/dist/jquery.gridster.css">
      <link rel="stylesheet" type="text/css" href="lib/js/gridster.js/dist/styles.css">
      <style>
      
      input {
    width: 100px;
}
.handle {
    border-bottom: 1px solid black;
    background-color: yellow
}
.gridster {
    position:relative;
    background-color: gray;
} 

li {
    background-color: white;
    width: 150px;
    height: 300px;
    border: solid 2px black;
}

.gridster > * {
    margin: 0 auto;
    -webkit-transition: height .4s;
    -moz-transition: height .4s;
    -o-transition: height .4s;
    -ms-transition: height .4s;
    transition: height .4s;
}

.gridster .gs_w{
    z-index: 2;
    position: absolute;
}

.ready .gs_w:not(.preview-holder) {
    -webkit-transition: opacity .3s, left .3s, top .3s;
    -moz-transition: opacity .3s, left .3s, top .3s;
    -o-transition: opacity .3s, left .3s, top .3s;
    transition: opacity .3s, left .3s, top .3s;
}

.ready .gs_w:not(.preview-holder) {
    -webkit-transition: opacity .3s, left .3s, top .3s, width .3s, height .3s;
    -moz-transition: opacity .3s, left .3s, top .3s, width .3s, height .3s;
    -o-transition: opacity .3s, left .3s, top .3s, width .3s, height .3s;
    transition: opacity .3s, left .3s, top .3s, width .3s, height .3s;
}

.gridster .preview-holder {
    z-index: 1;
    position: absolute;
    background-color: #fff;
    border-color: #fff;
    opacity: 0.3;
}

.gridster .player-revert {
    z-index: 10!important;
    -webkit-transition: left .3s, top .3s!important;
    -moz-transition: left .3s, top .3s!important;
    -o-transition: left .3s, top .3s!important;
    transition:  left .3s, top .3s!important;
}

.gridster .dragging {
    z-index: 10!important;
    -webkit-transition: all 0s !important;
    -moz-transition: all 0s !important;
    -o-transition: all 0s !important;
    transition: all 0s !important;
}

/* Uncomment this if you set helper : "clone" in draggable options */
/*.gridster .player {
  opacity:0;
}*/


      
      </style>
      
      
  </head>
  <body>
    
     
    
<div class="gridster">
    <ul id="reszable">
      <li data-row="1" data-col="3" data-sizex="4" data-sizey="3"><div class="handle">Bubbles!</div><iframe src="http://wookie.eun.org:80/wookie/wservices/incubator.apache.org/wookie/generated/C7FD0B20-827B-3ED7-1257-1A8A62F9F9D5/index.html?idkey=5qrf2G84cdLbsVc6oJ63GAunuRU.eq.&proxy=http://wookie.eun.org:80/wookie/proxy&st=" width="800" height="600"></iframe></li>
    
        <li data-row="1" data-col="1" data-sizex="1" data-sizey="1"><div class="handle">About</div>This is the overview Dashboard of the Bolton Employability event. <a href="http://109.74.200.115/Omelette/sanky_view.html">Experimental map of the current activity is here.</a><br/><br/>TODO other links  #BoltonEmploy</li>
        <!--  <li data-row="2" data-col="1" data-sizex="1" data-sizey="1"><div class="handle">2</div></li>
        <li data-row="3" data-col="1" data-sizex="1" data-sizey="1"><div class="handle">3</div></li>
        <li data-row="1" data-col="2" data-sizex="2" data-sizey="1"><div class="handle">4</div></li>--> 
        <li data-row="1" data-col="1" data-sizex="2" data-sizey="2"><div class="handle">Connections</div> <iframe src="http://wookie.eun.org:80/wookie/wservices/incubator.apache.org/wookie/generated/E076EC0C-15E9-D95C-BFED-F29214C780F6/index.html?idkey=ssulXYRUS.pl.HsWdEDt1Xfc2u0pQA.eq.&proxy=http://wookie.eun.org:80/wookie/proxy&st=" width="260" height="300"></iframe></li>
       <!--  <li data-row="1" data-col="4" data-sizex="1" data-sizey="1"><div class="handle">6</div></li> -->
        <!--    <li data-row="3" data-col="4" data-sizex="1" data-sizey="1"><div class="handle">8</div></li>
        <li data-row="1" data-col="5" data-sizex="1" data-sizey="1"><div class="handle">9</div></li>
        <li data-row="3" data-col="5" data-sizex="1" data-sizey="1"><div class="handle">10</div></li>
        <li data-row="1" data-col="6" data-sizex="1" data-sizey="1"><div class="handle">11</div></li>
        <li data-row="2" data-col="6" data-sizex="1" data-sizey="2"><div class="handle">12</div></li>-->
        
    </ul>
</div>


  </div>
<!--  -->
      <script type="text/javascript" src="lib/js/gridster.js/libs/jquery/jquery.js"></script>
      <script type="text/javascript" src="lib/js/gridster.js/dist/jquery.gridster.js" charster="utf-8"></script>
      <script type="text/javascript">
      
          var gridster;

          $(function() {
        	  gridster = $(".gridster > ul").gridster({
                  widget_margins: [5, 5],
                  widget_base_dimensions: [200, 200],
                  min_cols: 6
              }).data('gridster');

          });
      </script>
  </body>
</html>
