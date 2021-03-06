<?php

/**
 * Switch between the included languages
 */
$router->group(['namespace' => 'Language'], function () use ($router) {
    require (__DIR__ . '/Routes/Language/Lang.php');
});

/**
 * Frontend Routes
 * Namespaces indicate folder structure
 */
$router->group(['namespace' => 'Frontend'], function () use ($router) {
    require (__DIR__ . '/Routes/Frontend/Frontend.php');
    require (__DIR__ . '/Routes/Frontend/Access.php');
});
$router->group(['namespace' => 'Quiz'/*, 'middleware' => 'auth'*/], function () use ($router) {
    get('new-quiz', 'QuizController@index')->name('quiz.create');
    post('new-quiz', 'QuizController@store')->name('quiz.store');
    post('coordonate', 'QuizController@coordonate')->name('quiz.coordonate');
    post('coordonate_text', 'QuizController@coordonate_text')->name('quiz.coordonate_text');
    get('list', 'QuizController@lists')->name('quiz.list');
    post('quiz-remove/{id}', 'QuizController@destroy')->name('quiz.remove');
    get('quiz/sync', 'QuizController@sync')->name('quiz.sync');
    get('location/{id?}', 'QuizController@location')->name('quiz.location');
});


/**
 * Backend Routes
 * Namespaces indicate folder structure
 */
$router->group(['namespace' => 'Backend'], function () use ($router) {
    $router->group(['prefix' => 'admin', 'middleware' => 'auth'], function () use ($router) {
        /**
         * These routes need view-backend permission (good if you want to allow more than one group in the backend, then limit the backend features by different roles or permissions)
         *
         * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
         */
        $router->group(['middleware' => 'access.routeNeedsPermission:view-backend'], function () use ($router) {
            require (__DIR__ . '/Routes/Backend/Dashboard.php');
            require (__DIR__ . '/Routes/Backend/Access.php');
            require (__DIR__ . '/Routes/Backend/LogViewer.php');
        });
    });
});

