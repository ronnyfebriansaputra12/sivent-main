<?php

namespace App\Http\Controllers;

use App\Models\JenisEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisEvent = JenisEvent::all();
        if (count($jenisEvent) > 0) {
            return $this->status('Data Found', true, $jenisEvent);
        }
        return $this->status('Data Not Found', false);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validate = Validator::make($data, [
            'nama_jenis_event' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validate->fails()) {
            return $this->status($validate->getMessageBag()->first(), false);
        }
        $create = JenisEvent::create($data);
        if ($create) {
            return $this->status('Data Created', true, $data);
        }
        return $this->status('Data Doesnt Created', false);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisEvent  $jenisEvent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisEvent = JenisEvent::where('id', $id)->first();
        if (!empty($jenisEvent)) {
            return $this->status('Data Found', true, $jenisEvent);
        }
        return $this->status('Data Not Found', false);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisEvent  $jenisEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisEvent $jenisEvent, $id)
    {
        $data = $request->all();
        $validate = Validator::make($data, [
            'nama_jenis_event' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validate->fails()) {
            return $this->status($validate->getMessageBag()->first(), false);
        }

        $update = JenisEvent::where('id', $id)->update($data);
        if ($update) {
            return $this->status('Data Updated', true, $data);
        }
        return $this->status('Data Doesnt Update', false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisEvent  $jenisEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = JenisEvent::where('id', $request->id)->delete();
        if ($delete) {
            return $this->status('Data Deleted', true);
        }
        return $this->status('Data Doesnt Deleted', false);
    }
}
