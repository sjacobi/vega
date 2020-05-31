<?php

namespace SergeyJacobi\Vega\Services;

use App\Transaction;
use Illuminate\Support\Facades\DB;
use SergeyJacobi\Vega\Repositories\SupportMessagesRepository;

class SupportMessagesGarbageCollector
{
    private $supportMessagesRepository;

    public function __construct(
        SupportMessagesRepository $supportMessagesRepository
    ) {
        $this->supportMessagesRepository = $supportMessagesRepository;
    }

    public function deleteOldMessages()
    {
        DB::beginTransaction();

        try {

            $oldMessages = $this->supportMessagesRepository->getOldMessages();


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

    }

}
