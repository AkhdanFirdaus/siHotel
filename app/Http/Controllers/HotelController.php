<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Http\Resources\HotelResource;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HotelResource::collection(Hotel::with('kamars')->paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = Hotel::create([
            'nama' => $request->$nama,
            'slug' => str_slug($request->$nama, '-'),
            'hotel_image' => $request->hotel_image,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'rekening' => $request->rekening,
            'no_rekening' => $request->no_rekening,
            'moto' => $request->moto,
            'lokasi_id' => $request->lokasi_id,
            'user_id' => $request->user()->id,
        ]);

        return new HotelResource($hotel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return new HotelResource($hotel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        if ($request->user()->id !== $hotel->user_id) {
            return response()->json(['error' => 'You can only manage your own hotel'], 403);
        }

        $hotel->update($request->only(['hotel_image', 'alamat', 'email', 'rekening', 'no_rekening', 'moto']));

        return new HotelResource($hotel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return response()->json(null, 204);
    }
}
