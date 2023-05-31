<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use Admin\Models\InterestHead;
use Illuminate\Validation\Rule;
use Pages\Models\FixedInterest;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
class FixedInterestController extends Controller
{
    public function index(){
        abort_if(Gate::denies('fixedinterest_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $fixedInterests = FixedInterest::all();
        $interestheads = InterestHead::all();
        return view('Pages::fixedinterest.index',compact('fixedInterests','interestheads'));
    }
    public function create(){
        abort_if(Gate::denies('fixedinterest_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $interestheads = InterestHead::all();
        return view('Pages::fixedinterest.create',compact('interestheads'));
    }
    public function store(Request $request){
        $validation_rule =[
            'interest_head_id' => ['required','exists:interest_heads,id',
            Rule::unique('fixed_interests')->where(function($query) use($request){
                return $query->where('interest_head_id',$request->interest_head_id);
            })],
            'particulars' => ['required'],
            'upto5years' => ['required'],
            'fivetotenyears' => ['required'],
            'above10years' => ['required'],

        ];
        $data = $request->validate($validation_rule);
        $interest_head_id = $data['interest_head_id'];
        $data = array(
            'particulars' =>$data['particulars'],
            'upto5years'=>$data['upto5years'],
            'fivetotenyears'=>$data['fivetotenyears'],
            'above10years'=>$data['above10years'],
        );
        $fixedInterest = new FixedInterest;
        $fixedInterest->interest_head_id = $interest_head_id;
        $fixedInterest->particulars = json_encode($data['particulars']);
        $fixedInterest->upto5years = json_encode($data['upto5years']);
        $fixedInterest->fivetotenyears = json_encode($data['fivetotenyears']);
        $fixedInterest->above10years = json_encode($data['above10years']);
        $fixedInterest->save();
        return redirect()->route('fixeddeposit.index');
    }
    public function edit($id){
        abort_if(Gate::denies('fixedinterest_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $fixedInterest = FixedInterest::find($id);
        $interestheads = InterestHead::all();
        return view('Pages::fixedinterest.edit',compact('fixedInterest','interestheads'));
    }
    public function update(Request $request,$id){
        $validation_rule =[
            'interest_head_id' => ['required','exists:interest_heads,id',
            Rule::unique('fixed_interests')->where(function($query) use($request){
                return $query->where('interest_head_id',$request->interest_head_id);
            })->where("id","<>",$id)],
            'particulars' => ['required'],
            'upto5years' => ['required'],
            'fivetotenyears' => ['required'],
            'above10years' => ['required'],

        ];
        $fixedInterest = FixedInterest::find($id);
        $data = $request->validate($validation_rule);
        $interest_head_id = $data['interest_head_id'];
        $data = array(
            'particulars' =>$data['particulars'],
            'upto5years'=>$data['upto5years'],
            'fivetotenyears'=>$data['fivetotenyears'],
            'above10years'=>$data['above10years'],
        );
        $fixedInterest->interest_head_id = $interest_head_id;
        $fixedInterest->particulars = json_encode($data['particulars']);
        $fixedInterest->upto5years = json_encode($data['upto5years']);
        $fixedInterest->fivetotenyears = json_encode($data['fivetotenyears']);
        $fixedInterest->above10years = json_encode($data['above10years']);
        $fixedInterest->update();
        return redirect()->route('fixeddeposit.index');
    }
    public function destroy($id){
        abort_if(Gate::denies('fixedinterest_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $fixedInterest = FixedInterest::find($id);
        $fixedInterest->delete();
        return redirect()->route('fixeddeposit.index');
    }
}
