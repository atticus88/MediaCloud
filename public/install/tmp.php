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
									$installed = false;
									if(strtolower(php_uname("s")) == 'linux') {
										exec('which composer', $output, $result);
										if ($result == 0) {
											$installed = true;
										}
									} else {
										if (preg_match('/composer/i',$_SERVER["PATH"])) {
											$installed = true;
										}
									}
									if($installed) {
										echo '<i class="btn btn-success btn-lrg"><span class="glyphicon glyphicon-ok"></span></i> <strong>Composer install</strong>';
									} else {
										echo '<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Composer install</strong>';
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

				<!-- Queue -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-queue">
								<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Queue</strong>
							</div>
						</h4>
					</div>
					<div id="collapse-queue" class="panel-collapse collapse">
						<div class="panel-body">

							<?php
							$installed = false;
							if(strtolower(php_uname("s")) == 'linux') {
								exec('which beanstalkd', $output, $result);
								if ($result == 0) {
									$installed = true;
								}
							}
							// else {
							// 	if (preg_match('/beanstalkd/i',$_SERVER["PATH"])) {
							// 		$installed = true;
							// 	}
							// }
							if($installed) {
								echo '<strong>Install beanstalkd</strong>';
							} else {
								echo '<strong>Not Install beanstalkd</strong>';
							}
							?>

						</div>
					</div>
				</div>
				<!-- /Queue -->


				<!-- supervisord -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-supervisord">
								<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Supervisord</strong>
							</div>
						</h4>
					</div>
					<div id="collapse-supervisord" class="panel-collapse collapse">
						<div class="panel-body">
							<p>This will need to be install if its linux</p>
							<p>It helps with keeping beanstalkd going if a service gets locked up</p>

							<br />
							<br />

							<h3>What is Supervisord?</h3>
							<a href="http://supervisord.org/">supervisord.org/</a>

							<?php
							$installed = false;
							if(strtolower(php_uname("s")) == 'linux') {
								exec('which supervisord', $output, $result);
								if ($result == 0) {
									$installed = true;
								}
							}
							if($installed) {
								echo '<strong>Supervisord install</strong>';
							} else {
								echo '<strong>Supervisord is not install</strong>';
							}
							?>

						</div>
					</div>
				</div>
				<!-- /supervisord -->

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
									<input type="radio" id="dbType" name="dbType" value="mysql"> mysql
								</label>

								<label>
									<input type="radio" id="dbType" name="dbType" value="sqlite"> sqlite
								</label>

								<label>
									<input type="radio" id="dbType" name="dbType" value="pgsql"> pgsql
								</label>

								<label>
									<input type="radio" id="dbType" name="dbType" value="sqlsrv"> sqlsrv
								</label>
							</div>






							<div class="row">
							<h3>Database Info</h3>
								<i class="btn btn-default"><span class="glyphicon glyphicon-check"></span></i> <strong>Test Settings</strong>
							</div>



							<div class="col-lg-2 form-group">
								<label for="dbName">Name</label>
								<input type="text" class="form-control" id="dbName" name="dbName" placeholder="Name">
							</div>
							<div class="col-lg-2 form-group">
								<label for="dbDomain">Domain</label>
								<input type="text" class="form-control" id="dbDomain" name="dbDomain" placeholder="localhost">
							</div>
							<div class="col-lg-2 form-group">
								<label for="dbUserName">Username</label>
								<input type="text" class="form-control" id="dbUserName" name="dbUserName" placeholder="Username">
							</div>

							<div class="col-lg-2 form-group">
								<label for="dbPassword">Password</label>
								<input type="password" class="form-control" id="dbPassword" name="dbPassword" placeholder="Password">
							</div>

							<div class="col-lg-2 form-group">
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
							<p>Where do you want to store your assets?</p>

							<label for="assetPath">Asset Path</label>
							<input type="text" class="form-control" id="assetPath" name="assetPath" placeholder="[Project Root]/public/assets">
						</div>
					</div>
				</div>
				<!-- /Asset Path -->


				<!-- Auth Service -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-auth-service">
								<i class="btn btn-danger btn-lrg"><span class="glyphicon glyphicon-remove"></span></i> <strong>Authentication Service</strong>
							</div>
						</h4>
					</div>
					<div id="collapse-auth-service" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="form-inline ">
								<label>
									<input type="radio" id="authType" name="authType" value="CAS"> CAS
								</label>

								<label>
									<input type="radio" id="authType" name="authType" value="LDAP"> LDAP
								</label>

								<label>
									<input type="radio" id="authType" name="authType" value="Database"> Database
								</label>

								<label>
									<input type="radio" id="authType" name="authType" value="Shibboleth"> Shibboleth
								</label>
							</div>

							<div id="cas-auth-conf" class="col-md-5 hide">
								<label for="authCASLoginUrl">CAS Login URL</label>
								<input class="form-control" type="text"  id="authCASLoginUrl" name="authCASLoginUrl"  placeholder="https://cas.domain.edu/login" />
								<label for="authCASLogoutUrl">CAS Logout URL</label>
								<input class="form-control" type="text" id="authCASLogoutUrl" name="authCASLogoutUrl"  placeholder="https://cas.domain.edu/logout" />
							</div>


							<div id="ldap-auth-conf" class="col-md-5 hide">
								<label for="authLDAPHost">LDAP Host</label>
								<input class="form-control" type="text" id="authLDAPHost" name="authLDAPHost"  placeholder="ldap://ad.domain.edu:389" />
								<label>Base DN</label>
								<input class="form-control" type="text" id="authBaseDN" name="authBaseDN" placeholder="DC=ad,DC=domain,DC=edu" />
							</div>

						</div>
					</div>
				</div>
				<!-- /Auth Service -->

<br>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>





		</div>
	</div>
</body>
<script src="/assets/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){


		// Authentication Service
		$("input[name$='authType']").click(function() {
			var val = $(this).val().toLowerCase();
			var elm = $("#"+val + "-auth-conf")[0]
			$("[id*='-auth-conf']").addClass("hide");
			$(elm).removeClass("hide");
		});
	});
</script>
</html>

<!--  -->
