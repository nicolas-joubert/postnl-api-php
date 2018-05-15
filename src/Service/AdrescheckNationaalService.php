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

namespace ThirtyBees\PostNL\Service;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use ThirtyBees\PostNL\Entity\AbstractEntity;
use ThirtyBees\PostNL\Entity\AdrescheckNationaal;
use ThirtyBees\PostNL\Entity\Request\ValidateAdrescheckNationaal;
use ThirtyBees\PostNL\Entity\Response\ValidateAdrescheckNationaalResponse;
use ThirtyBees\PostNL\Exception\ApiException;
use ThirtyBees\PostNL\Exception\CifDownException;
use ThirtyBees\PostNL\Exception\CifException;
use ThirtyBees\PostNL\Exception\ResponseException;
use ThirtyBees\PostNL\PostNL;

/**
 * Class AdrescheckNationaalService
 *
 * @package ThirtyBees\PostNL\Service
 *
 * @method ValidateAdrescheckNationaalResponse|null validateAdrescheckNationaal(ValidateAdrescheckNationaal $validateAdrescheckNationaal)
 * @method Request buildValidateAdrescheckNationaalRequest(ValidateAdrescheckNationaal $validateAdrescheckNationaal)
 * @method ValidateAdrescheckNationaalResponse|null processValidateAdrescheckNationaalResponse(mixed $response)
 */
class AdrescheckNationaalService extends AbstractService
{
    /** @var PostNL $postnl */
    protected $postnl;

    const VERSION = '1';
    const ENDPOINT = 'https://api.postnl.nl/address/national/v1/validate';

    /**
     * Validate an Adrescheck Nationaal
     *
     * @param AdrescheckNationaal $adrescheckNationaal
     *
     * @return ValidateAdrescheckNationaalResponse[]|null AdrescheckNationaal
     *
     * @throws ApiException
     * @throws CifDownException
     * @throws CifException
     * @throws ResponseException
     */
    public function validateAdrescheckNationaalREST(ValidateAdrescheckNationaal $validateAdrescheckNationaal)
    {
        /** @var Response $response */
        $response = $this->postnl
            ->getHttpClient()
            ->doRequest($this->buildValidateAdrescheckNationaalRequestREST($validateAdrescheckNationaal));

        return $this->processValidateAdrescheckNationaalResponseREST($response);
    }

    /**
     * Build the `validate` HTTP request for the REST API
     *
     * @param ValidateAdrescheckNationaal $validateAdrescheckNationaal
     *
     * @return Request
     */
    public function buildValidateAdrescheckNationaalRequestREST(ValidateAdrescheckNationaal $validateAdrescheckNationaal)
    {
        $apiKey = $this->postnl->getRestApiKey();

        return new Request(
            'POST',
            static::ENDPOINT,
            [
                'apikey'       => $apiKey,
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json;charset=UTF-8',
            ],
            json_encode([
                'PostalCode'   => $validateAdrescheckNationaal->getAdrescheckNationaal()->getPostalCode(),
                'City'         => $validateAdrescheckNationaal->getAdrescheckNationaal()->getCity(),
                'Street'       => $validateAdrescheckNationaal->getAdrescheckNationaal()->getStreet(),
                'HouseNumber'  => $validateAdrescheckNationaal->getAdrescheckNationaal()->getHouseNumber(),
                'Addition'     => $validateAdrescheckNationaal->getAdrescheckNationaal()->getAddition(),
            ])
        );
    }

    /**
     * Process the ValidateAdrescheckNationaal REST Response
     *
     * @param Response $response
     *
     * @return ValidateAdrescheckNationaalResponse|null
     * @throws ResponseException
     */
    public function processValidateAdrescheckNationaalResponseREST($response)
    {
        $body = json_decode(static::getResponseText($response), true);

        if (!empty($body)) {
            // Fix missing type of data as array of AdrescheckNationaal
            $body = ['AdrescheckNationaals' => $body];

            /** @var ValidateAdrescheckNationaalResponse $object */
            return AbstractEntity::jsonDeserialize(['ValidateAdrescheckNationaalResponse' => $body]);
        }

        return null;
    }
}
