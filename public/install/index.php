<?php 
// post call 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		/* special ajax here */
		echo "ajax ";
	}else{
		
		echo "not ajax ";
	}

   var_dump($_POST);
	die();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	echo "GET";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<link href="/assets/css/bootstrap.css" rel="stylesheet">
	<style>
		.weber-nav {
			text-shadow: 0 -1px 0 rgba(0,0,0,.15);
			background-color: #563d7c;
			border-color: #463265;
			box-shadow: 0 1px 0 rgba(255,255,255,.1);
		}

		.weber-nav .navbar-collapse {
			border-color: #463265;
		}
		.weber-nav .navbar-brand {
			color: #fff;
		}
		.weber-nav .navbar-nav > li > a {
			color: #cdbfe3;
		}
		.weber-nav .navbar-nav > li > a:hover {
			color: #fff;
		}
		.weber-nav .navbar-nav > .active > a,
		.weber-nav .navbar-nav > .active > a:hover {
			color: #fff;
			background-color: #463265;
		}
		.weber-nav .navbar-toggle {
			border-color: #563d7c;
		}
		.weber-nav .navbar-toggle:hover {
			background-color: #463265;
			border-color: #463265;
		}
	</style>
</head>
<body>
	<div class="navbar navbar-inverse weber-nav navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">MediaCloud Install</a>
			</div>
		</div>
	</div>
	<div class="container" style="margin-top:70px;">
		
		<form role="form" action="" method="POST">


			
			
			


			<div class="panel-group" id="accordion">
				<!-- Clone -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-db">
								<i class="btn btn-success btn-lrg"><span class="glyphicon glyphicon-ok"></span></i> <strong>Clone MediaCloud Repo</strong>
							</div>
						</h4>
					</div>
					<div id="collapse-db" class="panel-collapse collapse">
						<div class="panel-body">
							Good Job, MediaCloud has been cloned!
						</div>
					</div>
				</div>
				<!-- /Clone -->

				<!-- Composer -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-composer">
								<?php 
									if (preg_match('/composer/i',$_SERVER["PATH"])) {
										echo '<i class="btn btn-success btn-lrg"><span class="glyphicon glyphicon-ok"></span></i>     <strong>Composer install</strong>';
									} else {	
										echo '<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i>     <strong>Composer install</strong>';
									}
								?>
							</div>
						</h4>
					</div>
					<div id="collapse-composer" class="panel-collapse collapse">
						<div class="panel-body">
							<h3>What is composer?</h3>
							<a href="http://getcomposer.org">getcomposer.org</a>
							<h3>Windows Install</h3>
							install  <a href="https://getcomposer.org/Composer-Setup.exe">Composer-Setup.exe</a>

							<h3>Mac/Linux Install</h3>
							<p>To Install composer open the terminal, type:</p>

<pre>curl -sS https://getcomposer.org/installer | php 
mv composer.phar /usr/local/bin/composer</pre>


						</div>
					</div>
				</div>
				<!-- /Composer -->

				<!-- Database -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-database">
								<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Database Setup</strong>
							</div>
						</h4>
					</div>
					<div id="collapse-database" class="panel-collapse collapse">
						<div class="panel-body">
							
							
							 <label class="control-label">Select Database Type</label>

							<div class="form-inline">
								<label >
									<input type="radio" id="radio-db-type" name="radio-db-type" value="mysql" checked>
									mysql
								</label>
							 
								<label>
									<input type="radio" id="radio-db-type" name="radio-db-type" value="sqlite">
									sqlite
								</label>
							 
								<label>
									<input type="radio" id="radio-db-type" name="radio-db-type" value="pgsql">
									pgsql
								</label>
							 
								<label>
									<input type="radio" id="radio-db-type" name="radio-db-type" value="sqlsrv">
									sqlsrv
								</label>
							</div>
							
							




							<h3>Database</h3>
							<div class="col-lg-3 form-group">
									<label for="dbName">Name</label>
									<input type="text" class="form-control" id="dbName" name="dbName" placeholder="Name">
							</div>
							<div class="col-lg-3 form-group">
									<label for="dbUserName">Username</label>
									<input type="text" class="form-control" id="dbUserName" name="dbUserName" placeholder="Username">
							</div>

							<div class="col-lg-3 form-group">
									<label for="dbPassword">Password</label>
									<input type="password" class="form-control" id="dbPassword" name="dbPassword" placeholder="Password">
							</div>

							<div class="col-lg-3 form-group">
									<label for="dbPrefix">Table Prefix</label>
									<input type="text" class="form-control" id="dbPrefix" name="dbPrefix" placeholder="Prefix: mc_">
							</div>

							

						</div>
					</div>
				</div>
				<!-- /Database -->

				<!-- Asset Path -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-asset-path">
								<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Asset Path</strong>
							</div>
						</h4>
					</div>
					<div id="collapse-asset-path" class="panel-collapse collapse">
						<div class="panel-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
						</div>
					</div>
				</div>
				<!-- /Asset Path -->


				<!-- Beanstalkd -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-beanstalkd">
								<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Beanstalkd</strong>
							</div>
						</h4>
					</div>
					<div id="collapse-beanstalkd" class="panel-collapse collapse">
						<div class="panel-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
						</div>
					</div>
				</div>
				<!-- /Beanstalkd -->

				<!-- Auth Source -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-auth-source">
								<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Authenticaiton Source</strong>
							</div>
						</h4>
					</div>
					<div id="collapse-auth-source" class="panel-collapse collapse">
						<div class="panel-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
						</div>
					</div>
				</div>
				<!-- /Auth Source -->

<br>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>

			
			
			

		</div>






    	<!--<ul>
    		<li><button class="btn btn-success btn-lrg"><span class="glyphicon glyphicon-ok"></span></button> Clone</li>
    		<li>Composer install (<a href="http://getcomposer.org">Composer</a>)</li>
    		<li>Database Setup</li>
    		<li>Path Assets</li>
    		<li>Beanstalkd (Linux Only)</li>
    		<li>ldap / localAuth / CAS / Saml</li>
    	</ul>-->


    </div>
</body>
<script src="/assets/js/bootstrap.min.js"></script>
</html>

<!--  -->
