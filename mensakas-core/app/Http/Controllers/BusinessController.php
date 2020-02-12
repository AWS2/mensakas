<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;
use App\Models\Business;
use App\Repositories\BusinessRepository;
use Illuminate\Http\Request;
use Flash;
use Response;

class BusinessController
{


    /**
     * Display a listing of the Business.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $businesses = Business::all();

        return view('businesses.index')
            ->with('businesses', $businesses);
    }

    /**
     * Show the form for creating a new Business.
     *
     * @return Response
     */
    public function create()
    {
        return view('businesses.create');
    }

    /**
     * Store a newly created Business in storage.
     *
     * @param CreateBusinessRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessRequest $request)
    {
        $input = $request->all();

        $business = $this->businessRepository->create($input);

        Flash::success('Business saved successfully.');

        return redirect(route('businesses.index'));
    }

    /**
     * Display the specified Business.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        return view('businesses.show')->with('business', $business);
    }

    /**
     * Show the form for editing the specified Business.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        return view('businesses.edit')->with('business', $business);
    }

    /**
     * Update the specified Business in storage.
     *
     * @param int $id
     * @param UpdateBusinessRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessRequest $request)
    {
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        $business = $this->businessRepository->update($request->all(), $id);

        Flash::success('Business updated successfully.');

        return redirect(route('businesses.index'));
    }

    /**
     * Remove the specified Business from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $business = $this->businessRepository->find($id);

        if (empty($business)) {
            Flash::error('Business not found');

            return redirect(route('businesses.index'));
        }

        $this->businessRepository->delete($id);

        Flash::success('Business deleted successfully.');

        return redirect(route('businesses.index'));
    }
}
