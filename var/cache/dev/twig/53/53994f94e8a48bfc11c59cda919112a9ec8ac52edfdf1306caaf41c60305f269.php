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

/* newsletter/newsletter_update.html.twig */
class __TwigTemplate_4600367e43918c7a82669f306d774d1936ec4bdef6ab0186091249368fa92992 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "newsletter/newsletter_update.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "newsletter/newsletter_update.html.twig"));

        // line 5
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["form_news"]) || array_key_exists("form_news", $context) ? $context["form_news"] : (function () { throw new RuntimeError('Variable "form_news" does not exist.', 5, $this->source); })()), [0 => "bootstrap_5_layout.html.twig"], true);
        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "newsletter/newsletter_update.html.twig", 1);
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

        echo "Mise à jour de la newsletter ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "
<div class=\"w-75 m-auto\">

    ";
        // line 11
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form_news"]) || array_key_exists("form_news", $context) ? $context["form_news"] : (function () { throw new RuntimeError('Variable "form_news" does not exist.', 11, $this->source); })()), 'form_start');
        echo "
        ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form_news"]) || array_key_exists("form_news", $context) ? $context["form_news"] : (function () { throw new RuntimeError('Variable "form_news" does not exist.', 12, $this->source); })()), "title", [], "any", false, false, false, 12), 'row');
        echo "
        ";
        // line 13
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form_news"]) || array_key_exists("form_news", $context) ? $context["form_news"] : (function () { throw new RuntimeError('Variable "form_news" does not exist.', 13, $this->source); })()), "description", [], "any", false, false, false, 13), 'row');
        echo "
        <div class=\"m-auto w-50\">
            <label for=\"publishedAt\">Date d'envoi de la newsletter
            ";
        // line 16
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form_news"]) || array_key_exists("form_news", $context) ? $context["form_news"] : (function () { throw new RuntimeError('Variable "form_news" does not exist.', 16, $this->source); })()), "publishedAt", [], "any", false, false, false, 16), 'row');
        echo "
        </div>

        <div class=\"list bg-info\">
                ";
        // line 20
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form_news"]) || array_key_exists("form_news", $context) ? $context["form_news"] : (function () { throw new RuntimeError('Variable "form_news" does not exist.', 20, $this->source); })()), "select", [], "any", false, false, false, 20), 'row', ["attr" => ["class" => "form-check form-check-inline"]]);
        echo "
            <table id=\"contacts\" class=\"display\">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nom Prénom</th>
                        <th>Adresse E-mail</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form_news"]) || array_key_exists("form_news", $context) ? $context["form_news"] : (function () { throw new RuntimeError('Variable "form_news" does not exist.', 31, $this->source); })()), "send_list", [], "any", false, false, false, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 32
            echo "                        ";
            $context["id"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "vars", [], "any", false, false, false, 32), "value", [], "array", false, false, false, 32);
            // line 33
            echo "                            <tr>
                                <td>";
            // line 34
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["item"], 'widget');
            echo "</td>
                                <td>";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "vars", [], "any", false, false, false, 35), "attr", [], "any", false, false, false, 35), "name", [], "any", false, false, false, 35), "html", null, true);
            echo "</td>
                                <td>";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "vars", [], "any", false, false, false, 36), "attr", [], "any", false, false, false, 36), "email", [], "any", false, false, false, 36), "html", null, true);
            echo "</td>
                                <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "vars", [], "any", false, false, false, 37), "attr", [], "any", false, false, false, 37), "status", [], "any", false, false, false, 37), "html", null, true);
            echo "</td>
                            </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "                </tbody>
            </table>
        </div>

        </div>

        <div class=\"btn-group w-100\">
            <button type=\"submit\" name=\"save\" id=\"save\" class=\"btn border border-dark bg-info text-white\">Sauvegarder</button>
            <button type=\"submit\" name=\"save_and_send\" id=\"save_and_send\" value=\"save_and_send\" class=\"btn border border-dark bg-info text-white\">Sauvegarder et publier</button>
        </div>
    ";
        // line 50
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form_news"]) || array_key_exists("form_news", $context) ? $context["form_news"] : (function () { throw new RuntimeError('Variable "form_news" does not exist.', 50, $this->source); })()), 'form_end');
        echo "

</div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "newsletter/newsletter_update.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 50,  162 => 40,  153 => 37,  149 => 36,  145 => 35,  141 => 34,  138 => 33,  135 => 32,  131 => 31,  117 => 20,  110 => 16,  104 => 13,  100 => 12,  96 => 11,  91 => 8,  81 => 7,  62 => 3,  51 => 1,  49 => 5,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mise à jour de la newsletter {% endblock %}

{% form_theme form_news 'bootstrap_5_layout.html.twig' %}

{% block body %}

<div class=\"w-75 m-auto\">

    {{ form_start(form_news) }}
        {{ form_row(form_news.title) }}
        {{ form_row(form_news.description) }}
        <div class=\"m-auto w-50\">
            <label for=\"publishedAt\">Date d'envoi de la newsletter
            {{ form_row(form_news.publishedAt) }}
        </div>

        <div class=\"list bg-info\">
                {{ form_row(form_news.select, {'attr': {'class': 'form-check form-check-inline'}}) }}
            <table id=\"contacts\" class=\"display\">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nom Prénom</th>
                        <th>Adresse E-mail</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    {% for item in form_news.send_list %}
                        {% set id = item.vars['value'] %}
                            <tr>
                                <td>{{ form_widget(item) }}</td>
                                <td>{{ item.vars.attr.name }}</td>
                                <td>{{ item.vars.attr.email }}</td>
                                <td>{{ item.vars.attr.status }}</td>
                            </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>

        </div>

        <div class=\"btn-group w-100\">
            <button type=\"submit\" name=\"save\" id=\"save\" class=\"btn border border-dark bg-info text-white\">Sauvegarder</button>
            <button type=\"submit\" name=\"save_and_send\" id=\"save_and_send\" value=\"save_and_send\" class=\"btn border border-dark bg-info text-white\">Sauvegarder et publier</button>
        </div>
    {{ form_end(form_news) }}

</div>

{% endblock %}


", "newsletter/newsletter_update.html.twig", "/home/pavie/projets/newsletter/templates/newsletter/newsletter_update.html.twig");
    }
}
