<?php

namespace Creode\MarketingSignup;

/**
 * Marketing Signup Base Class used for creating new sender types.
 */
abstract class MarketingSignupSenderBase {
    /**
     * List of arguments used in the API.
     *
     * @var array
     */
    protected $api_arguments;

    /**
     * Constructor for Signup Sender Base Class.
     *
     * @param array $api_arguments
     */
    public function __construct($api_arguments = []) {
        $this->api_arguments = $api_arguments;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function send($request_type, $endpoint, $data, $operations = []);
}
