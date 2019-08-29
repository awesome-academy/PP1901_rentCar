<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\VehicleRepositoryInterface;
use Carbon\Carbon;

class CronJob extends Command
{
    protected $VehicleRepository;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updateStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Status of Vehicle Successfully';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        VehicleRepositoryInterface $VehicleRepository
    )
    {
        $this->VehicleRepository = $VehicleRepository;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function handle()
    {
        $now = Carbon::now()->toDateString();
        $this->VehicleRepository->updateStatusID();
        $rentings = $this->VehicleRepository->getRentingNow();
        foreach ($rentings as $renting) {
            $vehicles = $this->VehicleRepository->getVehicle($renting['vehicle_id']);
            if ($renting['start_date'] <= $now && $renting['end_date'] >= $now) {
                $vehicles->status_id = 2;
                $vehicles->save();
            };
        };

        $this->info('Update Status of Vehicle Successfully!');
    }
}
