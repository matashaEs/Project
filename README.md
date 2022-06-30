### TODO:
6. Add phpcs
7. Add .editorconfig
8. Configure BUDDY for automatic deployment + buddy YAML
9. Set flow of merging changes to the master / PR / etc.
10. Validate everything locally before commit push
11. Add visual regression tests
12. Add images optimalization
13. Add Pest
14. Add phpstan https://github.com/phpstan/phpstan
15. Connect to sentry 
16. TODO: Disable comments 
17. TODO: https://fullsiteediting.com/lessons/theme-json-color-options/
    TODO: Disable unnecessary blocks in theme https://wplift.com/restrict-disable-gutenberg-blocks
    TODO: Disable unnecessary settings in
    theme.json https://themegen-preview.vercel.app/?mc_cid=f9f237db21&mc_eid=d0602161b3

# Development

## Pre requirements

Please check if you have installed locally:

* node version 16
* npm version 8
* php version 7.4
* composer

## First run

At the very beginning you should configure environment, install all dependencies and build main libraries for the
website

1. Copy `.env.sample` to `.env` (<b>do not change the file name</b>, just create a new `.env` file with the same content
   which is in the `.env.sample` file)
2. Configure variables in `.env` file according to your local environment
3. Run `npm install`
4. Run `npm run build`

It will compile all styles and scripts for the website.

## BrowserSync + Livereload + watcher

1. Run `npm install` - only if you didn't install before
2. Run `npm run build` - only for the first time to compile bootstrap and other dependencies
3. Run `npm start`

## Building bundle

Deploying all source files is not the best practice. For that reason, you can build a zip package

1. Run `npm install`
2. Run `npm run bundle`

It will take only the required files and compress them into a zip file that can be easily deployed to the website via
the admin panel.

## Building styles and scripts

Compiled assets are not included in the repository, so the website won't be displayed properly at the beginning

1. Run `npm install`
2. Run `npm run build`

# Upcoming
