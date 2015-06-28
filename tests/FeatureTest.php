<?php
/**
 */

namespace Dspacelabs\Component\Feature\Tests;

use Dspacelabs\Component\Feature\Feature;
use Ruler\Context;
use Ruler\Rule;
use Ruler\RuleBuilder;
use Ruler\Variable;
use Ruler\Value;

/**
 */
class FeatureTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
    public function test_feature()
    {
        $rule = new Rule(
            new \Ruler\Operator\SetContains(new Variable('admin.users'), new Variable('user.username'))
        );
        $feature = new Feature('test.feature', $rule);
        $context = new Context(array(
            'admin.users'   => array('joshua'), // $repo->getAllAdminUsers()
            'user.username' => 'joshua', // $user->getUsername()
        ));
        $feature->setContext($context);
        $this->assertTrue($feature->isEnabled());
        $this->assertFalse($feature->isDisabled());

        $rule = new Rule(
            new \Ruler\Operator\SetContains(new Variable('admin.usernames', array('joshua')), new Variable('username'))
        );
        $feature = new Feature('test.feature', $rule);
        $context = new Context(array(
            'username' => 'joshua', // $user->getUsername()
        ));
        $feature->setContext($context);
        $this->assertTrue($feature->isEnabled());

        $rule = new Rule(
            new \Ruler\Operator\EqualTo(new Variable('username'), new Variable(null, 'joshua'))
        );
        $feature = new Feature('test.feature', $rule);
        $context = new Context(array(
            'username' => 'joshua', // $user->getUsername()
        ));
        $feature->setContext($context);
        $this->assertTrue($feature->isEnabled());

        $rule = new Rule(
            new \Dspacelabs\Component\Feature\Operator\Enabled()
        );
        $feature = new Feature('test.feature', $rule);
        $this->assertTrue($feature->isEnabled());

        $rule = new Rule(
            new \Dspacelabs\Component\Feature\Operator\Disabled()
        );
        $feature = new Feature('test.feature', $rule);
        $this->assertFalse($feature->isEnabled());
    }

    public function test_featureWithRuleBuilder()
    {
        $rb = new RuleBuilder();
        $rule = $rb->create(
            $rb['admin.users']->setContains($rb['username'])
        );

        $feature = new Feature('test.feature', $rule);
        $context = new Context(array(
            'admin.users' => array('joshua'),
            'username'    => 'joshua',
        ));
        $feature->setContext($context);
        $this->assertTrue($feature->isEnabled());

        $rb = new RuleBuilder();
        $rb->registerOperatorNamespace('Dspacelabs\Component\Feature\Operator');
        $feature = new Feature('test.feature', $rb['always']->enabled());
        $this->assertTrue($feature->isEnabled());

        $rb = new RuleBuilder();
        $rb->registerOperatorNamespace('Dspacelabs\Component\Feature\Operator');
        $feature = new Feature('test.feature', $rb['always']->disabled());
        $this->assertTrue($feature->isDisabled());

        $rb = new RuleBuilder();
        $feature = new Feature('test.feature', $rb['username']->equalTo('joshua'));
        $this->assertTrue($feature->isDisabled());
        $feature->setContext(new Context(array(
            'username' => 'joshua',
        )));
        $this->assertTrue($feature->isEnabled());
    }
}
