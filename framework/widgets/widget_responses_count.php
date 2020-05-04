<?php
/**
 * Plugin Name: chystota: Count Responces
 * Plugin URI:
 * Description: This widget displays how many people liked your page and work.
 * Version: 1.0
 * Author: chystota
 * Author URI: chystota@gmail.com
 *
 */

add_action( 'widgets_init', 'chystota_response_count_widgets' );

function chystota_response_count_widgets(){
	register_widget( 'chystota_response_count_widget' );
}

class chystota_response_count_widget extends WP_Widget {

	public function __construct( ) {
		$widget_ops = [
			'classname'     => 'f_widget',
			'description'   => __( 'Displays how many people liked your page and work.', 'chystota' )
		];
		parent ::__construct( 'chystota_response_count_widget',__( 'chystota: Responce count', 'chystota' ), $widget_ops);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$chystota_facebook_id = $instance['chystota_facebook_id'];
		$appsecret = $instance['appsecret'];
		$chystota_google_api_key = $instance['chystota_google_api_key'];
		$chystota_google_place_id = $instance['chystota_google_place_id'];

        if( isset( $chystota_google_api_key ) && isset( $chystota_google_place_id )  ) {
            // Getting url for the rating of business.
            $url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$chystota_google_place_id&fields=name,rating,user_ratings_total&key=$chystota_google_api_key";
            //AIzaSyA6NOFu29w0EfI6X9li6bxsmjXW-HhIDy4'"
	        //ChIJN1t_tDeuEmsRUsoyG83frY4

            // cUrl init.
            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $url);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
            $result = curl_exec( $ch );
            $res = json_decode( $result, true );
            $rating = $res['result']['rating'];
            $totals = $res['result']['user_ratings_total'];

        } else {
            echo "Assign Google API and Place ID";
        }


		if( $chystota_facebook_id ){
            $apiUrl = 'https://graph.facebook.com/'.$chystota_facebook_id.'/me/accounts?fields=name&access_token='.$appsecret;
//			$apiUrl ="https://www.facebook.com/v6.0/dialog/oauth?
//			client_id=498188843586746&redirect_uri=http://localhost:3000/chystota.wp/wp-admin/widgets.php";
			//open connection
			$ch = curl_init();
			$timeout=5;
			//set the url
			curl_setopt($ch,CURLOPT_URL, $apiUrl);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
			//execute post
			$result = curl_exec($ch);
			//close connection
			curl_close($ch);
			$data = json_decode($result,true);
			var_dump($data);
        }

