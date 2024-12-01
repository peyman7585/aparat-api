<?php

return[
    'mostViewedVideosUrl'=>'https://www.aparat.com//etc/api/mostviewedvideos',
    'loginUrl'=>'https://www.aparat.com/etc/api/login/luser/{user}/lpass/{password}',
    'password'=>env('APARAT_PASSWORD',''),
    'user'=>env('APARAT_USER',''),
    'formUploadUrl'=>'https://www.aparat.com/etc/api/upload​form/luser/{user}/ltoken/{token}'
];
