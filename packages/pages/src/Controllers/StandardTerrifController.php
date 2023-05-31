<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Pages\Models\StandardTerrif;
use Admin\Models\StandardTerrifHead;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
class StandardTerrifController extends Controller
{
    public function index(){
        abort_if(Gate::denies('standardterrif_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $standardTerrifs = StandardTerrif::all();
        $standard_terrif_heads = StandardTerrifHead::all();
        return view('Pages::standardterrif.index',compact('standardTerrifs','standard_terrif_heads'));
    }
    public function create(){
        abort_if(Gate::denies('standardterrif_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $standard_terrif_heads = StandardTerrifHead::all();
        return view('Pages::standardterrif.create',compact('standard_terrif_heads'));
    }
    public function store(Request $request){

        $validation_rule =[
            'standard_terrif_head_id' => 'required|exists:standard_terrif_heads,id',
            'type' => ['required',
            Rule::unique('standard_terrifs')->where(function ($query) use ($request) {
                return $query->where('standard_terrif_head_id', $request->standard_terrif_head_id)
                   ->where('type', $request->type);
             })
        ],
            'particulars' => 'required',
            'rate' => ['required'],

        ];
        $data = $request->validate($validation_rule);
        $standard_terrif_head_id = $data['standard_terrif_head_id'];
        $type = $data['type'];
        $data = array(
            'particulars' =>$data['particulars'],
            'rate'=>$data['rate'],
        );
        $standardTerrif = new StandardTerrif;
        $standardTerrif->standard_terrif_head_id = $standard_terrif_head_id;
        $standardTerrif->type = $type;
        $standardTerrif->particulars = json_encode($data['particulars']);
        $standardTerrif->rate = json_encode($data['rate']);
        $standardTerrif->save();
        return redirect()->route('standardterrif.index');
    }
    public function edit($id){
        abort_if(Gate::denies('standardterrif_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $standardTerrif = StandardTerrif::find($id);
        $standard_terrif_heads = StandardTerrifHead::all();
        return view('Pages::standardterrif.edit',compact('standardTerrif','standard_terrif_heads'));
    }
    public function update(Request $request,$id){
        $validation_rule =[
            'standard_terrif_head_id' => 'required|exists:standard_terrif_heads,id',
            'type' => ['required',
            Rule::unique('standard_terrifs')->where(function ($query) use ($request) {
                return $query->where('standard_terrif_head_id', $request->standard_terrif_head_id)
                   ->where('type', $request->type);
             })->ignore($id)
        ],
            'particulars' => 'required',
            'rate' => ['required'],

        ];
        $standardTerrif = StandardTerrif::find($id);
        $data = $request->validate($validation_rule);
        $standard_terrif_head_id = $data['standard_terrif_head_id'];
        $type = $data['type'];
        $data = array(
            'particulars' =>$data['particulars'],
            'rate'=>$data['rate'],
        );
        $standardTerrif->standard_terrif_head_id = $standard_terrif_head_id;
        $standardTerrif->type = $type;
        $standardTerrif->particulars = json_encode($data['particulars']);
        $standardTerrif->rate = json_encode($data['rate']);
        $standardTerrif->update();
        return redirect()->route('standardterrif.index');
    }
    public function destroy($id){
        abort_if(Gate::denies('standardterrif_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $standardTerrif = StandardTerrif::find($id);
        $standardTerrif->delete();
        return redirect()->route('standardterrif.index');
    }
}
