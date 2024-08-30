<?php

namespace Sevengroup\SecurityBundle\Services;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CheckAccess
{
    private ?string $apiUrl;
    private HttpClientInterface $httpClient;
    private RequestStack $requestStack;

    public function __construct(
      ParameterBagInterface $parameterBag,
      HttpClientInterface $httpClient,
      RequestStack $requestStack
    )
    {
        $this->apiUrl = $parameterBag->get('sevengroup_security.api_url');
        $this->httpClient = $httpClient;
        $this->requestStack = $requestStack;
    }

    public function checkAccess(string $resourceType, string $access, string $resourceId = null): bool
    {
        $token = $this->getToken();
        $url = $this->apiUrl . '/security/control/'.$access.'/'.$resourceType;

        if(isset($resourceId)) {
            $url .= '/'.$resourceId;
        }
        // some logic here
        $response = $this->httpClient->request(
          'GET', 
          $url, 
          [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ]
          ]
        );

        if($response->getStatusCode() !== 200) {
            return false;
        }

        return true;
    }

    private function getToken(): string
    {
        $token = explode(' ', $this->requestStack->getCurrentRequest()->headers->get('Authorization'));
        return $token[1];
    }
}