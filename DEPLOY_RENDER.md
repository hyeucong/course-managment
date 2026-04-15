Render deployment notes
=======================

1) Commit built frontend assets (`public/build`) before deploying on the free tier

- Run locally:

```powershell
npm ci
npm run build
git add public/build -f
git commit -m "Add built frontend for Render"
git push
```

2) We removed `/public/build` from `.gitignore` so built assets are tracked.

3) Dockerfile

We added a `Dockerfile` that matches your requested image and runs `composer install` and (if `package.json` exists) `npm run build` during image build.

4) Force HTTPS

- Laravel now forces HTTPS in production: see `App\Providers\AppServiceProvider.php` (it calls `URL::forceScheme('https')` when `app()->environment('production')`).
