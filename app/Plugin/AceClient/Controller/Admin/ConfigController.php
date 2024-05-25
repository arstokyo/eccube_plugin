<?php

namespace Plugin\AceClient\Controller\Admin;

use Eccube\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Plugin\AceClient\Form\Type\Admin\ConfigType;
use Plugin\AceClient\Repository\ConfigRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Plugin\AceClient\Utils\ConfigWriter\ConfigWriter;
use Plugin\AceClient\Entity\Config;
use Plugin\AceClient\Utils\Mapper\FilePathMapper;


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
     * @Route("/%eccube_admin_route%/aceclient/config", name="ace_client_admin_config")
     * @Template("@AceClient/admin/config.twig")
     */
    public function index(Request $request)
    {
        $Config = $this->configRepository->get();
        $form = $this->createForm(ConfigType::class, $Config);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Config $Config */
            $Config = $form->getData();
            if (!\str_ends_with($Config->getBaseUri(), '/')) {
                $Config->setBaseUri($Config->getBaseUri() . '/');
            }

            // Update default base_uri in AceClientConfig.yaml
            if (false === ConfigWriter::updateBaseUri($Config->getBaseUri())){
                $this->addError(sprintf('ファイル%sの書き込みに失敗しました。ファイルの書き込み権限を確認してください。', FilePathMapper::ACE_CLIENT_FILE_NAME), 'admin');
                return $this->redirectToRoute('ace_client_admin_config');
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
