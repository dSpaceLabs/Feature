Feature
=======

## Interfaces

```php
<?php

namespace Dspacelabs\Component\Feature;

interface FeaturePoolInterface
{
    public function getFeature($name);
    public function addFeature(FeatureInterface $feature);
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
