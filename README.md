# Development

## Pre-requirements

Please check if you have installed it locally:

* node version 16
* npm version 8
* php version 7.4
* composer

## First run

At the very beginning, you should prepare your theme for further development. Install all dependencies and build main libraries for the website

1. Copy `.env.sample` to `.env` (<b>do not change the file name</b>, just create a new `.env` file with the same content
   which is in the `.env.sample` file)
2. Configure variables in `.env` file according to your local WordPress settings
3. Run `npm install`

## Development: BrowserSync + Livereload + watchers

To start development, just type in the command line `npm start`
It will run all code compilators and linters.

## Building bundle

Deploying all source files is not the best practice. For that reason, you can build a zip package with your theme

1. Run `npm install`
2. Run `npm run bundle`

It will take only the required files and compress them into a zip file that can be easily installed on the website via
the admin panel.

## Building styles and scripts

Compiled assets are not included in the repository, so the website won't be displayed properly at the beginning

1. Run `npm install`
2. Run `npm run build`

# Upcoming
1. Add PHP CS 
2. Improve checking files inside an IDE
3. Add `.editorconfig`
4. Configure BUDDY for automatic deployment + buddy YAML
5. Set flow of merging changes to the master / PR / etc.
6. Validate everything locally before commit push
7. Create a separate repository with a starter for the full site editing
