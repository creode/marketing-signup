# Marketing Signup

This libray provides a simple framework in order to create different types of marketing signup integrations. This library on it's own doesn't provide any functionality but is used by other libraries in order to build up swappable integrations with different 3rd party services.

## How to Develop for this

All types are created by extending the `MarketingSignupTypeBase.php` abstract class and building adding any function overrides in order to define the necessary functionality. This class can also be extended and adapted to specific single use cases within your own application/library.

Types will also need to create their own implementation of the `MarketingSignupSenderBase.php` class to handle the basic interactions with third party services.

These two classes should all you need for a basic integration and are linked together using the `constructSender` function inside your newly created `MarketingSignupType` class described in the first paragraph of this section.

## Developing a new signup integration

If you plan on or have already developed a new type the best approach is to wrap it inside a new composer library and use the naming convension `marketing-signup-{type}` i.e. `marketing-signup-mailchimp`. This will make the integrations easy to find and be filtered on in Packagist.

## Improvements and new features

Here is a list of potential features that we may want to think about implementing, these need to be discussed beforehand and decided on if we should implement them:

* Field Mappings/Formatting - Include a field mapping/formatting function in one of our classes so that we know how to format the format for specific apis. This could be an external class but we might be able to provide some kind of functionality in a base class to handle them.

* Improved Error Handling - Currently the error handling needs to be handled by the user calling this library. We should try to move this here if we can.

* Additional Functionality to put functions in like `updateOrCreate()` to allow us to update specific data. Might be tricky since we shouldn't update SOURCE fields for certain sites.