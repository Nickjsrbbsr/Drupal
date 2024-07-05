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

/* @announcements_feed/announcements.html.twig */
class __TwigTemplate_b380667463be0cb3c18f6fbe8fd5bcfa extends Template
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
        if (($context["count"] ?? null)) {
            // line 2
            echo "  <nav class=\"announcements\">
    <ul>
      ";
            // line 4
            if (twig_length_filter($this->env, ($context["featured"] ?? null))) {
                // line 5
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["featured"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["announcement"]) {
                    // line 6
                    echo "          <li class=\"announcement announcement--featured\" data-drupal-featured>
            <div class=\"announcement__title\">
              <h4>";
                    // line 8
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["announcement"], "title", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
                    echo "</h4>
            </div>
            <div class=\"announcement__teaser\">
              ";
                    // line 11
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["announcement"], "content", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
                    echo "
            </div>
            <div class=\"announcement__link\">
              <a href=\"";
                    // line 14
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["announcement"], "url", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                    echo "\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Learn More"));
                    echo "</a>
            </div>
          </li>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['announcement'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 18
                echo "      ";
            }
            // line 19
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["standard"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["announcement"]) {
                // line 20
                echo "        <li class=\"announcement announcement--standard\">
          <div class=\"announcement__title\">
            <a href=\"";
                // line 22
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["announcement"], "url", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["announcement"], "title", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
                echo "</a>
            <div class=\"announcement__date\">";
                // line 23
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->env->getFilter('format_date')->getCallable()($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["announcement"], "datePublishedTimestamp", [], "any", false, false, true, 23), 23, $this->source), "short"), "html", null, true);
                echo "</div>
          </div>
        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['announcement'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "    </ul>
  </nav>

  ";
            // line 30
            if (($context["feed_link"] ?? null)) {
                // line 31
                echo "    <p class=\"announcements--view-all\">
      <a target=\"_blank\" href=\"";
                // line 32
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["feed_link"] ?? null), 32, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("View all announcements"));
                echo "</a>
    </p>
  ";
            }
        } else {
            // line 36
            echo "  <div class=\"announcements announcements--empty\"><p> ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("No announcements available"));
            echo "</p></div>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["count", "featured", "standard", "feed_link"]);    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@announcements_feed/announcements.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  127 => 36,  118 => 32,  115 => 31,  113 => 30,  108 => 27,  98 => 23,  92 => 22,  88 => 20,  83 => 19,  80 => 18,  68 => 14,  62 => 11,  56 => 8,  52 => 6,  47 => 5,  45 => 4,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@announcements_feed/announcements.html.twig", "C:\\xampp_new\\htdocs\\drupal\\drupal-10.2.7\\drupal-10.2.7\\core\\modules\\announcements_feed\\templates\\announcements.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1, "for" => 5);
        static $filters = array("length" => 4, "escape" => 8, "t" => 14, "format_date" => 23);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['length', 'escape', 't', 'format_date'],
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
