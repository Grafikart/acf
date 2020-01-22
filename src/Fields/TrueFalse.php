<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\DefaultValue;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

/**
 * This is the true false field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class TrueFalse extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use Instructions;
    use Required;
    use Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'true_false';

    /**
     * Enable stylised UI.
     *
     * @return self
     */
    public function ui(?string $onText = null, ?string $offText = null): self
    {
        $this->config->set('ui', true);
        if ($onText !== null) {
            $this->config->set('ui_on_text', $onText);
        }
        if ($offText !== null) {
            $this->config->set('ui_off_text', $offText);
        }

        return $this;
    }
}
