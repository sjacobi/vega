<?php

namespace SergeyJacobi\Vega\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use SergeyJacobi\Vega\Models\SupportMessagesModel;

class SupportMessagesRepository
{
    private $notFoundMessage = 'message not found';

    public function createMessage(array $data)
    {
        return SupportMessagesModel::create($data);
    }

    public function readMessage($id)
    {
        $model = SupportMessagesModel::find($id);
        if (!$model) {
            throw new ModelNotFoundException($this->notFoundMessage);
        }
        return $model;
    }

    public function updateMessage($id, $data)
    {
        $model = SupportMessagesModel::find($id);
        if (!$model) {
            throw new ModelNotFoundException($this->notFoundMessage);
        }
        $model->update($data);
    }

    public function deleteMessage($id)
    {
        $model = SupportMessagesModel::find($id);
        if (!$model) {
            throw new ModelNotFoundException($this->notFoundMessage);
        }
        $model->delete();
    }

    public function deleteOldMessages()
    {

        DB::beginTransaction();

        try {

            SupportMessagesModel::withTrashed()
                ->where('created_at', '<=', Carbon::now()->subHours(config('vega.interval_for_deleting_messages')))
                ->chunk(50, function ($models) {
                    foreach ($models as $model) {
                        echo 'message:' . $model->id . ' was deleted' . PHP_EOL;
                        $model->forceDelete();
                    }
                });

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
        }

    }

}
