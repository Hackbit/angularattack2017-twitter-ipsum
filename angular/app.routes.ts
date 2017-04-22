 import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {ProfileComponent} from "./components/profile-component";
import {PrivacyComponent} from "./components/privacy-component";
import {TermsComponent} from "./components/terms-component";

export const allAppComponents = [HomeComponent, ProfileComponent, PrivacyComponent, TermsComponent];

export const routes: Routes = [
	{path: "profile", component: ProfileComponent},
	{path: "privacy", component: PrivacyComponent},
	{path: "terms", component: TermsComponent},
	{path: "", component: HomeComponent}
];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);