<?php

namespace App\Http\Controllers;

use App\Models\AdditionalContent;
use App\Models\NewsLettersUser;
use App\Models\Page;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function home()
    {

        //PromoCards's Data

        $promosData = [
            [
                'title' => "Idées innovantes",
                'images' => [
                    'original' => "assets/images/icons/promo/lightbulb.png",
                    'gradient' => "assets/images/icons/promo/lightbulb-gradient.png"
                ],
                'text' => "Nous sommes une équipe experimentée pétrie de talent avec des idées
                novatrices contribuant à  l'évolution du taux d'insertion socio-professionnelle."
            ],
            [
                'title' => "Sécurisé et privé",
                'images' => [
                    'original' => "assets/images/icons/promo/cyber-security.png",
                    'gradient' => "assets/images/icons/promo/cyber-security-gradient.png"
                ],
                'text' => "Nous vous garantissons une securite maximale de vos donnees et une meilleure
                experience utilisateur sans faille."
            ],
            [
                'title' => "Hautes Compétences",
                'images' => [
                    'original' => "assets/images/icons/promo/skills.png",
                    'gradient' => "assets/images/icons/promo/skills-gradient.png"
                ],
                'text' => "Nous regroupons des cours et des formateurs de tres hauts niveau
                venu de tous les quatres coin du globe."
            ],
            [
                'title' => "Support 24h/24 & 7j/7",
                'images' => [
                    'original' => "assets/images/icons/promo/conversation.png",
                    'gradient' => "assets/images/icons/promo/conversation-gradient.png"
                ],
                'text' => "Nous vous offrons une assistance afin d'etre plus proche de vous."
            ],
            [
                'title' => "Coût abordable",
                'images' => [
                    'original' => "assets/images/icons/promo/budget.png",
                    'gradient' => "assets/images/icons/promo/budget-gradient.png"
                ],
                'text' => "Des formations et des certifications a des coups super competitifs
                dans le marche."
            ],
            [
                'title' => "Bonne solution",
                'images' => [
                    'original' => "assets/images/icons/promo/puzzle.png",
                    'gradient' => "assets/images/icons/promo/puzzle-gradient.png"
                ],
                'text' => "Une solution numerique qui vient facilite votre apprentissagee
                et votre insertion socio-professionnelle."
            ],
        ];

        $additionalContents = [];

        $additionalContentsCollection = Collection::unwrap(AdditionalContent::where('page_id', 1)->get());

        foreach ($additionalContentsCollection as $additionalContent) {
            array_push($additionalContents, $additionalContent);
        }

        $partners = Partner::all();
        $services = Page::find(2)->subpages;

        return view('pages.home', [
            'additionalContents' => $additionalContents,
            'partners' => $partners,
            'promosData' => $promosData,
            'services' => $services,
            'testimonials' => [],
            'articles' => []
        ]);
    }

    public function services() {
        $services = Page::find(2)->subpages;
        return view('pages.services', ['services' => $services]);
    }

    public function programs() {
        $programs = Page::find(3)->subpages;
        return view('pages.programs', ['programs' => $programs]);
    }

    public function about() {
        $partners = Partner::all();
        $additionalContents = [];
        $teamMembers = User::where('id', '!=', 1, 'AND', 'id', '!=', 2)->get();

        $additionalContentsCollection = Collection::unwrap(AdditionalContent::where('page_id', 4)->get());

        foreach ($additionalContentsCollection as $additionalContent) {
            $additionalContents[$additionalContent->name] = [
                'title' => $additionalContent->name,
                'content' => $additionalContent->content,
            ];
        }

        return view('pages.about', [
            'additionalContents' => $additionalContents,
            'partners' => $partners,
            'teamMembers' => $teamMembers,
            'testimonials' => []
        ]);
    }

    public function contact() {
        return view('pages.contact');
    }

    public function devis() {
        return view('pages.devis');
    }

    public function newsletter() {
        return view('pages.newsletter');
    }

    public function subscribeNewsletters(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Une erreur est survénu lors de l'inscription!");

        NewsLettersUser::create($request->only(['name', 'email']));

        return redirect()->back()->with('succès', "Votre inscription a été un succès!");
    }
}
