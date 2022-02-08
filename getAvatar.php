<?php

function getTelegramAvatar($username='')
{
  $username = $username;
  $username = str_replace('@', '', $username);

  $baseURL = 'https://telegram.me/';

  $pageURL = $baseURL . $username;
  $source = file_get_contents($pageURL);

  $dom_obj = new DOMDocument();
  $dom_obj->loadHTML($source);
  $avatar = false;

  foreach($dom_obj->getElementsByTagName('meta') as $meta) {
    if($meta->getAttribute('property')=='og:image'){
        $avatar = $meta->getAttribute('content');
    }
  }

  return $avatar;

}

echo getTelegramAvatar('de8ug');

?>
