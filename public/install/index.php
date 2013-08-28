<?php 

// post call 


?>


<!DOCTYPE html>
<html lang="en">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<link href="/assets/css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
		.stack {
			list-style:none;
			margin:0;
			padding:0
		}
		.stack li {
			margin:0 0 23px
		}
		.stack li>.content {
			-webkit-border-radius:4px;
			-moz-border-radius:4px;
			-ms-border-radius:4px;
			-o-border-radius:4px;
			border-radius:4px;
			background-color:#f5f5f5;
			color:#4c4c4c;
			font-size:15px;
			padding:15px;
			font-weight:300
		}
		.stack li>.content .actions {
			display:inline;
			float:right;
			margin-top:-10px;
			text-indent:0
		}
		.stack li>.content .actions .button_to { 
			display:inline;
			float:left
		}
		.stack li>.content .actions input.btn { 
			background-color:transparent;
			font-weight:300;
			border:0;
			line-height:19px
		}
		.stack li>.content .actions a,.stack li>.content .actions input.btn {
			display:inline;
			float:left;
			-webkit-border-radius:4px;
			-moz-border-radius:4px;
			-ms-border-radius:4px;
			-o-border-radius:4px;
			border-radius:4px;
			color:#b3b3b3;
			background-repeat:no-repeat;
			background-position:10px center;
			font-size:18px;
			margin:5px;
			margin-left:10px
		}
		.stack li>.content .actions a.button,.stack li>.content .actions input.btn.button {
			background-color:#dedede;
			color:#666;padding:10px 20px;
			display:block
		}
		.stack li>.content .actions a:hover,.stack li>.content .actions a.edit:not(.collapsed),.stack li>.content .actions input.btn:hover,.stack li>.content .actions input.btn.edit:not(.collapsed) {
			background-color:transparent;color:#398bce
		}
		.stack li>.content .actions a.destroy:hover,.stack li>.content .actions input.btn.destroy:hover {
			color:#cc5151
		}
		.stack li .collapse{
			margin-top:-3px
		}
		.stack li .collapse form{
			-moz-border-radius-bottomleft:4px;
			-webkit-border-bottom-left-radius:4px;
			border-bottom-left-radius:4px;
			-moz-border-radius-bottomright:4px;
			-webkit-border-bottom-right-radius:4px;
			border-bottom-right-radius:4px;
			background-color:#f5f5f5;
			padding:23px
		}
		.stack li .collapse form input[type='text'],.stack li .collapse form textarea {
			background-color:#fff;
			color:#4c4c4c
		}
		.verb { 
			-webkit-border-radius:3px;
			-moz-border-radius:3px;
			-ms-border-radius:3px;
			-o-border-radius:3px;
			border-radius:3px;
			color:#fff;
			float:left;
			font-size:14px;
			line-height:32px;
			padding:0 20px;text-indent:0;
			position:absolute;
			top:0;
			left:-20px;
			z-index:1000;
			cursor:pointer
		} 
		#api li>.content .verb.post{background-color:#ff7200}
		#api li>.content .verb.get{background-color:#5bb75b;}
		#api li>.content .verb.post{background-color:#006dcc;}
		#api li>.content .verb.error{background-color:#ff4f4f}
	</style>
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
    	<h2>Install Page</h2>
    	<div class="api-section">
    		<ul class="stack">
    			<li class="method">
    				<div class="content collapsed" data-target="#api-demo" data-toggle="collapse">
    					<div class="verb post">POST</div><div class="path">{&quot;action&quot; : &quot;getInfo&quot;}</div>
    					<div class="actions"><span class="toggle-documentation"></span></div>
    				</div>
    				<div class="collapse" id="api-demo"><div class="content"></div>
    				</div>
    			</li>
    		</ul>
    	</div>
    	<ol>
    		<li>Clone</li>
    		<li>Composer install (<a href="http://getcomposer.org">Composer</a>)</li>
    		<li>Database Setup</li>
    		<li>Path Assets</li>
    		<li>Beanstalkd (Linux Only)</li>
    		<li>ldap / localAuth / CAS / Saml</li>
    	</ol>


	</div>
	</body>
	 <script src="/assets/js/bootstrap.min.js"></script>
</html>

<!--  -->