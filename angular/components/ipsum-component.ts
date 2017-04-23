import {Component, Input} from "@angular/core";
import {Ipsum} from "../classes/ipsum";
import {TwitterUser} from "../classes/twitter-user";

@Component({
	selector: "ipsum",
	templateUrl: "./templates/ipsum.php"
})

export class IpsumComponent {
	@Input() ipsum : Ipsum;
	@Input() twitterUser : TwitterUser;
}