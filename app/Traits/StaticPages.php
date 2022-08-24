<?php


namespace App\Traits;

use App\Models\Page;


trait  StaticPages
{

    public $title;
    public $content;
    public $url;
    public $static;
    public $image;
    public $gallery;

    public function mount($url = null)
    {
        $this->retrieveContent($url);
    }

    /**
     * @param $url
     * @return void
     */

    public function retrieveContent($url)
    {

        if (empty($url)) {
            $data = Page::where('static', 'home')->first();
        }
            else
        {
            $last = request()->segment(count(request()->segments()));
            $data = Page::where('url', $last)->with('children','gallery')->first();
        }

        $this->title = $data->title;
        $this->content = $data->content;
        $this->url = $data->url;
        $this->static = $data->static;
        $this->image = $data->image;
        $this->gallery = $data->gallery;

    }


}

