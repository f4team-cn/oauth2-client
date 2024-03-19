<?php

namespace League\OAuth2\Client\Provider\Exception;

use Psr\Http\Message\ResponseInterface;

class F4TeamIdentityProviderException extends IdentityProviderException
{
    /**
     * Creates oauth exception from response.
     *
     * @param ResponseInterface $response
     * @param array             $data     Parsed response data
     *
     * @return IdentityProviderException
     */
    public static function oauthException(ResponseInterface $response, $data)
    {
        return static::fromResponse(
            $response,
            isset($data['data']['error_description']) ? $data['data']['error_description'] : $response->getReasonPhrase()
        );
    }

    /**
     * Creates identity exception from response.
     *
     * @param ResponseInterface $response
     * @param string            $message
     *
     * @return IdentityProviderException
     */
    protected static function fromResponse(ResponseInterface $response, $message = null)
    {
        return new static($message, $response->getStatusCode(), (string) $response->getBody());
    }
}
