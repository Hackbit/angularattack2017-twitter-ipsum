import {Component, OnInit} from "@angular/core";
import {IpsumService} from "../services/ipsum-service";
import {Status} from "../classes/status";

@Component({
	templateUrl: "./templates/profile.php"
})

export class ProfileComponent implements OnInit {
	ipsums : any[] = [];

	constructor(private ipsumService: IpsumService) {}

	ngOnInit() : void {
		this.getIpsumByProfileId();
	}

	ipsumUpdate(status : Status) : void {
		if(status.status === 200) {
			this.ipsums = [];
			this.getIpsumByProfileId();
		}
	}

	getIpsumByProfileId() : void {
		this.ipsumService.getIpsumByProfileId(42).subscribe(ipsums => this.ipsums = ipsums);
	}
}