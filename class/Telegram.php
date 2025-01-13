<?php
//class Telegram
//{
//
//protected static $botToken = '5922286307:AAF6fANlluW3QUL9WQgR0sODgnkvxcMaz80';
//protected static $baseUrl = 'https://api.telegram.org/bot';
//protected static $channel_id = '@wpdwl';
//
///*    public function __construct()
//{
//add_action('wp_publish_post', [$this, 'send_post_to_telegram'], 10, 2);
//}*/
//
//public static function send_post_to_telegram($ID, $post)
//{
//    global $post;
//var_dump($post);
//exit();
//$content = get_the_excerpt($post->ID);
//var_dump($post);
//exit();
//$link = get_permalink($ID);
//self::send_message(self::$channel_idchannel_id,$content);
//}
//
//public static function send_message($channel_id, $message)
//{
//$request_url = self::$baseUrl . self::$botToken . '/sendMessage?chat_id=' . $channel_id . '&text=' . urlencode($message);
//var_dump($request_url);
//exit();
//$response = wp_remote_get($request_url);
//return is_array($response) && !is_wp_error($response);
//}
//}