<?php

namespace Plugin\AceClient\Controller\Admin;

use Eccube\Controller\AbstractController;
use Plugin\AceClient\Form\Type\Admin\ConfigType;
use Plugin\AceClient\Repository\ConfigRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Plugin\AceClient\Config\Model\AceMethod\HttpClientConfigModel;
use Plugin\AceClient\utils\ConfigWriter\ConfigWriter;

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
            $Config = $form->getData();
            $this->entityManager->persist($Config);
            $this->entityManager->flush();
            $this->addSuccess('登録しました。', 'admin');
            // Create a new ConfigWriterTestor and update the base URI
            $configWriterTestor = new ConfigWriter();
            $configWriterTestor->updateBaseUri($Config->getName());
            return $this->redirectToRoute('ace_client_admin_config');

            // return $this->redirectToRoute('ace_client_admin_config');
        }

        // if ($form->isSubmitted() && $form->isValid()) {
        //     $Config = $form->getData();
        //     $this->entityManager->persist($Config);
        //     $this->entityManager->flush();
        //     $this->addSuccess('登録しました。', 'admin');
        //     $yaml = Yaml::parseFile(__DIR__.'/../Resources/config/AceClientConfig.yaml');
        //     $yaml['parameters']['ace_method']['default']['http_client']['base_uri'] = $Config->getName();
        //     file_put_contents(__DIR__.'/../Resources/config/AceClientConfig.yaml', Yaml::dump($yaml));
        //     return $this->redirectToRoute('ace_client_admin_config');
        // }

        return [
            'form' => $form->createView(),
        ];
    }
}
