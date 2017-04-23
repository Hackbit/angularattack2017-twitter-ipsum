<h2>Ipsum Create</h2>
<form #ipsumCreateForm="ngForm" name="ipsumCreateForm" (ngSubmit)="createIpsum();" novalidate>
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<div class="input-group main-search">
				<span class="input-group-addon" id="at-add-on">@</span>
				<input type="text" class="form-control" placeholder="realDonaldTrump" required maxlength="32"
						 [(ngModel)]="newIpsumRequest.twitterUserAtHandle" #twitterUserAtHandle="ngModel"/>
				<span class="input-group-btn">
				<button [disabled]="ipsumCreateForm.invalid" class="btn btn-default" type="submit">Generate!</button>
			</span>
			</div>
		</div>
	</div>
	<div [hidden]="twitterUserAtHandle.valid || twitterUserAtHandle.pristine" class="alert alert-danger row" role="alert">
		<p *ngIf="twitterUserAtHandle.errors?.required">At Handle is required.</p>
	</div>
</form>
<div *ngIf="status !== null" class="alert alert-dismissible row" [ngClass]="status.type" role="alert">
	<button type="button" class="close" aria-label="Close" (click)="status = null;"><span aria-hidden="true">&times;</span></button>
	{{ status.message }}
</div>