<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use Admin\Models\InterestHead;
use Pages\Models\DepriveSector;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use Gate;
class DepriveSectorController extends Controller
{
    public function index(){
        abort_if(Gate::denies('deprivesector_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $depriveSectors = DepriveSector::all();
        $interestheads = InterestHead::all();
        return view('Pages::depriveSector.index',compact('depriveSectors','interestheads'));
    }
    public function create(){
        abort_if(Gate::denies('deprivesector_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $interestheads = InterestHead::all();
        return view('Pages::depriveSector.create',compact('interestheads'));
    }
    public function store(Request $request){
        $validation_rule =[
            'interest_head_id' => ['required','exists:interest_heads,id',
            Rule::unique('deprive_sectors')->where(function($query) use($request){
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
        $depriveSector = new DepriveSector;
        $depriveSector->interest_head_id = $interest_head_id;
        $depriveSector->particulars = json_encode($data['particulars']);
        $depriveSector->interest_rate = json_encode($data['interest_rate']);
        $depriveSector->save();
        return redirect()->route('fixeddeposit.index');
    }
    public function edit($id){
        abort_if(Gate::denies('deprivesector_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $depriveSector = DepriveSector::find($id);
        $interestheads = InterestHead::all();
        return view('Pages::depriveSector.edit',compact('depriveSector','interestheads'));
    }
    public function update(Request $request,$id){
        $validation_rule =[
            'interest_head_id' => ['required','exists:interest_heads,id',
            Rule::unique('deprive_sectors')->where(function($query) use($request){
                return $query->where('interest_head_id',$request->interest_head_id);
            })->where("id","<>",$id)],
            'particulars' => ['required'],
            'interest_rate' => ['required'],

        ];
        $depriveSector = DepriveSector::find($id);
        $data = $request->validate($validation_rule);
        $interest_head_id = $data['interest_head_id'];
        $data = array(
            'particulars' =>$data['particulars'],
            'interest_rate'=>$data['interest_rate'],
        );
        $depriveSector->interest_head_id = $interest_head_id;
        $depriveSector->particulars = json_encode($data['particulars']);
        $depriveSector->interest_rate = json_encode($data['interest_rate']);
        $depriveSector->update();
        return redirect()->route('fixeddeposit.index');
    }
    public function destroy($id){
        abort_if(Gate::denies('deprivesector_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $depriveSector = DepriveSector::find($id);
        $depriveSector->delete();
        return redirect()->route('fixeddeposit.index');
    }
}
