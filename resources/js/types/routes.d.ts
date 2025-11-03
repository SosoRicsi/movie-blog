export type routeType = {
    methods: 'GET' | 'HEAD' | 'POST' | 'PUT' | 'PATCH' | 'OPTIONS';
    url: string;
    uri: string;
    parameters?: Record<string, boolean>;
}
