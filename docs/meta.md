Meta
====

- Every feature must have a unique name
  - Unique name MUST only contain `[0-9A-Za-z.]`
- Every feature must have one or more rules or return a default value
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
        new Contains('user.roles', 'ROLE_SUPER_ADMIN')
    )
);
$feature->setContext(
    new Context(array(
        'user.roles' => $user->getRoles(),
    ))
);
// returns true if user has `ROLE_SUPER_ADMIN` in the list
// of roles
$feature->isEnabled();
```
