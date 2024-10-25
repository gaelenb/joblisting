## Job Listing Sample Web App

A sample job listing board with some simple functionality [Schooner Strategies](https://schoonerstrategies.com).

## Getting Started

- Clone the repo
- Create a database and use .env.example to make a .env file
- Run `composer update` to install wp, the theme, and the plugins
- Run `wp core install --url={url} --title={title} --admin_user={user} --admin_email={email}` to install wordpress
- Run `wp theme activate joblisting` to activate the theme
- Run `wp plugin activate --all` to activate required plugins
- Generate some jobs with `wp generate_job_posts --count=150`

## Objectives

- update the vue components in index.php to include the functionality included in the UI
- update single.php as appropriate
- add a 'Post Your Job' page with the included page template
