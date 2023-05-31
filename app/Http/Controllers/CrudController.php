<?php
namespace App\Http\Controllers;

use Gate;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CrudController extends Controller
{
    protected $models;
    protected $request;
    private $view;
    private $validation_rule;

    public function __construct(Request $request, $view, $validation_rule, Model...$models)
    {
        $this->models = $models;
        $this->request = $request;
        $this->view = $view;
        $this->validation_rule = $validation_rule;
    }

    public function index()
    {
        $access = strtolower(class_basename($this->models[0])) . '_access';
        abort_if(Gate::denies($access), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $variables = [];
        foreach ($this->models as $model) {
            $name = strtolower(class_basename($model));
            $access = 'access_' . $name;
            $variables[$name] = $model->all();
        }
        $viewPath = $this->view . '.index';

        return view($viewPath, compact('variables'));
    }

    public function create()
    {
        $access = strtolower(class_basename($this->models[0])) . '_create';
        abort_if(Gate::denies($access), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $variables = [];
        foreach ($this->models as $model) {
            $name = strtolower(class_basename($model));
            $variables[$name] = $model->all();
        }
        $viewPath = $this->view . '.create';
        return view($viewPath, compact('variables'));
    }

    public function store(Request $request)
    {
        $variables = [];
        foreach ($this->models as $model) {
            $name = strtolower(class_basename($model));
            $variables[$name] = $model->all();
        }
        // $data = $this->request->except("_token");
        $data = $this->request->validate($this->validation_rule[0]);
        $primaryModelData = $this->models[0]->create($data);
        // Handle file upload and storage for media
        if ($this->request->hasFile('file')) {
            $file = $this->request->file('file');
            if (is_array($file)) {
                foreach ($file as $item) {
                    $filename = time() . '_' . $item->getClientOriginalName();
                    $path = $item->storeAs('media/' . strtolower(class_basename($this->models[0])), $filename);
                    $media_data = [
                        'file_name' => $filename,
                        'file_path' => $path,
                        'mediable_type' => $this->models[0]::class,
                        'mediable_id' => $primaryModelData->id
                    ];
                    $media = new Media($media_data);
                    $media->save();
                    $primaryModelData->media()->save($media);

                }
            } else {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('media/' . strtolower(class_basename($this->models[0])), $filename);
                $media_data = [
                    'file_name' => $filename,
                    'file_path' => $path,
                    'mediable_type' => $this->models[0]::class,
                    'mediable_id' => $primaryModelData->id
                ];
                $media = new Media($media_data);
                $media->save();
                $primaryModelData->media()->save($media);
            }

        }

        foreach ($primaryModelData->relationships() as $relationName => $relation) {
            $relatedModel = $relation['model'];
            $relatedType = $relation['type'];
            for ($i = 1; $i < sizeof($this->models); $i++) {
                if ($relatedModel == $this->models[$i]::class) {
                    if ($relatedType == 'BelongsToMany') {
                        $pivotColumns = $primaryModelData->$relationName()->getRelatedPivotKeyName();
                        $primaryModelData->$relationName()->sync($this->request->only($pivotColumns)[$pivotColumns]);
                    } else if ($relatedType == 'HasOne') {
                        $primaryModelData->$relationName()->create($data);
                    } else {
                        continue;
                    }
                }
            }
        }
        $viewPath = strtolower(class_basename($this->models[0])) . '.index';
        return redirect()->route($viewPath)->with('variables', $variables);
    }
    public function show($id)
    {
        $item = $this->models[0]->findOrFail($id);
        return view('crud.show', compact('item'));
    }

    public function edit($id)
    {
        $access = strtolower(class_basename($this->models[0])) . '_edit';
        abort_if(Gate::denies($access), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $item = $this->models[0]->findOrFail($id);

        $variables = [];
        foreach ($this->models as $model) {
            $name = strtolower(class_basename($model));
            $variables[$name] = $model->all();
        }
        $viewPath = $this->view . '.edit';
        return view($viewPath, compact('variables', 'item'));
    }

    public function update(Request $request, $id)
    {
        $variables = [];
        foreach ($this->models as $model) {
            $name = strtolower(class_basename($model));
            $variables[$name] = $model->all();
        }
        $data = $this->request->validate($this->validation_rule[1]);
        $primaryModelData = $this->models[0]->find($id);
        $primaryModelData->update($data);

        $primaryModel = $this->models[0];
        // Handle file upload and storage for media
        if ($this->request->hasFile('file')) {
            if ($primaryModelData->media) {
                if ($primaryModelData->media instanceof \Illuminate\Database\Eloquent\Collection) {
                    foreach ($primaryModelData->media as $item) {
                        Storage::delete($item->file_path);
                        $item->delete(); // Delete the media file from the storage
                    }
                } else {
                    Storage::delete($primaryModelData->media->file_path); // Delete the media file from the storage
                }
            }

            $file = $this->request->file('file');
            if (is_array($file)) {
                foreach ($file as $item) {
                    $filename = time() . '_' . $item->getClientOriginalName();
                    $path = $item->storeAs('media/' . strtolower(class_basename($this->models[0])), $filename);
                    $media_data = [
                        'mediable_type' => $this->models[0]::class,
                        'mediable_id' => $primaryModelData->id
                    ];
                    $media = $primaryModelData->media;
                    $primaryModelData->media()->create(
                        [
                            'file_name' => $filename,
                            'file_path' => $path
                        ],
                        $media_data
                    );
                }
            } else {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('media/' . strtolower(class_basename($this->models[0])), $filename);
                $media_data = [
                    'mediable_type' => $this->models[0]::class,
                    'mediable_id' => $primaryModelData->id
                ];
                $media = $primaryModelData->media;
                $primaryModelData->media()->update(
                    [
                        'file_name' => $filename,
                        'file_path' => $path
                    ],
                    $media_data
                );
            }


        }
        foreach ($primaryModel->relationships() as $relationName => $relation) {
            $relatedModel = $relation['model'];
            $relatedType = $relation['type'];
            for ($i = 1; $i < sizeof($this->models); $i++) {
                if ($relatedModel == $this->models[$i]::class) {

                    if ($relatedType == 'BelongsToMany') {
                        $pivotColumns = $primaryModelData->$relationName()->getRelatedPivotKeyName();
                        $primaryModelData->$relationName()->sync($this->request->only($pivotColumns)[$pivotColumns]);
                    } else if ($relatedType == 'HasOne' || $relatedType == 'HasMany')
                        $primaryModelData->$relationName()->update($this->request->only($this->models[$i]->getFillable()));

                }
            }
        }
        $viewPath = strtolower(class_basename($this->models[0])) . '.index';
        return redirect()->route($viewPath)->with('variables', $variables);
    }

    public function destroy($id)
    {
        $access = strtolower(class_basename($this->models[0])) . '_delete';
        abort_if(Gate::denies($access), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $variables = [];
        foreach ($this->models as $model) {
            $name = strtolower(class_basename($model));
            $variables[$name] = $model->all();
        }
        $parent = $this->models[0]->find($id);
        $primaryModel = $this->models[0];
        foreach ($primaryModel->relationships() as $relationName => $relation) {
            $relatedModel = $relation['model'];
            $relatedType = $relation['type'];
            for ($i = 1; $i < sizeof($this->models); $i++) {
                if ($relatedModel == $this->models[$i]::class) {
                    if ($relatedType == 'BelongsToMany') {
                        $parent->$relationName()->detach();
                    }
                }
            }
        }
        // dd($parent->media->first() instanceof \Illuminate\Database\Eloquent\Collection);
        if ($parent->media) {
            if ($parent->media instanceof \Illuminate\Database\Eloquent\Collection) {
                foreach ($parent->media as $item) {
                    Storage::delete($item->file_path); // Delete the media file from the storage
                    $item->delete(); // Delete the media record from the database
                }

            } else {
                Storage::delete($parent->media->file_path); // Delete the media file from the storage
                $parent->media->delete(); // Delete the media record from the database
            }
        }
        $parent->delete();
        $viewPath = strtolower(class_basename($this->models[0])) . '.index';
        return redirect()->route($viewPath)->with('variables', $variables);
    }

}
