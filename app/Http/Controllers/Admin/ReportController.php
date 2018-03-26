<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\CourseRegister;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index(Request $req)
    {
        $course_id = $req->input('course_id');

        $course_id_filter = $req->query('course_id_filter');
        $name = $req->query('name');
        $email = $req->query('email');
        $cpf = $req->query('cpf');
        $status = $req->query('status');

        $filter = \DataFilter::source(new CourseRegister());
        $filter->text('course_id_filter', 'course_id_filter', 'hidden');
        $filter->text('download', 'download', 'hidden');
        $filter->text('name', 'Nome');
        $filter->text('email', 'E-mail');
        $filter->text('cpf', 'CPF');
        $filter->text('status', 'Status', 'select')->options(['Status...', 'Não Pago', 'Pago']);
        $filter->submit('Pesquisar');
        $filter->reset('Limpar');
        $filter->link(route('admin.report.download', ($course_id ? $course_id : ($course_id_filter ? $course_id_filter : 0))), 'Download', 'TR');
        $filter->build();

        $dataset = CourseRegister::where('course_id', ($course_id ? $course_id : ($course_id_filter ? $course_id_filter : 0)))
            ->when($name, function ($query) use ($name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->when($email, function ($query) use ($email) {
                return $query->where('email', '=', $email);
            })
            ->when($cpf, function ($query) use ($cpf) {
                return $query->where('cpf', '=', $cpf);
            })
            ->when($status, function ($query) use ($status) {
                if ($status == '1')
                    return $query->where('status', '=', 'N');
                else if ($status == '2')
                    return $query->where('status', '=', 'P');
            });

        $grid = \DataGrid::source($dataset);  //same source types of DataSet

        $grid->add('name', 'Nome', true); //field name, label, sortable
        $grid->add('email', 'E-mail', true);
        $grid->add('phone', 'Telefone');
        $grid->add('cpf', 'CPF');
        $grid->add('status', 'Status', true)->cell(function ($value, $row) {
            if ($value == 'N')
                return 'Não Pago';
            else if ($value == 'P')
                return 'Pago';
        });

        $grid->add('created_at|strtotime|date[d/m/Y H:i]', 'Data', true);

        //cell closure
        $grid->add('actions', 'Ações')->cell(function ($value, $row) {
            return '<a href="#" class="btn btn-sm btn-remove btn-danger" data-id="' . $row->id . '"><i class="fa fa-trash"></i></a>';
        });

        $grid->attributes(array("class" => "table table-striped"));
        $grid->orderBy('id', 'desc'); //default orderby
        $grid->paginate(10); //pagination

        $events = Course::where('is_active', 1)
            ->orderBy('end_at', 'desc')
            ->get();

        $course_id = ($course_id ? $course_id : ($course_id_filter ? $course_id_filter : ''));

        return view('admin.report.index', compact('filter', 'grid', 'events', 'course_id'));
    }

    public function download_csv($id)
    {
        if ($id == 0) {
            return redirect()->route('admin.report.index');
        }

        $dataset = CourseRegister::where('course_id', $id);
        $grid = \DataGrid::source($dataset);  //same source types of DataSet

        $grid->add('name', 'Nome', true); //field name, label, sortable
        $grid->add('email', 'E-mail', true);
        $grid->add('phone', 'Telefone');
        $grid->add('cpf', 'CPF');
        $grid->add('status', 'Status', true)->cell(function ($value, $row) {
            if ($value == 'N')
                return 'Não Pago';
            else if ($value == 'P')
                return 'Pago';
        });
        $grid->add('created_at|strtotime|date[d/m/Y H:i]', 'Data', true);

        $grid->orderBy('id', 'desc'); //default orderby

        $grid->buildCSV();  //  force download 
        $grid->buildCSV('uploads/relatorio-matricula-evento');  // write on file

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return response()->download('uploads/relatorio-matricula-evento.csv', 'relatorio-matricula-evento.csv', $headers);
        // return $grid->buildCSV('uploads/relatorio-matricula-evento');
    }


    public function remove(Request $req, $id)
    {
        CourseRegister::find($id)->delete();
        return response(200);
    }

}
