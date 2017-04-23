import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {BaseService} from "./base-service";
import {Observable} from "rxjs/Observable";


@Injectable ()
export class AutocompleteService extends BaseService {
	constructor(protected http:Http ) {
		super(http);
	}

	private twitterSearchUrl = '/api/twitter-users/';

	fetchUserNames(searchString : string) : Observable<any> {
		return(this.http.get(this.twitterSearchUrl + searchString)
			.map(BaseService.extractData)
			.catch(BaseService.handleError));
	}
}