<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExportMonthlyReportMonthYear;
use App\Models\DepartmentLevels;
use App\Models\Documents;
use App\Models\Requests;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CodexWorld\PhpXlsxGenerator;

class ExportReport extends Controller
{
    public function exportReport() {
        if (Auth::user()->role === 'admin') {
            return view('admin.export-report');
        } else {
            return redirect('/dashboard');
        }
    }

    public function exportMonthlyReportProcess(ExportMonthlyReportMonthYear $request) {
        require 'PhpXlsxGenerator.php';

        $requests = Requests::whereMonth('created_at', $request->month)->whereYear('created_at', $request->year)->get();
        $excelArray = array(
            array("NAME" => "Report of the year ".$request->year." and month of ". Carbon::createFromFormat('m', $request->month)->format('F')."", "Phone" => "", "DOCUMENT" => "", "SLS" => "", "SY" => "", "RB" => ""),
            array("NAME" => "Name", "Phone" => "Phone Number", "DOCUMENT" => "Document", "SLS" => "Department and Level", "SY" => "School Year Graduated", "RM" => "Remarks", "RD" => "Date Requested")
        );

        foreach ($requests as $key => $value) {

                array_push($excelArray, array(
                    "NAME" => User::where('id', $value['userid'])->value('name'),
                    "Phone" => $value['phonenumber'],
                    "DOCUMENT" => Documents::where('id', $value['documentid'])->value('document'),
                    "SLS" => DepartmentLevels::where('id', $value['departmentlevelid'])->value('departmentlevel'),
                    "SY" => $value['schoolyeargraduated'],
                    "RM" => $value['remarks'],
                    "DR" => Carbon::parse($value['created_at'])->format('l, F j Y')
                ));

        }

        $xlsx = PhpXlsxGenerator::fromArray($excelArray);
        $fileName = "SFC_Monthly_Report_".$request->year." ".Carbon::createFromFormat('m', $request->month)->format('F') ."_". date('Ymd') . ".xlsx";
        $xlsx->downloadAs($fileName);

    }

    public function exportData($id) {
        require 'PhpXlsxGenerator.php';

        $request = Requests::where('id', $id)->first();
        $excelArray = array(
            array("NAME" => "Request of: ".User::where('id', $request->userid)->value('name'), "Phone" => "", "DOCUMENT" => "", "SLS" => "", "SY" => "", "RB" => ""),
            array("NAME" => "Name", "Phone" => "Phone Number", "DOCUMENT" => "Document", "SLS" => "Department and Level", "SY" => "School Year Graduated", "RM" => "Remarks", "RD" => "Date Requested")
        );

        // foreach ($requests as $key => $value) {

                array_push($excelArray, array(
                    "NAME" => User::where('id', $request->userid)->value('name'),
                    "Phone" => $request->phonenumber,
                    "DOCUMENT" => Documents::where('id', $request->documentid)->value('document'),
                    "SLS" => DepartmentLevels::where('id', $request->departmentlevelid)->value('departmentlevel'),
                    "SY" => $request->schoolyeargraduated,
                    "RM" => $request->remarks,
                    "DR" => Carbon::parse($request->created_at)->format('l, F j Y')
                ));

        // }

        $xlsx = PhpXlsxGenerator::fromArray($excelArray);
        $fileName = "Request Data of ".User::where('id', $request->userid)->value('name')."_". date('Ymd') . ".xlsx";
        $xlsx->downloadAs($fileName);

    }
}
