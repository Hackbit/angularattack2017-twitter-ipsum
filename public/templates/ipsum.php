<section class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<div class="well well-lg ipsum-well">
			<div class="pull-left">
				<img [src]="twitterUser.twitterUserImage" alt="">
			</div>
			<p class="at-handle">
				@{{ twitterUser.twitterUserAtHandle }}
			</p>
			<p class="ipsum-text">
				{{ ipsum.ipsumContent }}
			</p>
			<p>
				<button type="button" class="btn btn-default" ngxClipboard [cbContent]="ipsum.ipsumContent"><i class="fa fa-clipboard" aria-hidden="true"></i> Copy</button>
				<button type="button" class="btn btn-default"><i class="fa fa-twitter" aria-hidden="true"></i> Share</button>
			</p>
		</div>
	</div>
</section>