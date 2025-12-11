<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\FormContactService;
use App\Service\NavigationService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractBaseController
{
    public function __construct(
        private readonly FormContactService $formContactService,
        private readonly RequestStack $requestStack,
        private readonly NavigationService $navigation,
    ) {
    }

    #[Route('/contact', name: 'page_contact')]
    #[Route('/kontakt', name: 'page_kontakt')]
    public function contact(Request $request): Response
    {
        $successMessage = null;
        $errorMessage = null;
        $request = $this->requestStack->getCurrentRequest();

        // Handle success flash messages from redirects
        if ($request && $request->query->has('submit')) {
            $this->addFlash('success', 'Vielen Dank für Ihre Nachricht! Wir haben Ihre Anfrage erhalten und werden uns so schnell wie möglich bei Ihnen melden.');
        }

        // Handle error flash messages from redirects
        if ($request && $request->query->has('error')) {
            $errorCode = $request->query->get('error');
            $errorMessage = match ($errorCode) {
                'mail'       => 'Bei der Kommunikation mit unserem E-Mail-Server ist leider ein Fehler aufgetreten. Wir bitten sehr um Entschuldigung. Sollte dieses Problem nocheinmal auftreten, wenden Sie sich bitte telefonisch an uns: +49 (0)157 - 81 61 20 54',
                'rate'       => 'Sie haben vor Kurzem bereits eine Anfrage gesendet. Bitte warten Sie einen Moment, bevor Sie es erneut versuchen.',
                'validation' => 'Bitte korrigieren Sie die markierten Felder.',
                default      => null,
            };
        }

        $form = $this->formContactService->getForm();

        if ($response = $this->formContactService->handle()) {
            return $response;
        }

        return $this->render('pages/contact.html.twig', [
            'form'           => $form->createView(),
            'successMessage' => $successMessage,
            'errorMessage'   => $errorMessage,
            'navItems'       => $this->navigation->getItems(),
            'pageMeta'       => $this->loadPageMetadata('kontakt'),
        ]);
    }
}
