<?php 

// post call 


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
		
		<form role="form">


			
			
			


			<div class="panel-group" id="accordion">
				<!-- Clone -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-db">
								<i class="btn btn-success btn-lrg"><span class="glyphicon glyphicon-ok"></span></i> <strong>Clone MediaCloud Repo</strong>
							</a>
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
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-composer">
								<i class="btn btn-success btn-lrg"><span class="glyphicon glyphicon-ok"></span></i> 	<strong>Composer install</strong> (<a href="http://getcomposer.org">Composer</a>)
							</a>
						</h4>
					</div>
					<div id="collapse-composer" class="panel-collapse collapse">
						<div class="panel-body">
							To Install composer open the terminal, type:

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
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-database">
								<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Database Setup</strong>
							</a>
						</h4>
					</div>
					<div id="collapse-database" class="panel-collapse collapse in">
						<div class="panel-body">



							<div class="col-lg-3 form-group">
									<label for="dbName">Database Name</label>
									<input type="email" class="form-control" id="dbName" placeholder="Database Name">
							</div>
							<div class="col-lg-3 form-group">
									<label for="dbUserName">Database Username</label>
									<input type="text" class="form-control" id="dbUserName" placeholder="Username">
							</div>

							<div class="col-lg-3 form-group">
									<label for="dbPassword">Database Username</label>
									<input type="password" class="form-control" id="dbPassword" placeholder="Database Password">
							</div>

						</div>
					</div>
				</div>
				<!-- /Database -->

				<!-- Asset Path -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-asset-path">
								<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Asset Path</strong>
							</a>
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
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-beanstalkd">
								<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Beanstalkd</strong>
							</a>
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
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-auth-source">
								<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Authenticaiton Source</strong>
							</a>
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