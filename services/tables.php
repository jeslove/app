<?php
require '../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
/**DROP IF EXISTS USERS TABLE */

Capsule::schema()->dropIfExists('users');

/** CREATE USERS TABLE */

Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('fname');
    $table->string('lname');
    $table->string('gender');
    $table->string('dob');
    $table->string('location');
    $table->string('telephone')->uniqid();
    $table->string('email')->unique();
    $table->timestamps();
});

/** DROP IF EXISTS REGISTRATION TABLE */

Capsule::schema()->dropIfExists('register');

/** CREATE REGISTRATION TABLE */

Capsule::schema()->create('register', function($table){
	$table->increments('id');
    $table->string('username')->uniqid();
    $table->string('password');
    $table->string('country');
    $table->string('states');
	$table->string('city');
	$table->string('postAddress');
	$table->string('userIP');
    $table->string('longitude');
    $table->string('latitude');
    $table->string('telephone')->uniqid();
    $table->string('email')->unique();
    $table->timestamps();
});

/** DROP IF EXISTS LOGIN TABLE */

Capsule::schema()->dropIfExists('login');

/** CREATE LOGIN TABLE */

Capsule::schema()->create('login', function($table){
	$table->increments('id');
    $table->string('username')->uniqid();
    $table->string('password');
    $table->string('userIP');
    $table->string('longitude');
    $table->string('latitude');
    $table->string('telephone')->uniqid();
    $table->string('email')->unique();
    $table->timestamps();
});


/** DROP IF EXISTS PRODUCTS TABLE */

Capsule::schema()->dropIfExists('products');

/** CREATE PRODUCTS TABLE */

Capsule::schema()->create('products', function($table){
	$table->increments('id');
    $table->string('productName');
    $table->string('productCate');
    $table->string('productGender');
    $table->string('productBrand');
    $table->string('productColour');
    $table->string('productPrice');
    $table->string('productDescription');
    $table->string('productfiles');
    $table->string('supplyName');
    $table->string('supplyLocation');
    $table->string('supplyNumber');
    $table->timestamps();
});

/** DROP IF EXISTS CATEGORIES TABLE */

Capsule::schema()->dropIfExists('categories');

/** CREATE CATEGORIES TABLE */

Capsule::schema()->create('categories', function($table){
	$table->increments('id');
    $table->string('cateName');
    $table->timestamps();
});


/** DROP IF EXISTS ARTICLES TABLE */

Capsule::schema()->dropIfExists('articles');

/** CREATE ARTICLES TABLE */

Capsule::schema()->create('articles', function($table){
	$table->increments('id');
    $table->foreignId('cat_id');
    $table->longText('filename')->nullable();
    $table->longText('titleblog')->nullable();
    $table->longText('story')->nullable();
    $table->integer('status');
    $table->integer('deleted');
    $table->timestamps();
});



