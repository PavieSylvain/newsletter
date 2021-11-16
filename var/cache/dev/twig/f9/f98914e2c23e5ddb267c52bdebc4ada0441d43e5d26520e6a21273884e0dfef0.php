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

/* newsletter/newsletter_list.html.twig */
class __TwigTemplate_4072f6bd2d2d7ebbbd86896e695be65624bf7df7dc14ff13c52b60c5c4e56f6b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "newsletter/newsletter_list.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "newsletter/newsletter_list.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "newsletter/newsletter_list.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Bienvenue dans la création de newsletter ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        echo "    <div class=\"list bg-info\">
        <table id=\"newsletters\" class=\"display\">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date de création</th>
                    <th>Date de mise à jour</th>
                    <th>Date de publication</th>
                    <th>Auteur</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["o_newsletters"]) || array_key_exists("o_newsletters", $context) ? $context["o_newsletters"] : (function () { throw new RuntimeError('Variable "o_newsletters" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["o_newsletter"]) {
            // line 21
            echo "                    <tr>
                        <td class=\"text-center\">";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["o_newsletter"], "title", [], "any", false, false, false, 22), "html", null, true);
            echo "</td>
                        <td class=\"text-center\">";
            // line 23
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["o_newsletter"], "createdAt", [], "any", false, false, false, 23), "Y-m-d H:i:s"), "html", null, true);
            echo "</td>
                        <td class=\"text-center\">";
            // line 24
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["o_newsletter"], "updatedAt", [], "any", false, false, false, 24), "Y-m-d H:i:s"), "html", null, true);
            echo "</td>
                        ";
            // line 25
            if (twig_get_attribute($this->env, $this->source, $context["o_newsletter"], "publishedAt", [], "any", false, false, false, 25)) {
                // line 26
                echo "                            <td class=\"text-center\">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["o_newsletter"], "publishedAt", [], "any", false, false, false, 26), "Y-m-d H:i:s"), "html", null, true);
                echo "</td>
                        ";
            } else {
                // line 28
                echo "                            <td class=\"text-center\">Non publié</td>
                        ";
            }
            // line 30
            echo "                        
                        <td class=\"text-center\">";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["o_newsletter"], "author", [], "any", false, false, false, 31), "firstName", [], "any", false, false, false, 31), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["o_newsletter"], "author", [], "any", false, false, false, 31), "lastName", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                        <td class=\"modifier\">
                            <a class=\"btn btn-outline-warning text-center\" href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bo_newsLetter_update", ["id" => twig_get_attribute($this->env, $this->source, $context["o_newsletter"], "id", [], "any", false, false, false, 33)]), "html", null, true);
            echo "\" >Modifier</a>
                            <a class=\"btn btn-outline-danger text-center\" href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bo_newsLetter_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["o_newsletter"], "id", [], "any", false, false, false, 34)]), "html", null, true);
            echo "\" onclick=\"return confirm('Etes-vous sure de supprimer la newsletter?')\">Supprimer</a>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['o_newsletter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "            </tbody>
        </table>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 44
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 45
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
        // line 46
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 46, $this->source); })()), "request", [], "any", false, false, false, 46), "attributes", [], "any", false, false, false, 46), "get", [0 => "_route"], "method", false, false, false, 46));
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "newsletter/newsletter_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 46,  183 => 45,  173 => 44,  159 => 38,  149 => 34,  145 => 33,  138 => 31,  135 => 30,  131 => 28,  125 => 26,  123 => 25,  119 => 24,  115 => 23,  111 => 22,  108 => 21,  104 => 20,  89 => 7,  79 => 6,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Bienvenue dans la création de newsletter {% endblock %}


{% block body %}
    <div class=\"list bg-info\">
        <table id=\"newsletters\" class=\"display\">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date de création</th>
                    <th>Date de mise à jour</th>
                    <th>Date de publication</th>
                    <th>Auteur</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {% for o_newsletter in o_newsletters %}
                    <tr>
                        <td class=\"text-center\">{{ o_newsletter.title }}</td>
                        <td class=\"text-center\">{{ o_newsletter.createdAt | date('Y-m-d H:i:s') }}</td>
                        <td class=\"text-center\">{{ o_newsletter.updatedAt | date('Y-m-d H:i:s') }}</td>
                        {% if o_newsletter.publishedAt %}
                            <td class=\"text-center\">{{ o_newsletter.publishedAt | date('Y-m-d H:i:s') }}</td>
                        {% else %}
                            <td class=\"text-center\">Non publié</td>
                        {% endif %}
                        
                        <td class=\"text-center\">{{ o_newsletter.author.firstName }} {{ o_newsletter.author.lastName }}</td>
                        <td class=\"modifier\">
                            <a class=\"btn btn-outline-warning text-center\" href=\"{{ path('bo_newsLetter_update', { 'id': o_newsletter.id }) }}\" >Modifier</a>
                            <a class=\"btn btn-outline-danger text-center\" href=\"{{ path('bo_newsLetter_delete', {id: o_newsletter.id}) }}\" onclick=\"return confirm('Etes-vous sure de supprimer la newsletter?')\">Supprimer</a>
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>

{% endblock %}

{% block javascripts %}
    {{ parent() }}
    {{ encore_entry_script_tags(app.request.attributes.get('_route')) }}
{% endblock %}
", "newsletter/newsletter_list.html.twig", "/home/pavie/projets/newsletter/templates/newsletter/newsletter_list.html.twig");
    }
}
