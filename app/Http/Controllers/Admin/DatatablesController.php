<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Couple;
use App\Models\Gallery;
use App\Models\GuestList;
use App\Models\VenueDetail;
use Yajra\DataTables\DataTables;

class DatatablesController extends Controller
{
    protected $customConfig;

    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->customConfig = config('custom');
    }

    public function couple() {

        $couple = Couple::query()->whereNull('deleted_at');

        return DataTables::of($couple)
            ->addColumn('action', function($couple){
                return'
                <div class="text-center">
                    <a href='.route('couple.show', $couple->id).' class="btn btn-sm btn-success" title="Show"><i class="fa fa-eye"></i> Show</a>
                    <a href='.route('couple.edit', $couple->id).' class="btn btn-sm btn-dark" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                    <a href='.route('couple.delete', $couple->id).' class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                </div>';
            })
            ->addColumn('couple_type', function($couple){
                return $this->customConfig['couple_type'][($couple->couple_type)];
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function gallery() {

        $gallery = Gallery::query()->whereNull('deleted_at');

        return DataTables::of($gallery)
            ->addColumn('action', function($gallery){
                return'
                <div class="text-center">
                    <a href='.route('gallery.show', $gallery->id).' class="btn btn-sm btn-success" title="Show"><i class="fa fa-eye"></i> Show</a>
                    <a href='.route('gallery.edit', $gallery->id).' class="btn btn-sm btn-dark" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                    <a href='.route('gallery.delete', $gallery->id).' class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                </div>';
            })
            ->editColumn('image', function($gallery){
                return '
                <div class="text-center">
                    <img class="img-fluid rounded" src="'.asset('storage/'.$gallery->image).'" width="250px" height="auto">
                </div>';
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function venueDetail() {

        $venueDetail = VenueDetail::query()->whereNull('deleted_at');

        return DataTables::of($venueDetail)
            ->addColumn('action', function($venueDetail){
                return'
                <div class="text-center">
                    <a href='.route('venue-detail.show', $venueDetail->id).' class="btn btn-sm btn-success" title="Show"><i class="fa fa-eye"></i> Show</a>
                    <a href='.route('venue-detail.edit', $venueDetail->id).' class="btn btn-sm btn-dark" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                    <a href='.route('venue-detail.delete', $venueDetail->id).' class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                </div>';
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function guestList() {

        $guests = GuestList::query()->whereNull('deleted_at');

        return DataTables::of($guests)
            ->addColumn('action', function($guests){
                return'
                <div class="text-center">
                    <a href='.route('guest-list.show', $guests->id).' class="btn btn-sm btn-success" title="Show"><i class="fa fa-eye"></i> Show</a>
                    <a href='.route('guest-list.edit', $guests->id).' class="btn btn-sm btn-dark" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                    <a href='.route('guest-list.delete', $guests->id).' class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                </div>';
            })
            ->editColumn('is_gift', function($guests){
                $is_gift = $guests->is_gift == 1 ? 'true' : 'false';
                $color = $guests->is_gift == 1 ? 'bg-primary' : 'bg-danger';

                return '
                <div class="text-center">
                    <span class="badge '.$color.'">'.$is_gift.'</span>
                </div>';
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'is_gift'])
            ->make(true);
    }
}
