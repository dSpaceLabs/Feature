<?php
/**
 */

namespace Dspacelabs\Component\Feature\Tests;

use Dspacelabs\Component\Feature\Feature;
use Ruler\Context;
use Ruler\Rule;
use Ruler\Variable;

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
            'admin.users'   => array('joshua'),
            'user.username' => 'joshua', // $user->getUsername()
        ));
        $feature->setContext($context);
        $this->assertTrue($feature->isEnabled());

        $rule = new Rule(
            new \Ruler\Operator\SetContains(new Variable('admin.usernames', array('joshua')), new Variable('username'))
        );
        $feature = new Feature('test.feature', $rule);
        $context = new Context(array(
            'username' => 'joshua', // $user->getUsername()
        ));
        $feature->setContext($context);
        $this->assertTrue($feature->isEnabled());
    }
}
