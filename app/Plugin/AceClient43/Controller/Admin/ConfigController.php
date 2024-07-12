<?php

namespace Plugin\AceClient43\Controller\Admin;

use Eccube\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Plugin\AceClient43\Form\Type\Admin\ConfigType;
use Plugin\AceClient43\Repository\ConfigRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConfigController extends AbstractController
{
    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    /**
     * ConfigController constructor.
     *
     * @param ConfigRepository $configRepository
     */
    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * @Route("/%eccube_admin_route%/aceclient43/config", name="ace_client_admin_config")
     * @Template("@AceClient43/admin/config.twig")
     */
    public function index(Request $request)
    {
        $Config = $this->configRepository->get();
        $form = $this->createForm(ConfigType::class, $Config);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $Config = $form->getData();
            if (!\str_ends_with($Config->getBaseUri(), '/')) {
                $Config->setBaseUri($Config->getBaseUri() . '/');
            }

            $this->entityManager->persist($Config);
            $this->entityManager->flush();

            $this->addSuccess('登録しました。', 'admin');
            return $this->redirectToRoute('ace_client_admin_config');
        }

        return [
            'form' => $form->createView(),
        ];
    }
}
