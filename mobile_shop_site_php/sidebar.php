<html>
 <head>
  <title></title>
  
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device, initial-state=1"/>
  
  <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <link rel="stylesheet" href="sidebar.css"/>
  </head>
 <body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
			     <li class="active"><a href="index.php">POCETNA STRANA</a></li>
               
                <li><a href="register.php">REGISTER</a></li>
               
            </ul>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#" class="btn btn-success" id="menu-toggle"><span class="glyphicon glyphicon-menu-left"></span>Registracioni meni</a>
                        <h1>O meni</h1>
                        
						<!-- sadrazaj -->
						     <div class="row jumbotron" style="padding:0px;">
	   <div class="col-sm-8">
	      <h3><kbd>MILOS TANASKOVIC</kbd></h3>
		  <blockquote class="color" class="lead">
		     My name is Milos. I'm a student at ICT Colege at Vocational studies on Web programming module. I like technology, and I thrive to acquire new knowledge. I see myself as a web programmer.It's a real pleasure to study at this college.
		 </blockquote>
		
	   </div>
	   <div class="col-sm-4">
	     <img src="slike/milos1.jpg" class="img-responsive"/>
	   </div>
	 </div>
						
						<!--login-->
							<div class="modal fade" id="popUpWindow">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Log In</h3>
                </div>

                <!-- body (form) -->
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                    </form>
                </div>

                <!-- button -->
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block">Submit</button>
                </div>

            </div>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Menu toggle script -->
    <script>
        $("#menu-toggle").click( function (e){
            e.preventDefault();
            $("#wrapper").toggleClass("menuDisplayed");
        });
    </script>
 
 </body>
</html>