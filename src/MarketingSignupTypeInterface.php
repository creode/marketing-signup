<?php

namespace Creode\MarketingSignup;

/**
 * Undocumented interface
 */
interface MarketingSignupTypeInterface {
    /**
     * Get the name of this signup type.
     */
    public function getName();

    /**
     * Validates the signup data.
     *
     * @return bool
     */
    public function validate();

    /**
     * Post Data through for request.
     *
     * @param array $data
     *   Any extra data needed to add into newsletter.
     *   
     * @return array
     *   Array of the api response.
     */
    public function add($extra_data = []);

    /**
     * Builds the API sender object out of provided api arguments.
     *
     * @param array $api_arguments
     *   List of arguments to be passed to the signup sender.
     * @return \Creode\MarketingSignup\MarketingSignupSenderInterface
     *   Sender Object for sending data through.
     */
    public function constructSender();
}
