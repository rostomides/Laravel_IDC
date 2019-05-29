<?php

  
// Authentification routes
Auth::routes();


//Public Routes
// Home Route
Route::get('/', 'PublicController@index')->name('home');
// Show all blogs
Route::get('/all_blogs', 'PublicController@showAllBlogs')->name("show_all_blogs");
// Get blogs by a parameter
Route::get('/show_by_theme/{id}', 'PublicController@showBlogByTheme')->name('show_by');
// Return the results of the search
Route::get('/search_publications', 'PublicController@returnSearch')->name('search_by');

// Show blogs by author
Route::get('/search_by_author/{id}', 'PublicController@showBlogByAuthor')->name('search_by_author');

// Show blogs by category 
Route::get('/search_category/{id}', 'PublicController@showBlogByCategory')->name('search_by_category');

// Show blogs by a tag
Route::get('/show_by_tag/{id}', 'PublicController@showBlogByTag')->name('show_by_tag');


// Donation page
Route::get('/donation', 'StaticPagesController@donation')->name('donation');

// Courses detail
Route::get('/courses', 'StaticPagesController@courses')->name('courses');

// Daily prayers
Route::get('/daily_prayers', 'StaticPagesController@DailyPrayers')->name('daily_prayers');

// Let_quran_speak
Route::get('/let_quran_speak', 'StaticPagesController@letQuranSpeak')->name('let_quran_speak');

// Jumuaa prayer
Route::get('/jumuaa_prayer', 'StaticPagesController@jumuaaPrayer')->name('jumuaa_prayer');




// Show single ressource
Route::get('/show_ressource/{id}', 'RessourceController@showSingleRessource')->name('show_ressource');
// Show all ressources
Route::get('/show_ressources', 'RessourceController@showAll')->name('show_all_ressources');


// Show single celebration
Route::get('/show_celebration/{id}', 'CelebrationController@showSingleCelebration')->name('show_celebration');

Route::get('/show_celebrations', 'CelebationController@showAll')->name('show_all_celebrations');

// Show single blog
Route::get('/show_blog/{id}', 'BlogController@showSingleBlog')->name('show_blog');

// Show single author
Route::get('/show_author/{id}', 'BiogController@showSingleAuthor')->name('show_author');

// Show events
Route::get('/show_event/{id}', 'EventController@showSingleEvent')->name('show_event');
Route::get('/show_all_events', 'EventController@showAllEvents')->name('show_all_events');




// *****************************Super admin routes********************
Route::middleware(['super_admin'])->group(function () {
  // User
    Route::get('/manage_users', 'UserController@manage_users')->name('manage_users');

    // C:\xampp\htdocs\idc\vendor\laravel\framework\src\Illuminate\Routing\Router.php taken from here
    Route::post('register', 'Auth\RegisterController@register')->name('register');
    // 
    Route::delete('delete_user/{id}', 'UserController@destroy')->name('delete_user');
});



