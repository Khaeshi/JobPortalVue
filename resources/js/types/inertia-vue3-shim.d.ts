// Type shim for static build to satisfy imports of '@inertiajs/vue3'
declare module '@inertiajs/vue3' {
  export const Head: any;
  export const Link: any;
  export function usePage<T = any>(): { props: T };
  export function useForm<T extends Record<string, any>>(initial: T): any;
  export const router: any;
}

// resources/js/types/vue-router-shim.d.ts
declare module 'vue-router' {
    export function createRouter(...args: any[]): any
    export function createWebHashHistory(...args: any[]): any
    export type Router = any
  }


