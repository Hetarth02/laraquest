
![Logo](https://dev-to-uploads.s3.amazonaws.com/uploads/articles/th5xamgrr6se0x5ro4g6.png)

    
# Laraquest

Laraquest is a social support platform where users can create their forums and threads as well as reply to existing threads. Moreover, users can subscribe to their preferred threads to keep up with it by recieving notifications. This entire project is Open-Source.

## License

[![MIT License](https://img.shields.io/badge/License-MIT-red?style=for-the-badge)](https://choosealicense.com/licenses/mit/)


  
## Run Locally

Assuming you have PHP, MySQL and Composer Package manager installed in your system,

Clone the project from git CLI using

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd my-project
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
## Screenshots

Snapshots of the project,

![App Screenshot](https://via.placeholder.com/468x300?text=App+Screenshot+Here)

  
## Features

- Create your own Forums
- Bookmark your favourite threads
- Responsive UI

  
## Tech Stack

**Framework** - Laravel

**Core Languages** - HTML5, CSS3, PHP, SQL, Javascript

**CDNs** - Bootstrap 4/5, Font-Awesome

**Note** - It is required to be connected to internet for the CDNs to work.

  
## Feedback

If you have any feedback, please reach out to me at hetarth02@gmail.com

  ## 🚀 About Me
Hi, I am Hetarth, the face behind Laraquest.

I am my own teacher, and have self-taught myself with a certain degree of experience in working with Laravel framework. I am constantly pushing myself out of the comfort zone through this web development journey, seeing how far can I go. I am open to any collaboratory projects.

  
## My Skills
- HTML
- CSS
- Javascript
- PHP
- SQL
- Python
  
## Support/Contact

For support or Contact, email me at hetarth02@gmail.com

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
