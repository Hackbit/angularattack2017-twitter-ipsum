import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {ProfileComponent} from "./components/profile-component";
import {LegalComponent} from "./components/legal-component";
import {TermsComponent} from "./components/terms-component";

export const allAppComponents = [HomeComponent, ProfileComponent, LegalComponent, TermsComponent];

export const routes: Routes = [
	{path: "profile", component: ProfileComponent},
	{path: "", component: HomeComponent},
	{path: "legal", component: LegalComponent},
	{path: "terms", component: TermsComponent}
];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);