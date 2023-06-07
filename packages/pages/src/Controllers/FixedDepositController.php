<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use Admin\Models\InterestHead;
use Pages\Models\FixedDeposit;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
class FixedDepositController extends Controller
{
    public function index(){
        abort_if(Gate::denies('fixeddeposit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $fixeddeposits = FixedDeposit::all();
        $interestheads = InterestHead::all();
        return view('Pages::fixeddeposit.index',compact('fixeddeposits','interestheads'));
    }
    public function create(){
        abort_if(Gate::denies('fixeddeposit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $interestheads = InterestHead::all();
        return view('Pages::fixeddeposit.create',compact('interestheads'));
    }
    public function store(Request $request){
        $validation_rule =[
            'interest_head_id' => ['required','exists:interest_heads,id',
            Rule::unique('fixed_deposits')->where(function($query) use($request){
                return $query->where('interest_head_id',$request->interest_head_id);
            })],
            'particulars' => ['required'],
            'individual' => ['required'],
            'individual_remit' => ['required'],
            'institutional' => ['required'],
            'institutional_renew' => ['required'],

        ];
        $data = $request->validate($validation_rule);
        $interest_head_id = $data['interest_head_id'];
        $data = array(
            'particulars' =>$data['particulars'],
            'individual'=>$data['individual'],
            'individual_remit'=>$data['individual_remit'],
            'institutional'=>$data['institutional'],
            'institutional_renew'=>$data['institutional_renew'],
        );
        $fixedDeposit = new FixedDeposit;
        $fixedDeposit->interest_head_id = $interest_head_id;
        $fixedDeposit->particulars = json_encode($data['particulars']);
        $fixedDeposit->individual = json_encode($data['individual']);
        $fixedDeposit->individual_remit = json_encode($data['individual_remit']);
        $fixedDeposit->institutional = json_encode($data['institutional']);
        $fixedDeposit->institutional_renew = json_encode($data['institutional_renew']);
        $fixedDeposit->save();
        return redirect()->route('fixeddeposit.index');
    }
    public function edit($id){
        abort_if(Gate::denies('fixeddeposit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $fixedDeposit = FixedDeposit::find($id);
        $interestheads = InterestHead::all();
        return view('Pages::fixeddeposit.edit',compact('fixedDeposit','interestheads'));
    }
    public function update(Request $request,$id){

        // dd(FixedDeposit::find($id));
        $validation_rule =[
            'interest_head_id' => ['required','exists:interest_heads,id',
            Rule::unique('fixed_deposits')->where(function($query) use($request){
                return $query->where('interest_head_id',$request->interest_head_id);
            })->where("id","<>",$id)],
            'particulars' => ['required'],
            'individual' => ['required'],
            'individual_remit' => ['required'],
            'institutional' => ['required'],
            'institutional_renew' => ['required'],

        ];
        $fixedDeposit = FixedDeposit::find($id);
        $data = $request->validate($validation_rule);
        $interest_head_id = $data['interest_head_id'];
        $data = array(
            'particulars' =>$data['particulars'],
            'individual'=>$data['individual'],
            'individual_remit'=>$data['individual_remit'],
            'institutional'=>$data['institutional'],
            'institutional_renew'=>$data['institutional_renew'],
        );
        $fixedDeposit->interest_head_id = $interest_head_id;
        $fixedDeposit->particulars = json_encode($data['particulars']);
        $fixedDeposit->individual = json_encode($data['individual']);
        $fixedDeposit->individual_remit = json_encode($data['individual_remit']);
        $fixedDeposit->institutional = json_encode($data['institutional']);
        $fixedDeposit->institutional_renew = json_encode($data['institutional_renew']);
        $fixedDeposit->update();
        return redirect()->route('fixeddeposit.index');
    }
    public function destroy($id){
        abort_if(Gate::denies('fixeddeposit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $fixedDeposit = FixedDeposit::find($id);
        $fixedDeposit->delete();
        return redirect()->route('fixeddeposit.index');
    }
}
