// resources/js/lib/routesStore.ts
import { router } from "@inertiajs/vue3";
import type { routeType } from "@/types/routes";

type RouteMap = Record<string, routeType>;
let ROUTES: RouteMap = {};

(function bootstrapFromDom() {
    const el = document.getElementById("app");
    const raw = el?.getAttribute("data-page");
    if (raw) {
        try {
            const page = JSON.parse(raw);
            ROUTES = page?.props?.routes ?? {};
        } catch { }
    }
})();

export function setRoutes(next: RouteMap) {
    ROUTES = next ?? {};
}

export function getRoutes(): RouteMap {
    return ROUTES;
}

export function route(name: string, params: Record<string, any> = {}): string {
    const r = ROUTES[name];
    if (!r) {
        console.warn(`[route] Route "${name}" not found.`);
        return "#";
    }

    if (!r.url) {
        let uri = r.uri;
        for (const [k, v] of Object.entries(params)) {
            uri = uri.replace(new RegExp(`{${k}}`, "g"), encodeURIComponent(String(v)));
        }
        return `/${uri}`.replace(/\/+/g, "/");
    }

    let url = r.url;
    for (const [k, v] of Object.entries(params)) {
        url = url.replace(new RegExp(`{${k}}`, "g"), encodeURIComponent(String(v)));
    }
    return url;
}

export function visit(name: string, params: Record<string, any> = {}, options = {}) {
    router.visit(route(name, params), options);
}

export function has(name: string): boolean {
  return !!ROUTES[name];
}

window.addEventListener("inertia:success", (e: any) => {
    const next = e?.detail?.page?.props?.routes ?? {};
    setRoutes(next);
});
