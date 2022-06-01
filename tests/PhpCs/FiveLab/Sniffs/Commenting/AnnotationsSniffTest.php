<?php

/*
 * This file is part of the FiveLab CiRules package
 *
 * (c) FiveLab
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

declare(strict_types = 1);

namespace FiveLab\Component\CiRules\Tests\PhpCs\FiveLab\Sniffs\Commenting;

use FiveLab\Component\CiRules\PhpCs\FiveLab\Sniffs\Commenting\AnnotationsSniff;
use FiveLab\Component\CiRules\Tests\PhpCs\FiveLab\Sniffs\SniffTestCase;

class AnnotationsSniffTest extends SniffTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getSniffClass(): string
    {
        return AnnotationsSniff::class;
    }

    /**
     * {@inheritdoc}
     */
    public function provideDataSet(): array
    {
        return [
            'success' => [
                __DIR__.'/Resources/annotations/success.php',
            ],

            'wrong' => [
                __DIR__.'/Resources/annotations/wrong.php',
                [
                    'message' => '`@return void` doc block comments are prohibited. Please add void to return type hint.',
                    'source'  => 'FiveLab.Commenting.Annotations.Prohibited',
                ],
                [
                    'message' => 'Please import error class in "use" block and use short class name in @throws annotation.',
                    'source'  => 'FiveLab.Commenting.Annotations.Prohibited',
                ],
            ],
        ];
    }
}
