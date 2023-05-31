<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use Admin\Models\InterestHead;
use Illuminate\Validation\Rule;
use Pages\Models\SavingDeposit;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class SavingDepositController extends Controller
{
    public function index(){
        abort_if(Gate::denies('savingdeposit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $savingdeposits = SavingDeposit::all();
        $interestheads = InterestHead::all();
        return view('Pages::savingdeposit.index',compact('savingdeposits','interestheads'));
    }
    public function create(){
        abort_if(Gate::denies('savingdeposit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $interestheads = InterestHead::all();
        return view('Pages::savingdeposit.create',compact('interestheads'));
    }
    public function store(Request $request){
        $validation_rule =[
            'interest_head_id' => ['required','exists:interest_heads,id',
            Rule::unique('saving_deposits')->where(function($query) use($request){
                return $query->where('interest_head_id',$request->interest_head_id);
            })],
            'particulars' => ['required'],
            'min_balance' => ['required'],
            'interest_rate' => ['required'],

        ];
        $data = $request->validate($validation_rule);
        $interest_head_id = $data['interest_head_id'];
        $data = array(
            'particulars' =>$data['particulars'],
            'min_balance'=>$data['min_balance'],
            'interest_rate'=>$data['interest_rate'],
        );
        $savingDeposit = new SavingDeposit;
        $savingDeposit->interest_head_id = $interest_head_id;
        $savingDeposit->particulars = json_encode($data['particulars']);
        $savingDeposit->min_balance = json_encode($data['min_balance']);
        $savingDeposit->interest_rate = json_encode($data['interest_rate']);
        $savingDeposit->save();
        return redirect()->route('fixeddeposit.index');
    }
    public function edit($id){
        abort_if(Gate::denies('savingdeposit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $savingDeposit = SavingDeposit::find($id);
        $interestheads = InterestHead::all();
        return view('Pages::savingdeposit.edit',compact('savingDeposit','interestheads'));
    }
    public function update(Request $request,$id){
        $validation_rule =[
            'interest_head_id' => ['required','exists:interest_heads,id',
            Rule::unique('saving_deposits')->where(function($query) use($request){
                return $query->where('interest_head_id',$request->interest_head_id);
            })->where("id","<>",$id)],
            'particulars' => ['required'],
            'min_balance' => ['required'],
            'interest_rate' => ['required'],

        ];;
        $savingDeposit = SavingDeposit::find($id);
        $data = $request->validate($validation_rule);
        $interest_head_id = $data['interest_head_id'];
        $data = array(
            'particulars' =>$data['particulars'],
            'min_balance'=>$data['min_balance'],
            'interest_rate'=>$data['interest_rate'],
        );
        $savingDeposit->interest_head_id = $interest_head_id;
        $savingDeposit->particulars = json_encode($data['particulars']);
        $savingDeposit->min_balance = json_encode($data['min_balance']);
        $savingDeposit->interest_rate = json_encode($data['interest_rate']);
        $savingDeposit->update();
        return redirect()->route('fixeddeposit.index');
    }
    public function destroy($id){
        abort_if(Gate::denies('savingdeposit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $savingDeposit = SavingDeposit::find($id);
        $savingDeposit->delete();
        return redirect()->route('fixeddeposit.index');
    }
}
