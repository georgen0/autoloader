<?php
function autoloader_routes_execute_handler()
{
    $routes = autoloader_routes_definitions();
    $request_method = strtoupper($_SERVER['REQUEST_METHOD']);
    $controllerClass = FALSE;
    $controllerAction = 'get';
    $actionArguments = array();
    $regex_routes = array();
    foreach ($routes as $route_path => $route_definition) {
        $segments = explode('/', $route_path);
        foreach ($segments as $index => &$segment) {
            // We have a dynamic parameter.
            if (strpos($segment, '{') !== FALSE) {
                $segment = str_replace(array('{', '}'), array('', ''), $segment);
                $segment_parts = explode(':', $segment);
                $routes_arguments[$route_path][$segment_parts[0]] = $index;
                $segment = $segment_parts[1];
            }
        }
        $regex_path = implode('/', $segments);
        $regex_path = str_replace('/', '\/', $regex_path);
        $regex_routes[$regex_path]['definition'] = $route_definition;
        $regex_routes[$regex_path]['original_route'] = $route_path;
    }
    foreach ($regex_routes as $regex => $routeInfo) {
        $routeDefinition = $routeInfo['definition'];
        if (preg_match('/^' . $regex . '$/', $_GET['q'])) {
            if (is_array($routeDefinition) && isset($routeDefinition[$request_method])) {
                $routeParts = explode('::', $routeDefinition[$request_method]);
            } else {
                $routeParts = explode('::', $routeDefinition);
            }
            if (!empty($routeParts)) {
                $controllerClass = $routeParts[0];
                if (isset($routeParts[1])) {
                    $controllerAction = $routeParts[1];
                }
            }
            if (!empty($routes_arguments[$routeInfo['original_route']])) {
                $path_segments = explode('/', $_GET['q']);
                foreach ($routes_arguments[$routeInfo['original_route']] as $argument_name => $index) {
                    $actionArguments[$argument_name] = $path_segments[$index];
                }
            }
        }
    }
    if ($controllerClass) {
        $controller = new $controllerClass();
        call_user_func_array(array($controller, $controllerAction), $actionArguments);
    } else {
        echo '404 not found';
    }
}

function autoloader_routes_definitions()
{
    return array(
        '/' => array(
            'GET' => 'Controllers\HomeController::homepage',
        ),
        '/home' => array(
            'GET' => 'Controllers\HomeController::homepage',
        ),
        '/login' => array(
            'GET' => 'Controllers\HomeController::loginPage',
            'POST' => 'Controllers\HomeController::loginAction',
        ),
        '/logout' => array(
            'GET' => 'Controllers\HomeController::logout',
        ),
        '/admin' => array(
            'GET' => 'Controllers\AdminController::adminPage',
        ),
        '/admin/manage-users' => array(
            'GET' => 'Controllers\AdminController::manageUsersPage',
        ),
        '/admin/settings' => array(
            'GET' => 'Controllers\AdminController::settingsPage',
        ),

    );
}
