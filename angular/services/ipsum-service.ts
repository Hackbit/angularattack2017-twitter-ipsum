import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {BaseService} from "./base-service";
import {Status} from "../classes/status";
import {Ipsum} from "../classes/ipsum";
import {Observable} from "rxjs/Observable";

@Injectable ()
export class IpsumService extends BaseService {
	constructor(protected http:Http ) {
		super(http);
	}

	//define the API endpoint
	private ipsumUrl = "api/ipsum/";

	getFeed() : Observable<Ipsum[]> {
		return(this.http.get(this.ipsumUrl)
			.map(BaseService.extractData)
			.catch(BaseService.handleError));
	}
}