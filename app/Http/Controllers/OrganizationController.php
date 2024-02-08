<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Organization;
use App\Http\Requests\OrganizationRequest;
use App\Interfaces\OrganizationRepositoryInterface;


class OrganizationController extends Controller
{
    const MSG_TYPE_SUCCESS = 'success';
    const MSG_TYPE_FAIL = 'error';
    const MSG_SUCCESS_CREATE = 'Organization successfully created';
    const MSG_SUCCESS_UPDATE = 'Organization successfully updated';
    const MSG_SUCCESS_DELETE = 'Organization successfully deleted';
    const MSG_ERROR = 'Oops, something went wrong';


    private $organizationRepository;

   public function __construct(OrganizationRepositoryInterface $organizationRepository)
   {
       $this->organizationRepository = $organizationRepository;
   }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $organizations = $this->organizationRepository->all();
        //$organizations = Organization::oldest()->paginate(1);

        return view('organization.index', ['organizations' => $organizations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->storeAs('public/images',$filename);
            $request['logo'] = $filename;
        }

        $isCreated = $this->organizationRepository->create($request->all());
        if (!$isCreated) {
            $message = self::MSG_ERROR;
            $type = self::MSG_TYPE_FAIL;
        }
        $message = self::MSG_SUCCESS_CREATE;
        $type = self::MSG_TYPE_SUCCESS;

        return redirect()->route('organization.index')->with($type, $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        return view('organization.show',compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        return view('organization.edit',compact('organization'));
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrganizationRequest $request, Organization $organization)
    {
        $isUpdated = $organization->update($request->all());
        if (!$isUpdated) {
            $message = self::MSG_ERROR;
            $type = self::MSG_TYPE_FAIL;
        }
        $message = self::MSG_SUCCESS_UPDATE;
        $type = self::MSG_TYPE_SUCCESS;

        return redirect()->route('organization.index')->with($type, $message);
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        $isDeleted = $organization->delete();
        if (!$isDeleted) {
            $message = self::MSG_ERROR;
            $type = self::MSG_TYPE_FAIL;
        }
        $message = self::MSG_SUCCESS_DELETE;
        $type = self::MSG_TYPE_SUCCESS;

        return redirect()->route('organization.index')->with($type, $message);
    }

}
