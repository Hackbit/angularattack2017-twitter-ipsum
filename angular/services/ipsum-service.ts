import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {BaseService} from "./base-service";
import {Status} from "../classes/status";
import {Ipsum} from "../classes/ipsum";
import {IpsumRequest} from "../classes/ipsum-request";
import {Observable} from "rxjs/Observable";

@Injectable ()
export class IpsumService extends BaseService {
	constructor(protected http:Http ) {
		super(http);
	}

	//define the API endpoint
	private ipsumUrl = "api/ipsum";

	createIpsum(ipsumRequest : IpsumRequest) : Observable<Status> {
		return(this.http.post(this.ipsumUrl, ipsumRequest)
			.map(BaseService.extractMessage)
			.catch(BaseService.handleError));
	}
	getIpsumByAtHandle(atHandle : string) : Observable<Ipsum[]> {
		return(this.http.get(this.ipsumUrl + "at-handle/" + atHandle)
			.map(BaseService.extractData)
			.catch(BaseService.handleError));
	}
	getIpsumByProfileId(profileId : number) : Observable<Ipsum[]> {
		return(this.http.get(this.ipsumUrl + "/" + profileId)
			.map(BaseService.extractData)
			.catch(BaseService.handleError));
	}
	getAllIpsum() : Observable<any[]> {
		return(this.http.get(this.ipsumUrl)
			.map(BaseService.extractData)
			.catch(BaseService.handleError));
	}
}