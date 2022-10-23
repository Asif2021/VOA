<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\HelpingMaterial;
use App\Http\Requests\Auth\Teacher\StoreMaterialRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $materials = auth()->user()->teacherSubject->helpingMaterials->where('teacher_ref_id', auth()->user()->id)
                ->where('type', 'doc');
            return view('auth.teacher.material.index')->withMaterials($materials);
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('auth.teacher.material.create');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaterialRequest $request)
    {
        try {
            $result = null;
            if ($request->has('file')) {
                $doc = $request->file;
                $ext = $doc->getClientOriginalExtension();
                if ($ext == 'pdf' || $ext == 'doc' || $ext == 'docx') {
                    $name = time() . '.' . $doc->getClientOriginalName();
                    $doc->move(public_path('uploads/doc'), $name);
                    $result = 'uploads/doc/' . $name;
                } else {
                    return back()->withErrors(['file' => 'Please select doc or pdf only'])->withInput();
                }
            } else {
                return back()->withErrors(['file' => 'Please select a file'])->withInput();
            }
            if ($result) {
                $material = new HelpingMaterial();
                $material->subject_ref_id = auth()->user()->teacherSubject->id;
                $material->teacher_ref_id = auth()->user()->id;
                $material->title = $request->title;
                $material->url = $result;
                $material->type = 'doc';
                if ($material->save()) {
                    return redirect()->route('teacher.material.index')->withFlashSuccess('Uploaded');
                }
            }
            return redirect()->route('teacher.material.index')->withFlashError('Could not upload');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(HelpingMaterial $material)
    {
        try {
            if ($material->delete()) {
                return back()->withFlashSuccess('Deleted');
            }
            return back()->withFlashError('Could not delete');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    public function audio()
    {
        try {
            $materials = auth()->user()->teacherSubject->helpingMaterials->where('teacher_ref_id', auth()->user()->id)
                ->where('type', 'audio');
            return view('auth.teacher.material.audioindex')->withMaterials($materials);
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    public function audiocreate()
    {
        try {
            return view('auth.teacher.material.audiocreate');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    public function audiostore(StoreMaterialRequest $request)
    {
        try {
            $result = null;
            if ($request->has('file')) {
                $file = $request->file;
                $ext = $file->getClientOriginalExtension();
                if ($ext == 'mp3') {
                    $name = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/audio'), $name);
                    $result = 'uploads/audio/' . $name;
                } else {
                    return back()->withErrors(['file' => 'Please select mp3 file only'])->withInput();
                }
            } else {
                return back()->withErrors(['file' => 'Please select a file'])->withInput();
            }
            if ($result) {
                $material = new HelpingMaterial();
                $material->subject_ref_id = auth()->user()->teacherSubject->id;
                $material->teacher_ref_id = auth()->user()->id;
                $material->title = $request->title;
                $material->url = $result;
                $material->type = 'audio';
                if ($material->save()) {
                    return redirect()->route('teacher.material.audio.index')->withFlashSuccess('Uploaded');
                }
            }
            return redirect()->route('teacher.material.audio.index')->withFlashError('Could not upload');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }
}
