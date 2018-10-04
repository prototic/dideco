
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
    	<!-- mini logo for sidebar mini 50x50 pixels -->
      	<span class="logo-mini"><b>DIDECO</b></span>
      	<!-- logo for regular state and mobile devices -->
      	<span class="logo-lg"><b>DIDECO</b>Trámites</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    	<!-- Sidebar toggle button-->
      	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	<span class="sr-only">Toggle navigation</span>
      	</a>

      	<div class="navbar-custom-menu">
        	<ul class="nav navbar-nav">
        		<!--li class="messages-menu">
            		<a href="../reports/view_reports1.php">
              			<i class="ion ion-android-map"></i>
              			<span id="notificationTerreno" class="label label-success"></span>
            		</a>
            	</li>
            	<li class="messages-menu">
            		<a href="../reports/view_reports2.php">
              			<i class="ion ion-settings"></i>
              			<span id="notificationMantencion" class="label label-warning"></span>
            		</a>
            	</li>
            	<li class="messages-menu">
            		<a href="../reports/view_reports3.php">
              			<i class="ion ion-ios-list"></i>
              			<span id="notificationMateriales" class="label label-danger"></span>
            		</a>
            	</li-->
          
        		<li>
        			<a href="../../handler/logout.php"><i class="fa fa-sign-out"></i></a>
        		</li>
        	</ul>
    	</div>
    </nav>
</header>

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!--script type="text/javascript">
		$(document).ready(function() {
			
			function getRandValue(){
        		
        		$.ajax({
            		type: "GET",
            		url: "../../api/notifications/getLasts.php",
            		//data: dataString,
            		dataType: "text",
            		success: function(data) {
            			var response = JSON.parse(data);
            			
            			if(response.ht_terreno > 0) {
            				$('#notificationTerreno').html(response.ht_terreno);
            			}
            			if(response.ht_mantencion > 0) {
            				$('#notificationMantencion').html(response.ht_mantencion);
            			}
            			if(response.ht_materiales > 0) {
            				$('#notificationMateriales').html(response.ht_materiales);
            			}
            		},
            		error: function(data) {
                		$('#prueba').html("Error");
            		}
        		});
    		}
    		
    		setInterval(getRandValue, 3000);
		});
</script-->