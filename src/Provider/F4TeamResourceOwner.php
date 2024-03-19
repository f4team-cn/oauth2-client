<?php

namespace League\OAuth2\Client\Provider;

use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class F4TeamResourceOwner implements ResourceOwnerInterface
{
    use ArrayAccessorTrait;

    /**
     * Raw response
     *
     * @var array
     */
    protected $response;

    /**
     * Creates new resource owner.
     *
     * @param array $response
     */
    public function __construct(array $response = array())
    {
        $this->response = $response;
    }

    /**
     * Get resource owner id
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getValueByKey($this->response, 'data.uuid');
    }

    /**
     * Get resource owner email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->getValueByKey($this->response, 'data.email');
    }

    /**
     * Get resource owner username
     *
     * @return string|null
     */
    public function getUserName()
    {
        return $this->getValueByKey($this->response, 'data.username');
    }

    /**
     * Get resource owner phone
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->getValueByKey($this->response, 'data.phone');
    }

    /**
     * Return all of the owner details available as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->response;
    }
}
