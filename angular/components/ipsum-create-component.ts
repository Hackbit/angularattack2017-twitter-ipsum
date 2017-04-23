import {Component} from "@angular/core";
import {IpsumRequest} from "../classes/ipsum-request";
import {IpsumService} from "../services/ipsum-service";
import {Status} from "../classes/status";

@Component({
	selector: "ipsum-create",
	templateUrl: "./templates/ipsum-create.php"
})

export class IpsumCreateComponent {
	newIpsumRequest : IpsumRequest = new IpsumRequest(null);
	status : Status = null;

	constructor(private ipsumService: IpsumService) {}

	createIpsum() : void {
		this.ipsumService.createIpsum(this.newIpsumRequest).subscribe(status => this.status = status);
	}
}