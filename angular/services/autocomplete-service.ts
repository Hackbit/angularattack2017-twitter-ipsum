import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {BaseService} from "./base-service";
import {Status} from "../classes/status";
import {Observable} from "rxjs/Observable";


@Injectable ()
export class AutocompleteService extends BaseService {
	constructor(protected http:Http ) {
		super(http);
	}

	private twitterSearchUrl = '/api/twitter-users/';

	fetchUserNames(searchString : string) : Observable<Status> {
		return(this.http.get(this.twitterSearchUrl + searchString)
			.map(BaseService.extractMessage)
			.catch(BaseService.handleError));
	}
}