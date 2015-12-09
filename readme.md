[![Coverage Status](https://coveralls.io/repos/andela-bkagia/php-checkpoint-4/badge.svg?branch=develop&service=github)](https://coveralls.io/github/andela-bkagia/php-checkpoint-4?branch=develop)
[![Circle CI](https://circleci.com/gh/andela-bkagia/php-checkpoint-4/tree/develop.svg?style=svg)](https://circleci.com/gh/andela-bkagia/php-checkpoint-4/tree/develop)


#KnowTube

This app is currently running [here](https://knowtube.herokuapp.com).

KnowTube is an app that hosts educational YouTube videos.

The catalog of videos is organised into categories and
users are free to browse, edit and add new content.


###Features

- You may filter the videos by category by using the buttons
along the top.

- You may also revert to viewing all videos by clicking **All**.

- If you want to add your own videos, you may do so through
the dashboard. To access the dashboard you will have to
register an account.

- You may register and login with your existing Google+ or
Github account.

- Also please note that you can only change videos that you
yourself added to the site.

- Have fun and learn something new today!

## Installation
### Requirements
 - PHP and Composer
 - Apache
 - MySQL

### Setup

1. Create a `.env` file perhaps by copying the existing `.env.example`.
2. Get the relevant credentials for your social provider and plaace them
   in the `.env` file.
2. Then run `composer install`
3. Create a database and place connection settings in your `.env`
4. Finally setup your server to serve from the `public` folder.

For more help on setting up a laravel application please see the introduction [here](http://laravel.com/docs/5.1#installation).

