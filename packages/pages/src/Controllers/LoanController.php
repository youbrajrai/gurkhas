<?php

namespace Pages\Controllers;

use Pages\Models\Loan;
use Illuminate\Http\Request;
use Admin\Models\InterestHead;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
class LoanController extends Controller
{
    public function index(){
        abort_if(Gate::denies('loan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $loans = Loan::all();
        $interestheads = InterestHead::all();
        return view('Pages::loan.index',compact('loans','interestheads'));
    }
    public function create(){
        abort_if(Gate::denies('loan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $interestheads = InterestHead::all();
        return view('Pages::loan.create',compact('interestheads'));
    }
    public function store(Request $request){
        $validation_rule =[
            'interest_head_id' => ['required','exists:interest_heads,id',
            Rule::unique('loans')->where(function($query) use($request){
                return $query->where('interest_head_id',$request->interest_head_id);
            })],
            'particulars' => ['required'],
            'interest_rate' => ['required'],

        ];
        $data = $request->validate($validation_rule);
        $interest_head_id = $data['interest_head_id'];
        $data = array(
            'particulars' =>$data['particulars'],
            'interest_rate'=>$data['interest_rate'],
        );
        $loan = new Loan;
        $loan->interest_head_id = $interest_head_id;
        $loan->particulars = json_encode($data['particulars']);
        $loan->interest_rate = json_encode($data['interest_rate']);
        $loan->save();
        return redirect()->route('fixeddeposit.index');
    }
    public function edit($id){
        abort_if(Gate::denies('loan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $loan = Loan::find($id);
        $interestheads = InterestHead::all();
        return view('Pages::loan.edit',compact('loan','interestheads'));
    }
    public function update(Request $request,$id){
        $validation_rule =[
            'interest_head_id' => ['required','exists:interest_heads,id',
            Rule::unique('loans')->where(function($query) use($request){
                return $query->where('interest_head_id',$request->interest_head_id);
            })->where("id","<>",$id)],
            'particulars' => ['required'],
            'interest_rate' => ['required'],

        ];
        $loan = Loan::find($id);
        $data = $request->validate($validation_rule);
        $interest_head_id = $data['interest_head_id'];
        $data = array(
            'particulars' =>$data['particulars'],
            'interest_rate'=>$data['interest_rate'],
        );
        $loan->interest_head_id = $interest_head_id;
        $loan->particulars = json_encode($data['particulars']);
        $loan->interest_rate = json_encode($data['interest_rate']);
        $loan->update();
        return redirect()->route('fixeddeposit.index');
    }
    public function destroy($id){
        abort_if(Gate::denies('loan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $loan = Loan::find($id);
        $loan->delete();
        return redirect()->route('fixeddeposit.index');
    }
}
