import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {BaseService} from "./base-service";
import {Status} from "../classes/status";
import {Observable} from "rxjs/Observable";
import {TwitterUser} from "../classes/twitter-user";


@Injectable ()
export class AutocompleteService extends BaseService {
	constructor(protected http:Http ) {
		super(http);
	}

	private twitterSearchUrl = 'users/search';

	fetchUserNames(searchString : string) : Observable<Status> {
		return(this.http.post(this.twitterSearchUrl, searchString) //shouldn't be a post? Need to send as query params instead
			.map(BaseService.extractMessage)
			.catch(BaseService.handleError));
	}
}