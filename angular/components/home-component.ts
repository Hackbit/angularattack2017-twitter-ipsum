import {Component} from "@angular/core";

@Component({
	templateUrl: "./templates/home.php"
})

export class HomeComponent {
	public myData: string;
	public mySource = ['James T. Kirk', 'Benjamin Sisko', 'Jean-Luc Picard', 'Spock', 'Jonathan Archer', 'Hikaru Sulu', 'Christopher Pike', 'Rachel Garrett' ];

}