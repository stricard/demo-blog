<?php

namespace App\Http\Controllers\API;

use App\Exceptions\Problems\ResourceNotFoundException;
use App\Http\Requests\API\SearchUserRequest;
use App\Http\Requests\API\StoreUserRequest;
use App\Http\Requests\API\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
use App\Http\Resources\User as UserResource;
use App\Definitions\HttpStatusCode;

class UserController extends APIController
{

    /**
     * @GET : api/users/
     * Affiche la liste des ressources
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(SearchUserRequest $request){
        $name = $request->validated()['name'] ?? null;
        $email = $request->validated()['email'] ?? null;

        $users = User::query();

        if(!empty($name))
            $users->where('name', 'like', $name);

        if(!empty($email))
            $users->where('email', $email);

        $users = UserResource::collection($users->get());

        return response()->json($users, HttpStatusCode::HTTP_OK);
    }

    /**
     * @GET : api/users/{id}
     * Affiche la ressource demandée
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws ResourceNotFoundException
     */
    public function show(int $id)
    {
        $user = User::find($id);
        if (empty($user))
            throw new ResourceNotFoundException('users');

        $user = new UserResource($user);

        return response()->json($user);
    }

    /**
     * @POST : api/users
     * Enregistre une nouvelle ressource
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $dataValidated = $request->validated();

        $user = new UserResource(User::create($dataValidated));

        return response()->json($user, HttpStatusCode::HTTP_CREATED);
    }

    /**
     * @PUT/@PATCH : api/users/{id}
     * Modifie une ressource
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $dataValidated = $request->validated();
        $dataValidated['updated_at'] = now(); //ne fonctionne pas!

        $user->update($dataValidated);

        return response()->json(new UserResource($user), HttpStatusCode::HTTP_OK);
    }

    /**
     * @DELETE : api/users/{id}
     * Supprime une ressource
     * @param User $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response(null, HttpStatusCode::HTTP_NO_CONTENT);
    }
}
