import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="Welcome">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]">
                <header className="mb-6 w-full max-w-[335px] text-sm not-has-[nav]:hidden lg:max-w-4xl">
                    <nav className="flex items-center justify-end gap-4">
                        {auth.user ? (
                            <Link
                                href={route('dashboard')}
                                className="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                            >
                                Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link
                                    href={route('login')}
                                    className="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                                >
                                    Log in
                                </Link>
                                <Link
                                    href={route('register')}
                                    className="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                                >
                                    Register
                                </Link>
                            </>
                        )}
                    </nav>
                </header>
                <div className="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow starting:opacity-0">
                    <main className="flex w-full max-w-[335px] flex-col-reverse lg:max-w-4xl lg:flex-row">
                        <div className="flex-1 rounded-br-lg rounded-bl-lg bg-white p-6 pb-12 text-center shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] lg:rounded-tl-lg lg:rounded-br-none lg:p-20 dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                            <div className="mb-6">
                                <div className="text-6xl mb-4">🏥💊</div>
                                <h1 className="mb-4 text-3xl font-bold text-[#2563eb]">Clinic Pharmacy</h1>
                                <p className="mb-8 text-lg text-[#706f6c] dark:text-[#A1A09A]">
                                    Professional healthcare management system for clinics and pharmacies
                                </p>
                            </div>

                            <div className="mb-8 grid gap-4 text-left lg:grid-cols-2">
                                <div className="p-4 rounded-lg bg-[#f8fafc] dark:bg-[#1e1e1d]">
                                    <div className="flex items-center mb-2">
                                        <span className="text-2xl mr-2">👥</span>
                                        <h3 className="font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Patient Management</h3>
                                    </div>
                                    <p className="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                        Complete patient records and appointment scheduling
                                    </p>
                                </div>

                                <div className="p-4 rounded-lg bg-[#f8fafc] dark:bg-[#1e1e1d]">
                                    <div className="flex items-center mb-2">
                                        <span className="text-2xl mr-2">💊</span>
                                        <h3 className="font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Inventory Control</h3>
                                    </div>
                                    <p className="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                        Track medications, supplies and equipment
                                    </p>
                                </div>

                                <div className="p-4 rounded-lg bg-[#f8fafc] dark:bg-[#1e1e1d]">
                                    <div className="flex items-center mb-2">
                                        <span className="text-2xl mr-2">📋</span>
                                        <h3 className="font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Prescriptions</h3>
                                    </div>
                                    <p className="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                        Digital prescription management and tracking
                                    </p>
                                </div>

                                <div className="p-4 rounded-lg bg-[#f8fafc] dark:bg-[#1e1e1d]">
                                    <div className="flex items-center mb-2">
                                        <span className="text-2xl mr-2">📊</span>
                                        <h3 className="font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Analytics</h3>
                                    </div>
                                    <p className="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                        Comprehensive reports and business insights
                                    </p>
                                </div>
                            </div>

                            {!auth.user && (
                                <div className="flex gap-4 justify-center">
                                    <Link
                                        href={route('register')}
                                        className="inline-flex items-center px-6 py-3 bg-[#2563eb] border border-transparent rounded-md font-semibold text-white hover:bg-[#1d4ed8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563eb] transition ease-in-out duration-150"
                                    >
                                        Get Started
                                    </Link>
                                    <Link
                                        href={route('login')}
                                        className="inline-flex items-center px-6 py-3 bg-white border border-[#d1d5db] rounded-md font-semibold text-[#374151] hover:bg-[#f9fafb] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563eb] transition ease-in-out duration-150 dark:bg-[#161615] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:bg-[#1e1e1d]"
                                    >
                                        Sign In
                                    </Link>
                                </div>
                            )}

                            <footer className="mt-12 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                <div className="mb-2">
                                    <span className="inline-flex items-center">
                                        <span className="mr-1">🔒</span>
                                        HIPAA Compliant & Secure
                                    </span>
                                </div>
                                Built with ❤️ using{" "}
                                <span className="font-medium text-[#f53003] dark:text-[#FF4433]">
                                    Laravel & React
                                </span>
                            </footer>
                        </div>
                    </main>
                </div>
                <div className="hidden h-14.5 lg:block"></div>
            </div>
        </>
    );
}