<?
	$id = (int)$_GET['nota_id'];
	if($id <= 0) header('Location: index.html');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>jQM Complex Demo</title>
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<script type='text/javascript' src="js/jquery-1.8.3.min.js"></script>
<script type='text/javascript' src="js/jquery.getUrlParam.js"></script>
<script type='text/javascript'>//<![CDATA[ 
$(document).ready(function(){
	var ancho = $(window).width(); 
	/* Sacamos el ancho de la ventana, no del documento $(document) */
	$.ajax({
	  url : 'http://www.wirenetserver.com.ar/app/index.php?op=ampliar&id=<?=$id?>&callback=?',
	  //url : 'http://www.todojujuy.com/webservice/index_m?op=loultimo&callback=?',
	  dataType : 'jsonp',
	  //data : data,
	  success:function(data) {
		  //alert(data.respData.id);
		 
			  $('#movie-data').append('<li><div class="titulo" style="width:'+(ancho-10)+'px">'+data.respData.titulo+'</div><div class="fecha" style="width:'+ancho+'px"><div class="seccion" style="color:'+data.respData.seccion_color+'">'+data.respData.seccion_nombre+'</div>'+ data.respData.fecha_hora+'</div>');
			  if (data.respData.imagen != '') {
				  $('#movie-data').append('<div class="imagen"><img src="http://todojujuy.com/imagenes/'+ancho+'x300/strict/img/'+data.respData.imagen+'" /></div>');
			  }
			  $('#movie-data').append('<div class="resumen" style="width:'+(ancho-10)+'px">'+data.respData.cuerpo+'</div></li>');
		  
	  },
	});
});

//]]>  
</script>
<link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css" />
<link rel="stylesheet" href="css/estilos.css" />
<script src="js/jquery.mobile-1.2.0.min.js"></script>

</head>
<body>
<div data-role="page" id="home">

	<div data-role="header">
		<h1>TodoJujuy.com</h1>
	</div><!-- /header -->

	<div data-role="content" id="noticias">	
		<ul data-role="listview"  id="movie-data" data-theme="a"></ul>	
	</div><!-- /content -->

	<div data-role="footer">
		<h4>2013 ®</h4>
	</div><!-- /footer -->
</div><!-- /page -->

</body>
</html>