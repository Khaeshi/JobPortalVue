# JobPortal Vue – Static Demo (GitHub Pages)

This static demo lets you showcase parts of the app (Dashboard, Jobs, etc.) on GitHub Pages without Laravel/Inertia. It reuses your real Vue pages and components, with small shims for Inertia and Ziggy, and a hash-based router.

## 🚀 Quick Start

### Build the Static Demo

```bash
# Install dependencies (if not already done)
npm ci

# Build the static version
npm run build:static

# Or build with watch mode for development
npm run build:static:watch
```

The built files will be in the `dist-static` directory.

### Local Development / Preview

```bash
npm run preview:static
```

Or serve the `dist-static` folder with any static file server:

```bash
# Using Python
cd dist-static && python -m http.server 8000

# Using Node.js
npx serve dist-static

# Using PHP
cd dist-static && php -S localhost:8000
```

## 🌐 Deploy to GitHub Pages

### Automatic Deployment

The demo automatically deploys to GitHub Pages when you push to `main`. The GitHub Action will:

1. Build the static version
2. Deploy to GitHub Pages
3. Make it available at `https://<username>.github.io/<repo>/`

### Manual Deployment

1. Build the static version: `npm run build:static`
2. Copy the contents of `dist-static` to a new branch called `gh-pages`
3. Push the branch: `git push origin gh-pages`
4. Enable GitHub Pages in your repository settings

## 📁 Project Structure (static demo)

```
├── static-demo/
│   └── index.html                   # HTML entry used by Vite (root)
├── resources/js/
│   ├── app.static.ts                # Static boot file
│   ├── components/StaticDemo.vue    # “JobPortal Demo” home page
│   └── static/
│       ├── App.vue                  # Static root (renders RouterView only)
│       ├── router.ts                # Hash-based routes (/#/…)
│       ├── inertia-mock.ts          # Head/usePage/useForm/Link/router shims
│       └── ziggy-mock.ts            # route() shim
├── vite.static.config.ts            # Static build config (aliases, base, root)
├── .github/workflows/deploy-pages.yml  # GitHub Pages workflow
└── dist-static/                     # Build output (generated)
```

Notes
- Static routing uses hash mode: URLs look like `/#/dashboard`.
- Vite `base: './'` ensures relative assets (required for Pages subpaths).
- Aliases in `vite.static.config.ts` swap real Inertia/Ziggy with mocks for static builds.

## 🔌 How it works

- Static entry: `static-demo/index.html` → loads `resources/js/app.static.ts`.
- Root: `resources/js/static/App.vue` renders only `<RouterView />`. Pages themselves decide their layout. This avoids double-wrapping.
- Router: `resources/js/static/router.ts` defines routes. Pass props here if a page expects them.
- Inertia mock: `resources/js/static/inertia-mock.ts`
  - `Head` sets `document.title`
  - `usePage()` returns `{ props: { auth.user, ziggy, sidebarOpen }, url }`
  - `useForm()` adds a mock `post()` for demos
  - `Link` renders an `<a href="#...">` using hash navigation
  - `router.flushAll()` is a no-op
- Ziggy mock: `resources/js/static/ziggy-mock.ts` exports `route(name)` to map route names to static paths.

## 🎨 What’s in the demo

- **Profile Modal**: Fixed styling after Tailwind CSS 4 update
- **Color System**: All color variables properly defined in CSS
- **Component Showcase**: Various UI components with proper theming
- **Dark Mode**: Toggle between light and dark themes
- **Responsive Design**: Works on all device sizes

## 🔧 Customization

### Adding More Components

Edit `StaticDemo.vue` to showcase additional components:

```vue
<template>
  <section class="space-y-4">
    <h2 class="text-3xl font-bold">New Component</h2>
    <!-- Add your component here -->
  </section>
</template>
```

### Modifying colors

Update the color variables in `resources/css/app.css`:

```css
:root {
  --primary-600: #your-color;
  --accent-500: #your-color;
}
```

## 🐛 Troubleshooting

### Double header/duplicate sidebar trigger
- Cause: the static root and page both wrapped content with a layout.
- Fix: keep `resources/js/static/App.vue` minimal (only `<RouterView />`). Do not add an extra `AppLayout` wrapper here.

### `TypeError: r.route is not a function`
- Cause: static build didn’t have Ziggy’s `route()`.
- Fixes already in repo:
  - `ziggy-mock.ts` exports `route()` and sets `window.route` in browser.
  - `inertia-mock.ts` provides `usePage().props.ziggy.route = route`.
  - If a component calls a different path (e.g. `usePage().props.ziggy.routes`), extend the mock accordingly.

### Links don’t work on GitHub Pages
- Use hash routes (`createWebHashHistory`) in `resources/js/static/router.ts`.
- Ensure `vite.static.config.ts` has `base: './'`.
- The workflow copies `index.html` to `404.html` so SPA refreshes still work.

### Sidebar doesn’t toggle
- The toggle lives in `AppSidebarHeader.vue` → `SidebarTrigger` using the sidebar provider context.
- If you see no effect, make sure your page uses its own `AppLayout` (and the static root doesn’t wrap it again).

### Build Issues

- Ensure all dependencies are installed: `npm install`
- Check that all component imports are correct
- Verify the Vite config paths are accurate

### Styling Issues

- Check that CSS variables are properly defined
- Ensure Tailwind CSS is building correctly
- Verify component class names match your design system

### Deployment Issues

- Check GitHub Actions logs for build errors
- Ensure repository has GitHub Pages enabled
- Verify the `gh-pages` branch exists and is up to date

## 📚 Resources

- [Tailwind CSS 4 Documentation](https://tailwindcss.com/docs)
- [Vue 3 Documentation](https://vuejs.org/)
- [Vite Documentation](https://vitejs.dev/)
- [GitHub Pages Documentation](https://pages.github.com/)

## 🤝 Contributing

To add new features to the demo:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test locally with `npm run build:static`
5. Submit a pull request

## 📄 License

This project is licensed under the same terms as the main JobPortal Vue application.
