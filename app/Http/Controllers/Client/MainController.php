<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\About;
use App\Models\ProductGroup;
use App\Models\Product;
use App\Models\WhyUs;
use App\Models\Special;
use App\Models\Event;
use App\Models\Gallery;
class MainController extends Controller
{
    private $about;
    private $product_group;
    private $product;
    private $why_us;
    private $special;
    private $event;
    private $gallery;
    
    public function __construct(){
        $this->about = new About();
        $this->product_group = new ProductGroup();
        $this->product = new Product();
        $this->why_us = new WhyUs();
        $this->special = new Special();
        $this->event = new Event();
        $this->gallery = new Gallery();
    }
    public function index(){
        $about_list = $this->about->getAllActive();
        $product_group_list = $this->product_group->getAllActive();
        $product_list = $this->product->getAll();
        $why_us_list = $this->why_us->getAllActive();
        $special_list = $this->special->getAllActive();
        $event_list = $this->event->getAllActive();
        $gallery_list = $this->gallery->getAllActive();
        return view('client.main', compact('about_list', 'product_group_list', 'product_list', 'why_us_list', 'special_list', 'event_list', 'gallery_list'));
    }
}
