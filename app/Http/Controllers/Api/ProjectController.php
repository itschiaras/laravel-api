<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index () {
        $projects = Project::all();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        if ($project) {
            return response()->json(
                [
                    'success' => true,
                    'results' => $project
                ]
                );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'results' => 'Prodotto non trovato'
                ]
            );
        }
    }
}
