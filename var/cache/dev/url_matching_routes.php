<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/emails' => [[['_route' => 'app_emails_admin', '_controller' => 'App\\Controller\\AdminController::emailAdmin'], null, null, null, false, false, null]],
        '/admin/categories' => [[['_route' => 'app_categories_admin', '_controller' => 'App\\Controller\\AdminController::categoriesAdmin'], null, null, null, false, false, null]],
        '/admin/categories/edit' => [[['_route' => 'app_categories_edited_admin', '_controller' => 'App\\Controller\\AdminController::editedCategoriesAdmin'], null, null, null, true, false, null]],
        '/admin/reponse/edited' => [[['_route' => 'app_reponse_edited_admin', '_controller' => 'App\\Controller\\AdminController::editedReponseAdmin'], null, null, null, true, false, null]],
        '/admin/question/edited' => [[['_route' => 'app_question_edited_admin', '_controller' => 'App\\Controller\\AdminController::editedQuestionAdmin'], null, null, null, true, false, null]],
        '/admin' => [[['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/admin/add' => [[['_route' => 'app_add_admin', '_controller' => 'App\\Controller\\AdminController::addform'], null, null, null, false, false, null]],
        '/admin/user' => [[['_route' => 'app_add_dadmin', '_controller' => 'App\\Controller\\AdminController::addFormUser'], null, null, null, true, false, null]],
        '/admin/user/add' => [[['_route' => 'app_adduser_dadmin', '_controller' => 'App\\Controller\\AdminController::adduserFormUser'], null, null, null, false, false, null]],
        '/admin/user/modif' => [[['_route' => 'app_dadddd_admin', '_controller' => 'App\\Controller\\AdminController::modifUserDb'], null, null, null, true, false, null]],
        '/admin/user/search' => [[['_route' => 'app_search_admin', '_controller' => 'App\\Controller\\AdminController::searchFormUser'], null, null, null, true, false, null]],
        '/admin/user/added' => [[['_route' => 'app_add_createuser_admin', '_controller' => 'App\\Controller\\AdminController::addUserIndb'], null, null, null, false, false, null]],
        '/admin/categorie/addform' => [[['_route' => 'app_created_categorie_quizz', '_controller' => 'App\\Controller\\AdminController::createdCategories'], null, null, null, true, false, null]],
        '/admin/categorie/add' => [[['_route' => 'app_created_categories_quizz', '_controller' => 'App\\Controller\\AdminController::createdCategoriesDb'], null, null, null, true, false, null]],
        '/email' => [[['_route' => 'app_email_sendemail', '_controller' => 'App\\Controller\\EmailController::sendEmail'], null, null, null, false, false, null]],
        '/emailold' => [[['_route' => 'app_email_sendemailold', '_controller' => 'App\\Controller\\EmailController::sendEmailOld'], null, null, null, false, false, null]],
        '/user/quizz/create' => [[['_route' => 'app_create_quizz', '_controller' => 'App\\Controller\\QuizzController::create'], null, null, null, false, false, null]],
        '/user/question/addto' => [[['_route' => 'app_created_questions_quizz', '_controller' => 'App\\Controller\\QuizzController::createdQuestionDb'], null, null, null, true, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/verify/email' => [[['_route' => 'app_verify_email', '_controller' => 'App\\Controller\\RegistrationController::verifyUserEmail'], null, null, null, false, false, null]],
        '/request-verify-email' => [[['_route' => 'app_request_verify_email', '_controller' => 'App\\Controller\\RegistrationController::requestVerifyUserEmail'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/superadmin' => [[['_route' => 'app_super_admin', '_controller' => 'App\\Controller\\SuperAdminController::index'], null, null, null, false, false, null]],
        '/superadmin/add' => [[['_route' => 'app_add_supers_admin', '_controller' => 'App\\Controller\\SuperAdminController::addform'], null, null, null, false, false, null]],
        '/superadmin/search' => [[['_route' => 'app_search_super_admin', '_controller' => 'App\\Controller\\SuperAdminController::searchform'], null, null, null, true, false, null]],
        '/' => [[['_route' => 'homepageuser', '_controller' => 'App\\Controller\\UserController::homeUser'], null, null, null, false, false, null]],
        '/user' => [[['_route' => 'userhome', '_controller' => 'App\\Controller\\UserController::homepage'], null, ['GET' => 0], null, false, false, null]],
        '/user/edit' => [
            [['_route' => 'userdit', '_controller' => 'App\\Controller\\UserController::edit'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'userdb', '_controller' => 'App\\Controller\\UserController::editdb'], null, ['POST' => 0], null, true, false, null],
        ],
        '/profile' => [[['_route' => 'userprofil', '_controller' => 'App\\Controller\\UserController::profile'], null, null, null, true, false, null]],
        '/quizz' => [[['_route' => 'quizz', '_controller' => 'App\\Controller\\QuizzController::displayAction'], null, null, null, false, false, null]],
        '/resume' => [[['_route' => 'resume', '_controller' => 'App\\Controller\\QuizzController::resume'], null, null, null, false, false, null]],
        '/user/history' => [[['_route' => 'userHistory', '_controller' => 'App\\Controller\\HistoryController::sessionHistory'], null, null, null, false, false, null]],
        '/charts' => [[['_route' => 'charts', '_controller' => 'App\\Controller\\ChartsController::showCharts'], null, null, null, false, false, null]],
        '/charts/quizz' => [[['_route' => 'chartsQuizzList', '_controller' => 'App\\Controller\\ChartsController::showQuizzList'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|categories/(?'
                        .'|edit/([^/]++)(*:206)'
                        .'|delete/([^/]++)(*:229)'
                    .')'
                    .'|edit/(?'
                        .'|question/([^/]++)(*:263)'
                        .'|reponse/([^/]++)(*:287)'
                    .')'
                    .'|delete/(?'
                        .'|question/([^/]++)(*:323)'
                        .'|reponse/([^/]++)(*:347)'
                    .')'
                    .'|user/(?'
                        .'|modif/([^/]++)(*:378)'
                        .'|delete/([^/]++)(*:401)'
                        .'|old/([^/]++)(*:421)'
                        .'|new/([^/]++)(*:441)'
                    .')'
                .')'
                .'|/email/send(?'
                    .'|old/([^/]++)/([^/]++)(*:486)'
                    .'|new/([^/]++)/([^/]++)(*:515)'
                .')'
                .'|/user/question/add/([^/]++)(*:551)'
                .'|/superadmin/(?'
                    .'|add/([^/]++)(*:586)'
                    .'|revoke/([^/]++)(*:609)'
                .')'
                .'|/quizz/([^/]++)(*:633)'
                .'|/charts/quizz/([^/]++)(*:663)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        206 => [[['_route' => 'app_categories_edit_admin', '_controller' => 'App\\Controller\\AdminController::editCategoriesAdmin'], ['id'], null, null, false, true, null]],
        229 => [[['_route' => 'app_categories_delete_admin', '_controller' => 'App\\Controller\\AdminController::deleteCategoriesAdmin'], ['id'], null, null, false, true, null]],
        263 => [[['_route' => 'app_question_edit_admin', '_controller' => 'App\\Controller\\AdminController::editQuestionAdmin'], ['id'], null, null, false, true, null]],
        287 => [[['_route' => 'app_reponse_edit_admin', '_controller' => 'App\\Controller\\AdminController::editReponseAdmin'], ['id'], null, null, false, true, null]],
        323 => [[['_route' => 'app_question_delete_admin', '_controller' => 'App\\Controller\\AdminController::deleteQuestionAdmin'], ['id'], null, null, false, true, null]],
        347 => [[['_route' => 'app_reponse_delete_admin', '_controller' => 'App\\Controller\\AdminController::deleteReponseAdmin'], ['id'], null, null, false, true, null]],
        378 => [[['_route' => 'app_addd_admin', '_controller' => 'App\\Controller\\AdminController::modifUser'], ['id'], null, null, false, true, null]],
        401 => [[['_route' => 'app_adddd_admin', '_controller' => 'App\\Controller\\AdminController::deleteUserDb'], ['id'], null, null, false, true, null]],
        421 => [[['_route' => 'app_add_id_admin', '_controller' => 'App\\Controller\\AdminController::quizzOld'], ['id'], null, null, false, true, null]],
        441 => [[['_route' => 'app_add_old_id_admin', '_controller' => 'App\\Controller\\AdminController::quizzNew'], ['id'], null, null, false, true, null]],
        486 => [[['_route' => 'app_email_sendemailtouser', '_controller' => 'App\\Controller\\EmailController::sendEmailToUser'], ['iduser', 'idquizz'], null, null, false, true, null]],
        515 => [[['_route' => 'app_email_sendemailtousernew', '_controller' => 'App\\Controller\\EmailController::sendEmailToUserNew'], ['iduser', 'idquizz'], null, null, false, true, null]],
        551 => [[['_route' => 'app_create_question_quizz', '_controller' => 'App\\Controller\\QuizzController::createQuestion'], ['id'], null, null, false, true, null]],
        586 => [[['_route' => 'app_add_id_super_admin', '_controller' => 'App\\Controller\\SuperAdminController::adddbform'], ['id'], null, null, false, true, null]],
        609 => [[['_route' => 'app_super_admin_remove', '_controller' => 'App\\Controller\\SuperAdminController::remove'], ['id'], null, null, false, true, null]],
        633 => [[['_route' => 'quizzId', '_controller' => 'App\\Controller\\QuizzController::show'], ['id'], null, null, false, true, null]],
        663 => [
            [['_route' => 'chartsQuizz', '_controller' => 'App\\Controller\\ChartsController::showQuizzCharts'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
