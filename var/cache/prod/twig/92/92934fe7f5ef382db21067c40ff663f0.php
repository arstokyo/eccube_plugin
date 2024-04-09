<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* MailMagazine42/Tests/Web/Front/MailMagazineEventOnRenderEntryTest.php */
class __TwigTemplate_d6bb549cdcc3f156d62fc8ea226b2d28 extends \Eccube\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\\MailMagazine42\\Tests\\Web\\Front;

use Eccube\\Common\\Constant;
use Eccube\\Tests\\Web\\AbstractWebTestCase;

class MailMagazineEventOnRenderEntryTest extends AbstractWebTestCase
{
    protected function createFormData()
    {
        \$faker = \$this->getFaker();
        \$tel = explode('-', \$faker->phoneNumber);

        \$email = \$faker->safeEmail;
        \$password = \$faker->lexify('????????');
        \$birth = \$faker->dateTimeBetween;

        \$form = [
            'name' => [
                'name01' => \$faker->lastName,
                'name02' => \$faker->firstName,
            ],
            'kana' => [
                'kana01' => \$faker->lastKanaName,
                'kana02' => \$faker->firstKanaName,
            ],
            'company_name' => \$faker->company,
            'postal_code' => \$faker->postcode1().\$faker->postcode2(),
            'address' => [
                'pref' => '5',
                'addr01' => \$faker->city,
                'addr02' => \$faker->streetAddress,
            ],
            'phone_number' => \$tel[0].\$tel[1].\$tel[2],
            'email' => [
                'first' => \$email,
                'second' => \$email,
            ],
            'password' => [
                'first' => \$password,
                'second' => \$password,
            ],
            'birth' => [
                'year' => \$birth->format('Y'),
                'month' => \$birth->format('n'),
                'day' => \$birth->format('j'),
            ],
            'sex' => 1,
            'job' => 1,
            '_token' => 'dummy',
        ];

        return \$form;
    }

    public function testOnRenderEntry()
    {
        \$crawler = \$this->client->request('GET',
            \$this->generateUrl('entry')
        );

        \$this->assertTrue(\$this->client->getResponse()->isSuccessful());
        \$this->assertEquals(1, \$crawler->filter('#entry_mailmaga_flg')->count());
    }

    public function testOnRenderEntry_Post()
    {
        \$formData = \$this->createFormData();
        \$updateFlg = Constant::ENABLED;

        \$formData['mailmaga_flg'] = \$updateFlg;

        \$this->client->request('POST',
            \$this->generateUrl('entry'),
            [
                'entry' => \$formData,
                'mode' => 'confirm',
            ]
        );

        \$this->assertTrue(\$this->client->getResponse()->isSuccessful());
    }

    public function testOnRenderEntry_PostComplete()
    {
        \$formData = \$this->createFormData();
        \$updateFlg = Constant::ENABLED;

        \$formData['mailmaga_flg'] = \$updateFlg;

        \$this->client->request('POST',
            \$this->generateUrl('entry'),
            [
                'entry' => \$formData,
                'mode' => 'complete',
            ]
        );
        \$this->assertTrue(\$this->client->getResponse()->isSuccessful());
    }
}
";
    }

    public function getTemplateName()
    {
        return "MailMagazine42/Tests/Web/Front/MailMagazineEventOnRenderEntryTest.php";
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "MailMagazine42/Tests/Web/Front/MailMagazineEventOnRenderEntryTest.php", "/var/www/html/app/Plugin/MailMagazine42/Tests/Web/Front/MailMagazineEventOnRenderEntryTest.php");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
