<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

if(empty($_SESSION["profile"]) === true) {
?>
	<div align="center">
		<h1 class="white-text">Please Login</h1>
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3">
				<div class="well well-lg">
					<p>To generate Twitter Ipsum, please <a href="/twitter/oauth"><i class="fa fa-twitter" aria-hidden="true"></i> Connect With Twitter</a></p>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div align="center">
		<h1 class="white-text">Your Ipsums Go Here!</h1>
	</div>
<ipsum-create (ipsumCreated)="ipsumUpdate($event)"></ipsum-create>
<ipsum *ngFor="let ipsum of ipsums" [ipsum]="ipsum.ipsum" [twitterUser]="ipsum.twitterUser"></ipsum>
<?php } ?>