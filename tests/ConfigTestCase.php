<?php

namespace DotsUnited\PhpCsFixer;

use PhpCsFixer\ConfigInterface;
use PhpCsFixer\Fixer;
use PhpCsFixer\FixerFactory;
use PhpCsFixer\RuleSet;
use PHPUnit\Framework;

/**
 * @author Andreas Möller
 *
 * @see https://github.com/refinery29/php-cs-fixer-config/blob/master/test/AbstractConfigTestCase.php
 */
abstract class ConfigTestCase extends Framework\TestCase
{
    final public function testImplementsInterface()
    {
        $config = $this->createConfig();

        $this->assertInstanceOf(ConfigInterface::class, $config);
    }

    final public function testDefaults()
    {
        $config = $this->createConfig();

        $this->assertSame($this->name(), $config->getName());
        $this->assertTrue($config->getUsingCache());
        $this->assertTrue($config->getRiskyAllowed());
    }

    final public function testHasRules()
    {
        $config = $this->createConfig();

        $this->assertEquals($this->rules(), $config->getRules());
    }

    final public function testAllConfiguredRulesAreBuiltIn()
    {
        $fixersNotBuiltIn = \array_diff(
            $this->configuredFixers(),
            $this->builtInFixers()
        );

        $this->assertEmpty($fixersNotBuiltIn, \sprintf(
            'Failed to assert that fixers for the rules "%s" are built in',
            \implode('", "', $fixersNotBuiltIn)
        ));
    }

    final public function testAllBuiltInRulesAreConfigured()
    {
        $fixersWithoutConfiguration = \array_diff(
            $this->builtInFixers(),
            $this->configuredFixers()
        );

        $this->assertEmpty($fixersWithoutConfiguration, \sprintf(
            'Failed to assert that built-in fixers for the rules "%s" are configured',
            \implode('", "', $fixersWithoutConfiguration)
        ));
    }

    /**
     * @return ConfigInterface
     */
    abstract protected function createConfig();

    /**
     * @return string
     */
    abstract protected function name();

    /**
     * @return array
     */
    abstract protected function rules();

    /**
     * @return string[]
     */
    private function builtInFixers()
    {
        $fixerFactory = FixerFactory::create();
        $fixerFactory->registerBuiltInFixers();

        return \array_map(function (Fixer\FixerInterface $fixer) {
            return $fixer->getName();
        }, $fixerFactory->getFixers());
    }

    /**
     * @return string[]
     */
    private function configuredFixers()
    {
        /**
         * RuleSet::create() removes disabled fixers, to let's just enable them to make sure they not removed.
         *
         * @see https://github.com/FriendsOfPHP/PHP-CS-Fixer/pull/2361
         */
        $rules = \array_map(function () {
            return true;
        }, $this->createConfig()->getRules());

        return \array_keys(RuleSet::create($rules)->getRules());
    }
}
