<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Http\Resources\Lead as LeadResource;
use App\Http\Resources\LeadAnalytics as LeadAnalyticsResource;
use App\Http\Resources\SegmentLeadsAnalytics as SegmentLeadsAnalyticsResource;
use App\Http\Resources\SegmentValueAnalytics as SegmentValueAnalyticsResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{

    public function index()
    {
        // Get leads
        $leads = Lead::orderBy('created_at', 'desc')->get();

        // Return collection of leads as a resource
        return LeadResource::collection($leads);
    }

    public function leads_submitted()
    {
        $leads = Lead::where('by', auth()->user()->email)->get();
        return LeadResource::collection($leads);
    }

    public function leads_assigned()
    {
        $leads = Lead::where('for', auth()->user()->email)->get();
        return LeadResource::collection($leads);
    }

    public function leads_submitted_analytics()
    {
        $lead_data = [
            "open" => 0,
            "closed" => 0,
            "validated" => 0,
            "rejected" => 0
        ];
        $by_count = Lead::where('by', auth()->user()->email)->pluck('status')->countBy()->all();
        $by_keys = array_keys($by_count);
        foreach ($by_keys as $key) {
            $lead_data[$key] = $by_count[$key];
        }
        return new LeadAnalyticsResource($lead_data);
    }

    public function leads_assigned_analytics()
    {
        $lead_data = [
            "open" => 0,
            "closed" => 0,
            "validated" => 0,
            "rejected" => 0
        ];
        $for_count = Lead::where('for', auth()->user()->email)->pluck('status')->countBy()->all();
        $for_keys = array_keys($for_count);
        foreach ($for_keys as $key) {
            $lead_data[$key] = $for_count[$key];
        }
        return new LeadAnalyticsResource($lead_data);
    }

    public function segment_leads_analytics()
    {
        $segment = Lead::all()->pluck('segment')->countBy()->all();
        return new SegmentLeadsAnalyticsResource($segment);
    }

    public function segment_value_analytics()
    {
        $segments = Lead::all()->pluck('segment')->all();
        $values = [];
        foreach ($segments as $segment) {
            $value = Lead::where('segment', $segment)->sum('value');
            $values[$segment] = $value;
        }
        return new SegmentValueAnalyticsResource($values);
    }

    public function store(Request $request)
    {
        $lead = $request->isMethod('put') ? Lead::findOrFail($request->article_id) : new Lead;

        $lead->id = $request->input('lead_id');
        $lead->title = $request->input('title');
        $lead->body = $request->input('body');

        if ($lead->save()) {
            return new LeadResource($lead);
        }

        return null;
    }

    public function addLead(Request $request)
    {
        $lead = new Lead;
        $lead->name = $request->input('name');
        $lead->value = $request->input('value');
        $lead->segment = $request->input('segment');
        $lead->address = $request->input('address');
        $lead->by = $request->input('by');
        $lead->for = $request->input('for');
        $lead->status = 'open';
        $lead->save();
        return redirect()->route('leads-submitted');
    }

    public function show($id)
    {
        // Get lead
        $lead = Lead::findOrFail($id);

        // Return single article as a resource
        return new LeadResource($lead);
    }


    public function validateLead($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->status = 'validated';
        $lead->validated_at = Carbon::now()->toDateTimeString();
        if ($lead->save()) {
            return new LeadResource($lead);
        }

        return null;
    }

    public function rejectLead($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->status = 'rejected';
        $lead->validated_at = Carbon::now()->toDateTimeString();
        if ($lead->save()) {
            return new LeadResource($lead);
        }

        return null;
    }

    public function closeLead($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->status = 'closed';
        $lead->closed_at = Carbon::now()->toDateTimeString();
        if ($lead->save()) {
            return new LeadResource($lead);
        }

        return null;
    }

    public function export()
    {
        $leads = Lead::all();
        // return $leads;
        return view('export', ['leads' => $leads]);
    }
}
