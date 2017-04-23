import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {ProfileComponent} from "./components/profile-component";
import {PrivacyComponent} from "./components/privacy-component";
import {TermsComponent} from "./components/terms-component";
import {FeedComponent} from "./components/feed-component";
import {IpsumComponent} from "./components/ipsum-component";
import {IpsumCreateComponent} from "./components/ipsum-create-component";

export const allAppComponents = [HomeComponent, ProfileComponent, PrivacyComponent, TermsComponent, FeedComponent, IpsumComponent, IpsumCreateComponent];

export const routes: Routes = [
	{path: "profile", component: ProfileComponent},
	{path: "privacy", component: PrivacyComponent},
	{path: "terms", component: TermsComponent},
	{path: "feed", component: FeedComponent},
	{path: "", component: HomeComponent}
];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);