<?php

namespace App\Helpers;


if (!function_exists('getAddressData')) {
    function getAddressData() {
        try {
            $response = file_get_contents(
                'https://cdn.jsdelivr.net/gh/ThangLeQuoc/vietnamese-provinces-database/json/simplified_json_generated_data_vn_units_minified.json'
            );
            if ($response === false) {
                throw new \Exception('Failed to fetch address data.');
            }
            $data = json_decode($response, true);
            return $data;
        } catch (\Exception $error) {
            error_log('Error fetching address data: ' . $error->getMessage());
            return;
        }
    }
}