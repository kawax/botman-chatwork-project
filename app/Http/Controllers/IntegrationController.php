<?php

namespace App\Http\Controllers;

use App\Model\Integration;
use Illuminate\Http\Request;

use App\Http\Requests\Integration\StoreRequest;
use App\Http\Requests\Integration\UpdateRequest;
use Ramsey\Uuid\Uuid;

class IntegrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $integrations = $request->user()->integrations()->latest()->paginate(10);

        return view('integration.index')->with(compact('integrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('integration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $integration = new Integration($request->only([
            'service',
            'recipient',
            'api_token',
        ]));

        $integration->uuid = Uuid::uuid4();

        $request->user()->integrations()->save($integration);

        return redirect()->route('integration.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Integration $integration
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Integration $integration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Integration $integration
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Integration $integration)
    {
        return view('integration.edit')->with(compact('integration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest          $request
     * @param  \App\Model\Integration $integration
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Integration $integration)
    {
        $integration->fill($request->only(['service', 'recipient', 'api_token']))
                    ->save();

        return redirect()->route('integration.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Integration $integration
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Integration $integration)
    {
        //
    }
}
