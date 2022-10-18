<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{

    public function index()
    {
        request()->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:nama,email']
        ]);

        $query = Customer::query();

        if (request('search')) {
            $query->where('nama', 'LIKE', '%' . request('search') . '%');
        }

        if (request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Index', [
            'customer' => $query->paginate(10),
            'filters' => request()->all(['search', 'field', 'direction'])
        ]);
    }


    public function create()
    {

        return Inertia::render('Create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required'],
            'email' => ['required', 'email']
        ]);

        Customer::create([

            'nama' => $request->nama,
            'email' => $request->email

        ]);
        return redirect()->route('customer');
    }



    public function edit($id)
    {
        $customer = Customer::find($id);
        return Inertia::render('Edit', ['customer' => $customer]);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nama' => ['required'],
            'email' => ['required', 'email']
        ]);
        $customer = Customer::find($id);
        $customer->nama = $request->nama;
        $customer->email = $request->email;
        $customer->save();

        // $customer->update([
        //     'nama' => $request->nama,
        //     'email' => $request->email
        // ]);


        return redirect()->route('customer');
    }


    public function destroy($id)
    {

        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer');
    }
}
