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

/* admin/useradd.html.twig */
class __TwigTemplate_7c50877eaf719aef8aec3b52c2531181 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/useradd.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/useradd.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "admin/useradd.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Hello SuperAdminController!
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        echo "\t<style>
\t\t.example-wrapper {
\t\t\tmargin: 1em auto;
\t\t\tmax-width: 800px;
\t\t\twidth: 95%;
\t\t\tfont: 18px / 1.5 sans-serif;
\t\t}
\t\t.example-wrapper code {
\t\t\tbackground: #F5F5F5;
\t\t\tpadding: 2px 6px;
\t\t}
\t</style>

\t<div class=\"example-wrapper\">
\t\t<table>
\t\t\t<tr>
\t\t\t\t<td>Nom du user</td>
\t\t\t\t<td>Envoyer un mail</td>
\t\t\t\t<td>Envoyer un mail</td>
\t\t\t\t<td>Modifier le compte</td>
\t\t\t\t<td>Supprimer le compte</td>
\t\t\t</tr>
\t\t\t";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 29, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 30
            echo "\t\t\t\t<tr>
\t\t\t\t\t";
            // line 31
            $context["email"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "email", [], "any", false, false, false, 31), "@");
            // line 32
            echo "\t\t\t\t\t<td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["email"]) || array_key_exists("email", $context) ? $context["email"] : (function () { throw new RuntimeError('Variable "email" does not exist.', 32, $this->source); })()), 0, [], "array", false, false, false, 32), "html", null, true);
            echo "</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href='/admin/user/old/";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 34), "html", null, true);
            echo "'>Quizz passé</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t<a href='/admin/user/new/";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 37), "html", null, true);
            echo "'>Quizz pas passé</a>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t<a href='/admin/user/modif/";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 40), "html", null, true);
            echo "'>Modifier l'utilisateur</a>
\t\t\t</td>
\t\t\t<td>
\t\t\t<a href='/admin/user/delete/";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 43), "html", null, true);
            echo "'>Supprimer le compte</a>
\t\t</td>
\t\t\t\t</tr>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "\t\t</table>
\t</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "admin/useradd.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 47,  146 => 43,  140 => 40,  134 => 37,  128 => 34,  122 => 32,  120 => 31,  117 => 30,  113 => 29,  89 => 7,  79 => 6,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello SuperAdminController!
{% endblock %}

{% block body %}
\t<style>
\t\t.example-wrapper {
\t\t\tmargin: 1em auto;
\t\t\tmax-width: 800px;
\t\t\twidth: 95%;
\t\t\tfont: 18px / 1.5 sans-serif;
\t\t}
\t\t.example-wrapper code {
\t\t\tbackground: #F5F5F5;
\t\t\tpadding: 2px 6px;
\t\t}
\t</style>

\t<div class=\"example-wrapper\">
\t\t<table>
\t\t\t<tr>
\t\t\t\t<td>Nom du user</td>
\t\t\t\t<td>Envoyer un mail</td>
\t\t\t\t<td>Envoyer un mail</td>
\t\t\t\t<td>Modifier le compte</td>
\t\t\t\t<td>Supprimer le compte</td>
\t\t\t</tr>
\t\t\t{% for item in data %}
\t\t\t\t<tr>
\t\t\t\t\t{% set email = item.email|split('@') %}
\t\t\t\t\t<td>{{ email[0] }}</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href='/admin/user/old/{{item.id}}'>Quizz passé</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t<a href='/admin/user/new/{{item.id}}'>Quizz pas passé</a>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t<a href='/admin/user/modif/{{item.id}}'>Modifier l'utilisateur</a>
\t\t\t</td>
\t\t\t<td>
\t\t\t<a href='/admin/user/delete/{{item.id}}'>Supprimer le compte</a>
\t\t</td>
\t\t\t\t</tr>
\t\t\t{% endfor %}
\t\t</table>
\t</div>
{% endblock %}
", "admin/useradd.html.twig", "/home/victor/Documents/quizz2/Quizz/templates/admin/useradd.html.twig");
    }
}
