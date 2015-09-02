<?php
//$posts_request = curl_init('www.google.com');
$posts_request = curl_init('https://www.reddit.com/r/earthporn.json');
curl_setopt($posts_request, CURLOPT_RETURNTRANSFER, 1);
$posts = curl_exec($posts_request);
$posts = json_decode($posts, true);
$posts = $posts['data']['children'];

//$posts['data']['children'][1]['data']['url'];
foreach($posts as $post)
{
    $post = $post['data'];
    //var_dump($post['title']);
    $exists = file_exists('images/'.$post['title']);
    //exclude any images not from imgur (also excludes self posts)
    $imgur = preg_match('/imgur/', $post['url']);
    //ecxlude any images that dont have png extension
    //var_dump($post['url']);
    $png = preg_match('/.png/', $post['url']);
    //make sure imgur extension ends in .png and not jpg or something else
    //$post['url'] = substr($post['url'], 0, strlen($post['url'])-4).'.png';
    if(!$exists && $imgur && !$png) 
    {
        if(!preg_match('/i\.imgur/', $post['url']))
            $post['url'] = str_replace('imgur', 'i.imgur', $post['url']);
        //var_dump($post['url']);
        $ch = curl_init($post['url'].'.png');
        $fp = fopen('images/'.$post['title'], 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
}
