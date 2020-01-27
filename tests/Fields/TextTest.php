<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\Fields\Text;

class TextTest extends TestCase
{
    public function testLabel()
    {
        $field = Text::make('Name')->toArray();
        $this->assertSame('Name', $field['label']);
    }

    public function testName()
    {
        $field = Text::make('Email')->toArray();
        $this->assertSame('email', $field['name']);

        $field = Text::make('Category', 'tag')->toArray();
        $this->assertSame('tag', $field['name']);
    }

    public function testKey()
    {
        $field = Text::make('Phone')->toArray();
        $this->assertSame('field_16217cde', $field['key']);
    }

    public function testType()
    {
        $field = Text::make('Text')->toArray();
        $this->assertSame('text', $field['type']);
    }

    public function testRequired()
    {
        $field = Text::make('Title')->required()->toArray();
        $this->assertTrue($field['required']);
    }

    public function testInstructions()
    {
        $field = Text::make('Heading')->instructions('Add the text content')->toArray();
        $this->assertSame('Add the text content', $field['instructions']);
    }

    public function testPlaceholder()
    {
        $field = Text::make('Placeholder')->placeholder('ACF')->toArray();
        $this->assertSame('ACF', $field['placeholder']);
    }

    public function testWrapper()
    {
        $field = Text::make('Status')->wrapper(['id' => 'status'])->toArray();
        $this->assertSame(['id' => 'status'], $field['wrapper']);
    }

    public function testConditionalLogic()
    {
        $field = Text::make('Conditional Logic')
            ->conditionalLogic([
                ConditionalLogic::if('type')->empty(),
            ])
            ->conditionalLogic([
                ConditionalLogic::if('title')->contains('ACF'),
            ]);

        $field->setParentKey('group');
        $field = $field->toArray();

        $this->assertSame('==empty', $field['conditional_logic'][0][0]['operator']);
        $this->assertSame('==contains', $field['conditional_logic'][1][0]['operator']);
    }

    public function testPrepend()
    {
        $field = Text::make('Prepend')->prepend('prefix')->toArray();
        $this->assertSame('prefix', $field['prepend']);
    }

    public function testAppend()
    {
        $field = Text::make('Append')->append('suffix')->toArray();
        $this->assertSame('suffix', $field['append']);
    }

    public function testMaxLength()
    {
        $field = Text::make('Title with length')->maxLength(10)->toArray();
        $this->assertEquals($field['maxlength'], 10);
    }

    public function testSet()
    {
        $field = Text::make('Title with arbitrary field')->set('hello', 'world')->toArray();
        $this->assertEquals($field['hello'], 'world');
    }
}
