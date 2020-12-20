<?php

declare(strict_types=1);

namespace Multiavatar;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;
use function file_get_contents;
use function range;
use function sprintf;

final class MultiavatarTest extends TestCase
{
    /**
     * @var Multiavatar
     */
    private $multiavatar;

    public function setUp(): void
    {
        $this->multiavatar = new Multiavatar();
    }

    /** @test */
    public function it_will_throw_if_the_ver_part_is_not_valid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The submitted part does not exists.');

        ($this->multiavatar)('foobar', ['ver' => ['part' => 16]]);
    }

    /** @test */
    public function it_will_throw_if_the_ver_theme_is_not_valid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The submitted theme does not exists.');

        ($this->multiavatar)('foobar', ['ver' => ['theme' => 'D']]);
    }

    /** @test */
    public function it_will_throw_if_the_avatar_type_is_not_valid(): void
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Expected a scalar or a Stringable object; got: object');

        ($this->multiavatar)(new \stdClass());
    }

    /** @test */
    public function it_will_return_the_same_svg_with_a_numeric_or_string_part(): void
    {
        $svgNumericPart = ($this->multiavatar)('foobar', ['ver' => ['part' => 5]]);
        $svgString1Part = ($this->multiavatar)('foobar', ['ver' => ['part' => '05']]);
        $svgString2Part = ($this->multiavatar)('foobar', ['ver' => ['part' => '5']]);

        self::assertSame($svgNumericPart, $svgString1Part);
        self::assertSame($svgNumericPart, $svgString2Part);
    }

    /** @test */
    public function it_will_return_the_same_svg_with_a_case_insensitive_theme(): void
    {
        $svgLowerTheme = ($this->multiavatar)('foobar', ['ver' => ['theme' => 'a']]);
        $svgUpperTheme = ($this->multiavatar)('foobar', ['ver' => ['theme' => 'A']]);

        self::assertSame($svgLowerTheme, $svgUpperTheme);
    }

    /** @test */
    public function it_will_return_the_same_svg_with_sans_env_truthy_values(): void
    {
        $svgSansEnvTrue = ($this->multiavatar)('foobar', ['sansEnv' => true]);
        $svgSansEnvOne = ($this->multiavatar)('foobar', ['sansEnv' => 1]);
        $svgSansEnvYes = ($this->multiavatar)('foobar', ['sansEnv' => 'yes']);

        self::assertSame($svgSansEnvTrue, $svgSansEnvOne);
        self::assertSame($svgSansEnvTrue, $svgSansEnvYes);
    }

    /** @test */
    public function it_will_return_the_same_svg_with_sans_env_falsy_values(): void
    {
        $svgSansEnvFalse = ($this->multiavatar)('foobar', ['sansEnv' => false]);
        $svgSansEnvWrongValueIsFalse = ($this->multiavatar)('foobar', ['sansEnv' => 'fdsdf']);
        $svgSansEnvNullValue = ($this->multiavatar)('foobar', ['sansEnv' => null]);

        self::assertSame($svgSansEnvFalse, $svgSansEnvNullValue);
        self::assertSame($svgSansEnvFalse, $svgSansEnvWrongValueIsFalse);
    }

    /** @test */
    public function it_will_return_different_svg_with_sans_env_values(): void
    {
        $svgSansEnvFalse = ($this->multiavatar)('foobar', ['sansEnv' => false]);
        $svgSansEnvTrue = ($this->multiavatar)('foobar', ['sansEnv' => true]);

        self::assertNotSame($svgSansEnvFalse, $svgSansEnvTrue);
    }

    /**
     * @test
     * @dataProvider getEmptySvgProvider
     * @param object|string $avatarId
     */
    public function it_will_return_an_empty_svg($avatarId): void
    {
        self::assertSame('', ($this->multiavatar)($avatarId));
    }

    /**
     * @return iterable<string, array{avatarId:object|string}>
     */
    public function getEmptySvgProvider(): iterable
    {
        yield 'avatar is an empty string' => ['avatarId' => '',];
        yield 'avatar is an empty string after being trimmed' => ['avatarId' => '      '];
        yield 'avatar can be a stringable object' => [
            'avatarId' => new class {
                public function __toString(): string {
                    return '';
                }
            },
        ];
    }
}
