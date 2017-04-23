<h1>Your Ipsums</h1>
<ipsum-create></ipsum-create>
<ipsum *ngFor="let ipsum of ipsums" [ipsum]="ipsum.ipsum" [twitterUser]="ipsum.twitterUser"></ipsum>