import {Component, OnInit} from "@angular/core";
import {Ipsum} from "../classes/ipsum";
import {IpsumService} from "../services/ipsum-service";

@Component({
	templateUrl: "./templates/profile.php"
})

export class ProfileComponent implements OnInit {
	ipsums : Ipsum[] = [];

	constructor(private ipsumService: IpsumService) {}

	ngOnInit() : void {
		this.getIpsumByProfileId();
	}

	getIpsumByProfileId() : void {
		this.ipsumService.getIpsumByProfileId(42).subscribe(ipsums => this.ipsums = ipsums);
	}
}