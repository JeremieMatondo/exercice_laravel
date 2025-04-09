<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\posts;
use Exception;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        try {
            $query = posts::query();
            
            // Gestion de la recherche
            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where('titre', 'LIKE', "%{$search}%");
            }
            
            // Pagination avec 1 élément par page (à ajuster selon vos besoins)
            $articles = $query->paginate(2);
            
            return response()->json([ 'statut_code' => 200,
            'statut_message' => 'Les articles ont été récupérés',
            'data' => $articles, // N'oubliez pas d'inclure les données dans la réponse
            'current_page' => $articles->currentPage(),
            'total' => $articles->total(),
            'last_page' => $articles->lastPage(),
        ]);
        
    } catch (Exception $e) {return response()->json([
        'statut_code' => 500,
        'statut_message' => 'Erreur lors de la récupération des articles',
        'error' => $e->getMessage()
    ], 500);
}
    }
    public function store(CreatePostRequest $request){
        
        try{
            $post = new posts();

        $post->titre = $request->titre;
        $post->description = $request->description;
        $post->user_id = auth()->user()->id;
        $post->save();

        return response()->json([
            'statut_code'=>200,
            'statut_message'=>'article ajouté avec succes',
            'data'=>$post
        ]);
        } catch(Exception $e){
            return response()->json($e);
        }
    }
    public function update (EditPostRequest $request, $id){
        $post = posts::find($id);
        $post->titre = $request->titre;
        $post->description = $request->description;
        $post->save();

    }
    public function delete(Request $request,$id){
       
        try{
            $post=posts::find($id);
            $post->delete();

        return response()->json([
            'statut_code'=>200,
            'statut_message'=>'article supprimé avec succes',
            'data'=>$post
        ]);
        } catch(Exception $e){
            return response()->json($e);
        }
    }
}
