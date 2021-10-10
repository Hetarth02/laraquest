# Laraquest

Laraquest is a social support platform where users can create their forums and threads as well as reply to existing threads. Moreover, users can subscribe to their preferred threads to keep up with it by recieving notifications. This entire project is Open-Source.

## License

[![MIT License](https://img.shields.io/badge/License-MIT-red?style=for-the-badge)](https://opensource.org/licenses/MIT)

## Run Locally

If, you do not have PHP, MySQL or Composer Package manager installed follow these steps and after the requirements are met follow the above mentioned steps.

- Download and setup [XAMPP](https://www.apachefriends.org/index.html) for PHP and MySQL.

- Download and Install Composer Package manager from [here.](https://getcomposer.org/)

> Note - For windows download Composer-setup.exe by clicking Get Started on website.

Assuming you have PHP, MySQL and Composer Package manager installed in your system,

Download and extract the project in your project directory or,

Clone the project in your preferred folder from git CLI using

```bash
    cd your_project_folder
```
```bash
    git clone https://github.com/Hetarth02/laraquest.git
```

Go to your project directory in your preferred IDE,

```bash
    cd your_project_folder
```
```bash
    cd laraquest-main
```

Install dependencies

```bash
    composer update
```
## Environment Variables

Open XAMPP Control Panel and activate Apache and MySql Server. After that, go to your browser and in search bar type the following, ```localhost/phpmyadmin```

Now create a new database.

When cloned/downloaded the project, you will need to create a `.env` file if you don't have one already and change the following environment variables to run this project.

For this simply, copy and paste and rename `.env.example` to `.env` in your project folder.

> Note - Do not replace `.env.example`

Now, in your `.env` locate and change the

`DB_DATABASE=laravel` to `DB_DATABASE=YOUR_DATABASE_NAME`
> Note - Write name of your DB which you created in XAMPP

After saving your changes, in your command prompt run the following commands to start the poject on your local server,

```bash
    php artisan migrate
```
```bash
    php artisan key:generate
```
```bash
    composer update
```
```bash
    php artisan serve
```
## Features

- Create your own Forums
- Bookmark your favourite threads
- Change thread status to resolved
- Responsive UI

## Tech Stack

**Framework** - Laravel

**Core Languages** - HTML5, CSS3, PHP, SQL, Javascript

**CDNs** - Bootstrap 4/5, Font-Awesome

> Note - It is required to be connected to internet for the CDNs to work.
  
## :memo: Feedback

If you have any feedback, please reach out to me at hetarth02@gmail.com

## About Me

:wave: Hi, I am Hetarth, the face behind Laraquest.

I am my own teacher, and have self-taught myself with a certain degree of experience in working with Laravel framework. I am constantly pushing myself out of the comfort zone through this web development journey, seeing how far can I go. I am open to any collaboratory projects.
  
## 🚀 Skills

- HTML
- CSS
- Javascript
- PHP
- SQL
- Python
  
## :mailbox_with_mail: Support/Contact

For support or Contact, email me at hetarth02@gmail.com