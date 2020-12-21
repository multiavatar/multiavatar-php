<?php

declare(strict_types=1);

namespace Multiavatar;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

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
        $this->expectExceptionMessage('The submitted part does not exists; expecting a value between `00` and `15`');

        ($this->multiavatar)('foobar', ['ver' => ['part' => 16]]);
    }

    /** @test */
    public function it_will_throw_if_the_ver_theme_is_not_valid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The submitted theme does not exists; expecting a value between `A`, `B` and `C`.');

        ($this->multiavatar)('foobar', ['ver' => ['theme' => 'D']]);
    }

    /** @test */
    public function it_will_throw_if_the_avatar_type_is_not_valid(): void
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Expected a scalar or a Stringable object; got: stdClass');

        ($this->multiavatar)(new \stdClass());
    }

    /** @test */
    public function it_will_return_the_same_svg_with_a_numeric_or_string_part(): void
    {
        $svgNumericPart = ($this->multiavatar)('foobar', ['ver' => ['part' => 5]]);
        $svgNumericStringWithLeadingZeroPart = ($this->multiavatar)('foobar', ['ver' => ['part' => '0005']]);
        $svgNumericStringPart = ($this->multiavatar)('foobar', ['ver' => ['part' => '5']]);

        self::assertSame($svgNumericPart, $svgNumericStringWithLeadingZeroPart);
        self::assertSame($svgNumericPart, $svgNumericStringPart);
    }

    /** @test */
    public function it_will_return_the_same_svg_with_a_case_insensitive_theme(): void
    {
        $svgLowerTheme = ($this->multiavatar)('foobar', ['ver' => ['theme' => 'A']]);
        $svgUpperTheme = ($this->multiavatar)('foobar', ['ver' => ['theme' => 'a']]);

        self::assertSame($svgLowerTheme, $svgUpperTheme);
    }

    /** @test */
    public function it_will_return_the_same_svg_if_the_ver_is_fully_setting_independently_of_the_avatar_id_value(): void
    {
        $options = ['ver' => ['theme' => 'A', 'part' => 3]];

        $svgWithFixedVer1 = ($this->multiavatar)('first-avatar', $options);
        $svgWithFixedVer2 = ($this->multiavatar)('second-avatar', $options);

        self::assertSame($svgWithFixedVer1, $svgWithFixedVer2);
    }

    /** @test */
    public function it_will_return_the_same_svg_with_sans_env_truthy_values(): void
    {
        $svgSansEnvTrueBoolean = ($this->multiavatar)('foobar', ['sansEnv' => true]);
        $svgSansEnvTruthyNumeric = ($this->multiavatar)('foobar', ['sansEnv' => 1]);
        $svgSansEnvTruthyString = ($this->multiavatar)('foobar', ['sansEnv' => 'yes']);

        self::assertSame($svgSansEnvTrueBoolean, $svgSansEnvTruthyNumeric);
        self::assertSame($svgSansEnvTrueBoolean, $svgSansEnvTruthyString);
    }

    /** @test */
    public function it_will_return_the_same_svg_with_sans_env_falsy_values(): void
    {
        $svgSansEnvFalseBoolean = ($this->multiavatar)('foobar', ['sansEnv' => false]);
        $svgSansEnvWrongValueIsFalse = ($this->multiavatar)('foobar', ['sansEnv' => 'fdsdf']);
        $svgSansEnvNullValue = ($this->multiavatar)('foobar', ['sansEnv' => null]);

        self::assertSame($svgSansEnvFalseBoolean, $svgSansEnvNullValue);
        self::assertSame($svgSansEnvFalseBoolean, $svgSansEnvWrongValueIsFalse);
    }

    /** @test */
    public function it_will_return_different_svg_with_sans_env_values(): void
    {
        $svgSansEnvFalse = ($this->multiavatar)('foobar', ['sansEnv' => false]);
        $svgSansEnvTrue = ($this->multiavatar)('foobar', ['sansEnv' => true]);

        self::assertNotSame($svgSansEnvFalse, $svgSansEnvTrue);
    }

    /** @test */
    public function it_will_return_the_same_svg_with_avatar_id_numeric_or_string(): void
    {
        $svgAvatarIdIsString = ($this->multiavatar)('1234567890');
        $svgAvatarIdIsNumeric = ($this->multiavatar)(1234567890);

        self::assertSame($svgAvatarIdIsNumeric, $svgAvatarIdIsString);
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
        yield 'avatar is an empty string' => ['avatarId' => ''];
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