// ************************Admin users**********************
Route::middleware(['admin'])->group(function () {
  // Tags
  Route::get('/manage_tags', 'TagController@create')->name('manage_tags');
  Route::post('/store_tag', 'TagController@store')->name('store_tag');
  Route::delete('/delete_tag/{id}', 'TagController@destroy')->name('delete_tag');
  Route::get('/edit_tag/{id}', 'TagController@edit')->name('edit_tag');
  Route::post('/update_tag/{id}', 'TagController@update')->name('update_tag');

  // Themes
  Route::get('/manage_themes', 'ThemeController@create')->name('manage_themes');
  Route::post('/store_theme', 'ThemeController@store')->name('store_theme');
  Route::delete('/delete_theme/{id}', 'ThemeController@destroy')->name('delete_theme');
  Route::get('/edit_theme/{id}', 'ThemeController@edit')->name('edit_theme');
  Route::post('/update_theme/{id}', 'ThemeController@update')->name('update_theme');

  // Categories
  Route::get('/manage_categories', 'CategoryController@create')->name('manage_categories');
  Route::post('/store_category', 'CategoryController@store')->name('store_category');
  Route::delete('/delete_category/{id}', 'CategoryController@destroy')->name('delete_category');
  Route::get('/edit_category/{id}', 'CategoryController@edit')->name('edit_category');
  Route::post('/update_category/{id}', 'CategoryController@update')->name('update_category');

  //Blogs
  Route::get('/create_blog', 'BlogController@create')->name('create_blog');
  Route::post('/store_blog', 'BlogController@store')->name('store_blog');
  Route::get('/manage_blogs', 'BlogController@manage_blogs')->name('manage_blogs');
  Route::get('/edit_blog/{id}', 'BlogController@edit')->name('edit_blog');
  Route::post('/update_blog/{id}', 'BlogController@update')->name('update_blog');
  Route::delete('/destroy_blog/{id}', 'BlogController@destroy')->name('delete_blog');
  Route::post('/toggle_blog/{id}', 'BlogController@showHide')->name('toggle_blog');
  

  // Authors
  Route::get('/manage_authors', 'BiogController@manage_authors')->name('manage_authors');
  Route::post('/store_author', 'BiogController@store')->name('store_author');

  Route::delete('/remove_author/{id}', 'BiogController@destroy')->name('delete_author');
  Route::get('/edit_author/{id}', 'BiogController@edit')->name('edit_author');
  Route::post('/update_author/{id}', 'BiogController@update')->name('update_author');
  

  // Ressources
  Route::get('/manage_ressources', 'RessourceController@manage_ressources')->name('manage_ressources');
  Route::get('/edit_ressource/{id}', 'RessourceController@edit')->name('edit_ressource');
  Route::post('/update_ressource/{id}', 'RessourceController@update')->name('update_ressource');
  Route::delete('/delete_ressource/{id}', 'RessourceController@destroy')->name('delete_ressource');
  Route::post('/store_ressource', 'RessourceController@store')->name('store_ressource');

});


// ********************************Logged users*************************
Route::middleware(['auth'])->group(function () {
  // Dashboard route
  Route::get('/dashboard', 'HomeController@index')->name('dashboard');

  //Events
  Route::get('/create_event', 'EventController@create')->name('create_event');
  Route::post('/store_event', 'EventController@store')->name('store_event');
  Route::get('/manage_events', 'EventController@manage_events')->name('manage_events');
  Route::get('/edit_event/{id}', 'EventController@edit')->name('edit_event');
  Route::post('/update_event/{id}', 'EventController@update')->name('update_event');
  Route::delete('/destroy_event/{id}', 'EventController@destroy')->name('delete_event');
  Route::post('/toggle_event/{id}', 'EventController@showHide')->name('toggle_event');

  // Prayers
  Route::get('/manage_prayers', 'PrayerController@manage_prayers')->name('manage_prayers');

  Route::post('/upload_prayer_times', 'PrayerController@upload_prayer_times')->name('upload_prayer_times');
  Route::post('/store', 'PrayerController@store')->name('store_prayer');

  // Iquamah
  Route::post('/store', 'IqamahController@store')->name('store_iqamah');
  Route::get('/edit_iqamah/{id}', 'IqamahController@edit')->name('edit_iqamah');
  Route::post('/update_iqamah/{id}', 'IqamahController@update')->name('update_iqamah');
  Route::delete('/delete_iqamah/{id}', 'IqamahController@destroy')->name('delete_iqamah');


  // Celebrations
  Route::get('/manage_celebrations', 'CelebrationController@manageCelebrations')->name('manage_celebrations');
  Route::get('/edit_celebration/{id}', 'CelebrationController@edit')->name('edit_celebration');
  Route::post('/update_celebration/{id}', 'CelebrationController@update')->name('update_celebration');
  Route::delete('/delete_celebration/{id}', 'CelebrationController@destroy')->name('delete_celebration');
  Route::post('/store_celebration', 'CelebrationController@store')->name('store_celebration');

  // Donation
  Route::get('/manage_donation', 'ExpansionController@manageDonation')->name('manage_donation');
  Route::get('/edit_donation', 'ExpansionController@edit')->name('edit_donation');
  Route::post('/update_donation', 'ExpansionController@update')->name('update_donation');


});


