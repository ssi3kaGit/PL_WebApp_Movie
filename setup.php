<?php

spl_autoload_register(function ($classname){
    include "classes/$classname.php";
});

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$db = new mysqli(Config::$db["host"], Config::$db["user"], Config::$db["pass"], Config::$db["database"]);

$db->query("create table movie_userinfo (
    id int not null auto_increment,
    name text not null,
    email text not null,
    password text not null,
    primary key (id)
);");

$db->query("-- Note: double hyphens are comments in SQL
create table movie_reviews (
    id int not null auto_increment,
    user_email int not null, -- the user email who inserted this review
    date date not null, -- date is a reserved word
    category text not null,
    title text not null,
    review text not null,
    rating int(2) not null, -- two digit
    primary key (id)
);");