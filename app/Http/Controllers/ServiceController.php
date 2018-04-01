<?php

namespace App\Http\Controllers;
use App\Models\Resources;
use App\Models\Person;
use App\Mail\Contact;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Log;

class ServiceController extends Controller
{
    public function livros()
    {
        return view('site.services.livros');
    }

    public function ebooks()
    {
        $ebooks = Resources::where('is_active', '1')
                            ->get();

        return view('site.services.ebooks', [
            'ebooks' => $ebooks
        ]);
    }

    public function ead()
    {
        return view('site.services.ead');
    }

    public function trabalho_terapeutico()
    {
        $models = Person::where('is_partner', true)->orderBy('position')->get();
        return view('site.services.trabalho_terapeutico', [
            'models' => $models
        ]);
    }

    public function bororo_solidario()
    {
        return view('site.services.bororo_solidario');
    }

    public function espaco_terapeutico()
    {
        return view('site.services.espaco_terapeutico');
    }

    public function coworking_b25()
    {
        $persons = Person::orderBy('position')->get();
        return view('site.services.coworking_b25', [
            'persons' => $persons
        ]);
    }

    public function parceiros()
    {
        $persons = Person::where('is_partner', true)->orderBy('position')->get();
        return view('site.services.parceiros', [
            'persons' => $persons
        ]);
    }

    public function produtos()
    {
        return view('site.services.produtos');
    }

    public function tge()
    {
        return view('site.services.tge');
    }

    public function cursos()
    {
        return view('site.services.cursos');
    }

    public function grupo_reflexao()
    {
        return view('site.services.grupo_reflexao');
    }

    public function ebook_download(Request $req)
    {
        $name = $req->input('name');
        $email = $req->input('email');
        $slug = $req->input('slug');

        $client = new Client([ 'timeout'  => 5.0 ]);

        $response = $client->request('POST', env('DINAMIZE_API_URL'), [
            'form_params' => [
                'cmp1' => $email,
                'cmp2' => $name,
                'cmp4' => 'ebook',
                'update_mode' => 'NA',
                'text-confirmation' => env('DINAMIZE_TOKEN')
            ]
        ]);

        return redirect(route('resources.download', $slug));
    }
}
