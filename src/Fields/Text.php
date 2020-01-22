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
use WordPlate\Acf\Fields\Attributes\Pending;
use WordPlate\Acf\Fields\Attributes\Placeholder;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

/**
 * This is the text field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class Text extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use Instructions;
    use Pending;
    use Placeholder;
    use Required;
    use Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'text';

    /**
     * Set the character limit
     *
     * @return self
     */
    public function maxLength(int $length): self
    {
        $this->config->set('maxlength', $length);

        return $this;
    }
}
