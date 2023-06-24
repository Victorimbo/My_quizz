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

/* layout.html.twig */
class __TwigTemplate_2614f3fa10d6175c72734c55dd958ef5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout.html.twig"));

        // line 1
        echo "<head>
\t";
        // line 2
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 5
        echo "</head>
<header>
\t<div class=\"containerheader\">
\t\t<h1 class=\"flex\">Tquizz</h1>

\t\t<nav class=\"flex\">
\t\t\t<ul>
\t\t\t\t<li style=\"position:absolute; right: 22%;\">
\t\t\t\t\t<strong>
\t\t\t\t\t\t<a href=\"/quizz/\" style=\"text-decoration:none; color: red;\">Jouer</a>
\t\t\t\t\t</strong>
\t\t\t\t</li>
\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t<span>
\t\t\t\t\t\t<strong>";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 19, $this->source); })()), "name", [], "any", false, false, false, 19), "html", null, true);
        echo "</strong>
\t\t\t\t\t</span>
\t\t\t\t\t<ul class=\"dropdown-content\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"/profile/\" ";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 23, $this->source); })()), "id", [], "any", false, false, false, 23), "html", null, true);
        echo ">
\t\t\t\t\t\t\t\tMy profile</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/user/quizz/create\">Ajouter un quizz</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"/user/edit/\">Edit profile</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        // line 32
        if ((twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 32, $this->source); })()), "roles", [], "any", false, false, false, 32) == "ROLE_SUPERADMIN")) {
            // line 33
            echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/superadmin/\">Voir les admins</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/superadmin/add/\">Ajouter un admin</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        // line 40
        echo "\t\t\t\t\t\t";
        if ((twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 40, $this->source); })()), "roles", [], "any", false, false, false, 40) == "ROLE_ADMIN")) {
            // line 41
            echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/\">Voir les admins</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/add/\">Ajouter un admin</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        // line 48
        echo "\t\t\t\t\t\t";
        if (((twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 48, $this->source); })()), "roles", [], "any", false, false, false, 48) == "ROLE_ADMIN") || (twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 48, $this->source); })()), "roles", [], "any", false, false, false, 48) == "ROLE_SUPERADMIN"))) {
            // line 49
            echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/charts/\">Statistiques de connexion</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/charts/quizz\">Statistiques des quizz</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/emails/\">Envoyer un email</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/categorie/addform\">Ajouter une catégorie</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/categories/\">Gérer les categories</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/user/\">Gérer les utilisateurs</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/user/add\">Créer un utilisateur</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        // line 71
        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"/logout\">Logout</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</nav>
\t</div>
</header>
<hr class=\"style1\">
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "\t\t<link type=\"text/css\" rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/main.css"), "html", null, true);
        echo "\"/>
\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 3,  154 => 2,  134 => 71,  110 => 49,  107 => 48,  98 => 41,  95 => 40,  86 => 33,  84 => 32,  72 => 23,  65 => 19,  49 => 5,  47 => 2,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<head>
\t{% block stylesheets %}
\t\t<link type=\"text/css\" rel=\"stylesheet\" href=\"{{ asset('css/main.css') }}\"/>
\t{% endblock %}
</head>
<header>
\t<div class=\"containerheader\">
\t\t<h1 class=\"flex\">Tquizz</h1>

\t\t<nav class=\"flex\">
\t\t\t<ul>
\t\t\t\t<li style=\"position:absolute; right: 22%;\">
\t\t\t\t\t<strong>
\t\t\t\t\t\t<a href=\"/quizz/\" style=\"text-decoration:none; color: red;\">Jouer</a>
\t\t\t\t\t</strong>
\t\t\t\t</li>
\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t<span>
\t\t\t\t\t\t<strong>{{ data.name }}</strong>
\t\t\t\t\t</span>
\t\t\t\t\t<ul class=\"dropdown-content\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"/profile/\" {{data.id }}>
\t\t\t\t\t\t\t\tMy profile</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/user/quizz/create\">Ajouter un quizz</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"/user/edit/\">Edit profile</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t{% if data.roles == \"ROLE_SUPERADMIN\" %}
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/superadmin/\">Voir les admins</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/superadmin/add/\">Ajouter un admin</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% if data.roles == \"ROLE_ADMIN\" %}
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/\">Voir les admins</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/add/\">Ajouter un admin</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% if data.roles == \"ROLE_ADMIN\" or data.roles == \"ROLE_SUPERADMIN\" %}
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/charts/\">Statistiques de connexion</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/charts/quizz\">Statistiques des quizz</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/emails/\">Envoyer un email</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/categorie/addform\">Ajouter une catégorie</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/categories/\">Gérer les categories</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/user/\">Gérer les utilisateurs</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"/admin/user/add\">Créer un utilisateur</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"/logout\">Logout</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</nav>
\t</div>
</header>
<hr class=\"style1\">
", "layout.html.twig", "/home/victor/Documents/quizz2/Quizz/templates/layout.html.twig");
    }
}
