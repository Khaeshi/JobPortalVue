import { defineComponent, h, onMounted, watch, reactive } from 'vue';

// Minimal Head replacement: sets document.title when provided
export const Head = defineComponent<{ title?: string }>({
    name: 'HeadMock',
    props: { title: { type: String, required: false } },
    setup(props, { slots }) {
        const setTitle = () => {
            if (props.title) document.title = props.title;
        };
        onMounted(setTitle);
        watch(() => props.title, setTitle);
        return () => (slots.default ? h('div', {}, slots.default()) : null);
    },
});

// Minimal usePage replacement: exposes props similar to backend
export function usePage<T = any>() {
    const mock = {
        props: {
            auth: {
                user: {
                    id: 1,
                    name: 'John Doe',
                    email: 'john@example.com',
                    avatar: null,
                    profile_photo_url: null,
                    email_verified_at: null,
                    created_at: '',
                    updated_at: '',
                },
            },
        },
        url: typeof window !== 'undefined' ? window.location.hash.replace('#', '') || '/' : '/',
    } as unknown as { props: T };
    return mock;
}

// Minimal useForm replacement: reactive state with post() no-op
export function useForm<T extends Record<string, any>>(initial: T) {
    const state = reactive({
        ...initial,
        processing: false,
        errors: {} as Record<string, string>,
        async post(_url: string) {
            state.processing = true;
            try {
                // Simulate network delay
                await new Promise((r) => setTimeout(r, 300));
                // eslint-disable-next-line no-alert
                console.log('Mock submit', JSON.parse(JSON.stringify(state)));
            } finally {
                state.processing = false;
            }
        },
    });
    return state as typeof state & T;
}

// Minimal Link component using hash-based navigation
export const Link = defineComponent<{ href?: string; to?: string }>({
    name: 'InertiaLinkMock',
    props: {
        href: { type: String, required: false },
        to: { type: String, required: false },
    },
    setup(props, { slots }) {
        const target = (props as any).href ?? (props as any).to ?? '#';
        return () => h('a', { href: `#${target}` }, slots.default ? slots.default() : []);
    },
});

// Minimal router mock surface used in components
export const router = {
    flushAll() {
        /* no-op for static demo */
    },
};


