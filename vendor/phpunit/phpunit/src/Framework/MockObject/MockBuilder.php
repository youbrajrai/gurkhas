<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject;

use function array_merge;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * @psalm-template MockedType
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class MockBuilder
{
    private readonly TestCase $testCase;
    private readonly string $type;
    private ?array $methods                = [];
    private bool $emptyMethodsArray        = false;
    private string $mockClassName          = '';
    private array $constructorArgs         = [];
    private bool $originalConstructor      = true;
    private bool $originalClone            = true;
    private bool $autoload                 = true;
    private bool $cloneArguments           = false;
    private bool $callOriginalMethods      = false;
    private ?object $proxyTarget           = null;
    private bool $allowMockingUnknownTypes = true;
    private bool $returnValueGeneration    = true;
    private readonly Generator $generator;

    /**
     * @psalm-param class-string $type
     */
    public function __construct(TestCase $testCase, string $type)
    {
        $this->testCase  = $testCase;
        $this->type      = $type;
        $this->generator = new Generator;
    }

    /**
     * Creates a mock object using a fluent interface.
     *
     * @throws \PHPUnit\Framework\InvalidArgumentException
     * @throws ClassAlreadyExistsException
     * @throws ClassIsEnumerationException
     * @throws ClassIsFinalException
     * @throws ClassIsReadonlyException
     * @throws DuplicateMethodException
     * @throws InvalidMethodNameException
     * @throws OriginalConstructorInvocationRequiredException
     * @throws ReflectionException
     * @throws RuntimeException
     * @throws UnknownTypeException
     *
     * @psalm-return MockObject&MockedType
     */
    public function getMock(bool $register = true): MockObject
    {
        $object = $this->generator->getMock(
            $this->type,
            !$this->emptyMethodsArray ? $this->methods : null,
            $this->constructorArgs,
            $this->mockClassName,
            $this->originalConstructor,
            $this->originalClone,
            $this->autoload,
            $this->cloneArguments,
            $this->callOriginalMethods,
            $this->proxyTarget,
            $this->allowMockingUnknownTypes,
            $this->returnValueGeneration
        );

        if ($register) {
            $this->testCase->registerMockObject($object);
        }

        return $object;
    }

    /**
     * Creates a mock object for an abstract class using a fluent interface.
     *
     * @psalm-return MockObject&MockedType
     *
     * @throws \PHPUnit\Framework\Exception
     * @throws ReflectionException
     * @throws RuntimeException
     */
    public function getMockForAbstractClass(): MockObject
    {
        $object = $this->generator->getMockForAbstractClass(
            $this->type,
            $this->constructorArgs,
            $this->mockClassName,
            $this->originalConstructor,
            $this->originalClone,
            $this->autoload,
            $this->methods,
            $this->cloneArguments
        );

        $this->testCase->registerMockObject($object);

        return $object;
    }

    /**
     * Creates a mock object for a trait using a fluent interface.
     *
     * @psalm-return MockObject&MockedType
     *
     * @throws \PHPUnit\Framework\Exception
     * @throws ReflectionException
     * @throws RuntimeException
     */
    public function getMockForTrait(): MockObject
    {
        $object = $this->generator->getMockForTrait(
            $this->type,
            $this->constructorArgs,
            $this->mockClassName,
            $this->originalConstructor,
            $this->originalClone,
            $this->autoload,
            $this->methods,
            $this->cloneArguments
        );

        $this->testCase->registerMockObject($object);

        return $object;
    }

    /**
     * Specifies the subset of methods to mock, requiring each to exist in the class.
     *
     * @psalm-param list<string> $methods
     *
     * @throws CannotUseOnlyMethodsException
     * @throws ReflectionException
     *
     * @return $this
     */
    public function onlyMethods(array $methods): self
    {
        if (empty($methods)) {
            $this->emptyMethodsArray = true;

            return $this;
        }

        try {
            $reflector = new ReflectionClass($this->type);
            // @codeCoverageIgnoreStart
        } catch (\ReflectionException $e) {
            throw new ReflectionException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
        // @codeCoverageIgnoreEnd

        foreach ($methods as $method) {
            if (!$reflector->hasMethod($method)) {
                throw new CannotUseOnlyMethodsException($this->type, $method);
            }
        }

        $this->methods = array_merge($this->methods ?? [], $methods);

        return $this;
    }

    /**
     * Specifies methods that don't exist in the class which you want to mock.
     *
     * @psalm-param list<string> $methods
     *
     * @throws CannotUseAddMethodsException
     * @throws ReflectionException
     * @throws RuntimeException
     *
     * @return $this
     */
    public function addMethods(array $methods): self
    {
        if (empty($methods)) {
            $this->emptyMethodsArray = true;

            return $this;
        }

        try {
            $reflector = new ReflectionClass($this->type);
            // @codeCoverageIgnoreStart
        } catch (\ReflectionException $e) {
            throw new ReflectionException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
        // @codeCoverageIgnoreEnd

        foreach ($methods as $method) {
            if ($reflector->hasMethod($method)) {
                throw new CannotUseAddMethodsException($this->type, $method);
            }
        }

        $this->methods = array_merge($this->methods ?? [], $methods);

        return $this;
    }

    /**
     * Specifies the arguments for the constructor.
     *
     * @return $this
     */
    public function setConstructorArgs(array $arguments): self
    {
        $this->constructorArgs = $arguments;

        return $this;
    }

    /**
     * Specifies the name for the mock class.
     *
     * @return $this
     */
    public function setMockClassName(string $name): self
    {
        $this->mockClassName = $name;

        return $this;
    }

    /**
     * Disables the invocation of the original constructor.
     *
     * @return $this
     */
    public function disableOriginalConstructor(): self
    {
        $this->originalConstructor = false;

        return $this;
    }

    /**
     * Enables the invocation of the original constructor.
     *
     * @return $this
     */
    public function enableOriginalConstructor(): self
    {
        $this->originalConstructor = true;

        return $this;
    }

    /**
     * Disables the invocation of the original clone constructor.
     *
     * @return $this
     */
    public function disableOriginalClone(): self
    {
        $this->originalClone = false;

        return $this;
    }

    /**
     * Enables the invocation of the original clone constructor.
     *
     * @return $this
     */
    public function enableOriginalClone(): self
    {
        $this->originalClone = true;

        return $this;
    }

    /**
     * Disables the use of class autoloading while creating the mock object.
     *
     * @return $this
     */
    public function disableAutoload(): self
    {
        $this->autoload = false;

        return $this;
    }

    /**
     * Enables the use of class autoloading while creating the mock object.
     *
     * @return $this
     */
    public function enableAutoload(): self
    {
        $this->autoload = true;

        return $this;
    }

    /**
     * Disables the cloning of arguments passed to mocked methods.
     *
     * @return $this
     */
    public function disableArgumentCloning(): self
    {
        $this->cloneArguments = false;

        return $this;
    }

    /**
     * Enables the cloning of arguments passed to mocked methods.
     *
     * @return $this
     */
    public function enableArgumentCloning(): self
    {
        $this->cloneArguments = true;

        return $this;
    }

    /**
     * Enables the invocation of the original methods.
     *
     * @return $this
     */
    public function enableProxyingToOriginalMethods(): self
    {
        $this->callOriginalMethods = true;

        return $this;
    }

    /**
     * Disables the invocation of the original methods.
     *
     * @return $this
     */
    public function disableProxyingToOriginalMethods(): self
    {
        $this->callOriginalMethods = false;
        $this->proxyTarget         = null;

        return $this;
    }

    /**
     * Sets the proxy target.
     *
     * @return $this
     */
    public function setProxyTarget(object $object): self
    {
        $this->proxyTarget = $object;

        return $this;
    }

    /**
     * @return $this
     */
    public function allowMockingUnknownTypes(): self
    {
        $this->allowMockingUnknownTypes = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function disallowMockingUnknownTypes(): self
    {
        $this->allowMockingUnknownTypes = false;

        return $this;
    }

    /**
     * @return $this
     */
    public function enableAutoReturnValueGeneration(): self
    {
        $this->returnValueGeneration = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function disableAutoReturnValueGeneration(): self
    {
        $this->returnValueGeneration = false;

        return $this;
    }
}
