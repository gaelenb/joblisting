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

## Comments about decisions
- Changed the Job Category to a `<select>` element to avoid rebuilding the wheel. `<select>` elements include a lot of native browser features that you have to recreate with js (select only 1, select multiple) and support for assistive technologies that you have to add with attributes. Granted that `<select>` elements are harder to style but I'd try the select element with a client first if they haven't specifically asked for a specific look.
- Removed the duplicated "Job Category" and "Location" dropdowns. Not sure if I misunderstood the purpose of this but I don't see a reason to replicate that. Edit: now I think I see that there are supposed to be parent categories for the job categories and this select is where only the child categories go. 
- Ideally I would move those 2 filters with the other filters into the `JobFilter` component. From a UX/Design perspective, I can't really think of a reason to put them next to the search unless a client specifically requested it.
- On second thought I replaced the search bar with the back button. I think this makes more sense for an end user that they would just want to go back to their original search and simplifies the page for a developer. 

## TODO index.php

- [ ] Add pagination
- [ ] Add a couple of the left filters that have different query types
	- [ ] add employment type with multi-select for an "OR" type query
	- [ ] add count of how many jobs shown/how many returned
	- [ ] add sorting
		- [ ] For "Relevancy" could roll your own using PHP's levenshtein or use external service / or package like Smith Waterman to compare the search to job post title and content
		- [ ] Most recent 
		- [ ] for "Popular" would probably have to hook into something like google analytics, or just have a count of number of applicants

## TODO single.php
- [x] add post date and company name
- [ ] add request for bookmarking
- honestly a lot left to do here