		?>
        <div class="reviews">
            <div class="container">
                <div class="row">
                    <div class="col">
				        <?php if( !empty($title) ):?>
                            <h2><?php echo $title; ?></h2>
				        <?php endif;?>
                    </div>
                </div>
            </div>
    	<div class="review-block">
            <div class="icon">
                <svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="10px" y="0px" viewBox="0 0 533.5 544.3" width="30" height="20"
                         style="enable-background:new 0 0 533.5 544.3;" xml:space="preserve">
                            <style type="text/css">
                                .st0{fill:#4285F4;}
                                .st1{fill:#34A853;}
                                .st2{fill:#FBBC04;}
                                .st3{fill:#EA4335;}
                            </style>
                        <metadata>
                            <sfw  xmlns="">
                                <slices></slices>
                                <sliceSourceBounds  bottomLeftOrigin="true" height="644.3" width="533.5" x="0.1" y="110.1"></sliceSourceBounds>
                            </sfw>
                        </metadata>
                        <g>
                            <path class="st0" d="M533.5,278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1,33.8-25.7,63.7-54.4,82.7v68h87.7
		C503.9,431.2,533.5,361.2,533.5,278.4z"/>
                            <path class="st1" d="M272.1,544.3c73.4,0,135.3-24.1,180.4-65.7l-87.7-68c-24.4,16.6-55.9,26-92.6,26c-71,0-131.2-47.9-152.8-112.3
		H28.9v70.1C75.1,486.3,169.2,544.3,272.1,544.3z"/>
                            <path class="st2" d="M119.3,324.3c-11.4-33.8-11.4-70.4,0-104.2V150H28.9c-38.6,76.9-38.6,167.5,0,244.4L119.3,324.3z"/>
                            <path class="st3" d="M272.1,107.7c38.8-0.6,76.3,14,104.4,40.8l0,0l77.7-77.7C405,24.6,339.7-0.8,272.1,0C169.2,0,75.1,58,28.9,150
		l90.4,70.1C140.8,155.6,201.1,107.7,272.1,107.7z"/>
                        </g>
</svg>
                <span>Google</span>
                <span class="review_number"><?php echo $rating ?> з 5</span>
            </div>
            <div class="review_line">
                <progress max="5" value="<?php echo $rating?>">
                    
                </progress>
            </div>
            <div class="review_count">
			    <?php echo __( "Based on $totals  reviews", "chystota" )  ;?>
            </div>
		</div>
        <?php if( $chystota_facebook_id ) :?>
       
            <div class="review-block">
                <div class="icon">
                    <a class="fb" href="https://facebook.com/share.php?u=<?php echo get_site_url(); ?>" target="_blank">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <span>Facebook</span>
                    <span class="review_number">5.0</span>
                </div>
                <div class="review_line">
                    <progress max="5" value="5">
                        
                    </progress>
                </div>

                <div class="review_count">
                    <?php echo __( 'Based on '. number_format($data['fan_count']).' reviews', 'chystota' )  ;?>
                </div>
            </div>
        <?php endif; ?>
        </div>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
	    $instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['chystota_facebook_id'] = $new_instance['chystota_facebook_id'];
		$instance['appsecret'] = $new_instance['appsecret'];
		$instance['chystota_google_api_key'] = $new_instance['chystota_google_api_key'];
		$instance['chystota_google_place_id'] = $new_instance['chystota_google_place_id'];
		return $instance;
	}

	public function form( $instance ) {
		// TODO: Change the autogenerated stub
		$defaults = array (
		        'title' => '',
                'appsecret' => '',
                'chystota_facebook_id' => '',
                'chystota_google_api_key' => '',
                'chystota_google_place_id' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e('Title:', 'chystota'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'chystota_google_api_key' ); ?>">
				<?php _e('Google API Key:', 'chystota'); ?></label>
            <input id="<?php echo $this->get_field_id( 'chystota_google_api_key' ); ?>" name="<?php echo $this->get_field_name( 'chystota_google_api_key' ); ?>" value="<?php echo $instance['chystota_google_api_key']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'chystota_google_place_id' ); ?>">
				<?php _e('Google Place ID:', 'chystota'); ?></label>
            <input id="<?php echo $this->get_field_id( 'chystota_google_place_id' ); ?>" name="<?php echo $this->get_field_name( 'chystota_google_place_id' ); ?>" value="<?php echo $instance['chystota_google_place_id']; ?>" class="widefat" />
        </p>
        <p>
        


        </p>
        <p>
            <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
            </fb:login-button>
        
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v6.0&appId=498188843586746&autoLogAppEvents=1">

        </script>
        <script>

            function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
                console.log('statusChangeCallback');
                console.log(response);                   // The current login status of the person.
                if (response.status === 'connected') {   // Logged into your webpage and Facebook.
                    testAPI();
                    let acsToken = response.authResponse.accessToken;
                    //let acsToken = JSON.stringify(response.authResponse.accessToken);

                    console.log(acsToken);
                } else {                                 // Not logged into your webpage or we are unable to tell.
                    document.getElementById('status').innerHTML = 'Please log ' +
                        'into this webpage.';
                }
            }


            function checkLoginState() {               // Called when a person is finished with the Login Button.
                FB.getLoginStatus(function(response) {   // See the onlogin handler
                    statusChangeCallback(response);
                    document.getElementsByClassName('status').innerHTML =
                        'Thanks for logging in, ' + response.authResponse.accessToken + '!';
                    console.log('Successful login for: ' + response.authResponse.accessToken);
                });
            }


            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '498188843586746',
                    cookie     : true,                     // Enable cookies to allow the server to access the session.
                    xfbml      : true,                     // Parse social plugins on this webpage.
                    version    : 'v6.0'           // Use this Graph API version for this call.
                });


                FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
                    statusChangeCallback(response);        // Returns the login status.
                });
            };


            
            function testAPI() {       // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function(response) {
 console.log('Successful login for: ' + response.name);


                    document.getElementsByClassName('status').innerHTML =
                       'Thanks for logging in, ' + response.name + '!';
                });
            }
        </script>
'

        </p>
            
		<p>

			<label for="<?php echo $this->get_field_id( 'chystota_facebook_id' ); ?>">
				<?php _e('Facebook Page ID:', 'chystota'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'chystota_facebook_id' ); ?>" name="<?php echo $this->get_field_name( 'chystota_facebook_id' ); ?>" value="<?php echo $instance['chystota_facebook_id']; ?>" class="widefat" style="width:100%;"/>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'appsecret' ); ?>">
				<?php _e('Facebook Access Token:', 'chystota'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'appsecret' ); ?>" name="<?php echo $this->get_field_name( 'appsecret' ); ?>" value="<?php echo $instance['appsecret']; ?>" style="width:100%;" />
        </p>


		<?php
	}
}

// end class