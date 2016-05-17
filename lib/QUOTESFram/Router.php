<?php
namespace QUOTESFram;

/**
* This class stores the url route from the xml file and send it to the application. 
*/

class Router
{
	protected $routes = []; // the array for all routes.

	const NO_ROUTE = 1; //?

	/**
	* we add each routes to the array.
	* @param An instance of the class "Route"
 	*/
 	public function addRoute(Route $route)
 	{
 		if(!in_array($route, $this->routes))// if the route doesn't exist.
 		{ 
 			$this->routes[] = $route; // The array routes will receive the new route.
 		}
 	}

 	/**
 	* Get the matched route.
 	* @param the url that will contain the right module and action.
 	* @return return the route.
 	*/
 	public function getRoute($url)
 	{	
 		foreach ($this->routes as $route) 
 		{ // loop on the routes array.
 			
 			// If the route matches.
 			if(( $varsValues = $route->match($url)) !== false) /*see the match methode in the Route class*/
 			{
 				// if the route has any variables
 				if($route->hasVars()) /* see the hasVars method in the Route classe.*/
 				{	
 					//get the var names
 					$varsNames = $routes->varsNames(); /* see the varsName methode in the Route classe.*/
 					$listvars = [];

 					// we Loop on the varsValues array.
 					foreach ($varsValues as $key => $match) 
 					{
 						# $key is the name of the variables.
 						# $value is the value.
 						if($key !== 0) // if the key exist
 						{
 							$listvars[$varsNames[$key - 1]] = $match;
 						}
 					}
 					//Let assign the variable the corresponding route.
 					$route->setVars($listvars); /* see the setVars method in the Route class*/
 				}
 				return $route; /*value to test !*/
 			}	
 		}
 		throw new \RuntimeException('The URL doens\'t match', self::NO_ROUTE);
 	}
}
?>