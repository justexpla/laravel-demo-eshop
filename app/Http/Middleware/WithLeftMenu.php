<?php

namespace App\Http\Middleware;

use App\Menus\Shop\Left\BaseLeftMenu;
use App\Repositories\Shop\CategoriesRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use function Symfony\Component\Translation\t;

/**
 * Middleware includes left-menu on page. View name and items data write to request
 *
 * Class WithLeftMenu
 * @package App\Http\Middleware
 */
class WithLeftMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $class)
    {
        $menu = $this->getMenuClass($class);

        $this->checkIfViewExists($menu->getMenuView());

        $request->attributes->add([
            'leftMenuData' => $menu->getMenuData(),
            'leftMenuView' => $menu->getMenuView()
        ]);

        return $next($request);
    }

    /**
     * Method tries to find Left menu class
     *
     * @param string $className
     * @return BaseLeftMenu
     */
    protected function getMenuClass(string $className): BaseLeftMenu
    {
        $className = Str::studly($className) . 'Menu';

        try {
            $class = new (BaseLeftMenu::getNamespace() . '\\' . $className);

            if (! $class instanceof BaseLeftMenu) {
                throw new \DomainException("{$className} is not a left-menu class");
            }

            return $class;
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Method throws error if left menu view doesn't exists
     *
     * @param string $view
     */
    protected function checkIfViewExists(string $view): void
    {
        if(!$result = \View::exists($view)) {
            abort(500, "View {$view} of left-menu doesn't exists");
        };
    }
}
