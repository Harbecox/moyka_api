<?php

namespace App\Observers;

use App\Models\Company;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class CompanyObserver
{
    /**
     * Handle the Company "created" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function created(Company $company)
    {
        $path = 'qrs/'.$company->id.'.png';
        QrCode::size(500)->format('png')->generate($company->id, public_path($path));
        $company->qr = 'qrs/'.$company->id.'.png';
        $company->save();
    }

    /**
     * Handle the Company "updated" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function updated(Company $company)
    {
        //
    }

    /**
     * Handle the Company "deleted" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function deleted(Company $company)
    {
        //
    }

    /**
     * Handle the Company "restored" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function restored(Company $company)
    {
        //
    }

    /**
     * Handle the Company "force deleted" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function forceDeleted(Company $company)
    {
        //
    }
}
