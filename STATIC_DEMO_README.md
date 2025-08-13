# JobPortal Vue - Static Demo

This is a static demo version of the JobPortal Vue application, specifically designed to showcase the profile modal styling fixes after updating to Tailwind CSS 4.

## 🚀 Quick Start

### Build the Static Demo

```bash
# Install dependencies (if not already done)
npm install

# Build the static version
npm run build:static

# Or build with watch mode for development
npm run build:static:watch
```

The built files will be in the `dist-static` directory.

### Local Development

```bash
# Start the main Laravel app
npm run dev

# In another terminal, build static demo with watch mode
npm run build:static:watch
```

Then serve the `dist-static` folder with any static file server:

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

The demo automatically deploys to GitHub Pages when you push to the `main` branch. The GitHub Action will:

1. Build the static version
2. Deploy to GitHub Pages
3. Make it available at `https://yourusername.github.io/yourrepo`

### Manual Deployment

1. Build the static version: `npm run build:static`
2. Copy the contents of `dist-static` to a new branch called `gh-pages`
3. Push the branch: `git push origin gh-pages`
4. Enable GitHub Pages in your repository settings

## 📁 Project Structure

```
├── resources/js/
│   ├── app.static.ts          # Static entry point
│   └── components/
│       └── StaticDemo.vue     # Main demo component
├── static-demo/
│   └── index.html             # Static HTML entry point
├── vite.static.config.ts      # Vite config for static builds
├── .github/workflows/
│   └── deploy-static.yml      # GitHub Actions deployment
└── dist-static/               # Built static files (generated)
```

## 🎨 What's Demonstrated

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

### Modifying Colors

Update the color variables in `resources/css/app.css`:

```css
:root {
  --primary-600: #your-color;
  --accent-500: #your-color;
}
```

## 🐛 Troubleshooting

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
