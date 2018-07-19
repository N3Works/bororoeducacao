<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\Course;
use App\Models\CourseRegister;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    public function index()
    {
        $date = new DateTime;
        $formatted_date = $date->format('Y-m-d');

        $next = Course::where([
                ['is_active', '1'],
            ])
            ->whereDate('end_at', '>=', $formatted_date)
            ->orderBy('start_at')
            ->take(10)
            ->get();

        $last = Course::where([
                ['is_active', '1'],
            ])
            ->whereDate('end_at', '<', $formatted_date)
            ->orderBy('end_at', 'desc')
            ->get();

        return view('site.events.index', [
            'next' => $next,
            'last' => $last
        ]);
    }

    public function detail($id)
    {
        $event = Course::where('id', $id)->first();

        return view('site.events.detail', [
            'model' => $event
        ]);
    }

    public function save(Request $req, $slug)
    {
    	$event = Course::where('slug', $slug)->first();

    	if ($event) {
    		$register = new CourseRegister;
    		$register->course_id = $event->id;
    		$register->name = $req->input('name');
	        $register->phone = $req->input('phone');
	        $register->email = $req->input('email');
	        $register->cpf = $req->input('cpf');
	        $register->status = 'N';
	        $register->save();

            $client = new Client([ 'timeout'  => 5.0 ]);

            $response = $client->request('POST', env('DINAMIZE_API_URL'), [
                'form_params' => [
                    'cmp1' => $register->email,
                    'cmp2' => $register->name,
                    'cmp4' => 'eventos',
                    'update_mode' => 'NA',
                    'text-confirmation' => env('DINAMIZE_TOKEN')
                ]
            ]);

			return redirect()
            ->route('site.events.detail', $slug)
            ->with([
                'registered' => true,
            ]);	        
	    }

        return redirect()
            ->route('site.events');
    }
}
