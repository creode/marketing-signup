# Marketing Signup

This librry provides a simple interface in order to create different types of marketing signup integrations. This library on it's own doesn't provide any functionality but is used by other libraries in order to build up swappable integrations with different 3rd party services.

## How to Develop for this

All types are created by extending the `MarketingSignupTypeBase.php` abstract class and building an interface off the data contained within. This class can also be extended and adapted to specific single use cases within your own application/library.

## Developing a new signup integration

If you plan on or have already developed a new type the best approach is to wrap it inside a new composer library and use the naming convension `marketing-signup-{type}` i.e. `marketing-signup-mailchimp`. This will mean that these follow a naming convension which makes them easier to see at a glance which integrations we have.

## TODO's

Here is a list of potential features that we may want to think about implementing, these need to be discussed beforehand and decided on if we should implement them:

* Field Mappings/Formatting - Include a field mapping/formatting function in one of our classes so that we know how to format the format for specific apis. This could be an external class but we might be able to provide some kind of functionality in a base class to handle them.