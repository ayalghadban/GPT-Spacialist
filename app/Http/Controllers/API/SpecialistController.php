<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialists = Specialist::all();
        return response()->json([
            'status' => 'success',
            'data' => $specialists
        ], 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $specialistText = "We have a software project where we utilized your API to develop the application. The project is a specialized guide in specific fields. When a user sends a message containing their question or request, the system responds based on the requested specialization. We will provide you with the specialization the user has requested, and you will organize your information to align with their needs.\n\nCurrently, the user requires advice related to $request->name. You will now communicate with them as if you are a highly skilled $request->name expert, responding in a professional manner and addressing all their questions related to this field. Please apologize for any inquiries that fall outside the scope of $request->name";

        $specialist = Specialist::create([
            'name' => $request->name,
            'specialist' => $specialistText,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Specialist created successfully',
            'data' => $specialist
        ], 201);
    }
}
