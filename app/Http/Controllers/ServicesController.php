<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\Seo;

class ServicesController extends Controller
{
    public function index(Request $request, $locale = 'fr', $url = NULL){
        // Get data from middleware
        $data = $request->data;

        if($url == NULL){
            // Get seo data
            $seo = Seo::where('page', 'services')->first();

            $data['seo'] = $seo;

            if(app()->getLocale() == 'fr'){
                $data['servicesList'] = [
                    [
                        'icon' => 'Depannage_16152016011.png',
                        'img' => 'Depannage_16152882152.jpg',
                        'title' => 'Réparation et installation de chaudières',
                        'description' => 'Assurez-vous que votre maison reste chaude et efficace avec nos services d’experts en chaudières. Que vous ayez besoin d’une réparation rapide ou d’une installation complète, nos techniciens certifiés fournissent des solutions fiables adaptées à vos besoins.',
                        'url' => 'boilers'
                    ],
                    [
                        'icon' => 'Depannage_16152015871.png',
                        'img'  => 'Depannage_16152883352.jpg',
                        'title' => 'Réparation et installation de serrures, serrurier',
                        'description' => 'Vous êtes enfermé dehors ou vous avez besoin de renforcer la sécurité de votre domicile ? Nos serruriers sont prêts à vous aider avec des services rapides et sécurisés de réparation et d’installation de serrures, assurant votre tranquillité d’esprit.',
                        'url' => 'locksmith'
                    ],
                    [
                        'icon' => 'Depannage_16152015651.png',
                        'img' => 'Depannage_16152884012.png',
                        'title' => 'Électriciens',
                        'description' => 'De la réparation de câblages défectueux à l’installation de nouveaux éclairages, nos électriciens agréés fournissent des services électriques de haute qualité qui assurent la sécurité et le bon fonctionnement de votre maison.',
                        'url' => 'electricity'
                    ],
                    [
                        'icon' => 'Depannage_16152015381.png',
                        'img' => 'Depannage_16152884482.jpg',
                        'title' => 'Plombier',
                        'description' => 'Ne laissez pas les problèmes de plomberie perturber votre journée. Nos plombiers qualifiés sont disponibles pour s’occuper de tout, des fuites aux installations complètes, en offrant un service fiable quand vous en avez le plus besoin.',
                        'url' => 'plumber'
                    ],
                ];
            }
            else {
                $data['servicesList'] = [
                    [
                        'icon' => 'Depannage_16152016011.png',
                        'img' => 'Depannage_16152882152.jpg',
                        'title' => 'Boiler Repair and Installation',
                        'description' => 'Experiencing boiler issues or planning a new installation? Trust our experts to keep your home warm and efficient. Get reliable service today. Click for more information!',
                        'url' => 'boilers'
                    ],
                    [
                        'icon' => 'Depannage_16152015871.png',
                        'img'  => 'Depannage_16152883352.jpg',
                        'title' => 'Lock Repair and Installation, Locksmith',
                        'description' => 'Locked out or need to upgrade your home’s security? Our skilled locksmiths provide fast, secure lock repairs and installations. Don’t wait—get the help you need now. Click for more information',
                        'url' => 'locksmith'
                    ],
                    [
                        'icon' => 'Depannage_16152015651.png',
                        'img' => 'Depannage_16152884012.png',
                        'title' => 'Electricians',
                        'description' => 'Ensure your home’s electrical system is safe and functioning properly with our expert electricians. From repairs to new installations, we handle it all. Discover dependable service. Click for more information!',
                        'url' => 'electricity'
                    ],
                    [
                        'icon' => 'Depannage_16152015381.png',
                        'img' => 'Depannage_16152884482.jpg',
                        'title' => 'Plumber',
                        'description' => 'Dealing with a leak or a plumbing issue? Our experienced plumbers are ready to resolve any problem, big or small. Get prompt, professional service. Click for more information!',
                        'url' => 'plumber'
                    ],
                ];
            }

            // Senda data to view
            return view('pages.services-list')->with($data);
        }else{
            // Get service data
            $service = Services::where('url', $url)->first();

            $data['service'] = $service;

            // Senda data to view
            return view('pages.service-detail')->with($data);
        }
    }

    public function search(Request $request){
        // Get data from middleware
        $data = $request->data;

        // Get services data
        $services = Services::with('items')->
        where('title_en', 'LIKE', '%'.$request->search.'%')->
        orWhere('title_ru', 'LIKE', '%'.$request->search.'%')->
        orWhere('title_fr', 'LIKE', '%'.$request->search.'%')->
        orderBy('position_id', 'desc')->get();

        // Get seo data
        $seo = Seo::where('page', 'services')->first();

        // Push data
        $data['services'] = $services;
        $data['seo'] = $seo;

        // Senda data to view
        return view('pages.services-list')->with($data);
    }
}
