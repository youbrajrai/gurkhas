<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function team()
    {
        return view('our_teams');
    }
    public function board()
    {
        return view('board');
    }
    public function branches()
    {
        return view('branches');
    }
    public function documents()
    {
        return view('documents');
    }
    public function SOC()
    {
        return view('standard_terrif');
    }
    public function circulars()
    {
        return view('circulars');
    }
    public function hr_circulars()
    {
        return view('hr_circulars');
    }
    public function admin_circulars()
    {
        return view('admin_circulars');
    }
    public function finance_circulars()
    {
        return view('finance_circulars');
    }
    public function rates_archive()
    {
        return view('rates_archive');
    }
    public function SOC_archive()
    {
        return view('standard_tarrif_archive');
    }
    public function interest_rate()
    {
        return view('interest_rate');
    }
    public function vendor_contacts_index()
    {
        return view('vendor_contacts');
    }
    public function comittee_aml_cft()
    {
        return view('comittee.aml_cft');
    }
    public function comittee_audit()
    {
        return view('comittee.audit');
    }
    public function comittee_executive_level()
    {
        return view('comittee.executive_level');
    }
    public function comittee_financial_administration()
    {
        return view('comittee.financial_administration');
    }
    public function comittee_head_of_department()
    {
        return view('comittee.head_of_department');
    }
    public function comittee_hr_facility()
    {
        return view('comittee.hr_facility');
    }
    public function comittee_risk_management()
    {
        return view('comittee.risk_management');
    }
}
