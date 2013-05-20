<!DOCTYPE html>
<html>
  <head>
      <title>gridster test</title>
   
      <link rel="stylesheet" type="text/css" href="lib/js/gridster.js/dist/jquery.gridster.css">
      <link rel="stylesheet" type="text/css" href="lib/js/gridster.js/dist/styles.css">
  </head>
  <body>
      <section class="demo">
          <div class="gridster">
       <ul>
        <li data-row="1" data-col="1" data-sizex="6" data-sizey="2"><iframe src="http://wookie.eun.org:80/wookie/wservices/incubator.apache.org/wookie/generated/1B8BE65D-AF3D-F827-913E-E83FAB97B91F/index.html?idkey=K1JtGxXiHlXpCjCmqz4YBKu1RDQ.eq.&proxy=http://wookie.eun.org:80/wookie/proxy&st=" width="840" height=280></iframe></iframe></li>
        <li data-row="2" data-col="1" data-sizex="2" data-sizey="2"> <iframe src="http://wookie.eun.org:80/wookie/wservices/incubator.apache.org/wookie/generated/34D7DA7F-0F89-9F20-2AAE-AABA84E94BD2/index.html?idkey=mYxmaUC3smJoQrj.pl.m.pl.CTssAfiHY.eq.&proxy=http://wookie.eun.org:80/wookie/proxy&st=" width="280" height="280"></iframe> </li>

        
        <li data-row="1" data-col="2" data-sizex="2" data-sizey="1"></li>
        <li data-row="2" data-col="2" data-sizex="2" data-sizey="2"></li>
 
        <li data-row="1" data-col="4" data-sizex="1" data-sizey="1"></li>
        <li data-row="2" data-col="4" data-sizex="2" data-sizey="1"></li>
        <li data-row="3" data-col="4" data-sizex="1" data-sizey="1"></li>
         <li data-row="2" data-col="1" data-sizex="3" data-sizey="2"> <iframe src="http://wookie.eun.org:80/wookie/wservices/incubator.apache.org/wookie/generated/C7FD0B20-827B-3ED7-1257-1A8A62F9F9D5/index.html?idkey=5qrf2G84cdLbsVc6oJ63GAunuRU.eq.&proxy=http://wookie.eun.org:80/wookie/proxy&st=" width="420" height="280"></iframe></li>
    
        <li data-row="1" data-col="5" data-sizex="1" data-sizey="1"></li>
        <li data-row="3" data-col="5" data-sizex="1" data-sizey="1"></li>
 
        <li data-row="1" data-col="6" data-sizex="1" data-sizey="1"></li>
        <li data-row="2" data-col="6" data-sizex="1" data-sizey="2"></li>
    </ul>
          </div>
      </section>
      <script type="text/javascript" src="lib/js/gridster.js/libs/jquery/jquery.js"></script>
      <script type="text/javascript" src="lib/js/gridster.js/dist/jquery.gridster.js" charster="utf-8"></script>
      <script type="text/javascript">
      
          var gridster;

          $(function() {
        	  gridster = $(".gridster > ul").gridster({
                  widget_margins: [5, 5],
                  widget_base_dimensions: [140, 140],
                  min_cols: 6
              }).data('gridster');

          });
      </script>
  </body>
</html>
