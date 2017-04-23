<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
					  data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" routerLink="">Twitter Ipsum</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<?php if(empty($_SESSION["profile"]) === true) { ?>
					<li><a href="/twitter/oauth"><i class="fa fa-twitter" aria-hidden="true"></i> Connect With Twitter</a>
					</li>
				<?php } else { ?>
				<li><a href=""><em>Logged in as @<?php echo $_SESSION["profile"]->profileAtHandle; ?></em></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a routerLink="profile">Your Feed</a></li>
				<?php } ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a routerLink="feed">Live Feed</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<main class="container">
	<router-outlet></router-outlet>
</main>
