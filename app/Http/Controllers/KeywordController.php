<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeywordController extends Controller
{
    public function store(Request $request)
    {
        $category = Category::find($request->category_id);

        $keywordModel = $category->keyword;
        $keywords = $keywordModel->keywords;
        array_push($keywords, Str::lower($request->keyword));
        $keywordModel->update([
            'keywords' => $keywords,
        ]);

        return redirect()->back();
    }
}
