<?php

namespace Amido\ProfileService;

class ProfileServiceUri {
    private static $base_uri = "https://amidouserprofile.azure-api.net/client/api";

    public static function profile($realm, $user_id) {
        return self::$base_uri . "/profiles/$realm/$user_id";
    }

    public static function is_profile_complete($realm, $user_id) {
        return self::$base_uri . "/profile/$realm/$user_id/status";
    }

    public static function nested_profile($realm, $user_id) {
        return self::$base_uri . "/nestedprofiles/$realm/$user_id";
    }

    public static function nested_fieldset($realm, $fieldset_name) {
        return self::$base_uri . "/nestedfieldsets/$realm/$fieldset_name";
    }

    public static function fieldset($realm, $fieldset_name) {
        return self::$base_uri . "/fieldsets/$realm/$fieldset_name";
    }
} 