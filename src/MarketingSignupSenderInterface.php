<?php

namespace Creode\MarketingSignup;

/**
 * Undocumented interface
 */
interface MarketingSignupSenderInterface {
    /**
     * Handles the sending of API Data.
     *
     * @param string $request_type
     *   GET, POST, DELETE, PUT, PATCH.
     * @param string $endpoint
     *   Endpoint to send data to.
     * @param string $endpoint
     *   Data to send to the endpoint.
     * @param array $operations
     *   List of extra operations which need to be done.
     */
    public function send($request_type, $endpoint, $data, $operations = []);
}
