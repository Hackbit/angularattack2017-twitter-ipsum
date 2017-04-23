import {Component, ElementRef, EventEmitter, Output, ViewChild} from "@angular/core";
import {IpsumRequest} from "../classes/ipsum-request";
import {IpsumService} from "../services/ipsum-service";
import {Status} from "../classes/status";
import {AutocompleteService} from "../services/autocomplete-service";
import {Observable} from "rxjs/Observable";
import {Subject} from "rxjs/Subject";


@Component({
	selector: "ipsum-create",
	templateUrl: "./templates/ipsum-create.php"
})

export class IpsumCreateComponent {
	newIpsumRequest : IpsumRequest = new IpsumRequest("");
	status : Status = null;
	userNames: string[] = [];
	twitterUserAtHandleSubject : Subject<string> = new Subject<string>();
	@Output() ipsumCreated : EventEmitter<Status> = new EventEmitter<Status>();
	@ViewChild("twitterUserAtHandle") twitterUserAtHandle : ElementRef;

	constructor(private ipsumService: IpsumService, private autocompleteService: AutocompleteService) {
		this.twitterUserAtHandleSubject
			.debounceTime(1000)
			.distinctUntilChanged()
			.flatMap(search => Observable.of(search).delay(500))
			.subscribe(() => this.getAutocompleteNames());
	}

	createIpsum() : void {
		this.ipsumService.createIpsum(this.newIpsumRequest).subscribe(status => {
			this.status = status;
			this.ipsumCreated.emit(this.status);
		});
	}

	getAutocompleteNames() : void {
		if (this.newIpsumRequest.twitterUserAtHandle !== null && this.newIpsumRequest.twitterUserAtHandle !== "") {
			this.autocompleteService.fetchUserNames(this.newIpsumRequest.twitterUserAtHandle).subscribe(userData => {
				this.userNames = [];
				userData.map((result: any) => this.userNames.push(result.screen_name));
			});
		}
	}
}