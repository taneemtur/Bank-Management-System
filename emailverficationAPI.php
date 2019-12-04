<?php
namespace QuickEmailVerification\Api;
use QuickEmailVerification\HttpClient\HttpClientInterface;
class Quickemailverification implements QuickEmailVerificationInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;
    /**
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    /**
     * Verify email address and get detailed response
     *
     * '/v1/verify?email=:email' GET
     *
     * @param $email send email address in query parameter
     */
    public function verify($email, array $options = [])
    {
        $body = isset($options['query']) ? $options['query'] : [];
        $body['email'] = $email;
        return $this->client->get('/v1/verify', $body, $options);
    }
    /**
     * Return predefined response for predefined email address
     *
     * '/v1/verify/sandbox?email=:email' GET
     *
     * @param $email send email address in query parameter
     */
    public function sandbox($email, array $options = [])
    {
        $body = isset($options['query']) ? $options['query'] : [];
        $body['email'] = $email;
        return $this->client->get('/v1/verify/sandbox', $body, $options);
    }
