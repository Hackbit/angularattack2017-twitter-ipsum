<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

if(empty($_SESSION["profile"]) === true) {
?>
<h1>Please Login</h1>
<p>To generate Twitter Ipsum, please <a href="/twitter/oauth"><i class="fa fa-twitter" aria-hidden="true"></i> Connect With Twitter</a></p>
<?php } else { ?>
<h1>Your Ipsums</h1>
<ipsum-create (ipsumCreated)="ipsumUpdate($event)"></ipsum-create>
<ipsum *ngFor="let ipsum of ipsums" [ipsum]="ipsum.ipsum" [twitterUser]="ipsum.twitterUser"></ipsum>
<?php } ?>