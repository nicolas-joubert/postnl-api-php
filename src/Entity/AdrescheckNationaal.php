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

namespace ThirtyBees\PostNL\Entity;

/**
 * Class AdrescheckNationaal
 *
 * @package ThirtyBees\PostNL\Entity\AdrescheckNationaal
 *
 * @method string|null getCountry()
 * @method string|null getStreet()
 * @method string|null getHouseNumber()
 * @method string|null getAddition()
 * @method string|null getPostalCode()
 * @method string|null getCity()
 * @method array|null  getFormattedAddress()
 *
 * @method AdrescheckNationaal setCountry(string|null $country = null)
 * @method AdrescheckNationaal setStreet(string|null $street = null)
 * @method AdrescheckNationaal setHouseNumber(string|null $houseNumber = null)
 * @method AdrescheckNationaal setAddition(string|null $addition = null)
 * @method AdrescheckNationaal setCity(string|null $city = null)
 * @method AdrescheckNationaal setFormattedAddress(array|null $formattedAddress = null)
 */
class AdrescheckNationaal extends AbstractEntity
{
    // @codingStandardsIgnoreStart
    /**
     * The ISO2 country codes
     *
     * @var string|null $Country
     */
    protected $Country;
    /** @var string|null $Street */
    protected $Street;
    /** @var string|null $HouseNumber */
    protected $HouseNumber;
    /** @var string|null $Addition */
    protected $Addition;
    /** @var string|null $PostalCode */
    protected $PostalCode;
    /** @var string|null $City */
    protected $City;
    /**
     * Max 3 lines of string
     *
     * @var array|null $FormattedAddress
     */
    protected $FormattedAddress;
    // @codingStandardsIgnoreEnd

    /**
     * @param string|null $country
     * @param string|null $street
     * @param string|null $houseNumber
     * @param string|null $addition
     * @param string|null $postalCode
     * @param string|null $city
     * @param array|null $formattedAddress
     */
    public function __construct(
        $country = null,
        $street = null,
        $houseNumber = null,
        $addition = null,
        $postalCode = null,
        $city = null,
        $formattedAddress = null
    ) {
        parent::__construct();

        $this->setCountry($country);
        $this->setStreet($street);
        $this->setHouseNumber($houseNumber);
        $this->setAddition($addition);
        $this->setPostalCode($postalCode);
        $this->setCity($city);
        $this->setFormattedAddress($formattedAddress);
    }

    /**
     * Set postalCode
     *
     * @param string|null $postalCode
     *
     * @return $this
     */
    public function setPostalCode($postalCode = null)
    {
        if (is_null($postalCode)) {
            $this->PostalCode = null;
        } else {
            $this->PostalCode = strtoupper(str_replace(' ', '', $postalCode));
        }

        return $this;
    }
}
