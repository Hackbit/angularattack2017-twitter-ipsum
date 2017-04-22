import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {ProfileComponent} from "./components/profile-component";

export const allAppComponents = [HomeComponent, ProfileComponent];

export const routes: Routes = [
	{path: "profile", component: ProfileComponent},
	{path: "", component: HomeComponent}
];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);