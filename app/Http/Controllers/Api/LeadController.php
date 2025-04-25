<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\{LeadResource, LeadListResource};
use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $size = $request->get('page_size', 10);
        $search = $request->get('search');

        $leads = Lead::query()
                ->select('id', 'first_name', 'last_name', 'email', 'personal_phone', 'nationality', 'country_of_residence', 'created_at');
        if ($search) {
            $leads->where(function ($q) use ($search) {
                $q->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%$search%"])
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('personal_phone', 'like', "%$search%")
                    ->orWhere('nationality', 'like', "%$search%")
                    ->orWhere('country_of_residence', 'like', "%$search%");
            });
        }
        $leads = $leads->orderBy('created_at', 'desc');
        $total = $leads->count();
        $paginator = $leads->simplePaginate($size, ['*'], 'page', $page);

        $data = LeadListResource::collection($paginator)->resolve();

        return response()->json([
            'data' => $data,
            'pagination' => [
                'page' => $paginator->currentPage(),
                'page_size' => $paginator->perPage(),
                'total' => $total,
            ],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lead = Lead::findorFail($id);
        return response()->json(new LeadResource($lead));
    }
}
