<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use DateTime;
use App\Models\Course;
use App\Models\Person;
use App\Models\Post;
use App\Mail\Contact;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_active', '1')
                ->orderBy('publish_at', 'desc')
                ->take(6)
                ->get();
        
        $date = new DateTime;
        $formatted_date = $date->format('Y-m-d H:i:s');

        $events = Course::where([
                ['is_active', '1'],
            ])
            //->whereDate('end_at', '>=', $formatted_date)
            ->orderBy('start_at')
            ->take(6)
            ->get();
			
        return view('site.index', [
            'posts' => $posts,
            'events' => $events
        ]);
    }

    public function blog()
    {
        return view('site.blog.index');
    }

    public function projects()
    {
        return view('site.projects');
    }

    public function courses()
    {
        return view('site.courses');
    }

    public function content()
    {
        return view('site.content');
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function send(Request $req)
    {
        $firstname = $req->input('firstname');
        $lastname = $req->input('lastname');
        $email = $req->input('email');
        $phone = $req->input('phone');
        $message = $req->input('message');

        Mail::to(env("MAIL_TO"))->send(new Contact($firstname, $lastname, $email, $phone, $message));

        $client = new Client([ 'timeout'  => 5.0 ]);

        $response = $client->request('POST', env('DINAMIZE_API_URL'), [
            'form_params' => [
                'cmp1' => $email,
                'cmp2' => $firstname . ' ' . $lastname,
                'cmp4' => 'contato',
                'update_mode' => 'NA',
                'text-confirmation' => env('DINAMIZE_TOKEN')
            ]
        ]);


        return redirect()
            ->route('site.contact')
            ->with([
                'title' => 'Obrigado!',
                'message' => 'Sua mensagem foi enviada com sucesso. Nós vamos entrar em contato em breve!']);
    }

    public function register_newsletter(Request $req)
    {
        $name = $req->input('name');
        $email = $req->input('email');

        $client = new Client([ 'timeout'  => 5.0 ]);

        $response = $client->request('POST', env('DINAMIZE_API_URL'), [
            'form_params' => [
                'cmp1' => $email,
                'cmp2' => $name,
                'cmp4' => 'novidades',
                'update_mode' => 'NA',
                'text-confirmation' => env('DINAMIZE_TOKEN')
            ]
        ]);

        return redirect()
            ->route('site.index')
            ->with([
                'title' => 'Obrigado!',
                'message' => 'Seu e-mail foi cadastrado com sucesso na nossa newsletter!']);
    }


    public function readXml()
    {
        $temp = file_get_contents('/home/bororo25/exportacoes/boror25.wordpress.2017-09-26_quente.xml');
        $temp = mb_convert_encoding($temp, 'UTF-8');
        $xml = simplexml_load_string($temp);

        foreach ($xml->channel->item as $item) {

            $title = $item->title;
            $content = $item->children('http://purl.org/rss/1.0/modules/content/')->encoded;
            $slug = basename($item->xpath('wp:post_name')[0]);
            $created_at = Carbon::createFromTimestamp(strtotime($item->pubDate))->format('Y-m-d H:i:s');
            $banner_img = $item->xpath('wp:postmeta')[1]->xpath('wp:meta_value')[0];
            $description = mb_substr($content, 0, 150);
            $keywords_seo = 'bororo, bororó 25, espaço, produção, saúde';

            Post::create([
                'title' => $title,
                'publish_at' => $created_at,
                'slug' => $slug,
                'description' => $title,
                'is_active' => true,
                'description_seo' => $title,
                'keywords_seo' => $keywords_seo,
                'content' => $content
            ]);

            echo $slug . ' - ' . $item->xpath('wp:post_name')[0] . '<br>';
        }
    }

    public function readXml2()
    {
        $temp = file_get_contents('/home/bororo25/exportacoes/cursos-2-boror25.wordpress.2017-08-25.xml');
        $temp = mb_convert_encoding($temp, 'UTF-8');
        $xml = simplexml_load_string($temp);

        foreach ($xml->channel->item as $item) {

            $title = $item->title;
            $content = $item->children('http://purl.org/rss/1.0/modules/content/')->encoded;
            $slug = basename($item->xpath('wp:post_name')[0]);
            $created_at = Carbon::createFromTimestamp(strtotime($item->pubDate))->format('Y-m-d H:i:s');
            $banner_img = $item->xpath('wp:postmeta')[1]->xpath('wp:meta_value')[0];
            $description = mb_substr($content, 0, 150);
            $keywords_seo = 'bororo, bororó 25, espaço, produção, saúde';

            Course::create([
                'title' => $title,
                'description' => $title,
                'content' => $content,
                'start_at' => $created_at,
                'end_at' => $created_at,
                'start_time' => '19:00',
                'end_time' => '22:00',
                'description_seo' => $title,
                'keywords_seo' => $keywords_seo,
                'slug' => $slug,
                'address' => 'R. Bororó, 25 - Vila Assunção, Porto Alegre - RS, 91900-540, Brasil',
                'price' => 0,
                'latitude' => '-30.097172',
                'longitude' => '-51.252866',
                'location' => 'Espaço Bororó25',
                'duration' => '',
                'is_price_visible' => false,
                'is_active' => true
            ]);

            echo $item->title . '<br>';

        }
    }
}
