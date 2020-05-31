<?php

namespace SergeyJacobi\Vega\Controllers;

use App\Http\Controllers\Controller;

use SergeyJacobi\Vega\Requests\SupportMessageRequest;
use SergeyJacobi\Vega\Repositories\SupportMessagesRepository;
use SergeyJacobi\Vega\Resources\SupportMessageResource;

class MainController extends Controller
{
    private $supportMessagesRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SupportMessagesRepository $supportMessagesRepository)
    {
        $this->supportMessagesRepository = $supportMessagesRepository;
    }

    public function create(SupportMessageRequest $request)
    {
        $model = $this->supportMessagesRepository->createMessage($request->validated());

        return response([
            'message' => 'message saved successfully',
            'id' => (new SupportMessageResource($model))['id'],
        ]);
    }

    public function read(SupportMessageRequest $request, int $id)
    {
        $model = $this->supportMessagesRepository->readMessage($id);

        return response(new SupportMessageResource($model));
    }

    public function update(SupportMessageRequest $request, int $id)
    {
        $this->supportMessagesRepository->updateMessage($id, $request->validated());

        return response([
            'message' => 'message updated successfully'
        ]);
    }

    public function delete(SupportMessageRequest $request, int $id)
    {
        $this->supportMessagesRepository->deleteMessage($id);

        return response([
            'message' => 'message deleted successfully'
        ]);
    }

}