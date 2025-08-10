import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard - Clinic Pharmacy" />
            <div className="flex h-full flex-1 flex-col gap-6 rounded-xl p-6 overflow-x-auto">
                {/* Header */}
                <div className="mb-6">
                    <h1 className="text-3xl font-bold text-gray-900 dark:text-white">
                        🏥 Clinic Pharmacy Dashboard
                    </h1>
                    <p className="text-gray-600 dark:text-gray-400 mt-2">
                        Welcome back! Here's what's happening in your clinic today.
                    </p>
                </div>

                {/* Quick Stats Cards */}
                <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    <div className="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div className="flex items-center">
                            <div className="flex-shrink-0">
                                <div className="w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                                    <span className="text-blue-600 dark:text-blue-300 text-lg">👥</span>
                                </div>
                            </div>
                            <div className="ml-4">
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Today's Patients</p>
                                <p className="text-2xl font-semibold text-gray-900 dark:text-white">24</p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div className="flex items-center">
                            <div className="flex-shrink-0">
                                <div className="w-8 h-8 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                                    <span className="text-green-600 dark:text-green-300 text-lg">💊</span>
                                </div>
                            </div>
                            <div className="ml-4">
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Prescriptions</p>
                                <p className="text-2xl font-semibold text-gray-900 dark:text-white">18</p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div className="flex items-center">
                            <div className="flex-shrink-0">
                                <div className="w-8 h-8 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center">
                                    <span className="text-yellow-600 dark:text-yellow-300 text-lg">📦</span>
                                </div>
                            </div>
                            <div className="ml-4">
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Low Stock Items</p>
                                <p className="text-2xl font-semibold text-gray-900 dark:text-white">7</p>
                            </div>
                        </div>
                    </div>

                    <div className="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <div className="flex items-center">
                            <div className="flex-shrink-0">
                                <div className="w-8 h-8 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center">
                                    <span className="text-purple-600 dark:text-purple-300 text-lg">💰</span>
                                </div>
                            </div>
                            <div className="ml-4">
                                <p className="text-sm font-medium text-gray-600 dark:text-gray-400">Today's Revenue</p>
                                <p className="text-2xl font-semibold text-gray-900 dark:text-white">$1,245</p>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Main Content Area */}
                <div className="grid gap-6 lg:grid-cols-3">
                    {/* Recent Activity */}
                    <div className="lg:col-span-2">
                        <div className="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                            <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                                <h3 className="text-lg font-semibold text-gray-900 dark:text-white">Recent Activity</h3>
                            </div>
                            <div className="p-6">
                                <div className="space-y-4">
                                    <div className="flex items-center space-x-3">
                                        <div className="w-2 h-2 bg-green-400 rounded-full"></div>
                                        <div className="flex-1">
                                            <p className="text-sm text-gray-900 dark:text-white">New patient registered: Sarah Johnson</p>
                                            <p className="text-xs text-gray-500 dark:text-gray-400">10 minutes ago</p>
                                        </div>
                                    </div>
                                    <div className="flex items-center space-x-3">
                                        <div className="w-2 h-2 bg-blue-400 rounded-full"></div>
                                        <div className="flex-1">
                                            <p className="text-sm text-gray-900 dark:text-white">Prescription filled for Michael Brown</p>
                                            <p className="text-xs text-gray-500 dark:text-gray-400">25 minutes ago</p>
                                        </div>
                                    </div>
                                    <div className="flex items-center space-x-3">
                                        <div className="w-2 h-2 bg-yellow-400 rounded-full"></div>
                                        <div className="flex-1">
                                            <p className="text-sm text-gray-900 dark:text-white">Inventory alert: Aspirin running low</p>
                                            <p className="text-xs text-gray-500 dark:text-gray-400">1 hour ago</p>
                                        </div>
                                    </div>
                                    <div className="flex items-center space-x-3">
                                        <div className="w-2 h-2 bg-purple-400 rounded-full"></div>
                                        <div className="flex-1">
                                            <p className="text-sm text-gray-900 dark:text-white">Appointment scheduled: Emma Wilson</p>
                                            <p className="text-xs text-gray-500 dark:text-gray-400">2 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Quick Actions */}
                    <div className="space-y-6">
                        <div className="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                            <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                                <h3 className="text-lg font-semibold text-gray-900 dark:text-white">Quick Actions</h3>
                            </div>
                            <div className="p-6">
                                <div className="space-y-3">
                                    <button className="w-full flex items-center px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                        <span className="mr-3">👤</span>
                                        Add New Patient
                                    </button>
                                    <button className="w-full flex items-center px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                        <span className="mr-3">📋</span>
                                        Create Prescription
                                    </button>
                                    <button className="w-full flex items-center px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                        <span className="mr-3">📦</span>
                                        Manage Inventory
                                    </button>
                                    <button className="w-full flex items-center px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                        <span className="mr-3">📊</span>
                                        View Reports
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div className="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                            <div className="p-6 border-b border-gray-200 dark:border-gray-700">
                                <h3 className="text-lg font-semibold text-gray-900 dark:text-white">System Status</h3>
                            </div>
                            <div className="p-6">
                                <div className="space-y-3">
                                    <div className="flex items-center justify-between">
                                        <span className="text-sm text-gray-600 dark:text-gray-400">Database</span>
                                        <span className="flex items-center text-sm text-green-600 dark:text-green-400">
                                            <div className="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                                            Online
                                        </span>
                                    </div>
                                    <div className="flex items-center justify-between">
                                        <span className="text-sm text-gray-600 dark:text-gray-400">Backup</span>
                                        <span className="flex items-center text-sm text-green-600 dark:text-green-400">
                                            <div className="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                                            Completed
                                        </span>
                                    </div>
                                    <div className="flex items-center justify-between">
                                        <span className="text-sm text-gray-600 dark:text-gray-400">Security</span>
                                        <span className="flex items-center text-sm text-green-600 dark:text-green-400">
                                            <div className="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                                            Secure
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}