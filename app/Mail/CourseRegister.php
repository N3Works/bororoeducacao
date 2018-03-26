<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CourseRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public $url;
    public $name;
    public $email;
    public $phone;
    public $cpf;
    public $birthday;
    public $address;
    public $complement;
    public $city;
    public $neighborhood;
    public $cep;
    public $description;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($course, $url, $name, $email, $phone, $cpf, $birthday, $address, $complement, $city, $neighborhood, $cep, $message)
    {
        $this->course = $course;
        $this->url = $url;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->cpf = $cpf;
        $this->birthday = $birthday;
        $this->address = $address;
        $this->complement = $complement;
        $this->city = $city;
        $this->neighborhood = $neighborhood;
        $this->cep = $cep;
        $this->description = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.course_register')
                    ->subject('Matrícula de Curso')
                    ->with(['course' => $this->course,
                            'url' => $this->url,
                            'name' => $this->name,
                            'email' => $this->email,
                            'phone' => $this->phone,
                            'cpf' => $this->cpf,
                            'birthday' => $this->birthday,
                            'address' => $this->address,
                            'complement' => $this->complement,
                            'city' => $this->city,
                            'neighborhood' => $this->neighborhood,
                            'cep' => $this->cep,
                            'description' => $this->description]);
    }
}
