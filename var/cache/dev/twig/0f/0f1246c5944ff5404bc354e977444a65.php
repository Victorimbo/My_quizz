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

/* quizz/show.html.twig */
class __TwigTemplate_4467c82621268551fe09d91695025606 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'Questions' => [$this, 'block_Questions'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "quizz/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "quizz/show.html.twig"));

        // line 2
        $this->displayBlock('Questions', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function block_Questions($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "Questions"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "Questions"));

        // line 3
        echo "    <h2>Answer the questions</h2>
        ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["questionPage"]) || array_key_exists("questionPage", $context) ? $context["questionPage"] : (function () { throw new RuntimeError('Variable "questionPage" does not exist.', 4, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["x"]) {
            // line 5
            echo "    <p>Score :";
            echo twig_escape_filter($this->env, (isset($context["score"]) || array_key_exists("score", $context) ? $context["score"] : (function () { throw new RuntimeError('Variable "score" does not exist.', 5, $this->source); })()), "html", null, true);
            echo "</p>
    <p>";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["x"], "question", [], "any", false, false, false, 6), "html", null, true);
            echo "</p>
                ";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["response"]) || array_key_exists("response", $context) ? $context["response"] : (function () { throw new RuntimeError('Variable "response" does not exist.', 7, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["y"]) {
                // line 8
                echo "                        <form action=\"/quizz/";
                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 8, $this->source); })()), "html", null, true);
                echo "\" method=\"post\">
                            <input type=\"hidden\" name=\"firstresult\" value=\"";
                // line 9
                echo twig_escape_filter($this->env, (isset($context["idquestion"]) || array_key_exists("idquestion", $context) ? $context["idquestion"] : (function () { throw new RuntimeError('Variable "idquestion" does not exist.', 9, $this->source); })()), "html", null, true);
                echo "\">
                            <input type=\"hidden\" name=\"response\" value=\"";
                // line 10
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["y"], "id", [], "any", false, false, false, 10), "html", null, true);
                echo "\">
                            <input type=\"hidden\" name=\"score\" value=\"";
                // line 11
                echo twig_escape_filter($this->env, (isset($context["score"]) || array_key_exists("score", $context) ? $context["score"] : (function () { throw new RuntimeError('Variable "score" does not exist.', 11, $this->source); })()), "html", null, true);
                echo "\">
                            <input type=\"submit\" value=\"";
                // line 12
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["y"], "reponse", [], "any", false, false, false, 12), "html", null, true);
                echo "\">
                        </form>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['y'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['x'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "quizz/show.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  109 => 15,  100 => 12,  96 => 11,  92 => 10,  88 => 9,  83 => 8,  79 => 7,  75 => 6,  70 => 5,  66 => 4,  63 => 3,  44 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# {% include 'layout.html.twig' %} #}
{% block Questions %}
    <h2>Answer the questions</h2>
        {% for x in questionPage %}
    <p>Score :{{ score }}</p>
    <p>{{ x.question }}</p>
                {% for y in response %}
                        <form action=\"/quizz/{{ id }}\" method=\"post\">
                            <input type=\"hidden\" name=\"firstresult\" value=\"{{ idquestion }}\">
                            <input type=\"hidden\" name=\"response\" value=\"{{ y.id }}\">
                            <input type=\"hidden\" name=\"score\" value=\"{{ score }}\">
                            <input type=\"submit\" value=\"{{ y.reponse }}\">
                        </form>
            {% endfor %}
        {% endfor %}
{% endblock %}", "quizz/show.html.twig", "/home/victor/Documents/quizz2/Quizz/templates/quizz/show.html.twig");
    }
}
