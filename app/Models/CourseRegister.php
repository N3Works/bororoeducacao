<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRegister extends Model
{
    //
    protected $table = 'course_register';

    public function getStatusDescription()
    {
        switch ($this->status) {
        	case 'N':
        		return 'Não Pago';
        		break;
        	case 'P':
        		return 'Pago';
        		break;
        	default:
        		return '';
        		break;
        }
    }
}
