<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreClientRequest, UpdateClientRequest};
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function index(): View
    {
        $clients = Client::query()
            ->select('id', 'company_name', 'company_vat', 'company_address')
            ->orderByDesc('id')
            ->paginate(5);

        return view('clients.index', compact('clients'));
    }

    public function create(): View
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request): RedirectResponse
    {
        Client::query()->create($request->validated());

        return to_route('clients.index');
    }

    public function edit(Client $client): View
    {
        return view('clients.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->validated());

        return to_route('clients.index');
    }

    public function destroy(Client $client): RedirectResponse
    {
        $client->delete();

        return back();
    }
}
