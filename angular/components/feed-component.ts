import {Component,OnInit} from "@angular/core";
import {IpsumService} from "../services/ipsum-service";
import {Ipsum} from "../classes/ipsum";

@Component({
	templateUrl: "./templates/feed.php"
})

export class FeedComponent implements OnInit {
	ipsums : Ipsum[] = [];

	constructor(private ipsumService: IpsumService) {}

	ngOnInit() : void {
		this.getAllIpsum();
	}

	getAllIpsum() : void {
		this.ipsumService.getAllIpsum().subscribe(ipsums => this.ipsums = ipsums);
	}
}
