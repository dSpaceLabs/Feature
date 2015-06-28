Feature
=======

This library is meant to be used as a generic PHP Feature Toggle
library. It should contain a basic rules engine that can be used
to evaluate various contexts;

## Terminology/Main Ideas

- Feature Pool - Contains a "pool" of features
- Feature - Main object that users will deal with
- Context
- Rule - Defines a series of rules that determine if the feature is
  enabled/disabled
- Driver - Used by the Feature Pool and allows features to be persisted

## Interfaces

```php
<?php

namespace Dspacelabs\Component\Feature;

interface FeatureManagerInterface
{
    public function getFeature($name);
    public function addFeature(FeatureInterface $feature);
    public function saveFeature(Feature $feature);
    public function isEnabled($name);
}
```

```php
<?php

namespace Dspacelabs\Component\Feature;

interface FeatureInterface
{
    public function getName();
    public function addRule(RuleInterface $rule);
    public function setContext(ContextInterface $context);
    public function isEnabled();
}
```
