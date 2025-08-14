// Minimal Ziggy route() mock for static demo
export function route(name: string): string {
    const routes: Record<string, string> = {
        dashboard: '/dashboard',
        'profile.edit': '/settings/profile',
        logout: '/logout',
        'jobs.index': '/jobs',
        'jobs.create': '/jobs/create',
        companies: '/companies',
        applications: '/applications',
        help: '/help',
    };
    return routes[name] ?? '/';
}

// Expose as global for templates that use bare `route(...)`
try {
    // @ts-ignore
    if (typeof window !== 'undefined') window.route = route;
} catch {
    // noop in non-browser
}


