<?php

return [

    'feeds' => [
        'main' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Http\Controllers\Blog\BlogController@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/blog/feed',

            'title' => "Grasseh Blog",
        ],
    ],

];
