<?php namespace Kodermax\Gallery\Components;
use Kodermax\Gallery\Models\Gallery as Galleries;
use Cms\Classes\ComponentBase;

class Gallery extends ComponentBase
{
    protected $galleryItems;
    public function componentDetails()
    {
        return [
            'name'        => 'kodermax.gallery::lang.idgallery.title',
            'description' => 'kodermax.gallery::lang.menu.description'
        ];
    }


    public function defineProperties()
    {
        return [
            'idGallery' => [
            'title'        => 'kodermax.gallery::lang.idgallery.title',
            'description'  => 'kodermax.gallery::lang.idgallery.description',
            'type'         => 'dropdown',
        ]
        ];
    }
    public function getidGalleryOptions()
    {
        return Galleries::select('id', 'name')->orderBy('name')->get()->lists('name', 'id');
    }
    public function galleryItems() {
        if ($this->galleryItems !== null)
            return $this->galleryItems;

        $gallery = new Galleries;
        $galleryItems = $gallery->where('id', '=', $this->property('idGallery'))->first();
        if ($galleryItems)
            $this->galleryItems = $galleryItems->images;

        return $this->galleryItems;
    }
    public function onRun()
    {
        $this->page['galleryItems'] = $this->galleryItems();
    }
}