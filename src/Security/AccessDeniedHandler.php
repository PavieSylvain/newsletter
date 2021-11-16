<?php
// src/Security/AuthenticationEntryPoint.php
// src/Security/AccessDeniedHandler.php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    // redirection si l'utilisateur n'a pas l'autorisation
    private UrlGeneratorInterface $urlGenerator;

        public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function handle(Request $request, AccessDeniedException $accessDeniedException): ?Response
    {
    $request->getSession()->getFlashBag()->add('note', 'You have to login in order to access this page.');

        return new RedirectResponse($this->urlGenerator->generate('accueil'));
    }
}