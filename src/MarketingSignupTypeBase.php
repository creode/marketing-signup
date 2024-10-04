<?php

namespace Creode\MarketingSignup;

/**
 * Abstract class used to define a new Marketing Signup Type.
 */
abstract class MarketingSignupTypeBase implements MarketingSignupTypeInterface {
    /**
     * Any data used to sign up with.
     *
     * @var array
     */
    public $data;

    /**
     * Sender class
     *
     * @var Creode\MarketingSignup\MarketingSignupSenderInterface
     */
    protected $sender;

    /**
     * The contact list ID within the CRM.
     *
     * @var string|boolean
     */
    protected $list_id;

    /**
     * Marketing Signup Type Constructor.
     *
     * @param array $data
     * @param array $api_arguments
     * @param string|boolean $list_id
     */
    public function __construct(array $data, $api_arguments = [], $list_id = false) {
        $this->data = $data;
        $this->sender = $this->constructSender($api_arguments);
        $this->list_id = $list_id;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function constructSender($api_arguments = []);

    /**
     * {@inheritdoc}
     */
    abstract public function getName();

    /**
     * Get the data which will be submitted over to the newsletter service.
     *
     * @return array
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Array of required field keys.
     *
     * @return array
     *   Array of required field keys.
     */
    abstract protected function requiredFieldKeys();

    /**
     * Any fields which are part of this class that are optional.
     *
     * @return array
     *   Array of optional field keys.
     */
    abstract protected function optionalFieldKeys();

    /**
     * Validates the provided data.
     * 
     * @param array $fields
     *   Fields to validate against.
     *
     * @return bool
     *   True on successful validation, false on failure.
     */
    public function validate() {
        $isValid = true;

        // If not in the list of required fields then data is not valid.
        foreach ($this->requiredFieldKeys() as $required_field_key) {
            if (!in_array($required_field_key, array_keys($this->data))) {
                $isValid = false;
            }
        }

        // If we have a field not in the optional or required field lists then remove it.
        foreach ($this->data as $field_key => $field) {
            if (!in_array($field_key, $this->optionalFieldKeys()) && !in_array($field_key, $this->requiredFieldKeys())) {
                unset($this->data[$field_key]);
            }
        }

        return $isValid;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function add($extra_data = []);
}
