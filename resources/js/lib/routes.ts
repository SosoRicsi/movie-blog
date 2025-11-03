import {usePage, router} from "@inertiajs/vue3";
import { routeType } from "@/types/routes";

export function useRoutes() {
    const {props} = usePage();
    const routes: Record<string, routeType> = props.routes;

    function route(name: string, params: Record<string, any> = {}): string {
        const r: routeType = routes[name];
        if (!r) {
            console.warn(`[route] Route "${name}" not found.`);
            return '#';
        }

        if (!r.url) {
            console.warn(`[route] Route "${name}" has no prebuilt URL, falling back to URI pattern.`);
            let uri = r.uri;
            for (const [key, value] of Object.entries(params)) {
                uri = uri.replace(new RegExp(`{${key}}`, 'g'), encodeURIComponent(value));
            }
            return `/${uri}`.replace(/\/+/g, '/');
        }

        let url = r.url;

        for (const [key, value] of Object.entries(params)) {
            url = url.replace(new RegExp(`{${key}}`, 'g'), value)
        }

        return url;
    }

    function visit(name: string, params: Record<string, any> = {}, options = {}): void {
        const url = route(name, params);
        router.visit(url, options);
    }

    return {route, visit, routes}
}
