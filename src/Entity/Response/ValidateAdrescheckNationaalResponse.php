<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2017-2018 Thirty Development, LLC
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and
 * associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute,
 * sublicense, and/or sell copies of the Software, and to permit persons to whom the Software
 * is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or
 * substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT
 * NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @author    Michael Dekker <michael@thirtybees.com>
 * @copyright 2017-2018 Thirty Development, LLC
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace ThirtyBees\PostNL\Entity\Response;

use ThirtyBees\PostNL\Entity\AbstractEntity;
use ThirtyBees\PostNL\Entity\AdrescheckNationaal;

/**
 * Class ValidateAdrescheckNationaalResponse
 *
 * @package ThirtyBees\PostNL\Entity
 *
 * @method AdrescheckNationaal[]|null getAdrescheckNationaals()
 *
 * @method ValidateAdrescheckNationaalResponse setAdrescheckNationaals(AdrescheckNationaal[]|null $adrescheckNationaal = null)
 */
class ValidateAdrescheckNationaalResponse extends AbstractEntity
{
    // @codingStandardsIgnoreStart
    /** @var AdrescheckNationaal[]|null $AdrescheckNationaals */
    protected $AdrescheckNationaals;
    // @codingStandardsIgnoreEnd

    /**
     * ValidateAdrescheckNationaalResponse constructor.
     *
     * @param AdrescheckNationaal[]|null $adrescheckNationaal
     */
    public function __construct(array $adrescheckNationaals = null)
    {
        parent::__construct();

        $this->setAdrescheckNationaals($adrescheckNationaals);
    }

    /**
     * @return AdrescheckNationaal|null
     */
    public function getFirstAdrescheckNationaal()
    {
        if ($this->getAdrescheckNationaals() !== null) {
            $adrescheckNationaals = $this->getAdrescheckNationaals();

            return array_shift($adrescheckNationaals);
        }

        return null;
    }
}
