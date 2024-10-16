<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTenantUserRequest;
use App\Http\Requests\UpdateTenantUserRequest;
use App\Repositories\TenantUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TenantUserController extends AppBaseController
{
    /** @var TenantUserRepository $tenantUserRepository*/
    private $tenantUserRepository;

    public function __construct(TenantUserRepository $tenantUserRepo)
    {
        $this->tenantUserRepository = $tenantUserRepo;
    }

    /**
     * Display a listing of the TenantUser.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tenantUsers = $this->tenantUserRepository->all();

        return view('tenant_users.index')
            ->with('tenantUsers', $tenantUsers);
    }

    /**
     * Show the form for creating a new TenantUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('tenant_users.create');
    }

    /**
     * Store a newly created TenantUser in storage.
     *
     * @param CreateTenantUserRequest $request
     *
     * @return Response
     */
    public function store(CreateTenantUserRequest $request)
    {
        $input = $request->all();

        $tenantUser = $this->tenantUserRepository->create($input);

        Flash::success('Tenant User saved successfully.');

        return redirect(route('tenantUsers.index'));
    }

    /**
     * Display the specified TenantUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tenantUser = $this->tenantUserRepository->find($id);

        if (empty($tenantUser)) {
            Flash::error('Tenant User not found');

            return redirect(route('tenantUsers.index'));
        }

        return view('tenant_users.show')->with('tenantUser', $tenantUser);
    }

    /**
     * Show the form for editing the specified TenantUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tenantUser = $this->tenantUserRepository->find($id);

        if (empty($tenantUser)) {
            Flash::error('Tenant User not found');

            return redirect(route('tenantUsers.index'));
        }

        return view('tenant_users.edit')->with('tenantUser', $tenantUser);
    }

    /**
     * Update the specified TenantUser in storage.
     *
     * @param int $id
     * @param UpdateTenantUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTenantUserRequest $request)
    {
        $tenantUser = $this->tenantUserRepository->find($id);

        if (empty($tenantUser)) {
            Flash::error('Tenant User not found');

            return redirect(route('tenantUsers.index'));
        }

        $tenantUser = $this->tenantUserRepository->update($request->all(), $id);

        Flash::success('Tenant User updated successfully.');

        return redirect(route('tenantUsers.index'));
    }

    /**
     * Remove the specified TenantUser from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tenantUser = $this->tenantUserRepository->find($id);

        if (empty($tenantUser)) {
            Flash::error('Tenant User not found');

            return redirect(route('tenantUsers.index'));
        }

        $this->tenantUserRepository->delete($id);

        Flash::success('Tenant User deleted successfully.');

        return redirect(route('tenantUsers.index'));
    }
}
