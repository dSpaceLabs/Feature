Meta
====

- Every feature must have a unique name
  - Unique name MUST only contain `[0-9A-Za-z._-]`
- Every feature must have one or more rules
- Every rule a feature has must evaluate to true or false

```php
// Should always return a FeatureInterface
$feature = $pool->getFeature('awesome.feature');

if ($feature->isEnabled()) {
    // do this
} else {
    // do that
}
```

```php
$feature = new GenericFeature('generic.feature');
$feature->setRule(
    new Rule(
        new Contains('user.roles', 'current.user.roles')
    )
);
$feature->setContext(
    new Context(array(
        'user.roles'         => array('ROLE_SUPER_ADMIN'),
        'current.user.roles' => $user->getRoles(),
    ))
);
// returns true if user has `ROLE_SUPER_ADMIN` in the list
// of roles
$feature->isEnabled();
```

Using a manager to store feature configurations

```php
$feature = $manager->getFeature('test.feature');
$feature->isEnabled();
$manager->isEnabled('test.feature');
```

Using twig functions

```twig
{% if feature.isEnabled('test.feature') %}
    test.feature is enabled
{% endif %}

{% if feature.isDisabled('test.feature') %}
    test.feature is enabled
{% endif %}

{% feature 'test.feature' %}
    test.feature is enabled
{% feature %}
```

Using a framework such as symfony2

```php
$feature = $container->get('feature.pool')->getFeature('awesome.feature');
$ruleBuilder = $container->get('feature.rule_builder');
$feature = $container->get('feature.awesome_feature');
$feature->isEnabled();
```

Using simple features, such as an on/off

```php
$feature = new SimpleFeature('display.foo');
$feature->setEnabled(true);
$feature->isEnabled(); // returns true
```
What format does features and rules need to be stored in?

- Features have a unique name
- Features have a collection of 0 to n Rules

```javascript
// Feature Object in javascript
{
    name: 'awesome.feature',
    rule: {
        operand: {
            type: 'logicalAnd',
            operands: [
                {
                    type: 'LessThanOrEqualTo',
                    operands: [
                        {name: 'minNumPeople'},
                        {name: 'actualNumPeople'}
                    ]
                },
                {
                    type: 'GreaterThanOrEqualTo',
                    operands: [
                        {name: 'maxNumPeople'},
                        {name: 'actualNumPeople'}
                    ]
                }
            ]
        }
    }
}
// Variable Object
{
    name: null,
    value: null
}
// Operator Object
// Reads as `minNumPeople lessThanOrEaualTo actucalNumPeople`
{
    type: 'LessThanOrEqualTo',
    operands: [
        {name: 'minNumPeople'},
        {name: 'actualNumPeople'}
    ]
}
```
