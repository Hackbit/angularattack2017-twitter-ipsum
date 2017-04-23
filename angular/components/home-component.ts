import {Component} from "@angular/core";
import {AutocompleteService} from "../services/autocomplete-service";
import {TwitterUser} from "../classes/twitter-user";

@Component({
	templateUrl: "./templates/home.php"
})

export class HomeComponent {
	userNames : any[] = [];

	searchString : string;

	constructor(private autocompleteService: AutocompleteService) {}

	ngOnInit() : void {
		this.getAutoCompleteNames();
	}

	getAutoCompleteNames() : void {
		//this.autocompleteService.fetchUserNames(this.searchString).subscribe(userNames => this.userNames = userNames);
	}
}