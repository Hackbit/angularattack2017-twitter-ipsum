import {Component, EventEmitter, Output} from "@angular/core";
import {IpsumRequest} from "../classes/ipsum-request";
import {IpsumService} from "../services/ipsum-service";
import {Status} from "../classes/status";
import {AutocompleteService} from "../services/autocomplete-service";


@Component({
	selector: "ipsum-create",
	templateUrl: "./templates/ipsum-create.php"
})

export class IpsumCreateComponent {
	newIpsumRequest : IpsumRequest = new IpsumRequest(null);
	status : Status = null;
	userNames: string[] = [];
	@Output() ipsumCreated : EventEmitter<Status> = new EventEmitter<Status>();

	constructor(private ipsumService: IpsumService, private autocompleteService: AutocompleteService) {}

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