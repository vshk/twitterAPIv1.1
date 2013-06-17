<?php
/**
 * Simple example shows API call with a pre-authenticated client.
 */


//  Configure your OAuth settings from your application at https://dev.twitter.com/apps

define('YOUR_CONSUMER_KEY', 'wA8FvUBnvIGSgayCzJJQCQ');
define('YOUR_CONSUMER_SECRET', 'CVhNQKkyJv12NnJgoZwv43JPxihgowqCyStneGKYQ');


// Configure authentication credentials.
// you can generate your own access key from the link above

define('SOME_ACCESS_KEY', '1524280286-OYBwm2OJdnjZCqO6TOC0ZUs3enb4EbPkMIH1wPT');
define('SOME_ACCESS_SECRET', 'FcafRNVZAo2DMUd230oIEGvad8B7fQ5cuIhqKz0g'); 
  
 
// Require client library and authorize an instance with your creds

require __DIR__.'/twitter-client.php';
$Client = new TwitterApiClient;
$Client->set_oauth ( YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, SOME_ACCESS_KEY, SOME_ACCESS_SECRET );


// Now you're ready to make authorized API calls

try {
    $path = 'statuses/user_timeline';
    $args = array ( 'screen_name' => $_GET['username'],'count' => 20 );
    $data = $Client->call( $path, $args, 'GET' ); 
	
	echo json_encode($data);
}
catch( TwitterApiException $Ex ){
    echo 'Status ', $Ex->getStatus(), '. Error '.$Ex->getCode(), ' - ',$Ex->getMessage(),"\n";
}

