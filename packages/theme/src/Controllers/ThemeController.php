<?php

namespace Theme\Controllers;

use Pages\Models\Document;
use Admin\Models\CommitteeLevel;
use Admin\Models\SubDocumentType;
use Admin\Models\SubCommitteeLevel;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    public function singleCircular($id)
    {
        $documenttype = SubDocumentType::findOrFail($id);
        return view('single_circular', compact('documenttype'));
    }
    public function singleDocument($id)
    {
        $subdocument = SubDocumentType::findOrFail($id);
        $documents = $subdocument->documents;
        return view('documents', compact('subdocument', 'documents'));
    }
    public function singleCommittee($id)
    {
        $sub_committee_level = SubCommitteeLevel::findOrFail($id);
        return view('single_committee', compact('sub_committee_level'));
    }
}
