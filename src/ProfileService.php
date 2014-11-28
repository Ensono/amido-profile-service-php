<?

namespace Amido\ProfileService;

class ProfileService
{
    private $subscription_key;

    private $api;

    function __construct($subscription_key) {
        ArgValidator::validate_presence($subscription_key, 'subscription_key');

        $this->subscription_key = $subscription_key;
        $this->api = new Api($subscription_key);
    }

    function get_profile($realm, $user_id, $delegate_token) {
        // check args
        ArgValidator::validate_presence($realm, 'realm');
        ArgValidator::validate_presence($user_id, 'realm');
        ArgValidator::validate_presence($delegate_token, 'realm');
        // get uri
        $uri = ProfileServiceUri::profile($realm, $user_id);
        // request from API

        $response = $this->api->get($uri, $delegate_token);
        // construct response
        $profileServiceResult = new ProfileServiceResult($response);
        echo '7';

        return $profileServiceResult;
    }

    function get_nested_profile($realm, $user_id, $delegate_token) {
        // check args
        ArgValidator::validate_presence($realm, 'realm');
        ArgValidator::validate_presence($user_id, 'realm');
        ArgValidator::validate_presence($delegate_token, 'realm');

        // get uri
        $uri = ProfileServiceUri::nested_profile($realm, $user_id);

        // request from API
        $response = $this->api->get($uri, $delegate_token);
        // construct response
        return new ProfileServiceResult($response);
    }

    function get_nested_fieldset($realm, $fieldset_name) {
        // check args
        ArgValidator::validate_presence($realm, 'realm');
        ArgValidator::validate_presence($fieldset_name, 'fieldset_name');

        // get uri
        $uri = ProfileServiceUri::nested_fieldset($realm, $fieldset_name);

        // request from API
        $response = $this->api->get($uri);
        // construct response
        return new ProfileServiceResult($response);
    }

    function get_fieldset($realm, $fieldset_name) {
        // check args
        ArgValidator::validate_presence($realm, 'realm');
        ArgValidator::validate_presence($fieldset_name, 'fieldset_name');

        // get uri
        $uri = ProfileServiceUri::fieldset($realm, $fieldset_name);

        // request from API
        $response = $this->api->get($uri);
        // construct response
        return new ProfileServiceResult($response);
    }

    function is_profile_complete($realm, $user_id, $delegate_token) {
        // check args
        ArgValidator::validate_presence($realm, 'realm');
        ArgValidator::validate_presence($user_id, 'realm');
        ArgValidator::validate_presence($delegate_token, 'realm');

        // get uri
        $uri = ProfileServiceUri::is_profile_complete($realm, $user_id);

        // request from API
        $response = $this->api->get($uri, $delegate_token);
        // construct response
        return new ProfileServiceResult($response);
    }

    function create_profile($realm, $user_id, $delegate_token, $profile = array()) {
        // check args
        ArgValidator::validate_presence($realm, 'realm');
        ArgValidator::validate_presence($user_id, 'realm');
        ArgValidator::validate_presence($delegate_token, 'realm');

        // get uri
        $uri = ProfileServiceUri::profile($realm, $user_id);

        // request from API
        $response = $this->api->post($uri, $delegate_token, $profile);
        // construct response
        return new ProfileServiceResult($response);
    }

    function update_profile($realm, $user_id, $delegate_token, $profile = array()) {
        // check args
        ArgValidator::validate_presence($realm, 'realm');
        ArgValidator::validate_presence($user_id, 'realm');
        ArgValidator::validate_presence($delegate_token, 'realm');

        // get uri
        $uri = ProfileServiceUri::profile($realm, $user_id);

        // request from API
        $response = $this->api->put($uri, $delegate_token, $profile);
        // construct response
        return new ProfileServiceResult($response);
    }
}