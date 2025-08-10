<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClinicController extends Controller
{
    /**
     * Display the clinic dashboard.
     */
    public function index()
    {
        // Sample data for demonstration
        $clinicStats = [
            'todaysPatients' => 24,
            'prescriptions' => 18,
            'lowStockItems' => 7,
            'todaysRevenue' => 1245.00,
        ];

        $recentActivity = [
            [
                'type' => 'patient_registration',
                'message' => 'New patient registered: Sarah Johnson',
                'time' => '10 minutes ago',
                'color' => 'green'
            ],
            [
                'type' => 'prescription_filled',
                'message' => 'Prescription filled for Michael Brown',
                'time' => '25 minutes ago',
                'color' => 'blue'
            ],
            [
                'type' => 'inventory_alert',
                'message' => 'Inventory alert: Aspirin running low',
                'time' => '1 hour ago',
                'color' => 'yellow'
            ],
            [
                'type' => 'appointment_scheduled',
                'message' => 'Appointment scheduled: Emma Wilson',
                'time' => '2 hours ago',
                'color' => 'purple'
            ]
        ];

        return Inertia::render('dashboard', [
            'clinicStats' => $clinicStats,
            'recentActivity' => $recentActivity,
        ]);
    }
}