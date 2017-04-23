import {NgModule} from "@angular/core";
import {BrowserModule} from "@angular/platform-browser";
import {FormsModule} from "@angular/forms";
import {HttpModule} from "@angular/http";
import {AppComponent} from "./app.component";
import {allAppComponents, appRoutingProviders, routing} from "./app.routes";
import {IpsumService} from "./services/ipsum-service";
import {ClipboardModule} from "ngx-clipboard";
import { Ng2AutoCompleteModule } from 'ng2-auto-complete';


const moduleDeclarations = [AppComponent];

@NgModule({
	imports:      [BrowserModule, FormsModule, HttpModule, ClipboardModule, Ng2AutoCompleteModule, routing],
	declarations: [...moduleDeclarations, ...allAppComponents],
	bootstrap:    [AppComponent],
	providers:    [appRoutingProviders, IpsumService]
})
export class AppModule {}