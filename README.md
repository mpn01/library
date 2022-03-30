# <span align="center"> 📚 Library️ </span>

## 📖 Description
Library project written in PHP and MySQL. It contains various ways to search between the books, that is searching by keywords like title, authors, tags or publishing house and also searching by genre of the book.

![HomeLibraryTeaser](https://raw.githubusercontent.com/mpn01/home-library/master/README/videos/teaser.gif)

## 💻 Usage 
To use this library first you need to have installed web server with configured PHP and MySQL/MariaDB server.

If web server is working correct, clone this repo:

```git
git clone https://github.com/mpn01/library.git
```

After that, create `connect.php` file with your database credentials matching variables below and put it in directory where you clone this repo.

```php
    $servername = "Your server name" //ex. localhost
    $username = "Your username" //ex. root
    $password = "Your password" 
    $database = "Name of your database" //ex. library
```

To make things easy, follow this structure of database:

| Field            | Type         | Null | Key | Default | Extra          |
|------------------|--------------|------|-----|---------|----------------|
| id               | int(11)      | NO   | PRI | NULL    | auto_increment |
| title            | varchar(255) | NO   |     | NULL    |                |
| author           | varchar(100) | NO   |     | NULL    |                |
| other_authors    | varchar(255) | YES  |     | NULL    |                |
| first_release    | int(4)       | YES  |     | NULL    |                |
| release_year     | int(4)       | NO   |     | NULL    |                |
| pages            | int(4)       | NO   |     | NULL    |                |
| genre            | varchar(45)  | NO   |     | NULL    |                |
| pucharse_date    | date         | YES  |     | NULL    |                |
| price            | decimal(5,2) | YES  |     | NULL    |                |
| original_title   | varchar(255) | YES  |     | NULL    |                |
| publishing_house | varchar(255) | NO   |     | NULL    |                |
| cover            | varchar(255) | YES  |     | NULL    |                |


## 🎨 Assets used in project
[Icons (Tabler Icons)](https://tabler-icons.io/)

[Font (Source Serif Pro)](https://fonts.google.com/specimen/Source+Serif+Pro)

## ©️ Credits
Theme switch based on [concept](https://dribbble.com/shots/6844698-Dark-theme-switch-animation) by [Andrey Bogdanov](https://dribbble.com/bgdnv)

Big thanks to [kubo550](https://github.com/kubo550/) for helping with JS script.
