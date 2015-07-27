<?php namespace Kodermax\Gallery;

use Backend;
use System\Classes\PluginBase;

/**
 * Gallery Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'kodermax.gallery::lang.plugin.name',
            'description' => 'kodermax.gallery::lang.plugin.description',
            'author'      => 'Maksim Karpychev',
            'icon'        => 'icon-leaf'
        ];
    }
    public function registerComponents()
    {
        return [
            'Kodermax\Gallery\Components\Gallery' => 'gallery',
        ];
    }

    public function registerNavigation()
    {
        return [
            'gallery' => [
                'label' => 'kodermax.gallery::lang.menu.name',
                'description' => 'kodermax.gallery::lang.menu.description',
                'url'   => Backend::url('kodermax/gallery/galleries'),
                'icon'        => 'icon-picture-o',
                'permissions' => ['kodermax.*'],
                'order'       => 500,
            ],
        ];
    }


}
