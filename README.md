# Laraquest

Laraquest is a social support platform where users can create their forums and threads as well as reply to existing threads. Moreover, users can subscribe to their preferred threads to keep up with it by recieving notifications. This entire project is Open-Source.

## License

[![MIT License](https://img.shields.io/badge/License-MIT-red?style=for-the-badge)](https://opensource.org/licenses/MIT)

## Run Locally

Assuming you have PHP, MySQL and Composer Package manager installed in your system,

Clone the project from git CLI using

```bash
    git clone https://github.com/Hetarth02/laraquest.git
```

Go to your project directory

```bash
    cd project_folder
    cd laraquest
```

Install dependencies

```bash
    composer update
```

If, you do not have PHP, MySQL or Composer Package manager installed follow these steps and after the requirements are met follow the above mentioned steps.

- Download and setup [XAMPP](https://www.apachefriends.org/index.html) for PHP and MySQL.

- Install Composer Package manager from [here.](https://getcomposer.org/)
## Environment Variables

Open XAMPP Control Panel and activate MySql Server. After that, go to your browser and in search bar type the following,

```localhost/phpmyadmin```

When cloned/downloaded the project, you will need to create a `.env` file if you don't have one already and change the following environment variables to run this project.

Now create a new database.

Next simply, copy and paste and rename `.env.example` to `.env` in your project folder.

Now, in your `.env` change the

`DB_DATABASE=laravel`

to

`DB_DATABASE=YOUR_DATABASE_NAME`

After saving this, open your command prompt and `cd` into your project directory and then run the following commands to start the local server with project,

```bash
    composer update
```
```bash
    php artisan serve
```  
## Features

- Create your own Forums
- Bookmark your favourite threads
- Responsive UI

## Tech Stack

**Framework** - Laravel

**Core Languages** - HTML5, CSS3, PHP, SQL, Javascript

**CDNs** - Bootstrap 4/5, Font-Awesome

> Note - It is required to be connected to internet for the CDNs to work.
  
## Feedback

If you have any feedback, please reach out to me at hetarth02@gmail.com

## 🚀 About Me

Hi, I am Hetarth, the face behind Laraquest.

I am my own teacher, and have self-taught myself with a certain degree of experience in working with Laravel framework. I am constantly pushing myself out of the comfort zone through this web development journey, seeing how far can I go. I am open to any collaboratory projects.
  
## 🚀 Skills

- HTML
- CSS
- Javascript
- PHP
- SQL
- Python
  
## Support/Contact

For support or Contact, email me at hetarth02@gmail.com