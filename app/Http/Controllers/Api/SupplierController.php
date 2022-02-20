<?php

namespace App\Http\Controllers\Api;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();

        return response()->json($supplier);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:suppliers',
            'email' => 'required|unique:suppliers',
            'phone' => 'required|unique:suppliers',
        ]);

        if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            $img = Image::make($request->photo)->resize(240, 200);
            $upload_path = 'image/supplier/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $suppliers = new Supplier;
            $suppliers->name = $request->name;
            $suppliers->email = $request->email;
            $suppliers->phone = $request->phone;
            $suppliers->shopname = $request->shopname;
            $suppliers->address = $request->address;
            $suppliers->photo = $image_url;
            $suppliers->save();
        } else {
            $suppliers = new Supplier;
            $suppliers->name = $request->name;
            $suppliers->email = $request->email;
            $suppliers->phone = $request->phone;
            $suppliers->shopname = $request->shopname;
            $suppliers->address = $request->address;
            $suppliers->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::where('id', $id)->first();
        return response()->json($supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'shopname' => $request->shopname,
            'address' => $request->address,
        ];

        $image = $request->newphoto;

        if ($image) {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            $img = Image::make($image)->resize(240, 200);
            $upload_path = 'image/supplier/';
            $image_url = $upload_path . $name;
            $success = $img->save($image_url);

            if ($success) {
                $data['photo'] = $image_url;
                $img = Supplier::where('id', $id)->first();
                $image_path = $img->photo;
                unlink($image_path);

                $update = Supplier::findorfail($id);
                $update->update($data);
            }
        } else {
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;

            Supplier::where('id', $id)->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::where('id', $id)->first();
        $photo = $supplier->photo;
        if ($photo) {
            unlink($photo);
            Supplier::where('id', $id)->delete();
        } else {
            Supplier::where('id', $id)->delete();
        }
    }
}
